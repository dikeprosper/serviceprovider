<?php
// About Us Page - Avenue Pro (Production Grade Bootstrap 5 + PHP)
include_once("./fileasset/header.php")
?>

<link rel="stylesheet" href="css/about.css">
<main>

    <!-- HERO -->
    <section class="py-5 px-2 px-sm-4 px-md-5 px-xl-0">
        <div class="container-xl my-5 pt-5">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <p class="text-uppercase small fw-bold text-primary mb-3">Our Mission</p>
                    <h1 class="font-headline display-4 mb-4">
                        Defining the Future of <span class="text-primary">Professional</span> Services.
                    </h1>
                    <p class="<?=$body_text?>">
                        We are building the definitive space for high-end professional talent, where quality is curated and excellence is standard.
                    </p>
                </div>

                <div class="col-lg-6">
                    <div class="card-soft overflow-hidden" style="height:520px">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA4o6S7pJXitWjbKo42KpJwDa_01oPdj165RiVAf1sGZy8jkoZuTBPpLTf2Bbp5sAZPQvcAUe0ZoGY1PMsBduE6UeQHEjamg4312bwHDNBJH7rXkg3I3ZVzAyWwcaDqxG_DTr-DVLM45n97NTC4CNcpYMQlxrETjfM8NnUDYCUDqEiF5S2PMIZWbOgwcLFenIQH053Ia_Gb-SAj1cd1j2JwGokyqIsNNPIgdNjhPGcgrxzBsTJoPQhiaE9LYcGiUtu0e19-yTkl5pjo" class="w-100 h-100 object-fit-cover">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- STORY -->
    <section class="bg-white py-5 px-2 px-sm-4 px-md-5 px-xl-0">
        <div class="container my-5">
            <div class="row g-5 align-items-center">

                <div class="col-lg-6">
                    <div class="card-soft overflow-hidden" style="height:500px">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA6Dkcgwc118bOaxc6j5AvqkshwkJ0eTkNbcV8LWIN8t1_dcnT48vgQTfSvawfxsO869MM1jiJLRE6bsYZHEGnZmavqCdA4Fjo2nLOX-LExP5gcGbM-SyZ6cdBeJschxewPEaoH_aKhCaDTJWNCz99sud1OjBZr_bXgSWl-OEs-iMRMXv09hKAda5hqPrlaG_lAUnWY-NJiApDj6Sb0UbuOXFHQK3uyDYckzZXCTcMazs_ClxToxl8clVGmSiD8RnzLIqgqZTHqPPVU" class="w-100 h-100 object-fit-cover">
                    </div>
                </div>

                <div class="col-lg-6">
                    <h2 class="<?=$section_title; ?>">From Utility to Artistry.</h2>
                    <p class="<?=$body_text?>">The marketplace for services was broken. We rebuilt it around craftsmanship, trust, and curation.</p>
                    <p class="<?=$body_text?>">The marketplace for services was broken. We rebuilt it around craftsmanship, trust, and curation.</p>
                    <p class="<?=$body_text?>">The marketplace for services was broken. We rebuilt it around craftsmanship, trust, and curation.</p>
                    <p class="<?=$body_text?>">Avenue Pro empowers elite professionals with a refined ecosystem designed for excellence.</p>
                    <button class="btn btn-primary btn-lg rounded-2 px-5 py-2 fs-7 mt-3">Read Manifesto</button>
                </div>

            </div>
        </div>
    </section>

    <!-- VISIONARIES -->
    <section class="py-5 px-2 px-sm-4 px-md-5 px-xl-0">
        <div class="container my-5">

            <div class="mb-5">
                <h2 class="<?=$section_title; ?>">The Visionaries</h2>
                <p class="<?=$body_text?>">The minds shaping the future of work.</p>
            </div>

            <div class="row g-4">

                <?php
                $leaders = [
                    ["Julian Sterling","CEO & Founder","Former Design Partner at Foster + Partners."],
                    ["Elena Vance","Chief Design Officer","Leads product and experience design."],
                    ["Marcus Thorne","Head of Strategy","Expert in marketplace scaling."],
                    ["Marcus Thorne","Head of Strategy","Expert in marketplace scaling."],
                ];

                foreach($leaders as $l): ?>

                <div class="col-md-6 col-lg-3">
                    <div class="card-soft">
                        <div class="ratio ratio-1x1 mb-3">
                            <div class="bg-light"></div>
                        </div>
                        <h5 class="font-headline h4 fw-bold mb-1"><?= $l[0] ?></h5>
                        <p class="text-primary fs-7 mb-2"><?= $l[1] ?></p>
                        <p class="<?=$body_text?>"><?= $l[2] ?></p>
                    </div>
                </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- PRINCIPLES -->
    <section class="py-5 px-2 px-sm-4 px-md-5 px-xl-0 bg-white">
        <div class="container py-5">

            <div class="mb-5">
                <div>
                    <h2 class="<?=$section_title; ?>">Our Core Principles</h2>
                </div>
                <div class="<?=$body_text?>">
                    Precision, trust, and excellence define our ecosystem.
                </div>
            </div>

            <div class="row g-4">

                <?php
                $principles = [
                    ["verified","Curation","We vet every professional for mastery and reliability."],
                    ["handshake","Trust","Secure, high-trust collaboration infrastructure."],
                    ["speed","Efficiency","Remove friction from professional workflows."],
                    ["rocket_launch","Empowerment","Tools that amplify capability."],
                ];

                foreach($principles as $p): ?>

                <div class="col-md-6">
                    <div class="bg-fade site-radius p-4">
                        <span class="material-symbols-outlined fs-2 text-primary mb-3 bg-white site-radius p-3"><?= $p[0] ?></span>
                        <h4 class="h4"><?= $p[1] ?></h4>
                        <p class="<?=$body_text?>"><?= $p[2] ?></p>
                    </div>
                </div>

                <?php endforeach; ?>

            </div>

        </div>
    </section>

    <!-- METRICS -->
    <section class="py-5 px-2 px-sm-4 px-md-5 px-xl-0 bg-primary text-white">
        <div class="container my-5">
            <div class="row text-center">

                <?php
                $metrics = [
                    ["25k+","Vetted Professionals"],
                    ["$4.2B","Managed Volume"],
                    ["99.2%","Satisfaction Rate"],
                ];

                foreach($metrics as $m): ?>

                <div class="col-md-4 metric-box">
                    <div class="metric-value"><?= $m[0] ?></div>
                    <p class="text-uppercase small opacity-75"><?= $m[1] ?></p>
                </div>

                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="py-5 px-2 px-sm-4 px-md-5 px-xl-0 bg-white">
        <div class="container-xl my-5">
            <div class="bg-primary text-white p-5 text-center site-radius">
                <h2 class="<?=$section_title; ?>">Join the collective.</h2>
                <p class="<?=$body_text?> mb-4">Become part of a curated global network of professionals.</p>
                <button class="btn fs-7 btn-light btn-lg rounded-3 px-5 py-3 fw-bold text-primary">Apply to Join</button>
            </div>
        </div>
    </section>

</main>

<?php include_once("./fileasset/footer.php") ?>