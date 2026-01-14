<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // View
    function index() {
        $products = Product::with("image")->get();
        $stats = [
            "total" => $products->count()
        ];
        return view("pages.dashboard.product.index", compact("products", "stats"));
    }
    function create() {
        return view("pages.dashboard.product.create");
    }
    function updateView($id) {
        $product = Product::with("image")->findOrFail($id);
        return view("pages.dashboard.product.edit", compact("product"));
    }

    // Services
    function store(Request $req)
    {
        // Upload image
        $file = $req->file('image');
        $fileName = $file->getClientOriginalName();
        $path = $file->store('products', 'public');

        // Simpan ke table images
        $image = File::create([
            'path' => $path,
            'name' => $fileName
        ]);

        // Simpan product
        Product::create([
            'name'        => $req->name,
            'price'       => $req->price,
            'size'        => $req->size,
            'description' => $req->description,
            'image_id'    => $image->id
        ]);

        return redirect()->route('admin.products.index')
            ->with('success','Product berhasil ditambahkan!');
    }

    function update(Request $req, $id)
    {
        $product = Product::with("image")->findOrFail($id);

        // Jika upload image baru
        if ($req->file('image')) {
            // Hapus file lama lalu ubah image menjadi null terlebih dulu
            if ($product->image) {
                $publicStorage = Storage::disk('public');
                if ($publicStorage->exists($product->image->path)) {
                    $publicStorage->delete($product->image->path);

                    $product->update([
                        "image_id" => null
                    ]);
                }
                $product->image->delete();
            }

            // Upload file baru
            $file = $req->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->store('products', 'public');
            $newImage = File::create([
                'path' => $path,
                "name" => $fileName
            ]);

            $product->image_id = $newImage->id;
        }

        // Update data
        $product->update([
            'name'        => $req->name,
            'price'       => $req->price,
            'size'        => $req->size,
            'description' => $req->description
        ]);
        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success','Product berhasil diupdate!');
    }

    function delete($id) {
        Product::destroy($id);
        return redirect()->route('admin.products.index')
            ->with('success','Product berhasil dihapus!');
    }
}
