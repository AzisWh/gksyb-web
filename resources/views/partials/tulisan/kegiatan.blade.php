<section class="w-full py-8 fs-style-manrope bg-white text-[#3D0E0E]" data-aos="fade-up">
    <div class="container mx-auto px-4">

        <div class="mt-4 flex flex-col font-light text-center md:text-left ">
            <h2 class="text-3xl md:text-4xl font-semibold ">
                Kegiatan Yang Akan Datang
            </h2>

            <p class="text-base opacity-80 text-sm md:text-lg ">
                Agenda kegiatan paroki yang akan datang sebagai sarana keterlibatan umat dalam pelayanan dan kebersamaan.
            </p>
        </div>

        <!-- Slider Wrapper -->
        <div class="relative mt-10">

            <!-- Slider -->
            <div class="swiper myAgendaSwiper">
                <div class="swiper-wrapper">

                    <!-- CARD ITEM -->
                    <div class="swiper-slide">
                        <div class="grid md:grid-cols-2 gap-6 bg-white rounded-xl shadow overflow-hidden">
                            
                            <!-- Image -->
                            <div class="h-56 md:h-full">
                                <img src="{{ asset('assets/card.png') }}"
                                     class="w-full h-full object-cover" />
                            </div>

                            <!-- Content -->
                            <div class="p-6 flex flex-col justify-center">
                                
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-xs bg-purple-200 text-purple-700 px-3 py-1 rounded-full">Agenda</span>
                                    <span class="text-xs opacity-70">1 Jan 2023</span>
                                </div>

                                <h3 class="text-xl font-semibold">Open Casting Tablo Paskah 2026</h3>

                                <p class="text-sm opacity-80 mt-2">
                                    Lorem ipsum dolor sit amet consectetur. Sit pulvinar massa amet
                                    wimans nulla facilisis viverra etiam leo. Turpis cursus nulla purus blandit tempor dictum
                                    sollicitudin viverra.
                                </p>
                            </div>

                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="grid md:grid-cols-2 gap-6 bg-white rounded-xl shadow overflow-hidden">

                            <div class="h-56 md:h-full">
                                <img src="{{ asset('assets/card.png') }}"
                                     class="w-full h-full object-cover" />
                            </div>

                            <div class="p-6 flex flex-col justify-center">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="text-xs bg-purple-200 text-purple-700 px-3 py-1 rounded-full">Agenda</span>
                                    <span class="text-xs opacity-70">12 Feb 2023</span>
                                </div>

                                <h3 class="text-xl font-semibold">Retret Orang Muda Katolik</h3>
                                <p class="text-sm opacity-80 mt-2">
                                    Kegiatan retret untuk memperdalam iman dan mempererat persaudaraan OMK.
                                </p>
                            </div>

                        </div>
                    </div>

                    <!-- Tambah slide lagi sesuai kebutuhan -->

                </div>
            </div>

            <!-- Navigation -->
            <div class="absolute left-0 top-1/2 -translate-y-1/2 z-10">
                <div class="swiper-button-prev-agenda bg-white/60 hover:bg-white text-[#3D0E0E] rounded-full w-10 h-10 flex items-center justify-center shadow">
                    ←
                </div>
            </div>
            <div class="absolute right-0 top-1/2 -translate-y-1/2 z-10">
                <div class="swiper-button-next-agenda bg-white/60 hover:bg-white text-[#3D0E0E] rounded-full w-10 h-10 flex items-center justify-center shadow">
                    →
                </div>
            </div>

        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".myAgendaSwiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,

        navigation: {
            nextEl: ".swiper-button-next-agenda",
            prevEl: ".swiper-button-prev-agenda",
        },

        breakpoints: {
            768: {
                slidesPerView: 1,
            },
            1024: { 
                slidesPerView: 1,
            }
        }
    });
</script>
