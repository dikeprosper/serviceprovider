<?php include './fileasset/header.php'; ?>


<!-- MAIN -->
<main class="py-5">
    <div class="container my-5 py-5">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="card border-0 shadow-sm">
                    <div class="position-relative">
                        <img src="<?=SITE_URL?>img/home/howitworks/refer.webp" class="card-img-top rounded-5" alt="Project 1">
                    </div>
                    <div class="card-body">
                        <h1 class="card-title"><?= htmlspecialchars($user['name']) ?></h1>
                        <p class="card-text"><?= htmlspecialchars($user['specialty']) ?></p>
                        <p class="card-text"><?= htmlspecialchars($user['address']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include './fileasset/footer.php'; ?>