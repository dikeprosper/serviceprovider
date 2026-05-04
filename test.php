<?php include_once './fileasset/header.php';

$providers = [
    [
        "name" => "David Sterling",
        "role" => "Master Electrician",
        "rating" => "4.9",
        "reviews" => "218 Reviews",
        "verified" => true,
        "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuB5Y5CtAN1uxpYE1cRuaDdFSOTnT9X8RUZ-n-mOkXPQpQfpL6oECP9GHp8DiYN1-iU88BLUkj0b31bVtF2PuxSuO7F8ifHdiLGJWohkqx8zy4wcdwGXAZMLR43KCRYAK8mJwc-ET3aek35vv00LQh80mDp8S5F2ERhT4QqJmc5g_ATHp_TIkQxyncZWQc228fVyIDc2uxcKo99H36Oom1ZQa6C8up3S56Uw0HO-8OIxLVJ9zBkbEDOrRTidlcSm46RNhHXu5MZ_1MsE"
    ],
    [
        "name" => "Sarah Chen",
        "role" => "Smart Systems Architect",
        "rating" => "5.0",
        "reviews" => "142 Reviews",
        "verified" => true,
        "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuCsTMVFCNt9QX9JTHVxhLma_VDy28Wrw2pibSDvl94u0or5lJIb76Uy4X-XiiogZwwOjXn_KVswOPXPF-_jFPw2dZj1oGqXSsZFBStcif6zg6281dnZXyjobMrgSeMho2v57eI5PJvdn9kU1xvk1zeq6--C-W6kk1xUK5WwIouAXfjoQ6mvN0tmlADNGoE8RXJhtLmDn9Lo6yK0vWmJ4LF1XrMyCwGkkxWw0UcizvDkkb64Y-XYN59zf9eQGr7th940RF6KYrbeng5M"
    ],
    [
        "name" => "Marcus Thorne",
        "role" => "IoT Integration Expert",
        "rating" => "4.8",
        "reviews" => "89 Reviews",
        "verified" => true,
        "img" => "https://lh3.googleusercontent.com/aida-public/AB6AXuAmN2QRuHoWgajR94tqyakkwu5x1XWyEdNasfNVbSVhgsb85rKeVuDZhW5sNjRo3PRVqBilvrzz3xrLeWTUyOJt30d-jJxUtNsD1OdLefccrZgyIqUPBa6CYaoM4wovHmi59mja5OrnkPC46vfJl25betvAzRrCqSlZ6sLbgWfqB1nzZHJ9yLGVRpb-QGLA3zsLCFr5SiS8739maEshVhSyKYlUr8QT9vhKaBbzScRhSbm10sIWs3BJnmXcQV8GNbHa0OVeirSNw4qc"
    ]
];

?>

<link rel="stylesheet" href="./css/providers.css">

<main class="container-xl py-5">

    <div class="py-5 my-5 px-2 px-sm-4 px-md-5 px-xl-0">
    
        <div class="row">
    
            <!-- SIDEBAR -->
            <div class="col-lg-3">
    
                <div class="filter-title">
                    <span class="material-symbols-outlined">filter_list</span>
                    Filters
                </div>

                <div class="mb-4">

                    <div class="mb-4 position-relative pop-up-container">
                   
                        <Button onclick="popup(this,'provider-toggle')" class="form-select rounded-2 px-5 py-2 fs-7 mb-3" id="">Provider details</button>
                    
                        <input type="text" name="" class="myToggler" id="provider-toggle">
                        <div class="pop-up2 shadow rounded-2 p-4">

                            <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-2">
                                
                                <div class="w-100 fs-6 fw-bold mb-3">Rating</div>

                                <div class="check-box">
                                    <input type="checkbox" name="toprated" id="toprated" class="me-2 bg-primary">
                                    <label for="toprated" class="fs-7 fw-bold text-muted text-decoration-none">Top Rated</label>
                                </div>

                                <div class="check-box">
                                    <input type="checkbox" name="newprovider" id="newProvider" class="me-2 bg-primary">
                                    <label for="newProvider" class="fs-7 fw-bold text-muted text-decoration-none">New Providers</label>
                                </div>
                            
                            </div>

                            <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom py-3">
                                
                                <div class="w-100 fs-6 fw-bold mb-3">Location</div>

                                <div class="check-box">
                                    <input type="checkbox" id="wimpey" class="me-2">
                                    <label for="wimpey" class="fs-7 fw-bold text-muted text-decoration-none">Wimpey</label>
                                </div>

                                <div class="check-box">
                                    <input type="checkbox" id="Iwofe-s" class="me-2">
                                    <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Iwofe St Jhons</label>
                                </div>

                                <div class="check-box">
                                    <input type="checkbox" id="Iwofe-s" class="me-2">
                                    <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Mile 1</label>
                                </div>

                                <div class="check-box">
                                    <input type="checkbox" id="Iwofe-s" class="me-2">
                                    <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Rumokoro</label>
                                </div>

                                <div class="check-box">
                                    <input type="checkbox" id="Iwofe-s" class="me-2">
                                    <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Borokiri</label>
                                </div>

                                <div class="check-box">
                                    <input type="checkbox" id="Iwofe-s" class="me-2">
                                    <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Aba road Garrison</label>
                                </div>
                            
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="fw-bold small mb-2">Response Time</label>
    
                    <div class="d-flex gap-2 flex-wrap">
                        <button class="btn btn-primary rounded-5 px-3 fs-7">Under 20min</button>
                        <button class="btn btn-fade rounded-5 px-3 fs-7">under 1 hour</button>
                        <button class="btn btn-fade rounded-5 px-3 fs-7">1 day</button>
                        <button class="btn btn-fade rounded-5 px-3 fs-7">Any time</button>
                    </div>
                </div>

                <div class="mb-4 position-relative pop-up-container">
                   
                    <Button onclick="popup(this,'budget-toggle')" class="form-select rounded-2 px-5 py-2 fs-7 mb-3" id="">Budget</button>
                   
                    <input type="text" name="" class="myToggler" id="budget-toggle">
                    <div class="pop-up2 shadow rounded-2 p-4" style="width: 270px;">
                        <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom pb-2">
                            
                            <div class="w-100 fs-6 fw-bold mb-3">Rating</div>

                            <div class="check-box">
                                <input type="checkbox" name="toprated" id="toprated" class="me-2 bg-primary">
                                <label for="toprated" class="fs-7 fw-bold text-muted text-decoration-none">Top Rated</label>
                            </div>

                            <div class="check-box">
                                <input type="checkbox" name="newprovider" id="newProvider" class="me-2 bg-primary">
                                <label for="newProvider" class="fs-7 fw-bold text-muted text-decoration-none">New Providers</label>
                            </div>
                        
                        </div>

                        <div class="d-flex flex-wrap justify-content-between align-items-center border-bottom py-3">
                            
                            <div class="w-100 fs-6 fw-bold mb-3">Location</div>

                            <div class="check-box">
                                <input type="checkbox" id="wimpey" class="me-2">
                                <label for="wimpey" class="fs-7 fw-bold text-muted text-decoration-none">Wimpey</label>
                            </div>

                            <div class="check-box">
                                <input type="checkbox" id="Iwofe-s" class="me-2">
                                <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Iwofe St Jhons</label>
                            </div>

                            <div class="check-box">
                                <input type="checkbox" id="Iwofe-s" class="me-2">
                                <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Mile 1</label>
                            </div>

                            <div class="check-box">
                                <input type="checkbox" id="Iwofe-s" class="me-2">
                                <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Rumokoro</label>
                            </div>

                            <div class="check-box">
                                <input type="checkbox" id="Iwofe-s" class="me-2">
                                <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Borokiri</label>
                            </div>

                            <div class="check-box">
                                <input type="checkbox" id="Iwofe-s" class="me-2">
                                <label for="Iwofe-s" class="fs-7 fw-bold text-muted text-decoration-none">Aba road Garrison</label>
                            </div>
                        
                        </div>
                    </div>

                </div>

            </div>
    
            <!-- CONTENT -->
            <div class="col-lg-9">
    
                <div class="d-flex gap-2 mb-4 flex-wrap">
                    <button class="chip active">Moderate $50</button>
                    <button class="chip light">Mid $100</button>
                    <button class="chip light">Premium $200</button>
                </div>
    
                <div class="d-flex justify-content-between mb-4 flex-wrap gap-3">
                    <div>
                        <h1 class="fw-bold">142 Experts found in London</h1>
                        <p class="text-muted">Smart Home Installation</p>
                    </div>

                </div>
    
                <div class="row g-4">
    
                    <?php foreach($providers as $p): ?>
                    <div class="col-md-6 col-xl-4">
    
                        <div class="card-expert">
    
                            <div class="position-relative">
                                <img src="<?= $p['img']; ?>">
    
                                <?php if($p['verified']): ?>
                                <div class="verify">
                                    <span class="material-symbols-outlined">verified</span>
                                    Verified
                                </div>
                                <?php endif; ?>
                            </div>
    
                            <div class="name"><?= $p['name']; ?></div>
                            <div class="role"><?= $p['role']; ?></div>
    
                            <div class="meta d-flex justify-content-between">
                                <span>⭐ <?= $p['rating']; ?></span>
                                <span class="text-muted"><?= $p['reviews']; ?></span>
                            </div>
    
                            <button class="btn-book">Book Now</button>
    
                        </div>
    
                    </div>
                    <?php endforeach; ?>
    
                </div>
    
                <!-- PAGINATION -->
                <div class="mt-5 d-flex justify-content-center gap-2">
    
                    <button class="btn btn-light">‹</button>
                    <button class="btn btn-primary">1</button>
                    <button class="btn btn-light">2</button>
                    <button class="btn btn-light">3</button>
                    <span class="px-2">...</span>
                    <button class="btn btn-light">12</button>
                    <button class="btn btn-light">›</button>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
</main>

<?php include_once './fileasset/footer.php'; ?>