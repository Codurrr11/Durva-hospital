<?php
$svc_img = 'https://images.pexels.com/photos/%d/pexels-photo-%d.jpeg?auto=compress&cs=tinysrgb&w=800';
$cc_img  = 'https://images.pexels.com/photos/%d/pexels-photo-%d.jpeg?auto=compress&cs=tinysrgb&w=900';
if (!function_exists('cc_src')) {
    function cc_src(string $tpl, int $id): string {
        return htmlspecialchars(sprintf($tpl, $id, $id), ENT_QUOTES);
    }
}
?>
<?php include __DIR__ . '/include/header.php'; ?>

  <main>
    <section class="hero" id="hero">

      <div class="hero__media" aria-hidden="true">
        <!--
          PERFORMANCE: the source below is a UHD 2732x1440 file hotlinked from
          the Pexels CDN — tens of MB, fetched on every load. Self-host a
          compressed copy and swap the line marked LOCAL in:
              assets/videos/hero.mp4
          Note that <source> order is priority, not size: the browser takes the
          first one it can play, so a smaller file listed second never helps.
        -->
        <video class="hero__video" autoplay muted loop playsinline preload="auto"
               poster="assets/images/hero-poster.jpg" disablepictureinpicture>
          <!-- LOCAL (preferred once the file exists):
          <source src="assets/videos/hero.mp4" type="video/mp4"> -->
          <source src="https://videos.pexels.com/video-files/7584467/7584467-uhd_2732_1440_25fps.mp4" type="video/mp4">
        </video>
        <div class="hero__overlay"></div>
      </div>

      <div class="hero__inner">

        <h1 class="hero__title">
          <span class="hero__line"><span class="hero__line-in">A new era of healing,</span></span>
          <span class="hero__line"><span class="hero__line-in">with precision orthopaedics</span></span>
        </h1>

        <div class="hero__actions">
          <a href="#appointment" class="hero-btn hero-btn--primary">Book Appointment</a>
          <a href="#services" class="hero-btn hero-btn--secondary">Explore Treatments</a>
        </div>

      </div>
    </section>

    <!-- ================= About ================= -->
    <section class="about" id="about">
      <div class="about__inner">

        <h2 class="about__headline" data-about-reveal>
          <span class="about__marker" aria-hidden="true">__</span>
          We&rsquo;re your dedicated partner in orthopaedic care. We&rsquo;re
          committed to helping you move without pain and get back to the life
          you love.
        </h2>

        <div class="about__row">
          <div class="about__aside" data-about-stagger>
            <p class="about__text">
              With two decades of dedicated care, we&rsquo;ve helped thousands of
              patients recover full mobility — each case a testament to our
              commitment to precision and compassion.
            </p>
            <a class="about__cta" href="#about-durva">About Durva Hospital</a>
          </div>

          <figure class="about__figure" data-about-stagger>
            <img class="about__img"
                 src="https://images.pexels.com/photos/8459996/pexels-photo-8459996.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=1400"
                 alt="A bright, modern hospital waiting area at Durva Hospital"
                 loading="lazy" decoding="async" width="1400" height="840">
          </figure>
        </div>

      </div>
    </section>

    <!-- ================= Services ================= -->
    <section class="services" id="services" data-slider>

      <div class="services__inner">
        <p class="svc-eyebrow"><span class="svc-eyebrow__mark" aria-hidden="true"></span>Our Services</p>

        <div class="services__head" data-svc-reveal>
          <h2 class="services__title">
            We deliver precision orthopaedic care to help
            <span class="services__title-muted">every patient</span> move without limits.
          </h2>

          <div class="services__nav">
            <button class="svc-arrow" type="button" data-prev aria-label="Previous services">
              <svg viewBox="0 0 18 18" fill="none" aria-hidden="true">
                <path d="M7.25 3.75 3.5 7.5l3.75 3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.5 7.5h7a3.75 3.75 0 0 1 0 7.5H8.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
            <button class="svc-arrow" type="button" data-next aria-label="Next services">
              <svg viewBox="0 0 18 18" fill="none" aria-hidden="true">
                <path d="M10.75 3.75 14.5 7.5l-3.75 3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M14.5 7.5h-7a3.75 3.75 0 0 0 0 7.5h1.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </button>
          </div>
        </div>
      </div>

      <div class="services__slider">
        <ul class="services__track" data-track>
          <li class="svc-card">
            <a class="svc-card__figure" href="#orthopaedic-surgery">
              <img class="svc-card__img" src="<?= cc_src($svc_img, 6129197) ?>"
                   alt="A surgical team reviewing imaging before a procedure" loading="lazy" decoding="async" draggable="false">
              <p class="svc-card__label">Orthopaedic Surgery</p>
            </a>
          </li>
          <li class="svc-card">
            <a class="svc-card__figure" href="#physical-therapy">
              <img class="svc-card__img" src="<?= cc_src($svc_img, 5793695) ?>"
                   alt="A physiotherapist guiding a patient through treatment" loading="lazy" decoding="async" draggable="false">
              <p class="svc-card__label">Physical Therapy</p>
            </a>
          </li>
          <li class="svc-card">
            <a class="svc-card__figure" href="#sports-medicine">
              <img class="svc-card__img" src="<?= cc_src($svc_img, 6111589) ?>"
                   alt="A trainer assisting a patient with a rehabilitation exercise" loading="lazy" decoding="async" draggable="false">
              <p class="svc-card__label">Sports Medicine</p>
            </a>
          </li>
          <li class="svc-card">
            <a class="svc-card__figure" href="#joint-replacement">
              <img class="svc-card__img" src="<?= cc_src($svc_img, 6129444) ?>"
                   alt="A surgeon discussing joint replacement with a patient" loading="lazy" decoding="async" draggable="false">
              <p class="svc-card__label">Joint Replacement</p>
            </a>
          </li>
          <li class="svc-card">
            <a class="svc-card__figure" href="#pain-management">
              <img class="svc-card__img" src="<?= cc_src($svc_img, 5473223) ?>"
                   alt="A clinician treating a patient’s injured hand" loading="lazy" decoding="async" draggable="false">
              <p class="svc-card__label">Pain Management</p>
            </a>
          </li>
          <li class="svc-card">
            <a class="svc-card__figure" href="#post-op-rehab">
              <img class="svc-card__img" src="<?= cc_src($svc_img, 5793792) ?>"
                   alt="A therapist supporting a patient through post-operative stretching" loading="lazy" decoding="async" draggable="false">
              <p class="svc-card__label">Post-Op Rehab</p>
            </a>
          </li>
        </ul>

      </div>

      <div class="services__inner">
        <dl class="svc-stats" data-svc-stats>
          <div class="svc-stat">
            <dt class="svc-stat__value" data-count="98" data-suffix="%">98%</dt>
            <dd class="svc-stat__label">Patient satisfaction across all procedures</dd>
          </div>
          <div class="svc-stat">
            <dt class="svc-stat__value" data-count="20" data-suffix="+">20+</dt>
            <dd class="svc-stat__label">Years of combined surgical experience</dd>
          </div>
          <div class="svc-stat">
            <dt class="svc-stat__value" data-count="5000" data-suffix="+">5,000+</dt>
            <dd class="svc-stat__label">Successful surgeries performed</dd>
          </div>
          <div class="svc-stat">
            <dt class="svc-stat__value">24/7</dt>
            <dd class="svc-stat__label">Emergency orthopaedic support</dd>
          </div>
        </dl>
      </div>

    </section>

    <!-- ================= Doctors ================= -->
    <!--
      Names and credentials below are the real ones, supplied by the client.
      The two bio paragraphs are written strictly from those credentials and
      say nothing that is not in them — no years of service, no case counts.
      If the doctors want those added, they need to supply the figures.
    -->
    <section class="doc" id="doctors" aria-labelledby="doc-title">

      <div class="doc__head">
        <p class="doc__eyebrow" data-doc-eyebrow>Meet Our Doctors</p>
        <h2 class="doc__title" id="doc-title" data-doc-title>
          Two surgeons, <em class="doc__title-em">one standard</em> of care
        </h2>
      </div>

      <div class="doc__stage">

        <p class="doc__watermark" aria-hidden="true" data-doc-mark>Specialists</p>

        <figure class="doc__figure" data-doc-figure>
          <img class="doc__img" src="assets/images/both-doc.png"
               alt="Dr. Hitesh Mangal and Dr. Khushboo Jain standing back to back in surgical scrubs"
               width="1080" height="1350" loading="lazy" decoding="async">
        </figure>

        <article class="doc-card doc-card--left" data-doc-left>
          <span class="doc-card__mark" aria-hidden="true"></span>
          <h3 class="doc-card__name">Dr. Hitesh Mangal</h3>
          <p class="doc-card__role">Fellow in Arthroscopy &amp; Joint Replacement</p>
          <p class="doc-card__creds">
            (Ahmedabad, Manipal, Pune) Knee &amp; Shoulder Specialist
          </p>
          <p class="doc-card__bio">
            Fellowship-trained in arthroscopy and joint replacement across
            Ahmedabad, Manipal and Pune. His practice centres on the knee and
            the shoulder — ligament reconstruction, arthroscopic repair and
            joint replacement.
          </p>
        </article>

        <article class="doc-card doc-card--right" data-doc-right>
          <span class="doc-card__mark" aria-hidden="true"></span>
          <h3 class="doc-card__name">Dr. Khushboo Jain</h3>
          <p class="doc-card__role">MBBS, MS (Obs &amp; Gynae., IVF Specialist)</p>
          <p class="doc-card__creds">
            Fellowship in Gynae Laparoscopy &amp; Infertility
          </p>
          <p class="doc-card__bio">
            MBBS and MS in obstetrics and gynaecology, with a further fellowship
            in gynaecological laparoscopy and infertility. Her work spans IVF and
            minimally invasive gynaecological surgery, from first assessment
            through to treatment.
          </p>
        </article>

      </div>
    </section>

    <!-- ================= Community Care ================= -->
    <section class="community" id="community">

      <div class="community__banner">
        <h2 class="community__title" data-cc-reveal>
          Committed to Your Health<br>
          and Lifelong Care
        </h2>

        <p class="community__sub" data-cc-reveal>
          Trusted care from experienced professionals — accessible, compassionate,
          and always nearby to support your health and well-being.
        </p>

        <div class="community__cta" data-cc-reveal>
          <a class="pill pill--solid" href="#appointment">
            <span class="pill__badge pill__badge--dark" aria-hidden="true">
              <svg viewBox="0 0 14 14" fill="none">
                <path d="M2.5 7.5 5.5 10.5 11.5 4" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
            Book Appointment
          </a>

          <a class="pill pill--ghost" href="#how-it-works">
            See How It Works
            <span class="pill__badge pill__badge--light" aria-hidden="true">
              <svg viewBox="0 0 14 14" fill="none">
                <path d="M3 7h8M7.5 3.5 11 7l-3.5 3.5" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </a>
        </div>
      </div>

      <div class="community__cards" data-cc-cards>

        <article class="cc-card">
          <img class="cc-card__img" src="<?= cc_src($cc_img, 6129444) ?>"
               alt="A surgeon reviewing knee imaging with a patient" loading="lazy" decoding="async">
          <button class="cc-play" type="button" aria-label="Play video">
            <svg viewBox="0 0 12 14" fill="currentColor" aria-hidden="true"><path d="M0 0v14l12-7z"/></svg>
          </button>
          <p class="cc-card__title">Knee Arthroscopy</p>
        </article>

        <article class="cc-card">
          <img class="cc-card__img" src="<?= cc_src($cc_img, 7579831) ?>"
               alt="A doctor and patient in consultation" loading="lazy" decoding="async">
          <button class="cc-play" type="button" aria-label="Play video">
            <svg viewBox="0 0 12 14" fill="currentColor" aria-hidden="true"><path d="M0 0v14l12-7z"/></svg>
          </button>
          <p class="cc-card__title">Shoulder Arthroscopy</p>
        </article>

        <article class="cc-card">
          <img class="cc-card__img" src="<?= cc_src($cc_img, 4266944) ?>"
               alt="A clinician discussing treatment options with a patient" loading="lazy" decoding="async">
          <button class="cc-play" type="button" aria-label="Play video">
            <svg viewBox="0 0 12 14" fill="currentColor" aria-hidden="true"><path d="M0 0v14l12-7z"/></svg>
          </button>
          <p class="cc-card__title">Joint Replacement</p>
        </article>

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
                <path d="M50 26l6 6-6 6" stroke="var(--c-mark, #1a7566)" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
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

    <!-- ================= Testimonials ================= -->
    <!--
      CONTENT: the four testimonials and the star ratings on them are written
      copy, not collected reviews. Replace with real patient feedback (and
      real ratings) before this goes live.
    -->
    <section class="tst" id="testimonials" aria-label="Patient testimonials">
      <div class="tst__inner">

        <div class="tst__intro">
          <p class="tst__label" data-tst-label>Testimonials</p>

          <h2 class="tst__title" data-tst-title>
            We go beyond the procedure to
            <em class="tst__title-em">understand every patient.</em>
          </h2>

          <p class="tst__lead" data-tst-lead>
            Recoveries in our patients&rsquo; own words — from the first
            consultation through to the last follow-up.
          </p>

          <a class="tst__cta" href="#testimonials" data-tst-cta>
            View all testimonials
            <svg viewBox="0 0 12 12" fill="none" aria-hidden="true">
              <path d="M4 2.5 7.5 6 4 9.5" stroke="currentColor" stroke-width="1.6"
                    stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </div>

        <?php
          /* One source of truth for both columns. Column A runs the set in
             order, column B reversed, so the two never read as a mirror.

             Each column prints the set THREE times. A column that loops by
             translating one set upward has only (copies − 1) sets left
             covering the rail at full shift, so two copies would leave a hole
             on any rail taller than one set. The copies are aria-hidden, so a
             screen reader hears each testimonial once. */
          $tst_cards = [
            [
              'quote'  => 'The care team walked us through every step of my knee replacement. I was back to walking without pain in weeks.',
              'name'   => 'Ramesh Patil',
              'role'   => 'Knee Replacement Patient',
              'rating' => '5.0',
              'img'    => 6111589,
              'alt'    => 'A therapist guiding a patient through a walking recovery session',
            ],
            [
              'quote'  => 'My daughter&rsquo;s ACL surgery was handled with such precision and warmth. The whole team made a scary time feel manageable.',
              'name'   => 'Anjali Sharma',
              'role'   => 'Parent, ACL Surgery Patient',
              'rating' => '4.9',
              'img'    => 5793695,
              'alt'    => 'A physiotherapist working through an exercise with a patient',
            ],
            [
              'quote'  => '24/7 support meant we never felt alone during recovery. Every question was answered immediately.',
              'name'   => 'Vikram Desai',
              'role'   => 'Shoulder Surgery Patient',
              'rating' => '4.8',
              'img'    => 7579831,
              'alt'    => 'A doctor answering questions in a consultation room',
            ],
            [
              'quote'  => 'The physiotherapy program got me back on the field faster than I expected. Genuinely life-changing care.',
              'name'   => 'Priya Menon',
              'role'   => 'Sports Injury Patient',
              'rating' => '5.0',
              'img'    => 5793792,
              'alt'    => 'A trainer supporting a patient through a sports rehabilitation exercise',
            ],
          ];

          if (!function_exists('tst_column')) {
              function tst_column(array $cards, string $tpl, string $mod): void {
                  $star = '<svg class="tst-card__star" viewBox="0 0 16 15" aria-hidden="true">'
                        . '<path fill="currentColor" d="M8 0l2.35 4.76 5.25.77-3.8 3.7.9 5.23L8 12l-4.7 2.47.9-5.23L.4 5.53l5.25-.77z"/>'
                        . '</svg>';

                  echo '<ul class="tst__col tst__col--' . $mod . '">';
                  for ($copy = 0; $copy < 3; $copy++) {
                      foreach ($cards as $c) {
                          $isClone = $copy > 0;
                          echo '<li class="tst-card"' . ($isClone ? ' aria-hidden="true"' : '') . '>';
                          echo   '<p class="tst-card__rating">' . $star;
                          echo     '<span>' . htmlspecialchars($c['rating'], ENT_QUOTES) . '</span>';
                          echo     '<span class="u-visually-hidden">out of 5</span>';
                          echo   '</p>';
                          echo   '<blockquote class="tst-card__quote"><p>' . $c['quote'] . '</p></blockquote>';
                          echo   '<figure class="tst-card__author">';
                          echo     '<img class="tst-card__avatar" src="' . cc_src($tpl, $c['img']) . '"';
                          echo          ' alt="' . htmlspecialchars($c['alt'], ENT_QUOTES) . '"';
                          echo          ' loading="lazy" decoding="async" draggable="false" width="80" height="80">';
                          echo     '<figcaption class="tst-card__meta">';
                          echo       '<span class="tst-card__name">' . htmlspecialchars($c['name'], ENT_QUOTES) . '</span>';
                          echo       '<span class="tst-card__role">' . htmlspecialchars($c['role'], ENT_QUOTES) . '</span>';
                          echo     '</figcaption>';
                          echo   '</figure>';
                          echo '</li>';
                      }
                  }
                  echo '</ul>';
              }
          }
        ?>

        <div class="tst__rail" data-tst-rail>
          <?php tst_column($tst_cards, $cc_img, 'a'); ?>
          <?php tst_column(array_reverse($tst_cards), $cc_img, 'b'); ?>
        </div>

      </div>
    </section>

    <!-- ================= Blog ================= -->
    <!--
      CONTENT: the four articles below are written placeholders. Each card
      links to "#" — point them at real posts before this goes live.
    -->
    <section class="blog" id="blog" aria-labelledby="blog-title">
      <div class="blog__panel">

        <div class="blog__head">
          <div class="blog__headline">
            <p class="blog__badge" data-blog-badge>From the Blog</p>
            <h2 class="blog__title" id="blog-title" data-blog-title>
              Answers before<br><em class="blog__title-em">you need them</em>
            </h2>
          </div>

          <p class="blog__intro" data-blog-intro>
            Plain-language reading from our surgeons and physiotherapists — on
            the procedures, the recovery, and the decisions patients ask about
            most.
          </p>
        </div>

        <?php
          /* One array drives the cards, the counter total and the per-slide
             line in the left column. `step` is written for that left slot —
             it is deliberately not the same sentence as `desc`, which sits on
             the card itself. */
          $blog_posts = [
            [
              'tag'   => 'Knee Care',
              'title' => 'When Knee Pain Means More Than Wear and Tear',
              'desc'  => 'The signs that separate everyday stiffness from a ligament injury worth scanning.',
              'step'  => 'Telling ordinary stiffness apart from something that needs imaging.',
              'img'   => 6129444,
              'alt'   => 'A surgeon discussing knee imaging with a patient',
            ],
            [
              'tag'   => 'Recovery',
              'title' => 'What the First Six Weeks After Surgery Look Like',
              'desc'  => 'A week-by-week picture of what to expect, and what should worry you.',
              'step'  => 'What recovery actually looks like, week by week.',
              'img'   => 5793792,
              'alt'   => 'A therapist supporting a patient through post-operative stretching',
            ],
            [
              'tag'   => 'Shoulder',
              'title' => 'Arthroscopy, Explained Without the Jargon',
              'desc'  => 'Why a keyhole procedure often beats open surgery on the shoulder.',
              'step'  => 'Keyhole shoulder surgery, in plain language.',
              'img'   => 6129197,
              'alt'   => 'A surgical team reviewing imaging before a procedure',
            ],
            [
              'tag'   => 'Sports',
              'title' => 'Returning to Sport After an ACL Repair',
              'desc'  => 'How we decide when an athlete is genuinely ready to play again.',
              'step'  => 'How we decide an athlete is ready to return.',
              'img'   => 6111589,
              'alt'   => 'A trainer guiding a patient through a rehabilitation exercise',
            ],
          ];
          $blog_total = count($blog_posts);
        ?>

        <div class="blog__body">

          <div class="blog__meta">
            <p class="blog__counter" aria-hidden="true">
              <span class="blog__counter-now" data-blog-index>01</span><span class="blog__counter-total">/<?= str_pad((string) $blog_total, 2, '0', STR_PAD_LEFT) ?></span>
            </p>

            <p class="blog__step" data-blog-step><?= htmlspecialchars($blog_posts[0]['step'], ENT_QUOTES) ?></p>

            <div class="blog__nav">
              <button class="blog-btn blog-btn--ghost" type="button" aria-label="Previous articles" data-blog-prev>
                <svg viewBox="0 0 18 18" fill="none" aria-hidden="true">
                  <path d="M7.25 3.75 3.5 7.5l3.75 3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M3.5 7.5h7a3.75 3.75 0 0 1 0 7.5H8.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
              <button class="blog-btn blog-btn--solid" type="button" aria-label="Next articles" data-blog-next>
                <svg viewBox="0 0 18 18" fill="none" aria-hidden="true">
                  <path d="M10.75 3.75 14.5 7.5l-3.75 3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M14.5 7.5h-7a3.75 3.75 0 0 0 0 7.5h1.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </div>

          <div class="blog__slider">
            <ul class="blog__track" data-blog-track>
              <?php foreach ($blog_posts as $i => $post): ?>
                <li class="blog-card" data-blog-step-text="<?= htmlspecialchars($post['step'], ENT_QUOTES) ?>">
                  <a class="blog-card__link" href="#">
                    <img class="blog-card__img" src="<?= cc_src($cc_img, $post['img']) ?>"
                         alt="<?= htmlspecialchars($post['alt'], ENT_QUOTES) ?>"
                         loading="lazy" decoding="async" draggable="false">
                    <span class="blog-card__tag"><?= htmlspecialchars($post['tag'], ENT_QUOTES) ?></span>
                    <span class="blog-card__body">
                      <span class="blog-card__title"><?= htmlspecialchars($post['title'], ENT_QUOTES) ?></span>
                      <span class="blog-card__desc"><?= htmlspecialchars($post['desc'], ENT_QUOTES) ?></span>
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>

        </div>
      </div>
    </section>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
