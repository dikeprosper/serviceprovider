<?php include_once("./fileasset/header.php");


$team = [
    [
        'initials'   => 'MP',
        'name'       => 'Mr Prosper',
        'role'       => 'Founder & CEO',
        'bio'        => 'Port Harcourt native. Built '.$company_name.' to solve a problem he saw every day. Manages operations, strategy, and growth.',
        'avatar_bg'  => 'var(--primary-fixed)',
        'avatar_color' => 'var(--primary-color-dark)',
    ],
    [
        'initials'   => 'ML',
        'name'       => 'Measurement Lead',
        'role'       => 'Head of Measurements',
        'bio'        => 'Trained tailor responsible for every customer measurement at the '.$company_name.' office. Your fit starts here.',
        'avatar_bg'  => 'var(--surface-container-high)',
        'avatar_color' => 'var(--primary-color)',
    ],
    [
        'initials'   => 'QL',
        'name'       => 'Quality & Logistics',
        'role'       => 'Operations Lead',
        'bio'        => 'Handles pickup, quality inspection, and delivery of every garment. Your order is in good hands from start to finish.',
        'avatar_bg'  => 'var(--surface-container-high)',
        'avatar_color' => 'var(--primary-color)',
    ],
];


$stats = [
    [
        'value'  => '20',
        'suffix' => '+',
        'label'  => 'Verified tailors on the platform',
    ],
    [
        'value'  => '100',
        'suffix' => '%',
        'label'  => 'Payment protection on every order',
    ],
    [
        'value'  => '48',
        'suffix' => 'hr',
        'label'  => 'Dispute resolution guarantee',
    ],
    [
        'value'  => '3',
        'suffix' => 'x',
        'label'  => 'Delivery speed tiers to choose from',
    ],
];

$promises = [
    [
        'tag'         => 'For customers',
        'title'       => 'Your money is always safe',
        'description' => 'We hold your payment until you confirm you are happy. If something is wrong, we will fix it or refund you. No arguments. No chasing.',
    ],
    [
        'tag'         => 'For customers',
        'title'       => 'What you see is what you pay',
        'description' => 'Every style has a fixed published price. You will never be surprised by a different number at the end. No hidden fees. No negotiation.',
    ],
    [
        'tag'         => 'For tailors',
        'title'       => 'Your work will always be paid',
        'description' => 'Customer money is held before you start — you are guaranteed your earnings the moment work is delivered and confirmed.',
    ],
    [
        'tag'         => 'For tailors',
        'title'       => 'Your talent deserves to be seen',
        'description' => 'A professional storefront, a community to post your work, and a platform that brings customers to you. Focus on your craft — we handle the rest.',
    ],
];

$steps = [
    [
        'icon'        => 'ti ti-ruler',
        'title'       => 'Get measured',
        'description' => 'Visit our office or book a home visit. Your measurements are saved permanently — no repeat visits ever.',
    ],
    [
        'icon'        => 'ti ti-shirt',
        'title'       => 'Pick your style',
        'description' => 'Browse women\'s styles at fixed, transparent prices. No negotiation. No surprises.',
    ],
    [
        'icon'        => 'ti ti-lock',
        'title'       => 'Pay safely',
        'description' => 'Your money is held in escrow and released only after you confirm you are satisfied with your order.',
    ],
    [
        'icon'        => 'ti ti-truck-delivery',
        'title'       => 'We deliver',
        'description' => 'We pick up from the tailor, inspect the garment, and deliver it straight to your door.',
    ],
];

?>

<link rel="stylesheet" href="./css/about.css">
<main>

  <!-- ═══════════════════════════════════════════
       SECTION 1 — HERO
  ═══════════════════════════════════════════ -->
  <section class="<?= $section_padding ?> pb-5 pt-5 pt-md-0" style="background: var(--surface-container-lowest);">
    <div class="container-xl pb-md-2 pt-5 pt-md-0 mt-5 mt-md-0">
        <div class="row align-items-center g-5 pt-4 pt-sm-2 mt-4 mt-sm-0">

            <div class="col-lg-4 mt-5 pt-5 pt-lg-0">
                <div class="tilt-wrap">
                    <div class="tilt-card tilt-card-a">
                        <img src="./img/about/fashionbusiness.png" alt="Detail 1"/>
                    </div>
                    <div class="tilt-card tilt-card-b">
                        <img src="./img/about/Tailorsphotoshootinspiration.png" alt="Detail 2"/>
                    </div>
                </div>
            </div>

            <div class="position-relative py-4 col-lg-8 text-center text-lg-start">
              <div class="hero-tag">
                <div class="hero-dot"></div>Our story
              </div>
              <h1 class="mx-auto mx-lg-0 font-headline display-4 tracking-tight" style="color: var(--primary-color-dark); max-width: 620px;">
                We are fixing tailoring<br>in <em style="font-style:normal; color: var(--primary-color);">Port Harcourt.</em>
              </h1>
              <p class="mx-auto mx-lg-0 text-muted fs-6-plus mt-3" style="max-width: 560px; line-height: 1.7;">
                <?=$company_name ?> was built for every woman who has ever been dissapointed by a tailor — and for every tailor who has been unrightfully owed by a customer even after delivering. We are bringing trust, accountability, and fairness to both sides.
              </p>
            </div>
        </div>
    </div>
  </section>

  <hr style="border-color: var(--border); margin: 0;">

  <!-- ═══════════════════════════════════════════
       SECTION 2 — THE PROBLEM
  ═══════════════════════════════════════════ -->
  <section class="<?= $section_padding ?> py-md-5">
    <div class="container-xl pb-md-2">
      <div class="text-uppercase fs-7 text-primary mb-0">The problem we saw</div>
      <h2 class="<?= $section_title ?> mb-2" style="color: var(--primary-color-dark);">
        Two sides. <em class="text-primary">Same broken system.</em>
      </h2>
      <p class="<?= $body_text ?>" style="max-width: 480px;">
        Every woman in Port Harcourt has a tailor story. Every tailor has a customer story. Both are tired of being let down.
      </p>

      <div class="row mt-2 g-4">
        <div class="col-md-6">
          <div class="problem-card customer h-100 p-4 p-md-5">
            <div class="font-headline text-uppercase fs-6-plus mb-3">For customers</div>
            <div class="prob-item fs-6"><div class="prob-dot c"></div>Paid upfront and tailor disappeared with the fabric</div>
            <div class="prob-item fs-6"><div class="prob-dot c"></div>Dress was nothing like what was agreed</div>
            <div class="prob-item fs-6"><div class="prob-dot c"></div>Had to beg and chase for weeks just to get a delivery</div>
            <div class="prob-item fs-6"><div class="prob-dot c"></div>No way to know if a tailor is actually good before paying</div>
            <div class="prob-item fs-6"><div class="prob-dot c"></div>Stressful price negotiation every single time</div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="problem-card tailor h-100 p-4 p-md-5 overflow-hidden position-relative">
            <!-- Overlay layers -->
            <div class="banner__grid" aria-hidden="true"></div>
            <div class="banner__gradient" aria-hidden="true"></div>
            
            <div class="position-relative z-1">

                <div class="font-headline text-uppercase fs-6-plus mb-3 text-white">For tailors</div>
                <div class="prob-item fs-6 text-white"><div class="prob-dot t"></div>Finished a job and customer refused to pay</div>
                <div class="prob-item fs-6 text-white"><div class="prob-dot t"></div>No digital presence beyond WhatsApp and Instagram</div>
                <div class="prob-item fs-6 text-white"><div class="prob-dot t"></div>Customers haggle prices after already agreeing</div>
                <div class="prob-item fs-6 text-white"><div class="prob-dot t"></div>No steady stream of new customers coming in</div>
                <div class="prob-item fs-6 text-white"><div class="prob-dot t"></div>Hard work with no platform to showcase it professionally</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <hr style="border-color: var(--border); margin: 0;">

  <!-- ═══════════════════════════════════════════
       SECTION 3 — WHY WE BUILT THIS
  ═══════════════════════════════════════════ -->
  <section class="<?= $section_padding ?> py-5" style="background: var(--surface-container-lowest);">
    <div class="container-xl pb-md-2">
      <div class="row g-5 align-items-center">

        <div class="col-md-6">
          <div class="fs-7 text-primary text-uppercase">Why we built this</div>
          <div class="why-quote">"We are from Port Harcourt. We know this problem because we lived it."</div>
          <p class="<?= $body_text ?>">
            <?=$company_name ?> was built out of frustration. Frustration at watching talented tailors struggle to find customers while customers struggled to find tailors they could trust. The talent was here — it just needed a better home.
          </p>
          <p class="<?= $body_text ?> mt-2">
            So we built one. A platform where quality is verified, prices are transparent, payments are protected, and both sides can finally breathe easy.
          </p>
        </div>

        <div class="col-md-6">
          <div class="founder-card">
            <div class="d-flex gap-3 align-items-center">
              <div class="founder-avatar">MP</div>
              <div>
                <div class="fw-500" style="font-size: 14px; color: var(--on-surface);">Mr Prosper</div>
                <div style="font-size: 12px; color: var(--on-surface-variant); margin-top: 2px;">Founder & CEO, <?=$company_name ?></div>
                <div style="font-size: 12px; color: var(--on-surface-variant); margin-top: 6px; line-height: 1.5;">
                  Port Harcourt born and raised. Built this platform to change how tailoring works in Nigeria — starting right here at home.
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

  <hr style="border-color: var(--border); margin: 0;">

  <!-- ═══════════════════════════════════════════
       SECTION 4 — HOW IT WORKS
  ═══════════════════════════════════════════ -->
  <section class="<?= $section_padding ?> py-5">
    <div class="container-xl pb-mb-2">
      <div class="fs-7 text-primary text-uppercase">How it works</div>
      <h2 class="<?= $section_title ?> mb-1" style="color: var(--primary-color-dark);">Simple. Safe. Seamless.</h2>
      <p class="<?= $body_text ?>">Four steps from start to delivery</p>

        <div class="row mt-2 g-4">
            <?php foreach ($steps as $index => $step): ?>
                <div class="col-md-6">
                    <div class="how-step" style="background:#f2f4f6;">
                        <div class="d-flex gap-3 align-items-start">
                            <div class="font-headline mb-2 fs-8 step-num flex-shrink-0"><?= $index + 1 ?></div>
                            <div>
                                <i class="<?= htmlspecialchars($step['icon']) ?> step-icon" aria-hidden="true"></i>
                                <div class="font-headline fs-6 mb-1"><?= htmlspecialchars($step['title']) ?></div>
                                <p class="<?= $body_text ?> mb-0"><?= htmlspecialchars($step['description']) ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
  </section>


  <!-- ═══════════════════════════════════════════
       SECTION 5 — OUR PROMISE
  ═══════════════════════════════════════════ -->
  <section class="<?= $section_padding ?> py-5">
    <div class="container-xl pb-4">
        
        <div class="site-radius p-4 p-md-5 overflow-hidden position-relative" style="background: var(--color-banner-bg);">
            
            <!-- Overlay layers -->
            <div class="banner__grid" aria-hidden="true"></div>
            <div class="banner__gradient" aria-hidden="true"></div>

            <div class="position-relative z-1">

                <div class="fs-7 text-white text-uppercase-light">Our promise</div>
                <h2 class="<?=$section_title_bold; ?> text-white mb-1">Our promise to you</h2>
    
                <p class="mb-4 pb-2 fs-6" style="color: rgba(255,255,255,0.45);">
                  The same commitment to every customer and every tailor on this platform
                </p>
                <div class="row g-3">
                    <?php foreach ($promises as $promise): ?>
                        <div class="col-md-6">
                            <div class="promise-card h-100">
                                <div class="promise-tag"><?= htmlspecialchars($promise['tag']) ?></div>
                                <div class="fw-bold text-white mb-2 fs-6-plus"><?= htmlspecialchars($promise['title']) ?></div>
                                <p class="mb-0 fs-7" style="color: rgba(255,255,255,0.45);">
                                    <?= htmlspecialchars($promise['description']) ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>


        </div>

    </div>
  </section>

  <!-- ═══════════════════════════════════════════
       SECTION 6 — THE NUMBERS
  ═══════════════════════════════════════════ -->
  <section class="<?= $section_padding ?> pb-5">
    <div class="container-xl pb-md-2">

        <div class="site-radius p-4 p-md-5 overflow-hidden position-relative" style="background: var(--primary-color);">
            <div class="fs-7 text-white text-uppercase-light">The numbers</div>
            <h2 class="<?= $section_title_bold ?> mb-1 text-white">Port Harcourt is trusting us</h2>
            <p class="fs-6 mb-4 pb-2" style="color: rgba(255,255,255,0.4);">Updated as the platform grows</p>
    
            <div class="row g-3">
                <?php foreach ($stats as $stat): ?>
                <div class="col-6 col-md-3">
                    <div class="number-card">
                        <div class="font-headline fw-bold text-white mb-1" style="font-size: 34px; line-height: 1;">
                            <?= $stat['value'] ?><span class="number-accent"><?= $stat['suffix'] ?></span>
                        </div>
                        <div style="font-size: 12px; color: rgba(255,255,255,0.45); line-height: 1.4;">
                            <?= $stat['label'] ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
  </section>

  <hr style="border-color: rgba(255,255,255,0.08); margin: 0;">

  <!-- ═══════════════════════════════════════════
       SECTION 7 — MEET THE TEAM
  ═══════════════════════════════════════════ -->
  <section class="<?= $section_padding ?> py-5">
    <div class="container-xl pb-5">
      <div class="fs-7 text-primary text-uppercase">Meet the team</div>
      <h2 class="<?= $section_title ?> mb-1" style="color: var(--primary-color-dark);">The people behind <?=$company_name ?></h2>
      <p class="<?= $body_text ?>">A small team with a big mission — built in Port Harcourt, for Port Harcourt.</p>

      <div class="row g-4 mt-2">

        <?php foreach ($team as $member): ?>
        <div class="col-md-4">
            <div class="team-card h-100 site-radius" style="background: var(--surface-container-low);">
                <div class="team-avatar" style="background: <?= $member['avatar_bg'] ?>; color: <?= $member['avatar_color'] ?>;">
                    <?= $member['initials'] ?>
                </div>
                <div class="fw-500 fs-7 mb-1"><?= $member['name'] ?></div>
                <div class="text-uppercase mb-2 fs-7 text-primary"><?= $member['role'] ?></div>
                <p class="<?= $body_text ?> mb-0"><?= $member['bio'] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <hr style="border-color: var(--border); margin: 0;">

  <!-- ═══════════════════════════════════════════
       SECTION 8 — CALL TO ACTION
  ═══════════════════════════════════════════ -->
  <section class="<?= $section_padding ?> py-5">
    <div class="container-xl">
        <div class="text-center site-radius p-4 p-md-5 overflow-hidden position-relative" style="background: var(--color-banner-bg);">
            
            <!-- Overlay layers -->
            <div class="banner__grid" aria-hidden="true"></div>
            <div class="banner__gradient" aria-hidden="true"></div>

            <div class="position-relative z-1">

                <div class="fs-7 text-white text-uppercase-light">Join us</div>
                <h2 class="<?=$section_title_bold?> text-white mb-3">
                    Ready to experience tailoring<br>the way it should be?
                </h2>
                <p class="<?=$body_text?> mx-auto mb-4" style="color: rgba(255,255,255,0.45) !important; max-width: 430px;">
                Whether you are a customer looking for your next outfit or a tailor ready to grow your business — <?=$company_name ?> is built for you.
                </p>
                <div class="d-flex justify-content-center gap-3 flex-wrap">
                    <a href="<?= $site_url ?>browse" class="btn btn-light rounded-pill px-5 py-2 fs-6">
                        Browse styles
                    </a>
                    <a href="<?= $site_url ?>join" class="btn btn-primary fs-6 rounded-pill px-5 py-2 text-white">
                        Join as a tailor
                    </a>
                    <a href="<?= $site_url ?>contact" class="btn btn-outline-light fs-6 btn-ghost-light rounded-pill px-5 py-2">
                        Contact us
                    </a>
                </div>
            </div>
        </div>
    </div>
  </section>

</main>

<?php include_once("./fileasset/footer.php"); ?>