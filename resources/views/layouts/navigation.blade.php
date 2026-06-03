<header x-data="{ open: false }" class="bg-slate-900/95 border-b border-white/5 w-full sticky top-0 z-50 backdrop-blur-md">
    <nav class="w-full px-6 py-4 flex items-center justify-between" aria-label="Global">

        <div class="flex items-center gap-3">
            <a href="/" class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto">
                <span class="font-bold text-xl text-white tracking-tight ">
                    ABSENSI<span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-white from-30% via-emerald-400 to-emerald-500 to-80%">TANGBAR</span>
                </span>
            </a>
        </div>

        <div class="hidden lg:flex items-center gap-x-8 mx-auto">
            <a href="{{ url('/') }}" class="relative text-sm font-semibold text-white transition-all duration-300 hover:text-emerald-400 group py-2">
                Home
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
    
            <a href="{{ route('member.qr') }}" class="relative text-sm font-semibold text-white transition-all duration-300 hover:text-emerald-400 group py-2">
                QR Saya
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
    
            <a href="/sodaqoh" class="relative text-sm font-semibold text-white transition-all duration-300 hover:text-emerald-400 group py-2">
                Sodaqoh
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
    
            <a href="{{ route('member.statistik') }}" class="relative text-sm font-semibold text-white transition-all duration-300 hover:text-emerald-400 group py-2">
                Performa Saya
                <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-500 transition-all duration-300 group-hover:w-full"></span>
            </a>
    
            @if (Auth::user() && Auth::user()->role == 'admin')
                <a href="{{ route('admin.dashboard') }}" class="relative text-sm font-semibold text-emerald-400 transition-all duration-300 hover:text-emerald-300 group py-2">
                    Data Absensi
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
                
                <a href="{{ route('admin.scan') }}" class="relative text-sm font-semibold text-emerald-400 transition-all duration-300 hover:text-emerald-300 group py-2">
                    Scan QR
                    <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-emerald-400 transition-all duration-300 group-hover:w-full"></span>
                </a>
            @endif
        </div>
    
        <div class="flex items-center gap-x-4">
            <div class="hidden sm:flex sm:items-center gap-4">
                @auth
                    <div class="flex items-center gap-4">
                        <span class="text-sm text-slate-400">
                            Halo, <span class="text-white font-medium">{{ Auth::user()->name }}</span>
                        </span>
    
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="inline-block rounded-lg bg-red-500 px-4 py-1.5 text-xs font-bold text-white transition-all duration-300 hover:bg-white hover:text-red-500 focus:outline-none">
                                Log out
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="inline-block rounded-lg bg-emerald-600 px-5 py-1.5 text-sm font-bold text-white transition-all duration-300 hover:bg-white hover:text-emerald-600 focus:outline-none">
                        Log in
                    </a>
                @endauth
            </div>
    
            <div class="flex lg:hidden">
                <button @click="open = ! open" class="text-white p-2 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <div :class="{ 'block': open, 'hidden': !open }"
        class="hidden lg:hidden bg-slate-950 border-t border-white/5 px-6 py-4 space-y-4">
        <a href="{{ url('/') }}" class="block text-white font-semibold">Home</a>
        <a href="{{ route('member.qr') }}" class="block text-white font-semibold">My QR</a>
        <a href="/sodaqoh" class="block text-white font-semibold">Sodaqoh</a>
        <a href="{{ route('member.statistik') }}" class="block text-white font-semibold">Performa Saya</a>

        @if (Auth::user() && Auth::user()->role == 'admin')
            <hr class="border-white/5">
            <a href="{{ route('admin.dashboard') }}" class="block text-green-400 font-semibold">Dashboard Admin</a>
            <a href="{{ route('admin.scan') }}" class="block text-green-400 font-semibold">Scan QR</a>
        @endif

        <div class="pt-4 border-t border-white/5">
            @auth
                <p class="text-xs text-gray-400 mb-2">Halo, <span class="text-white">{{ Auth::user()->name }}</span></p>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-red-400 font-semibold text-left w-full">Log out</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="block text-white font-semibold mb-2">Masuk</a>
                <a href="{{ route('register') }}" class="block text-emerald-400 font-semibold">Daftar Akun</a>
            @endauth
        </div>
    </div>
</header>
