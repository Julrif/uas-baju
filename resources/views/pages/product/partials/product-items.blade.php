@foreach($products as $item)
<div class="group relative animate-fadeIn">
    <!-- Card Container -->
    <div class="relative bg-gradient-to-br from-white to-gray-50 rounded-3xl overflow-hidden shadow-2xl hover:shadow-violet-500/20 transition-all duration-500 transform group-hover:-translate-y-2">
        
        @if($item->is_new)
            <div class="absolute top-4 left-4 z-10">
                <span class="bg-gradient-to-r from-pink-500 to-rose-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                    NEW
                </span>
            </div>
        @endif

        @if($item->discount)
            <div class="absolute top-4 right-4 z-10">
                <span class="bg-gradient-to-r from-emerald-500 to-teal-500 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg">
                    -{{ $item->discount }}%
                </span>
            </div>
        @endif

        <!-- Image Container -->
        <div class="relative overflow-hidden h-72 bg-gradient-to-br from-violet-50 to-white">
            <a href="{{ route('product.detail', $item['id']) }}" class="block relative">
                <img src="{{ asset('/storage/' . $item->image->path) }}"
                     alt="{{ $item['name'] }}"
                     class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700">
                
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
            </a>
        </div>

        <!-- Product Info -->
        <div class="p-6 space-y-4">
            <!-- Category & Size -->
            <div class="flex items-center justify-between">
                <span class="text-xs font-semibold text-violet-600 bg-violet-50 px-3 py-1 rounded-full">
                    {{ $item->category->name ?? 'Fashion' }}
                </span>
                <div class="flex items-center space-x-1">
                    <i class="bi bi-rulers text-gray-400 text-sm"></i>
                    <span class="text-sm text-gray-500">Size {{ $item['size'] }}</span>
                </div>
            </div>

            <!-- Product Name -->
            <h3 class="font-bold text-lg text-gray-900 group-hover:text-violet-700 transition-colors duration-300 line-clamp-1">
                <a href="{{ route('product.detail', $item['id']) }}" class="hover:text-violet-700">
                    {{ $item['name'] }}
                </a>
            </h3>

            <!-- Description -->
            <p class="text-sm text-gray-600 line-clamp-2 leading-relaxed">
                {{ $item['description'] }}
            </p>

            <!-- Rating -->
            <div class="flex items-center space-x-1">
                @for($i = 1; $i <= 5; $i++)
                    @if($i <= ($item->rating ?? 0))
                    <i class="bi bi-star-fill text-amber-400 text-sm"></i>
                    @else
                    <i class="bi bi-star text-gray-300 text-sm"></i>
                    @endif
                @endfor
                <span class="text-xs text-gray-500 ml-2">({{ $item->review_count ?? 0 }})</span>
            </div>

            <!-- Price & Action -->
            <div class="flex items-center justify-between pt-2">
                <div>
                    @if($item->discount)
                    <div class="flex items-center space-x-2">
                        <span class="font-bold text-xl text-gray-900">
                            Rp {{ number_format($item['price'] * (1 - $item->discount/100), 0, ',', '.') }}
                        </span>
                        <span class="text-sm text-gray-400 line-through">
                            Rp {{ number_format($item['price'], 0, ',', '.') }}
                        </span>
                    </div>
                    @else
                    <span class="font-bold text-xl text-gray-900">
                        Rp {{ number_format($item['price'], 0, ',', '.') }}
                    </span>
                    @endif
                </div>

                <a href="{{ route('product.detail', $item['id']) }}"
                   class="relative bg-gradient-to-r from-violet-600 to-purple-600 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg hover:shadow-xl hover:from-violet-700 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-0.5 group/btn">
                    <span class="relative z-10">Detail</span>
                    <div class="absolute inset-0 bg-white/10 rounded-xl opacity-0 group-hover/btn:opacity-100 transition-opacity duration-300"></div>
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach