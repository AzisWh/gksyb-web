<section class="w-full  text-white py-5 mb-0 #3a0d0d md:mb-5 fs-style-manrope" data-aos="fade-up">
    <div class="container mx-auto px-4 text-[#3E0703]">

        <p class="text-center max-w-2xl mx-auto text-sm md:text-base mb-10">
            Setiap perayaan Misa adalah undangan untuk datang dan berjumpa dengan Tuhan. Mari ambil waktu untuk hadir, berdoa, dan mempersembahkan hidup dalam kasih-Nya.
        </p>

        <!-- Tabs -->
        <div class="flex justify-center mb-10 overflow-x-auto pb-2">
            <div class="flex gap-4 text-sm md:text-base border border-[#3a0d0d] rounded-full px-2 py-1 whitespace-nowrap">
                <button class="tab-btn active px-6 py-2 rounded-full text-[#3a0d0d] border border-white/30 hover:bg-white/10 transition" data-tab="harian">Harian</button>
                <button class="tab-btn px-6 py-2 rounded-full border text-[#3a0d0d] border-white/30 hover:bg-white/10 transition" data-tab="mingguan">Mingguan</button>
                <button class="tab-btn px-6 py-2 rounded-full border text-[#3a0d0d] border-white/30 hover:bg-white/10 transition" data-tab="doa">Doa & Devosi</button>
                <button class="tab-btn px-6 py-2 rounded-full border text-[#3a0d0d] border-white/30 hover:bg-white/10 transition" data-tab="perayaan">Perayaan</button>
            </div>
        </div>
        <div class="border-t border-white/20 mb-8"></div>

        <!-- CONTENT WRAPPER -->
        <div id="tab-content">

            <!-- === TAB: HARIAN === -->
            <div class="tab-pane" id="harian">
                <div class="grid md:grid-cols-3 gap-6 mb-6">
                    <div>
                        <p class="font-semibold">Senin - Jumat</p>
                        <p class="text-sm mt-1">06.30 WIB</p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="font-semibold mb-2">Misa Harian</p>
                        <p class="text-sm leading-relaxed">
                            Melalui Perayaan Misa Harian, umat Gereja Santo Yusup Bintaran diajak setia
                            berjumpa dengan Tuhan dalam doa dan Ekaristi setiap hari.
                        </p>
                    </div>
                </div>

                <p class="text-right text-xs opacity-80">Bahasa Indonesia</p>

                <!-- Catatan -->
                <div class="bg-white rounded-xl p-6 mt-6">
                    <h4 class="font-semibold mb-3">Catatan Penting</h4>
                    <ul class="text-sm space-y-1 list-disc pl-4">
                        <li>Harap datang 15 menit sebelum misa dimulai untuk menjaga ketertiban dan kekhusyukan ibadah.</li>
                        <li>Untuk misa pernikahan, baptis, atau acara khusus, silakan hubungi Sekretariat Paroki. Jadwal Misa Hari Raya dapat berubah sesuai kalender liturgi Gereja.</li>
                    </ul>
                </div>
            </div>

            <!-- === TAB: MINGGUAN === -->
            <div class="tab-pane hidden" id="mingguan">
                <p class="font-semibold text-lg">Jadwal Mingguan</p>
                <p class="opacity-80 text-sm">konten jadwal mingguan…</p>
            </div>

            <!-- === TAB: DOA & DEVOSI === -->
            <div class="tab-pane hidden" id="doa">
                <p class="font-semibold text-lg">Jadwal Doa & Devosi</p>
                <p class="opacity-80 text-sm">konten doa dan devosi…</p>
            </div>

            <!-- === TAB: PERAYAAN === -->
            <div class="tab-pane hidden" id="perayaan">
                <p class="font-semibold text-lg">Jadwal Perayaan</p>
                <p class="opacity-80 text-sm">konten perayaan…</p>
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

            tabBtns.forEach(b => b.classList.remove("active", "bg-[#3a0d0d]", "text-white"));
            btn.classList.add("active", "bg-[#3a0d0d]", "text-white");

            tabPanes.forEach(pane => {
                pane.classList.toggle("hidden", pane.id !== target);
            });
        });
    });

    document.querySelector(".tab-btn.active").classList.add("bg-[#3a0d0d]", "text-white");
</script>
