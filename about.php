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

    <!-- ================= Our Story ================= -->
    <section class="story" id="our-story" aria-labelledby="story-title">
      <div class="story__container">

        <div class="story__grid">

          <!-- Left Column: Copy & Actions -->
          <div class="story__content" data-story-content>
            <div class="story__eyebrow">
              <span class="story__eyebrow-mark" aria-hidden="true"></span>
              <span class="story__eyebrow-text">Our Founding Story</span>
            </div>

            <h2 class="story__title" id="story-title">
              Where Surgical Precision Meets <em class="story__serif">Patient-First</em> Healing
            </h2>

            <div class="story__body">
              <p class="story__lead">
                Movement is fundamental to the human experience. Founded with the conviction that advanced orthopaedic care should be uncompromising, compassionate, and accessible, Durva Hospital was established in Kota by Dr. Hitesh Mangal to deliver world-class arthroscopy and joint reconstruction under one dedicated roof.
              </p>
              <p class="story__text">
                From pioneering minimally invasive keyhole surgeries to personalized post-operative rehabilitation protocols, our clinical practice combines international surgical benchmarks with deep patient empathy. Every diagnosis, procedure, and recovery milestone is guided by one singular objective: helping you regain strength, confidence, and pain-free mobility without limits.
              </p>
            </div>

            <div class="story__actions">
              <a class="story-btn story-btn--primary" href="#appointment">
                <span>Book Consultation</span>
                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M3.33 8h9.34M8.67 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
              <a class="story-btn story-btn--ghost" href="#contact">
                <span>Contact Us</span>
              </a>
            </div>
          </div>

          <!-- Right Column: Dominant Vertical Portrait Card with Tonal Glow -->
          <div class="story__media-col" data-story-card>
            <div class="story__card-glow" aria-hidden="true"></div>
            <div class="story__card-frame">
              <figure class="story__figure">
                <img class="story__portrait" src="assets/images/hitesh-mangal.png" alt="Dr. Hitesh Mangal — Lead Orthopaedic &amp; Arthroscopy Surgeon" width="600" height="780" loading="lazy" decoding="async">
                <figcaption class="story__caption">
                  <div class="story__doctor-meta">
                    <span class="story__doctor-name">Dr. Hitesh Mangal</span>
                    <span class="story__doctor-role">M.B.B.S., M.S. (Ortho) &bull; Lead Arthroscopy &amp; Joint Surgeon</span>
                  </div>
                </figcaption>
              </figure>
            </div>
          </div>

        </div>

      </div>
    </section>
  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
