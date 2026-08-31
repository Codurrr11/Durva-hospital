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
              <a class="founding-btn founding-btn--primary" href="book-appointment.php">
                <span>Book Consultation</span>
                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M3.33 8h9.34M8.67 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
              <a class="founding-btn founding-btn--ghost" href="book-appointment.php">
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
              <img class="highlights__bg" src="https://images.pexels.com/photos/2324837/pexels-photo-2324837.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1400" alt="The surgical team at work in theatre" width="1400" height="875" loading="lazy" decoding="async">
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

          <!-- Row 1, Col 1: Eyebrow Label -->
          <div class="why-choose__eyebrow" data-why-eyebrow>
            <span class="why-choose__marker" aria-hidden="true"></span>
            <span class="why-choose__label">Why Choose Us</span>
          </div>

          <!-- Row 1, Col 2 & 3: Main Headline -->
          <div class="why-choose__header" data-why-header>
            <h2 class="why-choose__title" id="why-title">
              Precise, compassionate, dedicated: we help you move without limits!
            </h2>
          </div>

          <!-- Row 2, Col 1: Narrative & Bold Statement -->
          <div class="why-choose__narrative" data-why-narrative>
            <p class="why-choose__lead">
              Are you dealing with persistent joint pain or recovering from an injury? With our specialist-led approach to orthopaedic care, you get personalized treatment plans built around your recovery &mdash; not a generic protocol.
            </p>
            <p class="why-choose__statement">
              It&rsquo;s not just treatment, it&rsquo;s a complete path back to movement.
            </p>
          </div>

          <!-- Row 2, Col 2: Card 1 (Specialist-Led Care) -->
          <article class="why-card why-card--1" data-why-card>
            <div class="why-card__icon-wrap" aria-hidden="true">
              <svg class="why-card__icon" viewBox="0 0 80 60" fill="none">
                <rect x="22" y="10" width="28" height="28" rx="2" transform="rotate(45 22 10)" stroke="#e54d38" stroke-width="1.5"/>
                <path d="M16 30h12M24 25l5 5-5 5" stroke="#e54d38" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <rect x="42" y="10" width="28" height="28" rx="2" transform="rotate(45 42 10)" stroke="#cbd5e1" stroke-width="1.4" stroke-dasharray="3 3"/>
              </svg>
            </div>
            <h3 class="why-card__title">Specialist-Led Care</h3>
            <div class="why-card__body">
              <p class="why-card__tagline">Not general practice &mdash; true specialists.</p>
              <p class="why-card__desc">
                Every case is handled by fellowship-trained orthopaedic surgeons who focus exclusively on joints, sports injuries, and mobility &mdash; not general medicine spread thin.
              </p>
            </div>
          </article>

          <!-- Row 2, Col 3: Card 2 (Advanced Techniques) -->
          <article class="why-card why-card--2" data-why-card>
            <div class="why-card__icon-wrap" aria-hidden="true">
              <svg class="why-card__icon" viewBox="0 0 80 60" fill="none">
                <line x1="8" y1="18" x2="8" y2="26" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="16" y1="18" x2="16" y2="26" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="24" y1="18" x2="24" y2="26" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="42" y1="18" x2="42" y2="26" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="58" y1="18" x2="58" y2="26" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="8" y1="42" x2="8" y2="34" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="16" y1="42" x2="16" y2="34" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="24" y1="42" x2="24" y2="34" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="42" y1="42" x2="42" y2="34" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="58" y1="42" x2="58" y2="34" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="4" y1="30" x2="72" y2="30" stroke="#e54d38" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M64 22l8 8-8 8" stroke="#e54d38" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="why-card__title">Advanced Techniques</h3>
            <div class="why-card__body">
              <p class="why-card__tagline">Minimally invasive, maximum recovery.</p>
              <p class="why-card__desc">
                From keyhole arthroscopy to precision joint replacement, we use techniques that reduce pain, scarring, and recovery time significantly.
              </p>
            </div>
          </article>

          <!-- Row 3, Col 1: Card 3 (Personalized Recovery) -->
          <article class="why-card why-card--3" data-why-card>
            <div class="why-card__icon-wrap" aria-hidden="true">
              <svg class="why-card__icon" viewBox="0 0 80 60" fill="none">
                <line x1="8" y1="20" x2="8" y2="40" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <line x1="8" y1="30" x2="28" y2="30" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <circle cx="38" cy="22" r="5" stroke="#e54d38" stroke-width="1.5"/>
                <circle cx="32" cy="34" r="5" stroke="#e54d38" stroke-width="1.5"/>
                <circle cx="44" cy="34" r="5" stroke="#e54d38" stroke-width="1.5"/>
                <circle cx="38" cy="40" r="5" stroke="#e54d38" stroke-width="1.5"/>
                <line x1="48" y1="30" x2="70" y2="30" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M62 22l8 8-8 8" stroke="#e54d38" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="why-card__title">Personalized Recovery</h3>
            <div class="why-card__body">
              <p class="why-card__tagline">No two recovery plans are the same.</p>
              <p class="why-card__desc">
                We build individualized rehabilitation protocols based on your body, your injury, and your goals &mdash; not a one-size-fits-all checklist.
              </p>
            </div>
          </article>

          <!-- Row 3, Col 2: Card 4 (End-to-End Support) -->
          <article class="why-card why-card--4" data-why-card>
            <div class="why-card__icon-wrap" aria-hidden="true">
              <svg class="why-card__icon" viewBox="0 0 80 60" fill="none">
                <path d="M6 30h64" stroke="#e54d38" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M12 20h14c6 0 10 10 16 10h16" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M12 40h14c6 0 10-10 16-10h16" stroke="#cbd5e1" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M22 16l4 4-4 4" stroke="#cbd5e1" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M22 36l4 4-4 4" stroke="#cbd5e1" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M62 22l8 8-8 8" stroke="#e54d38" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </div>
            <h3 class="why-card__title">End-to-End Support</h3>
            <div class="why-card__body">
              <p class="why-card__tagline">From diagnosis to full mobility.</p>
              <p class="why-card__desc">
                Our care doesn&rsquo;t end at surgery. Physiotherapy, follow-ups, and recovery coaching are all part of one continuous journey with us.
              </p>
            </div>
          </article>

        </div>

      </div>
    </section>
  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
