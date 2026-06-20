<?php if (!$currentUser){ ?>

    <footer class="bg-white py-5 border-top px-2 px-sm-4 px-md-5 px-xl-0">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <a class="font-headline h4 fw-bold text-primary text-decoration-none d-block mb-4" href="#">Architecto</a>
                    <p class="text-muted" style="max-width: 300px;">The premium marketplace for booking world-class local professionals for your home and business.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-light rounded-circle p-2"><span class="material-symbols-outlined">language</span></a>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="fw-bold mb-4">Marketplace</h6>
                    <ul class="list-unstyled vstack gap-3 text-muted">
                        <li><a href="#" class="text-decoration-none text-reset small">Trust & Safety</a></li>
                        <li><a href="#" class="text-decoration-none text-reset small">Categories</a></li>
                        <li><a href="#" class="text-decoration-none text-reset small">Success Stories</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <h6 class="fw-bold mb-4">For Pros</h6>
                    <ul class="list-unstyled vstack gap-3 text-muted">
                        <li><a href="#" class="text-decoration-none text-reset small">Join as Pro</a></li>
                        <li><a href="#" class="text-decoration-none text-reset small">Resources</a></li>
                    </ul>
                </div>
            </div>
            <hr class="my-5 opacity-10">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 small text-muted">
                <span>© 2024 Architecto Marketplace. Editorial Quality Guaranteed.</span>
                <div class="d-flex gap-4">
                    <a href="#" class="text-reset text-decoration-none">Privacy Policy</a>
                    <a href="#" class="text-reset text-decoration-none">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

<?php } ?>

<!-- Bootstrap JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->

<script src="<?=SITE_URL?>js/bootstrap.js"></script>
<script src="<?=SITE_URL?>js/live.js"></script>
<script src="<?=SITE_URL?>js/popup.js"></script>
<script src="<?=SITE_URL?>js/navbar.js"></script>
<script src="<?=SITE_URL?>js/aos.js"></script>
<script src="<?=SITE_URL?>js/scroll.js"></script>

</body>
</html>
