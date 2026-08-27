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

    <!-- ================= Our Values Section (2x2 Grid with Accent Hero Card) ================= -->
    <section class="values-sec" id="values" aria-labelledby="values-title">
      <div class="values-sec__inner">

        <!-- Left Column: Key Value Tag, Stacked Headline, Narrative -->
        <div class="values-sec__left" data-values-head>
          <span class="values-sec__tag">Key Values</span>

          <h2 class="values-sec__title" id="values-title">
            Our<br>Values
          </h2>

          <p class="values-sec__desc">
            At Durva Hospital, our values guide every surgical decision and rehabilitation step. They shape our specialist consultations, patient recovery protocols, and long-term joint outcomes.
          </p>
        </div>

        <!-- Right Column: 2x2 Grid of Cards -->
        <div class="values-sec__grid" data-values-cards>

          <!-- Card 1: Patient First (Hero Brand Accent Card) -->
          <article class="value-card value-card--accent">
            <div class="value-card__icon-wrap" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="7" r="4"/>
                <path d="M5.5 21a6.5 6.5 0 0 1 13 0"/>
                <path d="M19 11a3 3 0 0 1 0 6"/>
                <path d="M5 11a3 3 0 0 0 0 6"/>
              </svg>
            </div>
            <p class="value-card__text">
              Putting our patients&rsquo; joint health, comfort, and active return above all else.
            </p>
            <div class="value-card__footer">
              <h3 class="value-card__title">Patient First</h3>
            </div>
          </article>

          <!-- Card 2: Precision Care (Light Card) -->
          <article class="value-card">
            <div class="value-card__icon-wrap" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M16 16v1a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h1"/>
                <rect x="8" y="3" width="12" height="12" rx="2"/>
                <path d="m11 9 2 2 4-4"/>
              </svg>
            </div>
            <p class="value-card__text">
              Minimally invasive keyhole accuracy tailored to each patient&rsquo;s anatomical knee profile.
            </p>
            <div class="value-card__footer">
              <h3 class="value-card__title">Precision Care</h3>
            </div>
          </article>

          <!-- Card 3: Integrated Rehab (Light Card) -->
          <article class="value-card">
            <div class="value-card__icon-wrap" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="m11 17 2 2a1 1 0 0 0 1.4 0l4.6-4.6a2 2 0 0 0 0-2.8l-1.4-1.4a2 2 0 0 0-2.8 0L13 12"/>
                <path d="m13 7-2-2a1 1 0 0 0-1.4 0L5 9.6a2 2 0 0 0 0 2.8l1.4 1.4a2 2 0 0 0 2.8 0L11 12"/>
              </svg>
            </div>
            <p class="value-card__text">
              Surgeons and physiotherapists working together for predictable recovery milestones.
            </p>
            <div class="value-card__footer">
              <h3 class="value-card__title">Integrated Rehab</h3>
            </div>
          </article>

          <!-- Card 4: Clinical Excellence (Light Card) -->
          <article class="value-card">
            <div class="value-card__icon-wrap" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="7" r="4"/>
                <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                <path d="M12 11h.01"/>
              </svg>
            </div>
            <p class="value-card__text">
              Continuously advancing orthopaedic methods with proven anatomical graft fixation.
            </p>
            <div class="value-card__footer">
              <h3 class="value-card__title">Clinical Excellence</h3>
            </div>
          </article>

        </div>

      </div>
    </section>

    <!-- ================= Recovery Impact & Evidence Section ================= -->
    <section class="impact-sec" id="impact" aria-labelledby="impact-title">
      <div class="impact-sec__inner">

        <!-- Top Centered Header Block -->
        <div class="impact-sec__header" data-impact-head>
          <span class="impact-sec__badge">Recovery Impact</span>

          <h2 class="impact-sec__title" id="impact-title">
            Restoring Your Knee<br>
            Impacts <span class="impact-sec__title-muted">Your Life in Many Ways</span>
          </h2>

          <!-- Category Filter Tabs (Pill Capsule) -->
          <div class="impact-tabs" role="tablist" aria-label="Impact categories">
            <button class="impact-tab is-active" type="button" role="tab" aria-selected="true" data-tab="sports">Sports &amp; Athletics</button>
            <button class="impact-tab" type="button" role="tab" aria-selected="false" data-tab="mobility">Daily Mobility</button>
            <button class="impact-tab" type="button" role="tab" aria-selected="false" data-tab="longevity">Joint Longevity</button>
            <button class="impact-tab" type="button" role="tab" aria-selected="false" data-tab="work">Work &amp; Activity</button>
          </div>
        </div>

        <!-- 4-Card Row / Grid Container -->
        <div class="impact-cards" data-impact-cards>

          <!-- Card 1: Light Card -->
          <article class="impact-card" data-category="sports mobility">
            <div class="impact-card__top">
              <span class="impact-card__tag">Key Metric</span>
            </div>
            <div class="impact-card__body">
              <h3 class="impact-card__title">92% Return Rate</h3>
              <p class="impact-card__desc">
                Over 92% of active athletes return to their previous competitive sport level following anatomical ACL reconstruction.
              </p>
            </div>
            <div class="impact-card__citation">
              <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                <path d="M9 2v4h4"/>
              </svg>
              <span>Clinical Sports Medicine Journal, 2025</span>
            </div>
          </article>

          <!-- Card 2: Featured Gradient Card (Card 2 elevated per reference) -->
          <article class="impact-card impact-card--featured" data-category="sports mobility longevity work">
            <div class="impact-card__top">
              <span class="impact-card__tag">Stability</span>
            </div>
            <div class="impact-card__body">
              <h3 class="impact-card__title">Zero Instability</h3>
              <p class="impact-card__desc">
                Precision graft fixation eliminates pivot-shift instability, restoring complete confidence in cutting and pivoting movements.
              </p>
            </div>
            <div class="impact-card__citation">
              <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                <path d="M9 2v4h4"/>
              </svg>
              <span>Durva Orthopaedic Arthroscopy Registry</span>
            </div>
          </article>

          <!-- Card 3: Light Card -->
          <article class="impact-card" data-category="sports longevity">
            <div class="impact-card__top">
              <span class="impact-card__tag">Kinematics</span>
            </div>
            <div class="impact-card__body">
              <h3 class="impact-card__title">Natural Movement</h3>
              <p class="impact-card__desc">
                Restores native knee rotational geometry, protecting healthy cartilage and surrounding meniscus tissues.
              </p>
            </div>
            <div class="impact-card__citation">
              <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                <path d="M9 2v4h4"/>
              </svg>
              <span>American Journal of Sports Medicine</span>
            </div>
          </article>

          <!-- Card 4: Light Card -->
          <article class="impact-card" data-category="longevity work">
            <div class="impact-card__top">
              <span class="impact-card__tag">Long-Term</span>
            </div>
            <div class="impact-card__body">
              <h3 class="impact-card__title">Cartilage Defense</h3>
              <p class="impact-card__desc">
                Early anatomical reconstruction dramatically reduces long-term osteoarthritis risk compared to unmanaged joint laxity.
              </p>
            </div>
            <div class="impact-card__citation">
              <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                <path d="M9 2v4h4"/>
              </svg>
              <span>International Joint Forum, 2024</span>
            </div>
          </article>

        </div>

      </div>
    </section>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
