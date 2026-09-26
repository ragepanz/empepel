<div class="relative flex flex-col justify-between h-full p-8 lg:p-14 text-white overflow-hidden bg-slate-950">
    <!-- Glow Background Gradients -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-blue-600/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 right-0 w-[30rem] h-[30rem] bg-amber-500/20 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-slate-900/60 via-slate-950/80 to-slate-950 pointer-events-none"></div>

    <!-- Top Badge & Header -->
    <div class="relative z-10">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-slate-800/80 border border-slate-700/60 shadow-inner">
            <span class="inline-block w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
            <span class="text-xs font-semibold tracking-wide text-slate-300">MobilQuick Internal Control Hub</span>
        </div>
    </div>

    <!-- Center Hero Section -->
    <div class="relative z-10 my-auto py-10">
        <!-- Floating Visual Card Showcase -->
        <div class="relative mb-8 flex justify-center">
            <div class="relative p-6 rounded-2xl bg-gradient-to-b from-slate-800/50 to-slate-900/80 border border-slate-700/50 shadow-2xl backdrop-blur-md max-w-md w-full">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('images/bg.png') }}" alt="MobilQuick Icon" class="h-10 w-auto" />
                        <div>
                            <h4 class="text-base font-bold text-white tracking-tight">Mobil<span class="text-amber-400">Quick</span> Management</h4>
                            <p class="text-xs text-slate-400">Automotive ERP & Marketplace Suite</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-semibold px-2 py-0.5 rounded-md bg-blue-500/20 text-blue-400 border border-blue-500/30">v2.4 Active</span>
                </div>

                <div class="grid grid-cols-3 gap-3 pt-3 border-t border-slate-700/40 text-center">
                    <div class="p-2 rounded-lg bg-slate-950/40">
                        <div class="text-base font-extrabold text-amber-400">100%</div>
                        <div class="text-[10px] text-slate-400 font-medium">Data Terverifikasi</div>
                    </div>
                    <div class="p-2 rounded-lg bg-slate-950/40">
                        <div class="text-base font-extrabold text-emerald-400">Real-time</div>
                        <div class="text-[10px] text-slate-400 font-medium">Monitoring Stok</div>
                    </div>
                    <div class="p-2 rounded-lg bg-slate-950/40">
                        <div class="text-base font-extrabold text-blue-400">Instan</div>
                        <div class="text-[10px] text-slate-400 font-medium">Audit Penjualan</div>
                    </div>
                </div>
            </div>
        </div>

        <h1 class="text-3xl lg:text-4xl font-extrabold text-white tracking-tight leading-tight mb-4">
            Kelola Penjualan & Inventaris Mobil <br class="hidden lg:block"/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 via-sky-300 to-amber-400">
                Lebih Cepat, Aman & Terpusat.
            </span>
        </h1>
        
        <p class="text-sm lg:text-base text-slate-400 max-w-lg leading-relaxed">
            Akses portal terpusat operasional MobilQuick untuk manajemen katalog armada, status transaksi pelanggan, verifikasi pembayaran, serta pelaporan performa penjualan.
        </p>
    </div>

    <!-- Bottom Security / Status Footer -->
    <div class="relative z-10 flex items-center justify-between text-xs text-slate-500 pt-6 border-t border-slate-800/80">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
            </svg>
            <span class="text-slate-400 font-medium">Enterprise SSL & Role-Based Access Control</span>
        </div>
        <span>© {{ date('Y') }} MobilQuick Indonesia</span>
    </div>
</div>
