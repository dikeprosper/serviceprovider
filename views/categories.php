<?php
include_once './fileasset/header.php';


// ================================
// MODA | Premium Tailoring Marketplace
// Bootstrap + PHP (Faithful UI Rebuild - Modal + Drag Slider)
// ================================

$basicDress = [
    ["name" => "Casual Dress", "price" => "$85.00", "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuA02vExRzU4j0E1ubx29qTlNRBj0sBvbF1-CpEAK_OoUoIQDLIlsdLCxhRNKJZ4sRImUmVraHxyUPIhmGmgYR6akChU8IiDap5fKWj9Nl0TY2vfCswWxhFQPAGyWop56izsmV6GkfO0g21e1BJzcIZp37Y7ngja9m7_WaTFMuIiHAu7Z-ip-bM3-KOc09rHp-_uj17gEOIfGoPPEqYHnl2qgz2GLHYEX9EFynjjCCSBGSN3YPrrh-TjCRgNwOOvC3r9wGSGRxRa8hXU"],
    ["name" => "Simple Dress", "price" => "$95.00", "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuBCo0OeMnAGhxEH-9XEQKmQdGDBjeulW_9L3k3YN2o_oMAZeHTa995NHyc3HrjpCPKT7p5Lo5Sb-ziEyL7DnCL-fCI5ZHx8iiV34tGY3wCGtWyfHJJl5_XJpLQ90PfU7at5V9iSmOIzVu3esC6VefjWbsS8zPCe2aquDOs27comObNB0-PVpoBYwh-X8WysEyG3J44TTzwgxGO9sDjjUpdCa0QIvULHg1b6UiCPyhIyNoRkq_vFa9A06F7kFjBHXZOd8ORyvQZkvAwf"],
    ["name" => "Party Dress", "price" => "$150.00", "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuD3wWM08bsz5I5a5ydHfu4xWxGkaHKPKDUf1qJxt4KsgX8ueZgqlSnYlVF-gwrW8wOZq1qh9-a5yn0wyyUpTDx1LU9h4YwMBu6EQi4MfagFRfmrItTwLKdT_2XHzYmL1VoL06_Dwe6CbAg7e50fnxAneiU8fTBQzglJc9rv7jbjK3gGuD-O_BivCOCaRCCIzN--SBQpHMgd3fVBovsjEyxrUvVZSjYPPRjT5EY5CMy3tKMcDCywKLVaT6WVekCww-SMj9tusct6d7vU"],
];

$basicPlus = [
    ["name" => "Lace Gown", "price" => "$310.00", "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCYQy22ygSP4_lcMaFrmtZWP4QTklA4X6akzHJ-H3SMJRkR0IdUVDD6Hh2z_vCCVWLUNDyr_r_3ou5CKmGOtPL9k1M-uc8SQFTeWrp5TsY2m5IEvbygZGZ0d8FonxXZWanFwvULJnHCzS7P2Zp_XOkDwDmWvg8efDl-OcvMSMpY2L6s9N1meIFNjw0bugbqdoB1cXFU6KYY6LpDDuSlk-Ng9UTG02f0YkntShiDZps_WxgetWrkbBoNtwXvT6SYF34upeyNvthA6oQ6"],
    ["name" => "Kaftan Style", "price" => "$240.00", "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuA51Woni2ZnWFeZ0skRhpTPtqkr1KeDfzVAl9iIUu-ASm7aZAxX7IIdB5sUk98S4AkXjIrpIVeTXTDwQPsIHbJdNBPztfFHk4BSEkaPoZRVlaSCFKa08sM3nieMqmDQKs-rvvIT1z6Gom8Nk_hbAErNK5y-HmEjQrg1pRXa8UmrsHPhwufDJMzN5VpS9ZCBsjeZnR66cAEd_qS3pDb3n4TVX9kIf9mIu1Vo4vTDta24ZOWsYoOoAokEEKWE2mGSReYO5ToGWS21Izat"],
    ["name" => "Stylish Casual Gown", "price" => "$195.00", "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCRRE5qSstg0LtI9LZY4XaT6Mz4wZ5BkLvipAP61fc8zDRKdHNRfsbjVnJmWN8DdGlR1c3Y4RHWMG-E3HPXyJLhVvFKqoXgk3CNfkmFHWCckyPMHPFAV25CwdX2d78k6HWvHZ9ApANpEnski6hoV5aAUHlBVbTGi3MjLoxLjK4MB7Kr1YwJ_KvKAI1bGTrpoepAyZiWUEj0uYbbXTBQYwzaOp8ZE9WrxxQCcDtbUt8CvrQZJLd-7AuiDCRXp7b9x21YqMe4ulf2WkOu"],
];

function renderCard($item){
return '
<div class="product-card" onclick="openModal(\''.$item['name'].'\')">
    <div class="img-grid">
        <img src="'.$item['img'].'"/>
        <img src="'.$item['img'].'"/>
        <img src="'.$item['img'].'"/>
        <img src="'.$item['img'].'"/>
    </div>
    <h3>'.$item['name'].'</h3>
    <p>Starting from '.$item['price'].'</p>
</div>';
}
?>

<link href="css/categories.css" rel="stylesheet">

<main class="py-lg-4 my-lg-4 py-md-4 my-md-3 py-3 my-2">
    <section class="hero-section container-xl">

        <div class="hero-container mx-2 mx-sm-4 mx-md-5 mx-xl-0">

            <!-- Slide 1 -->
            <div class="hero-slide active">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7_lDH-eu8wsKwyvhRUrkvyoAZ5h_4zbQXBTlunvdBw5allg0ZQbUqD-gOLJmQpp3efWjc26BpmncVWn5i4kXTy287schmueCmbHjwmtu61j7-Rgv7GMDN_M6WXALysrquJdqzN5wMITmooxjDILh4-k7Bfdc537MZzwQMwxLta3CUZrrAERi9Pkr1s-DrF5iUkCkH77FMBie1v9DYRSbe9toEKNMaZaXiSm5E9KWPQI8Q-_EG-dpc97zybko2UmwqP9yTnje1meBG">
                <div class="hero-overlay">
                    <div class="container">
                        <div class="fw-bold fs-6 mb-1 text-uppercase">Trending Now</div>
                        <h1 class="font-headline display-4 fw-bold mb-1">Two-Piece Sets</h1>
                        <p class="fs-6 mb-4">Matching silhouettes for a unified structural statement. Perfect for the modern professional.</p>
                        <a href="" class="btn btn-primary rounded-2 px-5 py-2 fs-6 fw-bold ">
                            Explore Now <span class="material-symbols-outlined fs-6">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="hero-slide">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQ_8iU0hn-hbKoAg2WX4EYFnLk55PJGn5xjbeJu3eYiO-1gm3zJlSt8nvGuBBCr_ln4kgCm7zBJhrfB0zeXpVT7AKG_xec4qIykodLnKz0dL0XfYRJEEhwBWVyAqdKLYGwBmAAusaUq1BXhY7mmbK3jJmRi-JSjSAcnr9Mg8npzM7ozKaBadcQS5jtZbUZNgEuqFh0f6YlMdIsuv9DzyXzFo-Sa04rZUkiBkNh9ExsQy-5p2r7e2nNavZBYwB3b3V_SfNkTKbMHsiT">
                <div class="hero-overlay">
                    <div class="container">
                        <div class="fw-bold fs-6 mb-2 text-uppercase">Heritage Collection</div>
                        <h1 class="font-headline display-4 fw-bold mb-0">Ankara Styles</h1>
                        <p class="fs-6 mb-4">Vibrant prints meet architectural tailoring. Reimagining traditional textiles for today.</p>
                        <a href="" class="btn btn-primary rounded-2 px-5 py-2 fs-6 fw-bold ">
                            Explore Now <span class="material-symbols-outlined fs-6">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="hero-slide">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC2i985Pm2yscEx7VoXj7A_pw7hs5bm_VlT89FPrWGVhfrexiSUTCge8juo6VmephmI1T9uV9_e3cH5ccVB60Wpdnp-W1zKCLc0-AExNTNsm5U0Ng0-QNSqYrb2cJN8B2R4OtLwMbf9fE-UNMUSk6bAm1vMU0cXTvww_d707i_F6ZwefUE9NdVDObETU1vlM8MZvn_FcAcME-yII9gifwBIg_Awavl6gvy54uaUNYKttIdJWTS6Z-mTnGqGwx_vTC-ZXVQOGdT2WmC-">
                <div class="hero-overlay">
                    <div class="container">
                        <div class="fw-bold fs-6 mb-2 text-uppercase">Occasion Wear</div>
                        <h1 class="font-headline display-4 fw-bold mb-0">Lace Styles</h1>
                        <p class="fs-6 mb-4">Intricate textures and delicate craftsmanship for your most memorable moments.</p>
                        <a href="" class="btn btn-primary rounded-2 px-5 py-2 fs-6 fw-bold ">
                            Explore Now <span class="material-symbols-outlined fs-6">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="hero-slide">
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDAQYcji7Rf5u127jYH1BP148ORF0Jrf4eYyzsrgged53VEBk7HR6jmDubC-zsVpHJDdDJHCQN064L8Hvnc76Q5cu6jnA0t0vYh46yF7aChF53AxqiYySas4KNPv31Kf0fbWplzzzw6KV-8X1fRde5x8NurubMkev3PRyqXaPVdxQWcwbmzTHb16gYAWW21XZGQPUogQMwBoCmClPu6hQOzXVh2M5PpFGg4XdJysG4UNKW4FvlXnpb9xzuMHHUJwtSIKXDnOJDBHeZB">
                <div class="hero-overlay">
                    <div class="container">
                        <div class="fw-bold fs-6 mb-2 text-uppercase">Refined Comfort</div>
                        <h1 class="font-headline display-4 fw-bold mb-0">Kaftan Styles</h1>
                        <p class="fs-6 mb-4">Flowing silhouettes that blend comfort with high-fashion tailoring.</p>
                        <a href="" class="btn btn-primary rounded-2 px-5 py-2 fs-6 fw-bold ">
                            Explore Now <span class="material-symbols-outlined fs-6">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="container-xl py-5">

        <div class="px-2 px-sm-4 px-md-5 px-xl-0">

            <h2>Basic Dress</h2>
            <p>Everyday stylish dresses</p>
            <div class="slider-container">
                <div class="slider-track">
                    <?php foreach(array_merge($basicDress,$basicDress,$basicDress,$basicDress) as $i) echo renderCard($i); ?>
                </div>
            </div>
    
            <h2 class="mt-5">Basic Dress Plus</h2>
            <p>Elevated styles</p>
            <div class="slider-container">
                <div class="slider-track" style="animation-direction:reverse">
                    <?php foreach(array_merge($basicPlus,$basicPlus,$basicPlus) as $i) echo renderCard($i); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- MODAL -->
    <div class="modal-overlay" id="modal">
        <div class="modal-box">

            <div class="step active" id="step1">
                
                <div class="modal-title mb-3">Select Material</div>
                <div class="row g-3">

                    <div class="col-6">

                        <button class="w-100 flex-column border py-4" onclick="nextStep(2)">
                            <div class="option-icon"><span class="material-symbols-outlined">texture</span></div>
                            <div><b class="fs-5 fw-light">Ankara</b>
                            <small class="fs-7 text-muted">Traditional Wax Print</small></div>
                        </button>
                    </div>

                    <div class="col-6">
                        <button class="w-100 flex-column border py-4" onclick="nextStep(2)">
                            <div class="option-icon"><span class="material-symbols-outlined">grid_4x4</span></div>
                            <div><b class="fs-5 fw-light">Lace</b>
                            <small class="fs-7 text-muted">Intricate Embroidery</small></div>
                        </button>
                    </div>

                    <div class="col-6">
                        <button class="w-100 flex-column border py-4" onclick="nextStep(2)">
                            <div class="option-icon"><span class="material-symbols-outlined">waves</span></div>
                            <div><b class="fs-5 fw-light">Silk</b>
                            <small class="fs-7 text-muted">Luxury Smooth Finish</small></div>
                        </button>
                    </div>

                    <div class="col-6">
                        <button class="w-100 flex-column border py-4" onclick="nextStep(2)">
                            <div class="option-icon"><span class="material-symbols-outlined">spa</span></div>
                            <div><b class="fs-5 fw-light">Cotton</b>
                            <small class="fs-7 text-muted">Breathable Comfort</small></div>
                        </button>
                    </div>
                </div>
            </div>

            <div class="step" id="step2">
                <div class="modal-title mb-3">Choose Quality Tier</div>

                <div class="row g-3">

                    <button class="w-100 border p-4 justify-content-between" onclick="nextStep(3)">
                        <div class="text-start">
                            <b class="fs-5 fw-light">Economy</b>
                            <small class="fs-7 text-muted">Standard finishing, 14 days</small>
                        </div>
                        <span class="fs-6 text-muted">
                            5000
                            <span class="text-primary">₦</span>
                        </span>
                    </button>
    
                    <button class="w-100 border p-4 justify-content-between" onclick="nextStep(3)">
                        <div class="text-start">
                            <b class="fs-5 fw-light">Mid Tier</b>
                            <small class="fs-7 text-muted">Balanced quality, 7 days</small>
                        </div>
                        <span class="fs-6 text-muted">
                            6250
                            <span class="text-primary">₦₦</span>
                        </span>
                    </button>
    
                    <button class="w-100 border p-4 justify-content-between" onclick="nextStep(3)">
                        <div class="text-start">
                            <b class="fs-5 fw-light">Premium</b>
                            <small class="fs-7 text-muted">Luxury tailoring, 3 days</small>
                        </div>
                        <span class="fs-6 text-muted">
                            7500
                            <span class="text-primary">₦₦₦</span>
                        </span>
                    </button>
                </div>
            </div>

            <div class="step text-center" id="step3">
                <span class="material-symbols-outlined" style="font-size:56px;color:#00288e">check_circle</span>
                <div class="modal-title mt-3">Requirements Saved</div>
                <p class="text-muted">Proceed to tailor selection</p>
                <button class="primary-btn w-100 mt-3">
                    Browse Tailors <span class="material-symbols-outlined" style="font-size:18px;vertical-align:middle">arrow_forward</span>
                </button>
            </div>

        </div>
    </div>
</main>

<script src="js/categories.js"></script>

<?php include_once './fileasset/footer.php'; ?>