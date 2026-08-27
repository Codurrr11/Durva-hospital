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

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
