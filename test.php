<?php
/**
 * Architecto | Secondary Showcase Banner
 * PHP + Bootstrap 5 conversion — retains all original animations & effects
 */

// --- Data (easy to swap from DB/API) ---
$stats = [
    [
        'icon'       => 'verified',
        'icon_class' => 'icon-box-primary',
        'text_class' => 'icon-primary',
        'value'      => '50k+',
        'label'      => 'Verified Pros',
        'size'       => 'lg',
        'pos'        => 'card-top-right',
    ],
    [
        'icon'       => 'lock',
        'icon_class' => 'icon-box-green',
        'text_class' => 'icon-green',
        'value'      => 'Secure Escrow',
        'label'      => 'Payment Protection',
        'size'       => 'md',
        'pos'        => 'card-mid-left',
    ],
    [
        'icon'       => 'support_agent',
        'icon_class' => 'icon-box-blue',
        'text_class' => 'icon-blue',
        'value'      => '24/7 Support',
        'label'      => 'Dedicated Help',
        'size'       => 'md',
        'pos'        => 'card-bottom-right',
    ],
];

$success_rate = '99.9%';
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Architecto | Premium Professional Marketplace</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@700;800&family=Manrope:wght@500;600;700&family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&display=swap" rel="stylesheet" />

  <!-- Bootstrap 5 CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

  <style>
    /* ── Design Tokens ──────────────────────────────────────────── */
    :root {
      --color-primary:          #00288e;
      --color-primary-dim:      #b8c4ff;
      --color-surface:          #f8f9ff;
      --color-banner-bg:        #001A41;
      --color-banner-deep:      #040D21;
      --font-headline:          'Plus Jakarta Sans', sans-serif;
      --font-body:              'Manrope', sans-serif;
      --card-bg:                rgba(255 255 255 / 0.05);
      --card-border:            rgba(255 255 255 / 0.10);
    }

    /* ── Reset & Base ───────────────────────────────────────────── */
    *, *::before, *::after { box-sizing: border-box; }
    body {
      font-family: var(--font-body);
      background: var(--color-surface);
    }

    /* ── Section ────────────────────────────────────────────────── */
    .showcase-section {
      padding-bottom: 6rem;
      background: #fff;
      overflow: hidden;
    }

    /* ── Banner Card ────────────────────────────────────────────── */
    .banner {
      background-color: var(--color-banner-bg);
      border-radius: 3rem;
      overflow: hidden;
      min-height: 650px;
      position: relative;
      display: flex;
      align-items: center;
    }

    /* Blueprint grid overlay */
    .banner__grid {
      position: absolute;
      inset: 0;
      opacity: .012;
      pointer-events: none;
      background-image:
        linear-gradient(#fff 1px, transparent 1px),
        linear-gradient(90deg, #fff 1px, transparent 1px);
      background-size: 40px 40px;
    }

    /* Radial gradient overlay */
    .banner__gradient {
      position: absolute;
      inset: 0;
      background: linear-gradient(
        to top right,
        var(--color-banner-deep),
        transparent,
        rgba(0, 40, 142, 0.20)
      );
      pointer-events: none;
    }

    /* ── Inner layout ───────────────────────────────────────────── */
    .banner__inner {
      position: relative;
      z-index: 10;
      width: 100%;
    }

    /* ── Visual column ──────────────────────────────────────────── */
    .visual-col {
      position: relative;
      height: 450px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* ── Spinning rings ─────────────────────────────────────────── */
    .ring-outer {
      position: absolute;
      width: 320px;
      height: 320px;
      border: 1px solid rgba(255 255 255 / 0.40);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      animation: spin 30s linear infinite;
    }
    .ring-inner {
      width: 256px;
      height: 256px;
      border: 1px dashed rgba(255 255 255 / 0.40);
      border-radius: 50%;
    }
    @keyframes spin {
      from { transform: rotate(0deg); }
      to   { transform: rotate(360deg); }
    }

    /* ── Floating cards ─────────────────────────────────────────── */
    .float-card {
      position: absolute;
      background: var(--card-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--card-border);
      border-radius: 1rem;
      padding: 20px;
      box-shadow: 0 25px 50px -12px rgba(0 0 0 / 0.50);
      transition: transform .5s ease;
      z-index: 30;
    }
    .float-card:hover { transform: translateY(-8px); }

    .card-top-right   { top: 0;    right: -16px; }
    .card-mid-left    { top: 25%;  left: 0; }
    .card-bottom-right{ bottom: 32px; right: 0; z-index: 10; }

    /* ── Card internals ─────────────────────────────────────────── */
    .icon-box {
      width: 40px;
      height: 40px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }
    .icon-box-primary { background: rgba(55,  85, 195, 0.30); }
    .icon-box-green   { background: rgba(34, 197,  94, 0.20); }
    .icon-box-blue    { background: rgba(59, 130, 246, 0.20); }

    .icon-primary { color: #b8c4ff; }
    .icon-green   { color: #86efac; }
    .icon-blue    { color: #93c5fd; }

    .card-value-lg {
      font-family: var(--font-headline);
      font-size: 1.25rem;
      font-weight: 700;
      color: #fff;
    }
    .card-value-md {
      font-family: var(--font-headline);
      font-size: 1rem;
      font-weight: 700;
      color: #fff;
    }
    .card-label {
      color: rgba(255 255 255 / 0.50);
      font-size: 10px;
      text-transform: uppercase;
      letter-spacing: 0.1em;
    }

    /* ── Live pill ──────────────────────────────────────────────── */
    .live-pill {
      position: absolute;
      bottom: 25%;
      left: 40px;
      background: var(--card-bg);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      border: 1px solid var(--card-border);
      padding: 12px 16px;
      border-radius: 9999px;
      box-shadow: 0 25px 50px -12px rgba(0 0 0 / 0.50);
      display: flex;
      align-items: center;
      gap: 12px;
      z-index: 40;
    }
    .ping-wrap {
      position: relative;
      width: 8px;
      height: 8px;
      flex-shrink: 0;
    }
    .ping-ring {
      position: absolute;
      inset: 0;
      border-radius: 50%;
      background: #4ade80;
      opacity: .75;
      animation: ping 1.5s cubic-bezier(0, 0, .2, 1) infinite;
    }
    .ping-dot {
      position: relative;
      width: 8px;
      height: 8px;
      border-radius: 50%;
      background: #4ade80;
      display: block;
    }
    @keyframes ping {
      75%, 100% { transform: scale(2); opacity: 0; }
    }
    .pill-text {
      font-size: .875rem;
      font-weight: 700;
      color: #fff;
      white-space: nowrap;
    }
    .pill-muted {
      color: rgba(255 255 255 / 0.50);
      font-weight: 500;
    }

    /* ── Crosshair decorations ──────────────────────────────────── */
    .cross-h,
    .cross-v {
      position: absolute;
      inset: 0;
      pointer-events: none;
    }
    .cross-h::after {
      content: '';
      display: block;
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(to right, transparent, rgba(255 255 255 / 0.10), transparent);
    }
    .cross-v::after {
      content: '';
      display: block;
      position: absolute;
      left: 50%;
      top: 0;
      bottom: 0;
      width: 1px;
      background: linear-gradient(to bottom, transparent, rgba(255 255 255 / 0.10), transparent);
    }

    /* ── Material Symbols ───────────────────────────────────────── */
    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
      font-size: 20px;
    }

    /* ── Responsive ─────────────────────────────────────────────── */
    @media (max-width: 991.98px) {
      .banner { border-radius: 2rem; }
      .banner__inner .px-lg { padding: 2rem; }
      .visual-col { height: 380px; }
      .ring-outer { width: 240px; height: 240px; }
      .ring-inner { width: 190px; height: 190px; }
      .card-top-right  { right: 0; }
      .live-pill       { left: 10px; }
    }
  </style>
</head>
<body>

<!-- ═══════════════════════════════════════════════════════════════
     Secondary Showcase Banner
════════════════════════════════════════════════════════════════ -->
<section class="showcase-section">
  <div class="container" style="max-width:1280px;">
    <div class="banner">

      <!-- Overlay layers -->
      <div class="banner__grid" aria-hidden="true"></div>
      <div class="banner__gradient" aria-hidden="true"></div>

      <!-- Inner two-column row -->
      <div class="banner__inner px-4 px-md-5" style="padding-top:3rem;padding-bottom:3rem;">
        <div class="row align-items-center g-5">

          <!-- ── Content Column (intentionally empty — fill with copy) ── -->
          <div class="col-12 col-lg-6">
            <!-- Add heading/CTA here if needed -->
          </div>

          <!-- ── Visual Column ────────────────────────────────────────── -->
          <div class="col-12 col-lg-6">
            <div class="visual-col">

              <!-- Spinning rings -->
              <div class="ring-outer" aria-hidden="true">
                <div class="ring-inner"></div>
              </div>

              <?php foreach ($stats as $stat): ?>
              <!-- Float card: <?= htmlspecialchars($stat['value']) ?> -->
              <div class="float-card <?= htmlspecialchars($stat['pos']) ?>">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-box <?= htmlspecialchars($stat['icon_class']) ?>">
                    <span class="material-symbols-outlined <?= htmlspecialchars($stat['text_class']) ?>">
                      <?= htmlspecialchars($stat['icon']) ?>
                    </span>
                  </div>
                  <div>
                    <p class="<?= $stat['size'] === 'lg' ? 'card-value-lg' : 'card-value-md' ?> mb-0">
                      <?= htmlspecialchars($stat['value']) ?>
                    </p>
                    <p class="card-label mb-0"><?= htmlspecialchars($stat['label']) ?></p>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>

              <!-- Live success-rate pill -->
              <div class="live-pill" role="status" aria-live="polite">
                <div class="ping-wrap" aria-hidden="true">
                  <span class="ping-ring"></span>
                  <span class="ping-dot"></span>
                </div>
                <p class="pill-text mb-0">
                  <?= htmlspecialchars($success_rate) ?>
                  <span class="pill-muted">Success Rate</span>
                </p>
              </div>

              <!-- Crosshair decorations -->
              <div class="cross-h" aria-hidden="true"></div>
              <div class="cross-v" aria-hidden="true"></div>

            </div><!-- /visual-col -->
          </div>
        </div><!-- /row -->
      </div><!-- /banner__inner -->
    </div><!-- /banner -->
  </div><!-- /container -->
</section>

<!-- Bootstrap 5 JS bundle (Popper included) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>