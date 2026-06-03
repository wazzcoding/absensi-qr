<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Absensi Tangbar</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
    <div class="min-h-screen bg-[#020617] flex items-center justify-center p-4 relative font-sans">
        
        <div class="absolute top-6 left-6">
            <a href="{{ url('/') }}" class="flex items-center gap-2 text-slate-400 hover:text-emerald-400 transition-all group">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                <span class="text-sm font-medium">Beranda</span>
            </a>
        </div>

        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto h-16 w-auto mb-4">
                <h2 class="text-2xl font-bold text-white uppercase tracking-tight">
                    Masuk <span class="text-emerald-400">Tangbar</span>
                </h2>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4 rounded-2xl border border-white/5 bg-[#0f172a] p-6 shadow-2xl sm:p-8">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-slate-300" for="email">Email Address</label>
                    <input class="mt-1 w-full rounded-xl border-white/10 bg-[#1e293b] p-3 text-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 focus:outline-none transition-all" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div>
                    <label class="block text-sm font-medium text-slate-300" for="password">Password</label>
                    <input class="mt-1 w-full rounded-xl border-white/10 bg-[#1e293b] p-3 text-white shadow-sm focus:border-emerald-500 focus:ring-1 focus:ring-emerald-500 focus:outline-none transition-all" id="password" name="password" type="password" placeholder="••••••••" required>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between py-1">
                    <label class="flex items-center gap-2 cursor-pointer">
                        <input type="checkbox" name="remember" class="rounded border-white/10 bg-[#1e293b] text-emerald-500 focus:ring-emerald-500">
                        <span class="text-xs text-slate-400">Ingat saya</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-xs text-emerald-400 hover:text-emerald-300 transition-colors">Lupa Password?</a>
                    @endif
                </div>

                <button class="block w-full rounded-xl bg-emerald-500 px-12 py-3 text-sm font-bold text-[#020617] uppercase tracking-widest transition-all hover:bg-emerald-400 active:scale-95 shadow-lg shadow-emerald-500/20" type="submit">
                    MASUK SEKARANG
                </button>

                <p class="text-center text-xs text-slate-500 mt-6">
                    Belum punya akun? <a href="{{ route('register') }}" class="text-emerald-400 font-semibold hover:underline">Daftar di sini</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>