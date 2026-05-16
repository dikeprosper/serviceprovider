<?php include './fileasset/header.php'; ?>

<link rel="stylesheet" href="css/register.css">
  
<!-- MAIN -->
<main class="py-5">
    <div class="container my-5 py-5">

        <div class="row card-soft overflow-hidden">

            <!-- LEFT HERO -->
            <div class="col-lg-6 d-none d-lg-block p-0 hero-panel">

                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDqw1PFkIoa7nt41CsK6ocYPtuN9JGUCazoQqToFQRUP4cYi0Jpc5YgXA5mlEDXlL4n-3NJmZUeTUlULbjttAo9lWp5fO_Trv8cydv2SEN8vRIeOdALpE-FDSD6A5BXdsZcw4fQQ1DXS2tE1VeUoNbbQMNVtru-ItwKPeXq_ucbwGpnEhb48vyBo8SreeuEOyTuljWpRMPkVOMV8xNOXkw3WI1Ufsc9Lk22bG0m21-vrEsFmPIKhYHdZ3-3lpnYUtgh4eCsX8eHE-LZ" />

                <div class="position-relative h-100 d-flex flex-column justify-content-end p-5 text-white">

                    <h2 class="display-6 fw-bold mb-3">
                        The Hub for Exceptional Talent.
                    </h2>

                    <p class="text-white-50">
                        Join a curated community of architects, designers, and specialists shaping the future of work.
                    </p>

                </div>

            </div>

            <!-- RIGHT FORM -->
            <div class="col-lg-6 p-4 p-md-5">

                <h1 class="h3 fw-bold mb-2">Create your account</h1>
                <p class="text-muted mb-4">Experience a new standard of professional networking.</p>

                <!-- SOCIAL -->
                <div class="row g-2 mb-3">
                    <div class="col-12">
                        <button class="social-btn w-100">
                            Google
                        </button>
                    </div>
                </div>

                <div class="divider my-4">or continue with</div>

                <!-- FORM -->
                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Johnathan Doe" />
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="john@example.com" />
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" />
                    </div>

                    <button class="btn btn-primary-soft w-100 text-white">
                        Join ProMarket
                    </button>

                </form>

                <p class="text-center text-muted small mt-4">
                    By signing up, you agree to our Terms & Privacy Policy.
                </p>

            </div>

        </div>

    </div>
</main>

<?php include './fileasset/footer.php'; ?>
