<div class="py-5" data-aos="fade-up">

    <div class="py-7 px-5 flex flex-col items-center text-center fs-style-manrope  text-[#3E0703]">
        <h1 class="font-semibold text-4xl">“100% Katolik, 100% Indonesia”</h1>  
        <p class="font-light mt-2">Mgr. Albertus Soegijapranata</p>
    </div>
    <div class="hb-carousel-container">

        <input type="radio" name="hb-slider" id="hb-item-1" class="hb-radio" checked>
        <input type="radio" name="hb-slider" id="hb-item-2" class="hb-radio">
        <input type="radio" name="hb-slider" id="hb-item-3" class="hb-radio">
        <input type="radio" name="hb-slider" id="hb-item-4" class="hb-radio">
        <input type="radio" name="hb-slider" id="hb-item-5" class="hb-radio">

        <div class="hb-cards">
            <label class="hb-card" for="hb-item-1" id="hb-slide-1">
                <img src="{{ asset('assets/slide1.png') }}" class="hb-img">
            </label>
            <label class="hb-card" for="hb-item-2" id="hb-slide-2">
                <img src="{{ asset('assets/slide2.png') }}" class="hb-img">
            </label>
            <label class="hb-card" for="hb-item-3" id="hb-slide-3">
                <img src="{{ asset('assets/slide3.jpg') }}" class="hb-img">
            </label>
            <label class="hb-card" for="hb-item-4" id="hb-slide-4">
                <img src="{{ asset('assets/slide4.png') }}" class="hb-img">
            </label>
            <label class="hb-card" for="hb-item-5" id="hb-slide-5">
                <img src="{{ asset('assets/slide5.png') }}" class="hb-img">
            </label>
        </div>

        <div class="hb-bottom-nav">
            <button class="hb-arrow hb-prev" onclick="hbPrevSlide()">❮</button>

            <div class="hb-dots">
                <label for="hb-item-1" class="hb-dot"></label>
                <label for="hb-item-2" class="hb-dot"></label>
                <label for="hb-item-3" class="hb-dot"></label>
                <label for="hb-item-4" class="hb-dot"></label>
                <label for="hb-item-5" class="hb-dot"></label>
            </div>

            <button class="hb-arrow hb-next" onclick="hbNextSlide()">❯</button>
        </div>
    </div>
</div>

<script>
    let hbCurrent = 1;
    const hbTotal = 5;

    function hbShowSlide(n) {
        document.getElementById("hb-item-" + n).checked = true;
    }

    function hbNextSlide() {
        hbCurrent = hbCurrent >= hbTotal ? 1 : hbCurrent + 1;
        hbShowSlide(hbCurrent);
    }

    function hbPrevSlide() {
        hbCurrent = hbCurrent <= 1 ? hbTotal : hbCurrent - 1;
        hbShowSlide(hbCurrent);
    }

    // Update hbCurrent when clicking dots
    document.querySelectorAll(".hb-radio").forEach((rad, index) => {
        rad.addEventListener("change", () => {
            hbCurrent = index + 1;
        });
    });
</script>
