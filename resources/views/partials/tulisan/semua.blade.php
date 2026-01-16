
<div class="w-full pt-8 bg-white pb-4 px-16" data-aos="fade-up">
    <div class="flex flex-col align-center justify-center text-center text-[#3E0703] fs-style-manrope mt-0 md:mt-5">
        <h1 class="text-xl md:text-3xl font-bold">Semua Tulisan Bintaran</h1>
        <p class="text-xl mt-4 font-thin">
            Kumpulan refleksi iman, katekese, dan informasi pastoral Paroki Bintaran
        </p>
    </div>

    <div class="flex md:flex-row flex-col items-center justify-between py-6 gap-3 md:gap-0 px-12">

        <div class="relative w-[320px] md:w-[260px] shrink-0">
            <span class="absolute inset-y-0 left-3 flex items-center text-[#3a0d0d]/70">
                🔍
            </span>
            <input type="text" placeholder="Cari..."
                class="w-[320px] h-[40px] pl-[40px] pr-3 rounded border border-[#3a0d0d]
                       text-sm text-[#3a0d0d] placeholder-[#3a0d0d]/60
                       focus:outline-none focus:ring-1 focus:ring-[#3a0d0d]/30" />
        </div>

        <!-- Tabs -->
        <div class="flex overflow-x-auto">
            <div class="flex items-center gap-2 text-sm px-2 py-1 whitespace-nowrap">
                <button class="tab-btn active px-4 py-1.5 rounded border border-transparent
                               bg-[#EEDBDAA6] text-[#3a0d0d]"
                        data-tab="semua">Semua</button>

                <button class="tab-btn px-4 py-1.5 rounded border border-transparent"
                        data-tab="katakese">Katakese</button>

                <button class="tab-btn px-4 py-1.5 rounded border border-transparent"
                        data-tab="doa">Doa</button>

                <button class="tab-btn px-4 py-1.5 rounded border border-transparent"
                        data-tab="paroki">Warta Paroki</button>

                <button class="tab-btn px-4 py-1.5 rounded border border-transparent"
                        data-tab="berita">Berita</button>

                <button class="tab-btn px-4 py-1.5 rounded border border-transparent"
                        data-tab="agenda">Agenda</button>
            </div>
        </div>
    </div>
</div>


<!-- TAB PANES -->
<div class="w-full bg-white px-16 pb-12">

    <div id="semua" class="tab-pane ">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($agendas as $item)
            <div class="card flex flex-col bg-white border border-[#efe6e4] rounded-md overflow-hidden shadow-sm">

                <img src="{{ asset($item['image']) }}"
                    alt="img"
                    class="w-full h-48 object-cover">

                <div class="p-4 flex flex-col flex-1">

                    <div class="flex items-center gap-3 mb-2">
                        <span class="text-xs bg-[#F3E1E7] text-[#a33a6a] px-2 py-0.5 rounded-full">
                            {{ $item['type'] }}
                        </span>
                        <span class="text-xs text-[#7b6f6f]">
                            • {{ $item['date'] }}
                        </span>
                    </div>

                    <h3 class="text-lg font-semibold text-[#3E0703] leading-snug">
                        {{ $item['title'] }}
                    </h3>

                    <p class="text-sm text-[#6b6b6b] mt-2">
                        {{ $item['desc'] }}
                    </p>

                </div>
            </div>
        @endforeach
    </div>

    </div>

    <div id="katakese" class="tab-pane hidden  text-center text-xl text-[#3E0703]">
        Katakese List
    </div>

    <div id="doa" class="tab-pane hidden  text-center text-xl text-[#3E0703]">
        Doa List
    </div>

    <div id="paroki" class="tab-pane hidden  text-center text-xl text-[#3E0703]">
        Warta Paroki List
    </div>

    <div id="berita" class="tab-pane hidden  text-center text-xl text-[#3E0703]">
        Berita List
    </div>

    <div id="agenda" class="tab-pane hidden  text-center text-xl text-[#3E0703]">
        Agenda List
    </div>
</div>

<script>
    const tabBtns = document.querySelectorAll(".tab-btn");
    const tabPanes = document.querySelectorAll(".tab-pane");

    tabBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            const target = btn.dataset.tab;

            tabBtns.forEach(b => b.classList.remove("bg-[#EEDBDAA6]"));
            btn.classList.add("bg-[#EEDBDAA6]");

            tabPanes.forEach(pane => {
                pane.classList.toggle("hidden", pane.id !== target);
            });
        });
    });
</script>
