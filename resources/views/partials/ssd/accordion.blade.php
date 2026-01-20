<section data-aos="fade-up" class="max-w-6xl mx-auto px-6 py-12">

    <!-- TAB -->
    <div class="flex justify-center mb-10 overflow-x-auto pb-2">
        <div class="flex gap-2 text-sm md:text-base border-2 border-[var(--clr-secondary)] rounded-full p-1">

            <button class="tab-btn active px-5 py-2 rounded-full hover:bg-[var(--clr-secondary)]/10 transition"
                    data-tab="semua">Semua</button>

            @foreach($kategori as $kat)
            <button class="tab-btn px-5 py-2 rounded-full hover:bg-[var(--clr-secondary)]/10 transition"
                    data-tab="{{ strtolower($kat->nama_kategori) }}">
                {{ $kat->nama_kategori }}
            </button>
            @endforeach

        </div>
    </div>

    <div id="tab-content">
        <div class="tab-pane" id="semua">

            <div class="max-w-3xl mx-auto space-y-4">

                @php
                    $semuaFaq = $faq->flatten();
                @endphp

                @forelse($semuaFaq as $index => $item)

                <div class="relative border-b border-[var(--clr-secondary)]/20">
                    <input type="checkbox" id="faq_all_{{ $index }}" class="faq-toggle hidden">

                    <label for="faq_all_{{ $index }}"
                           class="faq-title flex justify-between items-center cursor-pointer py-4 pr-10 font-semibold text-[var(--clr-secondary)]">
                        {{ $item->pertanyaan }}
                    </label>

                    <div class="faq-content text-sm leading-relaxed text-[var(--clr-secondary)]">
                        <p class="pb-4">
                            {!! nl2br(e($item->jawaban)) !!}
                        </p>
                    </div>
                </div>

                @empty
                    <p class="text-center opacity-80">
                        Belum ada konten
                    </p>
                @endforelse

            </div>
        </div>

        @foreach($kategori as $kat)

        <div class="tab-pane hidden" id="{{ strtolower($kat->nama_kategori) }}">

            <div class="max-w-3xl mx-auto space-y-4">

                @php
                    $list = $faq[strtolower($kat->nama_kategori)] ?? [];
                @endphp

                @forelse($list as $index => $item)

                <div class="relative border-b border-[var(--clr-secondary)]/20">
                    <input type="checkbox" id="faq_{{ $kat->id }}_{{ $index }}" class="faq-toggle hidden">

                    <label for="faq_{{ $kat->id }}_{{ $index }}"
                           class="faq-title flex justify-between items-center cursor-pointer py-4 pr-10 font-semibold text-[var(--clr-secondary)]">
                        {{ $item->pertanyaan }}
                    </label>

                    <div class="faq-content text-sm leading-relaxed text-[var(--clr-secondary)]">
                        <p class="pb-4">
                            {!! nl2br(e($item->jawaban)) !!}
                        </p>
                    </div>
                </div>

                @empty
                    <p class="text-center opacity-80">
                        Belum ada konten
                    </p>
                @endforelse

            </div>
        </div>

        @endforeach

    </div>
</section>

<script>
    const tabBtns = document.querySelectorAll(".tab-btn");
    const tabPanes = document.querySelectorAll(".tab-pane");

    tabBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            const target = btn.dataset.tab;

            tabBtns.forEach(b => b.classList.remove("active", "bg-[var(--clr-secondary)]", "text-white"));
            btn.classList.add("active", "bg-[var(--clr-secondary)]", "text-white");

            tabPanes.forEach(p => p.classList.toggle("hidden", p.id !== target));
        });
    });

    document.querySelector(".tab-btn.active")
        ?.classList.add("bg-[var(--clr-secondary)]", "text-white");
</script>
