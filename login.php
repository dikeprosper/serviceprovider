<?php include './fileasset/header.php'; ?>

<link rel="stylesheet" href="css/login.css">
<main class="auth-shell d-flex align-items-center py-5 my-5">
    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7 col-sm-10">

                <div class="text-center mb-5 brand-wrap">
                    <h1 class="brand-mark mb-2">Avenue Pro</h1>
                    <p class="fs-6 brand-note mb-0">Built for Authority.</p>
                </div>

                <div class="auth-card p-4 p-md-5">

                    <div class="mb-5">
                        <h2 class="mb-2 fw-bold">Welcome back</h2>
                        <p class="fs-6 section-muted mb-0">
                            Please enter your details to sign in.
                        </p>
                    </div>

                    <form action="#" method="POST">

                        <div class="mb-4">
                            <label class="form-label">Email Address</label>
                            <input
                                type="email"
                                class="form-control"
                                placeholder="name@company.com"
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

                        <div class="col-6">
                            <button class="btn-social w-100 d-flex align-items-center justify-content-center gap-2">
                                <img
                                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuADcdfEGB3aABV5P7QWXox0yzzu2y810OwQZyU_-2blAnJtl8WXXXWIYECsSdh7L18qarWbzwc5fX0XZbOeh6VC_3p8lIFsS8hAmqUUEWBNMLHZGMT76rWEkFo8JYMC3LW6h3R2PIwZ4TDmqzxe_ZXrtZ7NM8fHSi1VmhSlaxFhHvYs91MI0lzjZVXZcPTer1GLwcAcZ1VFOaQnMrpfFZ7pB6OFCIbUHrU0Fk5rhRz5IsOYsX0VWhLzfKmVB5mn9qbui68bnJZfGZlf"
                                    alt="Google"
                                    width="18"
                                    height="18"
                                >

                                <span>Google</span>
                            </button>
                        </div>

                        <div class="col-6">
                            <button class="btn-social w-100 d-flex align-items-center justify-content-center gap-2">
                                <span class="material-symbols-outlined">apple</span>
                                <span>Apple</span>
                            </button>
                        </div>

                    </div>

                    <p class="text-center fs-6 mt-5 mb-0 text-secondary">
                        Don't have an account?
                        <a href="#" class="link-inline ms-1">
                            Create an account
                        </a>
                    </p>

                </div>

                <div class="trust-row mt-5 d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">

                    <span class="small text-uppercase fw-bold letter-spacing">
                        Trusted by the best
                    </span>

                    <div class="d-flex gap-2">

                        <div class="trust-icon">
                            <span class="material-symbols-outlined">architecture</span>
                        </div>

                        <div class="trust-icon">
                            <span class="material-symbols-outlined">foundation</span>
                        </div>

                        <div class="trust-icon">
                            <span class="material-symbols-outlined">account_balance</span>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>
</main>

<?php include './fileasset/footer.php'; ?>