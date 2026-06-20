<?php
if(isset($_SESSION['user'])) {
    
    $app->router->redirect(SITE_URL . "dashboard");

} else {
        
    include './fileasset/header.php';
}

?>

<link rel="stylesheet" href="<?=SITE_URL?>css/login.css">
<main class="auth-shell d-flex align-items-center py-5 my-5">
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7 col-sm-10">

                <div class="text-center mb-5 brand-wrap">
                    <h1 class="brand-mark mb-2"> <?=$company_name ?> </h1>
                    <p class="fs-6 brand-note mb-0"> <?=$tagline ?> </p>
                </div>

                <div class="auth-card p-4 p-md-5">

                    <div class="mb-5">
                        <h2 class="mb-2 fw-bold">Welcome back</h2>
                        <p class="fs-6 section-muted mb-0">
                            Please enter your details to sign in.
                        </p>
                    </div>

                    <form action="<?=SITE_URL ?>user_action.php" method="POST">

                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <input
                                name="login"
                                type="text"
                                class="form-control"
                                placeholder="Email / Username"
                            >
                        </div>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <label class="form-label mb-0">Password</label>

                                <a href="#" class="link-inline">
                                    Forgot Password?
                                </a>
                            </div>

                            <input
                                name="password"
                                type="password"
                                class="form-control"
                                placeholder="••••••••"
                            >
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-auth">
                                Login
                            </button>
                        </div>

                    </form>

                    <div class="divider my-5">
                        <span>Or continue with</span>
                    </div>

                    <div class="row g-3">

                        <div class="col-12">
                            <button class="btn-social w-100 d-flex align-items-center justify-content-center gap-2">
                                <img
                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Google_Favicon_2025.svg/960px-Google_Favicon_2025.svg.png?utm_source=commons.wikimedia.org&utm_campaign=index&utm_content=thumbnail&_=20251015042304"
                                    alt="Google"
                                    width="18"
                                    height="18"
                                >

                                <span>Google</span>
                            </button>
                        </div>
                    </div>

                    <p class="text-center fs-6 mt-5 mb-0 text-secondary">
                        Don't have an account?
                        <a href="<?=SITE_URL?>register" class="link-inline ms-1">
                            Create an account
                        </a>
                    </p>

                </div>
            </div>

        </div>

    </div>
</main>

<?php include './fileasset/footer.php'; ?>
<script src="<?=SITE_URL?>js/user.js"></script>