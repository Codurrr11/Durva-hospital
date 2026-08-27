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

    <!-- Main About Content Section -->
    <section class="about-overview" id="about-overview" style="padding: clamp(4rem, 6vw, 6.5rem) var(--gutter); background: #ffffff; color: var(--c-paper-ink);">
      <div class="u-container" style="max-width: 76rem; margin-inline: auto;">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 22rem), 1fr)); gap: clamp(2rem, 4vw, 3.5rem); align-items: center;">
          <div>
            <h2 style="font-size: clamp(1.75rem, 2.8vw, 2.25rem); font-weight: 700; line-height: 1.2; margin: 0 0 1.25rem; color: #0a0c0f;">
              Where Surgical Precision Meets Patient-First Healing
            </h2>
            <p style="font-size: 0.95rem; line-height: 1.7; color: #4a5568; margin-bottom: 1.25rem;">
              At Durva Hospital, we believe movement is fundamental to quality of life. Founded with a vision to deliver world-class orthopaedic care in Kota and Rajasthan, our center brings together super-specialist surgeons, advanced modular surgical suites, and dedicated rehabilitation therapists.
            </p>
            <p style="font-size: 0.95rem; line-height: 1.7; color: #4a5568; margin-bottom: 2rem;">
              Whether treating complex sports injuries, performing minimally invasive arthroscopic ligament repairs, or conducting precision joint replacements, our mission remains focused on fast recovery, minimal pain, and lasting mobility.
            </p>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
              <a class="btn btn--primary" href="#appointment" style="padding: 0.75rem 1.5rem; background: var(--c-mark, #1a7566); color: #fff; border-radius: 9999px; text-decoration: none; font-weight: 600; font-size: 0.875rem;">
                Book Consultation
              </a>
              <a class="btn btn--outline" href="#contact" style="padding: 0.75rem 1.5rem; border: 1px solid #cbd5e0; color: #1a202c; border-radius: 9999px; text-decoration: none; font-weight: 600; font-size: 0.875rem;">
                Contact Us
              </a>
            </div>
          </div>
          <div style="border-radius: 20px; overflow: hidden; box-shadow: 0 20px 40px -12px rgba(0,0,0,0.12);">
            <img src="assets/images/both-doc.png" alt="Durva Hospital Specialists" style="width: 100%; height: auto; display: block;" loading="lazy">
          </div>
        </div>
      </div>
    </section>
  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
