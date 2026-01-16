<aside class="fixed top-0 left-0 h-screen w-64 bg-slate-900 text-white flex flex-col shadow-lg">

    <!-- Logo / Brand -->
    <div class="h-16 flex items-center justify-center border-b border-slate-700">
        <span class="text-xl font-bold tracking-wide">
            {{ config('app.name') }}
        </span>
    </div>

    <!-- Admin Menu -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-2">
        <!-- Admin Menu  -->
        <a href="/dashboard"
        class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-800 transition
                {{ request()->is('dashboard') ? 'bg-slate-800' : '' }}">
            <i class='bi bi-speedometer2'></i> <span>Dashboard</span>
        </a>
        @if(Auth::user()->role_id == 1)
            <a href="/dashboard/product"
            class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-slate-800 transition
                    {{ request()->is('dashboard/product*') ? 'bg-slate-800' : '' }}">
                <i class='bi bi-bag-plus-fill'></i> <span>Product</span>
            </a>
            <div class="border-b border-gray-600"></div>
        @endIf

        <a href="{{ route("logout") }}"
           class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-red-800 transition">
            <i class='bi bi-box-arrow-in-left'></i> <span>Log Out</span>
        </a>


    </nav>


    <!-- Footer Sidebar -->
    <div class="p-4 border-t border-slate-700 text-sm text-slate-400">
        &copy; {{ date('Y') }} {{ config('app.name') }}
    </div>

</aside>
