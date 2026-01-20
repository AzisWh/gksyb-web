<div class="p-4 bg-[#3E0703] fs-style-manrope" data-aos="fade-up">
    <div class="flex flex-col items-center justify-center p-6">
        
        <h2 class="text-white text-center font-light text-lg md:text-md">
            Mari tetap terhubung melalui kanal media sosial kami
        </h2>

        <div class="flex flex-col md:flex-row gap-8 mt-6 items-center">

            @if($sosmed?->url_fb)
            <a href="{{ $sosmed->url_fb }}" target="_blank"
               class="flex items-center gap-2 text-white hover:text-clr-accent transition">
                <img src="{{ asset('assets/fb.png') }}" class="w-10 h-10 md:w-[50px] md:h-[50px]" alt="Facebook">
                <span class="text-sm md:text-base">Facebook</span>
            </a>
            @endif

            @if($sosmed?->url_ig)
            <a href="{{ $sosmed->url_ig }}" target="_blank"
               class="flex items-center gap-2 text-white hover:text-clr-accent transition">
                <img src="{{ asset('assets/Instagram.png') }}" class="w-10 h-10 md:w-[50px] md:h-[50px]" alt="Instagram">
                <span class="text-sm md:text-base">Instagram</span>
            </a>
            @endif

            @if($sosmed?->url_yt)
            <a href="{{ $sosmed->url_yt }}" target="_blank"
               class="flex items-center gap-2 text-white hover:text-clr-accent transition">
                <img src="{{ asset('assets/YouTube.png') }}" class="w-10 h-10 md:w-[50px] md:h-[50px]" alt="YouTube">
                <span class="text-sm md:text-base">YouTube</span>
            </a>
            @endif

            @if($sosmed?->url_gmaps)
            <a href="{{ $sosmed->url_gmaps }}" target="_blank"
               class="flex items-center gap-2 text-white hover:text-clr-accent transition">
                <img src="{{ asset('assets/maps.png') }}" class="w-10 h-10 md:w-[50px] md:h-[50px]" alt="Google Maps">
                <span class="text-sm md:text-base">Google Maps</span>
            </a>
            @endif

            @if($sosmed?->url_x)
            <a href="{{ $sosmed->url_x }}" target="_blank"
               class="flex items-center gap-2 text-white hover:text-clr-accent transition">
                <img src="{{ asset('assets/TikTok.png') }}" class="w-10 h-10 md:w-[50px] md:h-[50px]" alt="X / TikTok">
                <span class="text-sm md:text-base">TikTok</span>
            </a>
            @endif

        </div>
    </div>
</div>
