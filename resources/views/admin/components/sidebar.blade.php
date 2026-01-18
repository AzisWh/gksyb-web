<aside
        class="z-20 hidden w-64 overflow-y-auto bg-white shadow md:block shrink-0"
      >
        <div class="py-4 text-gray-500 ">
         <div class="flex items-center justify-center">
             <a
            class=""
            href="#"
          >
            <img src="{{ asset('assets/logo.png') }}" class="w-[208px] " alt="">
          </a>
         </div>
          <ul class="mt-6">
            <p class="ml-6 font-thin text-left text-gray-500">Dashboard</p>
            <li class="relative px-6 py-3">
                @if(request()->routeIs('admin.dashboard.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif

                <a
                    href="{{ route('admin.dashboard.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.dashboard.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
                >
                     <svg
                        class="w-5 h-5"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                      >
                          <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                      </svg>

                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
          </ul>
          <ul class="">
            <p class="text-sm font-thin ml-6 text-gray-500 uppercase">Konten dan publikasi</p>
            <li class="relative px-6 py-3">
               @if(request()->routeIs('admin.jadwal.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.jadwal.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.jadwal.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Jadwal Doa dan Perayaan Ekaristi</span>
              </a>
            </li>
          </ul>
          <ul class="">
            <p class="text-sm font-thin ml-6 text-gray-500 uppercase">Dokumen dan media</p>
            <li class="relative px-6 py-3">
               @if(request()->routeIs('admin.dokparoki.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.dokparoki.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.dokparoki.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Dokumen Paroki</span>
              </a>
            </li>
          </ul>
          <ul class="">
            <li class="relative px-6 ">
               @if(request()->routeIs('admin.ekaristi.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.ekaristi.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.ekaristi.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Panduan Perayaan Ekaristi</span>
              </a>
            </li>
          </ul>
          <ul class="mt-6">
            <p class="text-sm font-thin ml-6 text-gray-500 uppercase">Profil gereja</p>
            <li class="relative px-6 py-3">
               @if(request()->routeIs('admin.gereja.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.gereja.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.gereja.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Profil Gereja</span>
              </a>
            </li>
          </ul>
          <ul class="">
            <li class="relative px-6 py-3">
               @if(request()->routeIs('admin.sakramen.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.sakramen.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.sakramen.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Sakramen Gereja Katolik</span>
              </a>
            </li>
          </ul>
          <ul class="">
            <li class="relative px-6 py-3">
               @if(request()->routeIs('admin.donasi.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.donasi.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.donasi.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Donasi & Sumbangan</span>
              </a>
            </li>
          </ul>
          <ul class="">
            <li class="relative px-6 py-3">
               @if(request()->routeIs('admin.paroki.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.paroki.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.paroki.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Pastor Paroki</span>
              </a>
            </li>
          </ul>
          <ul>
            <p class="text-sm font-thin ml-6 text-gray-500 uppercase">Komunikasi Umat</p>
            <li class="relative px-6 py-3"
                x-data="{ open: false }">

                <button
                    type="button"
                    @click.stop="open = !open"
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
                    aria-haspopup="true"
                >
                    <span class="inline-flex items-center">
                        <svg
                            class="w-5 h-5"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                        >
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                        </svg>
                        <span class="ml-4">Pesan Masuk</span>
                    </span>

                    <svg
                        class="w-4 h-4 transition-transform duration-200"
                        :class="open ? 'rotate-180' : ''"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <ul
                    x-show="open"
                    x-transition
                    @click.outside="open = false"
                    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50"
                >
                    <li class="px-2 py-1 hover:text-gray-800">
                        <a href="{{ route('admin.terhubung.index') }}" class="block w-full">
                            Mari Terhubung
                        </a>
                    </li>

                    <li class="px-2 py-1 hover:text-gray-800">
                        <a href="{{ route('admin.doa.index') }}" class="block w-full">
                            Intensi / Ujud Doa
                        </a>
                    </li>
                </ul>
            </li>
          </ul>
         

          <ul class="">
            <li class="relative px-6 py-3">
               @if(request()->routeIs('admin.faq.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.faq.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.faq.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Soal Sering Ditanya</span>
              </a>
            </li>
          </ul>

          <ul class="">
            <p class="text-sm font-thin ml-6 text-gray-500 uppercase">Manajemen Sistem</p>
            <li class="relative px-6 py-3">
               @if(request()->routeIs('admin.settings.*'))
                    <span class="absolute inset-y-0 left-0 w-1 bg-[#3E0703] rounded-tr-lg rounded-br-lg"></span>
                @endif
              <a
                    href="{{ route('admin.settings.index') }}"
                    class="inline-flex items-center w-full text-sm font-medium transition-colors duration-150
                    {{ request()->routeIs('admin.settings.*')
                        ? 'text-[#3E0703] bg-[#FFF3F2]'
                        : 'text-gray-700 hover:bg-[#FFF3F2]'
                    }}"
              >
                <svg 
                  class="w-5 h-5" 
                  aria-hidden="true" 
                  fill="none" 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor" > 
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" ></path> 
                </svg>
                <span class="ml-4">Pengaturan Website</span>
              </a>
            </li>
          </ul>

          <div class="px-6 my-6">
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
                  <button
                      type="submit"
                      class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-[#3E0703] transition-colors duration-150 bg-purple-500 border border-transparent rounded-lg "
                  >
                      Logout
                      <span class="ml-2" aria-hidden="true">+</span>
                  </button>
              </form>
          </div>

        </div>
      </aside>