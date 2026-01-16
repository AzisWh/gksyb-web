<header class="flex shadow-md py-4 px-4 sm:px-10 bg-white min-h-[70px] tracking-wide relative z-50">
    <div class="flex flex-wrap items-center justify-between gap-5 w-full">
        <a href="{{route('landing.index')}}" class="max-sm:hidden"><img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-36" /></a>
        <a href="{{route('landing.index')}}" class="hidden max-sm:block"><img src="{{ asset('assets/logo-short.png') }}" alt="logo" class="w-10" /></a>

        <div id="collapseMenu"
            class="max-lg:hidden lg:!block max-lg:before:fixed max-lg:before:bg-black max-lg:before:opacity-50 max-lg:before:inset-0 max-lg:before:z-50">
            <button id="toggleClose" class="lg:hidden fixed top-2 right-4 z-[100] rounded-full bg-white w-9 h-9 flex items-center justify-center border border-gray-200 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5 fill-black" viewBox="0 0 320.591 320.591">
                    <path
                    d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z"
                    data-original="#000000"></path>
                    <path
                    d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z"
                    data-original="#000000"></path>
                </svg>
            </button>

            <ul class="lg:flex gap-x-4 max-lg:space-y-3 max-lg:fixed max-lg:bg-white max-lg:w-1/2 max-lg:min-w-[300px] max-lg:top-0 max-lg:left-0 max-lg:p-6 max-lg:h-full max-lg:shadow-md max-lg:overflow-auto z-50">
                <li class="mb-6 hidden max-lg:block">
                    <a href="{{ route('landing.index') }}"><img src="{{ asset('assets/logo.png') }}" alt="logo" class="w-36" />
                    </a>
                </li>

                <li class="group max-lg:border-b max-lg:border-gray-300 max-lg:px-3 max-lg:py-3 relative">
                    <a href='javascript:void(0)'
                        class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-medium text-[15px] flex items-center">Tentang Gereja<svg
                        xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ml-1 inline-block"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                            data-name="16" data-original="#000000" />
                        </svg>
                    </a>

                    <ul class="absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[230px] group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-[400ms]">
                        <li class="border-b border-gray-300 py-3">
                            <a href='{{ route('landing.sejarah') }}'
                                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                                <img src="{{ asset('assets/flyout-2/titiksejarah.png') }}" alt="" class="pr-3">
                                Titik Sejarah
                            </a>
                        </li>

                        <li class="border-b border-gray-300 py-3">
                            <a href='{{ route('landing.gembala') }}'
                                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                                <img src="{{ asset('assets/flyout/Priest.png') }}" alt="" class="pr-3">
                                Gembala Berkarya
                            </a>
                        </li>
                        <li class="border-b border-gray-300 py-3">
                            <a href='{{ route('landing.doa') }}'
                                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                                <img src="{{ asset('assets/flyout/tanggal.png') }}" alt="" class="pr-3">
                                Jadwal Perayaan Ekaristi
                            </a>
                        </li>
                        <li class="border-b border-gray-300 py-3">
                            <a href='{{ route('landing.sekraman') }}'
                                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                                <img src="{{ asset('assets/gereja.png') }}" alt="" class="pr-3 w-8">
                                Sakramen Gereja Katolik
                            </a>
                        </li>

                    </ul>

                </li>

                <li class="max-lg:border-b max-lg:border-gray-300 max-lg:py-3 px-3"><a href='{{ route('landing.tulisan') }}'
                    class="hover:text-blue-700 text-slate-900 block font-medium text-[15px]">Tulisan Gereja</a>
                </li>

                <li class="group max-lg:border-b max-lg:border-gray-300 max-lg:px-3 max-lg:py-3 relative">
                    <a href='javascript:void(0)'
                        class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-medium text-[15px] flex items-center">Informasi<svg
                        xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ml-1 inline-block"
                        viewBox="0 0 24 24">
                        <path
                            d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z"
                            data-name="16" data-original="#000000" />
                        </svg>
                    </a>

                    <ul class="absolute top-5 max-lg:top-8 left-0 z-50 block space-y-2 shadow-lg bg-white max-h-0 overflow-hidden min-w-[230px] group-hover:opacity-100 group-hover:max-h-[700px] px-6 group-hover:pb-4 group-hover:pt-6 transition-all duration-[400ms]">
                        <li class="border-b border-gray-300 py-3">
                            <a href='{{ route('landing.contact') }}'
                                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                                <img src="{{ asset('assets/contact.png') }}" alt="" class="pr-3 w-6 h-6">
                                Kontak
                            </a>
                        </li>

                        <li class="border-b border-gray-300 py-3">
                            <a href='{{ route('landing.ssd') }}'
                                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                                <img src="{{ asset('assets/faq.png') }}" alt="" class="pr-3 w-8 h-6">
                                Soal Sering Ditanya
                            </a>
                        </li>
                        <li class="border-b border-gray-300 py-3">
                            <a href='{{ route('landing.donasi') }}'
                                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                                <img src="{{ asset('assets/donasi.png') }}" alt="" class="pr-3 w-8 h-6">
                                Donasi
                            </a>
                        </li>
                        <li class="border-b border-gray-300 py-3">
                            <a href='#'
                                class="hover:text-blue-700 hover:fill-blue-700 text-slate-900 font-normal text-[15px] flex items-center">
                                <img src="{{ asset('assets/img.png') }}" alt="" class="pr-3 w-8">
                                Dokumentasi Kegiatan
                            </a>
                        </li>

                    </ul>

                </li>
            </ul>
        </div>



        <div class="flex max-lg:ml-auto space-x-4">
            <button class="btn-accent transition-all">
                <a href="{{ route('landing.contact') }}"> Hubungi Kami</a>
            </button>
            <button id="toggleOpen" class="lg:hidden cursor-pointer">
                <svg class="w-7 h-7" fill="#000" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"></path>
                </svg>
            </button>
            
        </div>
    </div>

</header>


<script>
    var toggleOpen = document.getElementById('toggleOpen');
    var toggleClose = document.getElementById('toggleClose');
    var collapseMenu = document.getElementById('collapseMenu');

    function handleClick() {
    if (collapseMenu.style.display === 'block') {
        collapseMenu.style.display = 'none';
    } else {
        collapseMenu.style.display = 'block';
    }
    }

    toggleOpen.addEventListener('click', handleClick);
    toggleClose.addEventListener('click', handleClick);
</script>