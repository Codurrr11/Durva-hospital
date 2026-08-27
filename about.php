<?php
// about.php — About Durva Hospital
include __DIR__ . '/include/header.php';
?>

  <main>
    <!-- About Page Hero / Header Banner -->
    <section class="about-hero" id="about-hero" style="padding: clamp(6rem, 10vw, 9rem) var(--gutter) clamp(3rem, 5vw, 4.5rem); background: linear-gradient(180deg, #090e17 0%, #06090e 100%); color: #ffffff; text-align: center;">
      <div class="u-container" style="max-width: 54rem; margin-inline: auto;">
        <span class="badge" style="display: inline-block; padding: 0.35rem 0.85rem; border: 1px solid rgba(127, 209, 193, 0.3); border-radius: 9999px; font-size: 0.75rem; font-weight: 600; letter-spacing: 0.04em; text-transform: uppercase; color: var(--c-accent); margin-bottom: 1.25rem;">
          About Durva Hospital
        </span>
        <h1 style="font-size: clamp(2rem, 4vw, 3.25rem); font-family: var(--font-display, inherit); font-weight: 700; line-height: 1.15; letter-spacing: -0.02em; margin: 0 0 1.25rem;">
          Pioneering Advanced Orthopaedics &amp; Compassionate Care
        </h1>
        <p style="font-size: clamp(1rem, 1.2vw, 1.125rem); color: rgba(255, 255, 255, 0.75); line-height: 1.6; margin: 0 auto; max-width: 42ch;">
          Dedicated to restoring mobility and enhancing lives through cutting-edge arthroscopy, precision joint replacement, and evidence-based rehabilitation.
        </p>
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
