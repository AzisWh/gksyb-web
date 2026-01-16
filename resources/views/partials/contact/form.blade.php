
<section data-aos="fade-up" class="max-w-6xl mx-auto px-6 py-12 ">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start fs-style-manrope mt-5">
        <!-- Left info column -->
        <div class="text-left">
            <h2 class="text-3xl font-bold text-[#3E0703] mb-4">Mari Terhubung</h2>
            <p class="text-sm text-gray-600 mb-6">Apabila Anda memiliki pertanyaan, ingin menyampaikan pesan, atau membutuhkan informasi lebih lanjut seputar kegiatan paroki, silakan hubungi kami melalui kontak berikut atau isi formulir di sebelah kanan.</p>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
                <div>
                    <h3 class="font-semibold text-sm text-gray-800">Kunjungi Sekretariat</h3>
                    <p class="text-gray-600">Senin - Jumat<br>08.00 - 16.00 WIB</p>
                    <p class="text-gray-600 mt-2">Sabtu - Minggu<br>09.00 - 13.00 WIB</p>
                </div>

                <div>
                    <h3 class="font-semibold text-sm text-gray-800">Alamat</h3>
                    <p class="text-gray-600">Jl. Bintaran Kidul No.5, Wirogunan,<br>Kec. Mergangsan, Kota Yogyakarta,<br>Daerah Istimewa Yogyakarta 55151</p>
                </div>

                <div>
                    <h3 class="font-semibold text-sm text-gray-800 mt-2">Hubungi Kami</h3>
                    <p class="text-gray-600">(0274) 375231</p>
                </div>

                <div>
                    <h3 class="font-semibold text-sm text-gray-800 mt-2">Kirimkan Kami Pesan</h3>
                    <p class="text-gray-600">parokibintaran@gmail.com</p>
                    <a href="#" class="text-sm text-[#3E0703] mt-1 inline-block">Kirim Pesan Whatsapp</a>
                </div>
            </div>
        </div>

        <!-- Right form column -->
        <div class="w-full">
            <form action="#" method="POST" class=" border rounded-lg p-6 sm:p-8 shadow-sm" style="border-color:var(--clr-secondary);">
                @csrf
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-xs text-gray-600 mb-1" for="name">Nama Lengkap</label>
                        <input id="name" name="name" type="text" placeholder="Masukkan Nama Lengkap Anda" class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-[#3E0703]" />
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs text-gray-600 mb-1" for="email">Email</label>
                            <input id="email" name="email" type="email" placeholder="Masukkan Email Anda" class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-[#3E0703]" />
                        </div>
                        <div>
                            <label class="block text-xs text-gray-600 mb-1" for="phone">Nomor Telepon</label>
                            <input id="phone" name="phone" type="text" placeholder="Masukkan Nomor Telepon Anda" class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-[#3E0703]" />
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs text-gray-600 mb-1" for="paroki">Asal Paroki</label>
                            <input id="paroki" name="paroki" type="text" placeholder="Masukkan Asal Paroki Anda" class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-[#3E0703]" />
                        </div>
                        <div>
                            <label class="block text-xs text-gray-600 mb-1" for="lingkungan">Asal Lingkungan</label>
                            <input id="lingkungan" name="lingkungan" type="text" placeholder="Masukkan Asal Lingkungan Anda" class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-[#3E0703]" />
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs text-gray-600 mb-1" for="message">Pesan Anda</label>
                        <textarea id="message" name="message" rows="4" placeholder="Bagaimana kami bisa membantu Anda?" class="w-full border border-gray-200 rounded-md px-3 py-2 text-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-opacity-50 focus:ring-[#3E0703]"></textarea>
                    </div>

                    <div class="pt-2">
                        <button type="submit" class="inline-block px-5 py-2 rounded-md text-white text-sm" style="background:var(--clr-secondary);">Kirim Pesan Anda</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>