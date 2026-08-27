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

    <!-- ================= Clinical Principles / Protocol ================= -->
    <section class="principles" id="principles" aria-labelledby="principles-title">
      <div class="principles__inner">

        <!-- Top Eyebrow Badge & Two-Tone Headline -->
        <div class="principles__header" data-principles-head>
          <div class="principles__badge">Principles</div>

          <h2 class="principles__title" id="principles-title">
            Durva is built on a simple standard: <span class="principles__title-muted">recovery should feel clear, not overwhelming.</span> We focus on how real mobility returns.
          </h2>
        </div>

        <!-- 3-Card Grid -->
        <div class="principles__grid" data-principles-cards>

          <!-- Card 1: Clarity -->
          <article class="principle-card">
            <div class="principle-card__icon-badge" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/>
                <circle cx="12" cy="12" r="2"/>
              </svg>
            </div>
            <h3 class="principle-card__title">Clarity</h3>
            <p class="principle-card__desc">
              Treatment pathways and surgical milestones are structured clearly so you always know what matters for your recovery today.
            </p>
          </article>

          <!-- Card 2: Adaptability -->
          <article class="principle-card">
            <div class="principle-card__icon-badge" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 12a9 9 0 0 0-9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/>
                <path d="M3 3v5h5"/>
                <path d="M3 12a9 9 0 0 0 9 9 9.75 9.75 0 0 0 6.74-2.74L21 16"/>
                <path d="M16 21h5v-5"/>
              </svg>
            </div>
            <h3 class="principle-card__title">Adaptability</h3>
            <p class="principle-card__desc">
              Your healing rate is personal &mdash; your physiotherapy protocol adapts dynamically to your joint response, not an arbitrary schedule.
            </p>
          </article>

          <!-- Card 3: Focus -->
          <article class="principle-card">
            <div class="principle-card__icon-badge" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/>
              </svg>
            </div>
            <h3 class="principle-card__title">Focus</h3>
            <p class="principle-card__desc">
              Surgical precision, graft strength, and muscle rehabilitation align seamlessly so you regain full athletic movement without friction.
            </p>
          </article>

        </div>

      </div>
    </section>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
