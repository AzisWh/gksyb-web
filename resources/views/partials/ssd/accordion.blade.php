<section data-aos="fade-up" class="max-w-6xl mx-auto px-6 py-12">

    <!-- TAB -->
    <div class="flex justify-center mb-10 overflow-x-auto pb-2">
        <div class="flex gap-2 text-sm md:text-base border-2 border-[var(--clr-secondary)] rounded-full p-1">
            <button class="tab-btn active px-5 py-2 rounded-full hover:bg-[var(--clr-secondary)]/10 transition"
                    data-tab="harian">Harian</button>
            <button class="tab-btn px-5 py-2 rounded-full hover:bg-[var(--clr-secondary)]/10 transition"
                    data-tab="mingguan">Mingguan</button>
            <button class="tab-btn px-5 py-2 rounded-full hover:bg-[var(--clr-secondary)]/10 transition"
                    data-tab="doa">Doa & Devosi</button>
            <button class="tab-btn px-5 py-2 rounded-full hover:bg-[var(--clr-secondary)]/10 transition"
                    data-tab="perayaan">Perayaan</button>
        </div>
    </div>

    <!-- TAB CONTENT -->
    <div id="tab-content">

        <!-- ================= TAB HARIAN ================= -->
        <div class="tab-pane" id="harian">

            <!-- FAQ ACCORDION -->
            <div class="max-w-3xl mx-auto space-y-4">

                <!-- ITEM -->
                <div class="relative border-b border-[var(--clr-secondary)]/20">
                    <input type="checkbox" id="faq1" class="faq-toggle hidden">
                    <label for="faq1"
                           class="faq-title flex justify-between items-center cursor-pointer py-4 pr-10 font-semibold text-[var(--clr-secondary)]">
                        Apa itu Misa Harian?
                    </label>

                    <div class="faq-content text-sm leading-relaxed text-[var(--clr-secondary)]">
                        <p class="pb-4">
                            Misa Harian adalah perayaan Ekaristi yang dilaksanakan setiap hari
                            sebagai sarana umat untuk berjumpa dengan Tuhan dalam doa dan sabda.
                        </p>
                    </div>
                </div>

                <div class="relative border-b border-[var(--clr-secondary)]/20">
                    <input type="checkbox" id="faq2" class="faq-toggle hidden">
                    <label for="faq2"
                           class="faq-title flex justify-between items-center cursor-pointer py-4 pr-10 font-semibold text-[var(--clr-secondary)]">
                        Jam berapa Misa Harian dilaksanakan?
                    </label>

                    <div class="faq-content text-sm leading-relaxed text-[var(--clr-secondary)]">
                        <p class="pb-4">
                            Misa Harian dilaksanakan setiap Senin – Jumat pukul 06.30 WIB.
                        </p>
                    </div>
                </div>

                <div class="relative border-b border-[var(--clr-secondary)]/20">
                    <input type="checkbox" id="faq3" class="faq-toggle hidden">
                    <label for="faq3"
                           class="faq-title flex justify-between items-center cursor-pointer py-4 pr-10 font-semibold text-[var(--clr-secondary)]">
                        Apakah Misa menggunakan Bahasa Indonesia?
                    </label>

                    <div class="faq-content text-sm leading-relaxed text-[var(--clr-secondary)]">
                        <p class="pb-4">
                            Ya, seluruh perayaan Misa Harian menggunakan Bahasa Indonesia.
                        </p>
                    </div>
                </div>

            </div>
        </div>

        <div class="tab-pane hidden" id="mingguan">
            <p class="text-center opacity-80">Konten jadwal mingguan…</p>
        </div>

        <div class="tab-pane hidden" id="doa">
            <p class="text-center opacity-80">Konten doa & devosi…</p>
        </div>

        <div class="tab-pane hidden" id="perayaan">
            <p class="text-center opacity-80">Konten perayaan…</p>
        </div>

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
