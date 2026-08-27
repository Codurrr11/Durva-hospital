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

            <!-- Integrated Typographic Credential Lockup -->
            <div class="founding__creds">
              <div class="founding__doctor">
                <span class="founding__doctor-name">Dr. Hitesh Mangal</span>
                <span class="founding__doctor-degree">M.B.B.S., M.S. (Ortho) &bull; Lead Arthroscopy &amp; Joint Surgeon</span>
                <span class="founding__doctor-fellowship">Knee &amp; Shoulder Fellowship Trained &bull; South Korea &amp; Bangkok</span>
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

          <!-- Right Column: Sleek Minimal Architectural Frame -->
          <div class="founding__portrait-wrap" data-founding-portrait>
            <div class="founding__portrait-frame">
              <img class="founding__portrait-img" src="assets/images/hitesh-mangal.png" alt="Dr. Hitesh Mangal — Lead Orthopaedic &amp; Arthroscopy Surgeon" width="680" height="920" loading="lazy" decoding="async">
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ================= Highlights / Case Studies ================= -->
    <section class="highlights" id="highlights" aria-labelledby="highlights-title">
      <div class="highlights__inner">

        <!-- Top Large Headline -->
        <div class="highlights__header" data-highlights-head>
          <h2 class="highlights__title" id="highlights-title">
            Your trusted partner for recovery and long-term mobility.
          </h2>
        </div>

        <!-- 2-Column Card Grid -->
        <div class="highlights__grid" data-highlights-cards>

          <!-- Item 00-1 -->
          <article class="highlights__item">
            <!-- Header Meta Bar (Square marker & Dual numbering) -->
            <div class="highlights__meta">
              <div class="highlights__meta-left">
                <span class="highlights__marker" aria-hidden="true">
                  <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor">
                    <rect width="8" height="8" rx="1"/>
                  </svg>
                </span>
                <span class="highlights__index">00—1</span>
              </div>
              <span class="highlights__index highlights__index--right">00—1</span>
            </div>

            <!-- Card Visual -->
            <div class="highlights__card highlights__card--media">
              <span class="highlights__badge">New</span>
              <img class="highlights__img" src="https://images.unsplash.com/photo-1576091160550-2173dba999ef?auto=format&fit=crop&w=1200&q=80" alt="Advanced physical recovery and knee arthroscopy rehabilitation" width="800" height="500" loading="lazy" decoding="async">
            </div>

            <!-- Caption Row -->
            <div class="highlights__caption">
              <span class="highlights__arrow" aria-hidden="true">
                <svg class="highlights__arrow-icon" viewBox="0 0 16 16" fill="none">
                  <path d="M3 8h9.5M8.5 4l4 4-4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </span>
              <p class="highlights__text">
                <strong class="highlights__label">Recovery Program</strong>
                <span class="highlights__dot" aria-hidden="true">&bull;</span>
                <span class="highlights__desc">A personalized rehabilitation strategy that restores mobility after joint surgery.</span>
              </p>
            </div>
          </article>

          <!-- Item 00-2 -->
          <article class="highlights__item">
            <!-- Header Meta Bar (Square marker & Dual numbering) -->
            <div class="highlights__meta">
              <div class="highlights__meta-left">
                <span class="highlights__marker" aria-hidden="true">
                  <svg width="8" height="8" viewBox="0 0 8 8" fill="currentColor">
                    <rect width="8" height="8" rx="1"/>
                  </svg>
                </span>
                <span class="highlights__index">00—2</span>
              </div>
              <span class="highlights__index highlights__index--right">00—2</span>
            </div>

            <!-- Card Visual -->
            <div class="highlights__card highlights__card--solid">
              <div class="highlights__wordmark">
                <span class="highlights__wordmark-dot">.</span>durvacare<span class="highlights__wordmark-dot">.</span>
              </div>
            </div>

            <!-- Caption Row -->
            <div class="highlights__caption">
              <p class="highlights__text">
                <strong class="highlights__label">Durva Specialist Care</strong>
                <span class="highlights__dot" aria-hidden="true">&bull;</span>
                <span class="highlights__desc">Advanced minimally invasive orthopaedic center in Kota.</span>
              </p>
            </div>
          </article>

        </div>

      </div>
    </section>

    <!-- ================= Why Choose Us ================= -->
    <section class="why-choose" id="why-choose" aria-labelledby="why-title">
      <div class="why-choose__inner">

        <!-- Asymmetrical Editorial Grid -->
        <div class="why-choose__grid">

          <!-- Left Column Top: Eyebrow + Narrative & Bold Statement -->
          <div class="why-choose__intro" data-why-intro>
            <div class="why-choose__eyebrow">
              <span class="why-choose__marker" aria-hidden="true"></span>
              <span class="why-choose__label">Why Choose Us</span>
            </div>

            <div class="why-choose__narrative">
              <p class="why-choose__lead">
                Are you dealing with persistent joint pain or recovering from an injury? With our specialist-led approach to orthopaedic care, you get personalized treatment plans built around your recovery &mdash; not a generic protocol.
              </p>
              <p class="why-choose__statement">
                It&rsquo;s not just treatment, it&rsquo;s a complete path back to movement.
              </p>
            </div>
          </div>

          <!-- Top Right / Columns 2-3: Main Headline -->
          <div class="why-choose__header" data-why-header>
            <h2 class="why-choose__title" id="why-title">
              Precise, compassionate, dedicated: we help you move without limits!
            </h2>
          </div>

          <!-- Card 1: Specialist-Led Care (Col 2, Row 1) -->
          <article class="why-card why-card--1" data-why-card>
            <div class="why-card__icon-wrap" aria-hidden="true">
              <svg class="why-card__icon" viewBox="0 0 64 64" fill="none">
                <rect x="18" y="18" width="28" height="28" rx="4" transform="rotate(45 32 32)" stroke="var(--c-mark, #1a7566)" stroke-width="1.6"/>
                <path d="M26 32h12M33 27l5 5-5 5" stroke="var(--c-mark, #1a7566)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                <rect x="36" y="18" width="20" height="20" rx="3" transform="rotate(45 46 28)" stroke="#cbd5e1" stroke-width="1.4" stroke-dasharray="3 3"/>
              </svg>
            </div>
            <h3 class="why-card__title">Specialist-Led Care</h3>
            <p class="why-card__tagline">Not general practice &mdash; true specialists.</p>
            <p class="why-card__desc">
              Every case is handled by fellowship-trained orthopaedic surgeons who focus exclusively on joints, sports injuries, and mobility &mdash; not general medicine spread thin.
            </p>
          </article>

          <!-- Card 2: Advanced Techniques (Col 3, Row 1) -->
          <article class="why-card why-card--2" data-why-card>
            <div class="why-card__icon-wrap" aria-hidden="true">
              <svg class="why-card__icon" viewBox="0 0 64 64" fill="none">
                <line x1="8" y1="20" x2="8" y2="28" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="16" y1="18" x2="16" y2="30" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="24" y1="20" x2="24" y2="28" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="40" y1="18" x2="40" y2="30" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="48" y1="20" x2="48" y2="28" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="8" y1="44" x2="8" y2="36" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="16" y1="46" x2="16" y2="34" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="24" y1="44" x2="24" y2="36" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="40" y1="46" x2="40" y2="34" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="48" y1="44" x2="48" y2="36" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="6" y1="32" x2="56" y2="32" stroke="var(--c-mark, #1a7566)" stroke-width="1.6" stroke-linecap="round"/>
                <path d="M48 24l8 8-8 8" stroke="var(--c-mark, #1a7566)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="why-card__title">Advanced Techniques</h3>
            <p class="why-card__tagline">Minimally invasive, maximum recovery.</p>
            <p class="why-card__desc">
              From keyhole arthroscopy to precision joint replacement, we use techniques that reduce pain, scarring, and recovery time significantly.
            </p>
          </article>

          <!-- Card 3: Personalized Recovery (Col 1, Row 2) -->
          <article class="why-card why-card--3" data-why-card>
            <div class="why-card__icon-wrap" aria-hidden="true">
              <svg class="why-card__icon" viewBox="0 0 64 64" fill="none">
                <line x1="8" y1="24" x2="8" y2="40" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="8" y1="32" x2="24" y2="32" stroke="var(--c-mark, #1a7566)" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="32" cy="24" r="5" stroke="var(--c-mark, #1a7566)" stroke-width="1.5"/>
                <circle cx="26" cy="36" r="5" stroke="var(--c-mark, #1a7566)" stroke-width="1.5"/>
                <circle cx="38" cy="36" r="5" stroke="var(--c-mark, #1a7566)" stroke-width="1.5"/>
                <circle cx="32" cy="40" r="5" stroke="var(--c-mark, #1a7566)" stroke-width="1.5"/>
                <line x1="40" y1="32" x2="56" y2="32" stroke="var(--c-mark, #1a7566)" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M50 26l6 6-6 6" stroke="var(--c-mark, #1a7566)" stroke-width="1.5" stroke-linecap="round"/>
              </svg>
            </div>
            <h3 class="why-card__title">Personalized Recovery</h3>
            <p class="why-card__tagline">No two recovery plans are the same.</p>
            <p class="why-card__desc">
              We build individualized rehabilitation protocols based on your body, your injury, and your goals &mdash; not a one-size-fits-all checklist.
            </p>
          </article>

          <!-- Card 4: End-to-End Support (Col 2, Row 2) -->
          <article class="why-card why-card--4" data-why-card>
            <div class="why-card__icon-wrap" aria-hidden="true">
              <svg class="why-card__icon" viewBox="0 0 64 64" fill="none">
                <path d="M8 32h40" stroke="var(--c-mark, #1a7566)" stroke-width="1.6" stroke-linecap="round"/>
                <path d="M12 22h12c6 0 10 10 16 10h8" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M12 42h12c6 0 10-10 16-10h8" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M22 18l4 4-4 4" stroke="#cbd5e1" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M22 38l4 4-4 4" stroke="#cbd5e1" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M50 24l8 8-8 8" stroke="var(--c-mark, #1a7566)" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="why-card__title">End-to-End Support</h3>
            <p class="why-card__tagline">From diagnosis to full mobility.</p>
            <p class="why-card__desc">
              Our care doesn&rsquo;t end at surgery. Physiotherapy, follow-ups, and recovery coaching are all part of one continuous journey with us.
            </p>
          </article>

        </div>

      </div>
    </section>
  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
