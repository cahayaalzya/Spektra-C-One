<x-app-layout>
    <div class="min-h-screen flex bg-slate-50">
        <aside class="w-72 bg-[#EF8082] text-white hidden lg:flex flex-col shadow-2xl">
            <div class="p-10 text-center">
                <div class="w-20 h-20 bg-white/20 rounded-full mx-auto mb-4 flex items-center justify-center text-3xl"></div>
                <h2 class="text-2xl font-black italic">SUPER ADMIN</h2>
            </div>
            <nav class="mt-4 px-6 space-y-2 flex-1 text-sm">
                <a href="#" class="flex items-center space-x-4 px-6 py-4 bg-black/10 rounded-2xl font-black uppercase tracking-widest">Dashboard</a>
                <a href="#" class="flex items-center space-x-4 px-6 py-4 hover:bg-black/5 rounded-2xl font-bold transition">Kelola User</a>
                <a href="#" class="flex items-center space-x-4 px-6 py-4 hover:bg-black/5 rounded-2xl font-bold transition">Laporan Sistem</a>
            </nav>
            <div class="p-10 border-t border-white/10">
                <form method="POST" action="{{ route('logout') }}">@csrf
                    <button class="w-full py-4 bg-black/20 rounded-xl font-bold hover:bg-black/40 transition">Selesai Bertugas</button>
                </form>
            </div>
        </aside>

        <main class="flex-1 p-10">
            <div class="bg-white p-12 rounded-[3rem] border-4 border-slate-900">
                <h1 class="text-4xl font-black italic text-slate-900">Kontrol Sistem Spektra.</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-10 text-slate-600 font-medium">
                    <div class="p-6 bg-blue-50 rounded-2xl border-2 border-blue-200">Total User: 1,240</div>
                    <div class="p-6 bg-purple-50 rounded-2xl border-2 border-purple-200">Total Mading: 450</div>
                </div>
            </div>
        </main>
    </div>
</x-app-layout>