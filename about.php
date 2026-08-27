<?php
// about.php — About Durva Hospital
include __DIR__ . '/include/header.php';
?>

  <main>
    <!-- About Page Compact Hero / Header Banner -->
    <section class="about-hero" id="about-hero">
      <div class="about-hero__media" aria-hidden="true">
        <img class="about-hero__bg-img" src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=2000&q=80" alt="" loading="eager" decoding="async">
        <div class="about-hero__veil"></div>
      </div>

      <div class="about-hero__inner">
        <!-- Left Bottom: Breadcrumbs -->
        <div class="about-hero__left">
          <nav class="about-breadcrumbs" aria-label="Breadcrumb">
            <ol class="about-breadcrumbs__list">
              <li class="about-breadcrumbs__item">
                <a class="about-breadcrumbs__link" href="index.php">Home</a>
              </li>
              <li class="about-breadcrumbs__sep" aria-hidden="true">/</li>
              <li class="about-breadcrumbs__item" aria-current="page">
                <span>About Us</span>
              </li>
            </ol>
          </nav>
        </div>

        <!-- Right Bottom: Title and Paragraph -->
        <div class="about-hero__right">
          <h1 class="about-hero__title">
            About <span class="about-hero__accent">Durva Hospital</span>
          </h1>
          <p class="about-hero__desc">
            Pioneering advanced orthopaedics, arthroscopy, and compassionate patient care in Kota.
          </p>
        </div>
      </div>
    </section>

    <!-- ================= Founding Story (Full-Bleed Obsidian Canvas) ================= -->
    <section class="founding" id="our-story" aria-labelledby="founding-headline">
      <div class="founding__inner">

        <!-- Top Giant Statement Headline -->
        <header class="founding__header" data-founding-head>
          <p class="founding__label">Clinical Leadership &bull; Founder's Vision</p>
          <h2 class="founding__headline" id="founding-headline">
            Where surgical precision meets <em class="founding__serif">patient-first</em> healing.
          </h2>
        </header>

        <!-- Lower Asymmetrical Composition -->
        <div class="founding__layout">

          <!-- Left Column: Narrative Copy & Integrated Credentials -->
          <div class="founding__narrative" data-founding-copy>
            <p class="founding__lead">
              Movement is the foundation of human independence. Founded in Kota by Dr. Hitesh Mangal, Durva Hospital was established with a singular conviction: that super-specialist arthroscopy and advanced joint care should be precise, minimally invasive, and uncompromising in quality.
            </p>

            <p class="founding__text">
              Trained across leading surgical institutes in South Korea, Bangkok, and India, Dr. Mangal built Durva Hospital to redefine recovery timelines. Every diagnostic evaluation, arthroscopic keyhole reconstruction, and rehabilitation protocol is engineered to protect healthy tissue and restore natural joint mechanics without limits.
            </p>

            <!-- Integrated Typographic Credential Lockup (No floating boxes) -->
            <div class="founding__creds">
              <div class="founding__doctor">
                <span class="founding__doctor-name">Dr. Hitesh Mangal</span>
                <span class="founding__doctor-degree">M.B.B.S., M.S. (Ortho) &bull; Lead Arthroscopy &amp; Joint Surgeon</span>
                <span class="founding__doctor-fellowship">Knee &amp; Shoulder Fellowship Trained &bull; South Korea &amp; Bangkok</span>
              </div>

              <div class="founding__metrics">
                <div class="founding__metric">
                  <span class="founding__metric-num">5,000+</span>
                  <span class="founding__metric-lbl">Arthroscopic Surgeries</span>
                </div>
                <div class="founding__metric">
                  <span class="founding__metric-num">15+</span>
                  <span class="founding__metric-lbl">Years Surgical Mastery</span>
                </div>
              </div>
            </div>

            <!-- Action CTAs -->
            <div class="founding__actions">
              <a class="founding-btn founding-btn--primary" href="#appointment">
                <span>Book Consultation</span>
                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M3.33 8h9.34M8.67 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
              <a class="founding-btn founding-btn--ghost" href="#contact">
                <span>Contact Clinic</span>
              </a>
            </div>
          </div>

          <!-- Right Column: Full-Bleed Architectural Portrait Portal -->
          <div class="founding__portrait-wrap" data-founding-portrait>
            <div class="founding__portrait-backdrop" aria-hidden="true"></div>
            <div class="founding__portrait-frame">
              <img class="founding__portrait-img" src="assets/images/hitesh-mangal.png" alt="Dr. Hitesh Mangal — Lead Orthopaedic Surgeon" width="680" height="920" loading="lazy" decoding="async">
            </div>
          </div>

        </div>

      </div>
    </section>
  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
