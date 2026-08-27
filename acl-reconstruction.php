<?php
// acl-reconstruction.php — ACL Reconstruction & Knee Arthroscopy at Durva Hospital
include __DIR__ . '/include/header.php';
?>

  <main>
    <!-- ACL Reconstruction Hero / Header Banner -->
    <section class="about-hero" id="acl-hero">
      <div class="about-hero__media" aria-hidden="true">
        <img class="about-hero__bg-img" src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=2000&q=80" alt="Advanced orthopaedic surgical theater and arthroscopy setup" loading="eager" decoding="async">
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
              <li class="about-breadcrumbs__item">
                <a class="about-breadcrumbs__link" href="#knee-arthroscopy">Knee Arthroscopy</a>
              </li>
              <li class="about-breadcrumbs__sep" aria-hidden="true">/</li>
              <li class="about-breadcrumbs__item" aria-current="page">
                <span>ACL Reconstruction</span>
              </li>
            </ol>
          </nav>
        </div>

        <!-- Right Bottom: Title and Paragraph -->
        <div class="about-hero__right">
          <h1 class="about-hero__title">
            ACL <span class="about-hero__accent">Reconstruction</span>
          </h1>
          <p class="about-hero__desc">
            Minimally invasive arthroscopic ligament repair using precision anatomical graft reconstruction for rapid stability and active return to sports.
          </p>
        </div>
      </div>
    </section>

    <!-- ================= Service Overview (50/50 Split) ================= -->
    <section class="svc-intro" id="overview" aria-labelledby="svc-intro-title">
      <!-- Left Column: Editorial Headline, Narrative & Dual Buttons -->
      <div class="svc-intro__content" data-svc-content>
        <h2 class="svc-intro__title" id="svc-intro-title">
          <span>Strategy.</span>
          <span>Precision.</span>
          <span>Results that restore mobility.</span>
        </h2>

        <p class="svc-intro__desc">
          We partner with patients to solve complex joint injuries, eliminate knee instability, and rebuild strong anatomical ligaments that are ready for active sports and long-term movement.
        </p>

        <div class="svc-intro__actions">
          <a class="svc-btn svc-btn--solid" href="#appointment">
            Schedule a Consultation
          </a>
          <a class="svc-btn svc-btn--outline" href="#procedures">
            Our Approach
          </a>
        </div>
      </div>

      <!-- Right Column: Full-Bleed Edge-to-Edge Media -->
      <div class="svc-intro__media" data-svc-media>
        <img class="svc-intro__img" src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=1600&q=80" alt="Modern orthopaedic consultation room and surgical precision" width="1600" height="1066" loading="lazy" decoding="async">
      </div>
    </section>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
