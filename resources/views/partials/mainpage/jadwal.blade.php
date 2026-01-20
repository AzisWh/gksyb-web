@php
    function getTab($text) {
        $t = strtolower($text);

        if (str_contains($t, 'senin') || str_contains($t, 'selasa') || str_contains($t, 'rabu') || str_contains($t, 'kamis') || str_contains($t, 'jumat')) {
            return 'harian';
        }

        if (str_contains($t, 'sabtu') || str_contains($t, 'minggu')) {
            return 'mingguan';
        }

        if (str_contains($t, 'doa') || str_contains($t, 'devosi') || str_contains($t, 'rosario')) {
            return 'doa';
        }

        if (str_contains($t, 'perayaan') || str_contains($t, 'khusus')) {
            return 'perayaan';
        }

        return 'harian';
    }
@endphp


<section class="w-full bg-[#3a0d0d] text-white py-16 fs-style-manrope" data-aos="fade-up">
    <div class="container mx-auto px-4">

        <div class="text-center mb-4">
            <span class="bg-white/10 text-sm px-4 py-1 rounded-full">Jadwal Doa dan Perayaan Ekaristi</span>
        </div>

        <h2 class="text-2xl md:text-4xl font-semibold text-center mb-4">
            Jadwal Doa dan Perayaan Ekaristi Gereja Santo Yusup Bintaran
        </h2>

        <p class="text-center max-w-2xl mx-auto text-sm md:text-base mb-10">
            Setiap perayaan Misa adalah undangan untuk datang dan berjumpa dengan Tuhan. Mari ambil waktu
            untuk hadir, berdoa, dan mempersembahkan hidup dalam kasih-Nya.
        </p>

        <!-- Tabs -->
        <div class="flex justify-center mb-10 overflow-x-auto pb-2">
            <div class="flex gap-4 text-sm md:text-base">
                <button class="tab-btn active px-6 py-2 rounded-full border border-white/30 hover:bg-white/10 transition" data-tab="harian">Harian</button>
                <button class="tab-btn px-6 py-2 rounded-full border border-white/30 hover:bg-white/10 transition" data-tab="mingguan">Mingguan</button>
                <button class="tab-btn px-6 py-2 rounded-full border border-white/30 hover:bg-white/10 transition" data-tab="doa">Doa & Devosi</button>
                <button class="tab-btn px-6 py-2 rounded-full border border-white/30 hover:bg-white/10 transition" data-tab="perayaan">Perayaan</button>
            </div>
        </div>
        <div class="border-t border-white/20 mb-8"></div>

        <!-- CONTENT WRAPPER -->
        <div id="tab-content">

            <!-- === TAB: HARIAN === -->
            <div class="tab-pane" id="harian">
                @foreach($jadwal as $j)
                    @if(getTab($j->hari) == 'harian')
                    <div class="grid md:grid-cols-3 gap-6 mb-6">
                        <div>
                            <p class="font-semibold">{{ $j->hari }}</p>
                            <p class="text-sm mt-1">{{ $j->waktu }} WIB</p>
                            <p class="text-xs opacity-80">{{ $j->lokasi }}</p>
                        </div>

                        <div class="md:col-span-2">
                            <p class="font-semibold mb-2">{{ $j->nama_jadwal }}</p>
                            <p class="text-sm leading-relaxed">
                                {{ $j->keterangan }}
                            </p>
                        </div>
                    </div>
                    @else
                        <h1 class="text-center">belum ada jadwal</h1>
                    @endif
                @endforeach
            </div>
            <!-- === TAB: MINGGUAN === -->
            <div class="tab-pane hidden" id="mingguan">
            @foreach($jadwal as $j)
                @if(getTab($j->hari) == 'mingguan')
                <div class="grid md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <p class="font-semibold">{{ $j->hari }}</p>
                        <p class="text-sm mt-1">{{ $j->waktu }} WIB</p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="font-semibold mb-2">{{ $j->nama_jadwal }}</p>
                        <p class="text-sm">{{ $j->keterangan }}</p>
                    </div>
                </div>
                @else
                    <h1 class="text-center">belum ada jadwal</h1>
                @endif
            @endforeach
        </div>


            <!-- === TAB: DOA & DEVOSI === -->
            <div class="tab-pane hidden" id="doa">
                @foreach($jadwal as $j)
                    @if(getTab($j->hari) == 'doa')
                        <div class="mb-4">
                            <p class="font-semibold">{{ $j->nama_jadwal }}</p>
                            <p class="text-sm">{{ $j->hari }} - {{ $j->waktu }}</p>
                            <p class="text-xs">{{ $j->keterangan }}</p>
                        </div>
                    @else
                        <h1 class="text-center">belum ada jadwal</h1>
                    @endif
                @endforeach
            </div>


            <!-- === TAB: PERAYAAN === -->
            <div class="tab-pane hidden" id="perayaan">
                @foreach($jadwal as $j)
                    @if(getTab($j->hari) == 'perayaan')
                        <div class="mb-4">
                            <p class="font-semibold">{{ $j->nama_jadwal }}</p>
                            <p class="text-sm">{{ $j->hari }} - {{ $j->waktu }}</p>
                        </div>
                    @else
                        <h1 class="text-center">belum ada jadwal</h1>
                    @endif
                @endforeach
            </div>

        </div>

    </div>
</section>

<script>
    const tabBtns = document.querySelectorAll(".tab-btn");
    const tabPanes = document.querySelectorAll(".tab-pane");

    tabBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            const target = btn.getAttribute("data-tab");

            tabBtns.forEach(b => b.classList.remove("active", "bg-white", "text-black"));
            btn.classList.add("active", "bg-white", "text-black");

            tabPanes.forEach(pane => {
                pane.classList.toggle("hidden", pane.id !== target);
            });
        });
    });

    document.querySelector(".tab-btn.active").classList.add("bg-white", "text-black");
</script>
