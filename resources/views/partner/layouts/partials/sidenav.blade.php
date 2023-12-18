<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-0 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-26"> 
    <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden" sidenav-close></i>
    <a class="block px-8 py-2 m-0 text-sm whitespace-nowrap text-slate-700" href="{{ route('homepage') }}" target="_blank">
        <img src="../../build/assets/img/ingkenefutsal/ingkenefutsal-full.png" class="inline h-full max-w-full max-h-24" alt="main_logo" />
        <img src="../../build/assets/img/ingkenefutsal/ingkenefutsal-full.png" class="hidden h-full max-w-full max-h-24" alt="main_logo" />
    </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
    <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
            <a href="{{ route('partner.dashboard') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ $activePage === 'dashboard' ? 'bg-teal-100 font-semibold text-slate-700 rounded-lg' : '' }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                    <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
            </a>
        </li>

        <li class="mt-0.5 w-full">
            <a href="{{ route('field.index') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ $activePage === 'field' ? 'bg-teal-100 font-semibold text-slate-700 rounded-lg' : '' }}">
                <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-collection"></i>
                </div>
                <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Field</span>
            </a>
            
        </li>

        <li class="mt-0.5 w-full">
        <a href="{{ route('transaction.index') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ $activePage === 'transaction' ? 'bg-teal-100 font-semibold text-slate-700 rounded-lg' : '' }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Transaksi</span>
        </a>
        </li>

        <li class="w-full mt-4">
        <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages</h6>
        </li>

        <li class="mt-0.5 w-full">
            <a href="{{ route('partner.edit') }}" class="py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors {{ $activePage === 'profile' ? 'bg-teal-100 font-semibold text-slate-700 rounded-lg' : '' }}">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
            <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
        </a>
        </li>
    </ul>
    </div>

</aside>