<?php
  /* Every procedure and condition is now ONE page — treatment.php?slug=... —
     so "which nav item is active" is a question about the slug, not about the
     filename. $current_slug is set by treatment.php before it includes this;
     on any other page it is simply empty and nothing highlights. */
  $current_page = basename($_SERVER['PHP_SELF'] ?? 'index.php');
  $current_slug = $current_slug ?? '';

  $knee_slugs     = ['acl-reconstruction', 'acl-avulsion', 'mcl-tear', 'pcl-reconstruction', 'meniscus-tears', 'synovitis', 'patella-dislocation'];
  $shoulder_slugs = ['frozen-shoulder', 'rotator-cuff', 'ac-joint-dislocation'];
  $joint_slugs    = ['joint-replacement', 'arthritis', 'knee-replacement', 'hip-replacement', 'shoulder-replacement'];
  $preserve_slugs = ['knee-hto', 'mosaicoplasty', 'hip-preservation-core-decompression'];

  $is_knee_page     = in_array($current_slug, $knee_slugs, true);
  $is_shoulder_page = in_array($current_slug, $shoulder_slugs, true);
  $is_joint_page    = in_array($current_slug, $joint_slugs, true);
  $is_preserve_page = in_array($current_slug, $preserve_slugs, true);

  /* one helper so a link's href and its active state can never drift apart */
  if (!function_exists('tx_link')) {
      function tx_link(string $slug, string $label, string $currentSlug): string {
          return '<a class="menu__link' . ($slug === $currentSlug ? ' is-active' : '')
               . '" href="treatment.php?slug=' . rawurlencode($slug) . '">'
               . htmlspecialchars($label, ENT_QUOTES) . '</a>';
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= htmlspecialchars($page_title ?? 'Durva Hospital — Orthopaedics & Joint Care', ENT_QUOTES) ?></title>
  <meta name="description" content="<?= htmlspecialchars($page_desc ?? 'Durva Hospital: specialist knee and shoulder arthroscopy, joint replacement and rehabilitation, delivered by experienced orthopaedic surgeons.', ENT_QUOTES) ?>">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&family=Playfair+Display:wght@400;500&display=swap">

  <link rel="stylesheet" href="assets/css/main.css?v=<?= time() ?>">
</head>
<body>

  <header class="site-header" data-header>

    <a class="brand u-rise" href="index.php" aria-label="Durva Hospital — home">
      <img class="brand__img" src="assets/images/logo.png" alt="Durva Hospital" width="858" height="250">
    </a>

    <nav class="nav" id="primary-nav" aria-label="Primary">

      <?php /* mobile only. The burger sits in the header behind the sheet and
               the sheet is opaque, so once it is open there is nothing left to
               press — this is the visible way out. */ ?>
      <button class="nav__close" type="button" aria-label="Close menu" data-nav-close>
        <svg viewBox="0 0 18 18" fill="none" aria-hidden="true">
          <path d="M4.5 4.5l9 9M13.5 4.5l-9 9" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
        </svg>
      </button>

      <ul class="nav__list u-rise u-d1">

        <li class="nav__item">
          <a class="nav__link <?= ($current_page === 'index.php' || $current_page === '') ? 'is-active' : '' ?>" href="index.php">Home</a>
        </li>

        <li class="nav__item">
          <a class="nav__link <?= ($current_page === 'about.php') ? 'is-active' : '' ?>" href="about.php">About Us</a>
        </li>

        <li class="nav__item" data-dropdown>
          <a class="nav__link <?= $is_knee_page ? 'is-active' : '' ?>" href="#knee-arthroscopy" aria-expanded="false" aria-controls="menu-knee">
            Knee Arthroscopy
            <svg class="nav__caret" viewBox="0 0 10 6" fill="none" aria-hidden="true">
              <path d="m1 1 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <div class="menu" id="menu-knee">
            <ul class="menu__panel">
              <li><?= tx_link('acl-reconstruction', 'ACL Reconstruction', $current_slug) ?></li>
              <li><?= tx_link('acl-avulsion', 'ACL Avulsion', $current_slug) ?></li>
              <li><?= tx_link('mcl-tear', 'MCL Tear', $current_slug) ?></li>
              <li><?= tx_link('pcl-reconstruction', 'PCL Reconstruction', $current_slug) ?></li>
              <li><?= tx_link('meniscus-tears', 'Meniscus Tears', $current_slug) ?></li>
              <li><?= tx_link('synovitis', 'Synovitis', $current_slug) ?></li>
              <li><?= tx_link('patella-dislocation', 'Patella (Knee Cap) Dislocation', $current_slug) ?></li>
            </ul>
          </div>
        </li>

        <li class="nav__item" data-dropdown>
          <a class="nav__link <?= $is_shoulder_page ? 'is-active' : '' ?>" href="#shoulder-arthroscopy" aria-expanded="false" aria-controls="menu-shoulder">
            Shoulder Arthroscopy
            <svg class="nav__caret" viewBox="0 0 10 6" fill="none" aria-hidden="true">
              <path d="m1 1 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <div class="menu" id="menu-shoulder">
            <ul class="menu__panel">
              <li><?= tx_link('frozen-shoulder', 'Frozen Shoulder', $current_slug) ?></li>
              <li><?= tx_link('rotator-cuff', 'Rotator Cuff', $current_slug) ?></li>
              <li><?= tx_link('ac-joint-dislocation', 'AC Joint Dislocation', $current_slug) ?></li>
            </ul>
          </div>
        </li>

        <li class="nav__item" data-dropdown>
          <a class="nav__link <?= $is_preserve_page ? 'is-active' : '' ?>" href="#joint-preservation" aria-expanded="false" aria-controls="menu-preserve">
            Joint Preservation
            <svg class="nav__caret" viewBox="0 0 10 6" fill="none" aria-hidden="true">
              <path d="m1 1 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <div class="menu" id="menu-preserve">
            <ul class="menu__panel">
              <li><?= tx_link('knee-hto', 'Knee-HTO', $current_slug) ?></li>
              <li><?= tx_link('mosaicoplasty', 'Mosaicoplasty', $current_slug) ?></li>
              <li><?= tx_link('hip-preservation-core-decompression', 'Hip Preservation — Core decompression', $current_slug) ?></li>
            </ul>
          </div>
        </li>

        <li class="nav__item" data-dropdown>
          <a class="nav__link <?= $is_joint_page ? 'is-active' : '' ?>" href="#joint-replacement" aria-expanded="false" aria-controls="menu-joint">
            Joint Replacement
            <svg class="nav__caret" viewBox="0 0 10 6" fill="none" aria-hidden="true">
              <path d="m1 1 4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <div class="menu" id="menu-joint">
            <ul class="menu__panel">
              <li><?= tx_link('arthritis', 'Arthritis', $current_slug) ?></li>
              <li><?= tx_link('knee-replacement', 'Knee Replacement', $current_slug) ?></li>
              <li><?= tx_link('hip-replacement', 'Hip Replacement', $current_slug) ?></li>
              <li><?= tx_link('shoulder-replacement', 'Shoulder Replacement', $current_slug) ?></li>
            </ul>
          </div>
        </li>

        <li class="nav__item">
          <a class="nav__link <?= ($current_page === 'gallery.php') ? 'is-active' : '' ?>" href="gallery.php">Gallery</a>
        </li>

      </ul>

      <?php /* mobile only — the desktop bar has its own actions. This is also
               where the phone number lives on a phone, since the header's
               call button is hidden below 1140. */ ?>
      <div class="nav__foot">
        <a class="nav__call" href="tel:+917014584948">
          <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
            <path d="M5.6 2.7 7 5.4 5.6 6.9c.5 1.4 2.1 3 3.5 3.5l1.5-1.4 2.7 1.4-.3 2.2c-.1.6-.6 1-1.2 1C7.4 13.5 2.5 8.6 2.4 3.2c0-.6.4-1.1 1-1.2l2.2-.3Z"
                  stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
          </svg>
          +91 70145 84948
        </a>
        <a class="nav__cta" href="book-appointment.php">Book Appointment</a>
      </div>
    </nav>

    <div class="actions capsule u-rise u-d2">
      <?php /* The phone number used to sit here. A seventh nav item does not
               fit alongside it at any width this bar is still a bar at, and
               the number was already shedding its label at 1280 and vanishing
               at 1140 — so it goes, and the nav gets the room. It survives in
               the mobile sheet's footer and in the site footer. */ ?>
      <?php /* Two blocks: a filled tile and a label. The tile holds a dot
               arrow — three columns of 3, 2 and 1 tapering to a point — and
               the columns pulse in sequence left to right, so the arrow reads
               as something travelling rather than something blinking.
               Columns, not individual dots: a per-dot stagger reads as noise
               at 36px.

               Laid out on a 20-unit square so the arrow's own extents are
               symmetrical about the centre in BOTH axes — x from 3.45 to
               16.55, y from 4.45 to 15.55 — which is what centres it in the
               tile. Nudging an off-centre glyph with padding only ever moves
               the error somewhere else. */ ?>
      <a class="btn btn--book" href="book-appointment.php"<?= $current_page === 'book-appointment.php' ? ' aria-current="page"' : '' ?>>
        <span class="btn__tile" aria-hidden="true">
          <svg class="btn__wave" viewBox="0 0 20 20" fill="currentColor">
            <g class="btn__wave-col" style="--w: 0">
              <circle cx="4.6" cy="5.6" r="1.15"/>
              <circle cx="4.6" cy="10" r="1.15"/>
              <circle cx="4.6" cy="14.4" r="1.15"/>
            </g>
            <g class="btn__wave-col" style="--w: 1">
              <circle cx="10" cy="7.8" r="1.15"/>
              <circle cx="10" cy="12.2" r="1.15"/>
            </g>
            <g class="btn__wave-col" style="--w: 2">
              <circle cx="15.4" cy="10" r="1.15"/>
            </g>
          </svg>
        </span>
        <span class="btn__text">Book Appointment</span>
      </a>
      <button class="nav-toggle" type="button" data-nav-toggle aria-controls="primary-nav" aria-expanded="false">
        <span class="nav-toggle__bars" aria-hidden="true"></span>
        <span class="u-visually-hidden">Menu</span>
      </button>
    </div>

  </header>
