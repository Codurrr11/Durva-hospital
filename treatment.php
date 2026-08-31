<?php
/*
  treatment.php — one template for every procedure and condition page.

  URL:  treatment.php?slug=acl-reconstruction

  $TREATMENTS below is the stand-in for the database. When the DB lands,
  replace the array lookup with the query and nothing else on this page has to
  change — everything reads from $t and $g.

  The slug is only ever used as an ARRAY KEY and is checked against this
  whitelist before use, so it can never reach a query or the filesystem. Keep
  it that way: if this becomes a DB lookup, bind the parameter.

  NOTE: only the hero (title, lead, breadcrumb) is slug-driven so far. Every
  section below it is still ACL Reconstruction copy — those come across with
  the DB work.
*/

$TREATMENT_GROUPS = [
    'knee'     => ['label' => 'Knee Arthroscopy',     'anchor' => '#knee-arthroscopy'],
    'shoulder' => ['label' => 'Shoulder Arthroscopy', 'anchor' => '#shoulder-arthroscopy'],
    'joint'    => ['label' => 'Joint Replacement',    'anchor' => '#joint-replacement'],
    'preserve' => ['label' => 'Joint Preservation',   'anchor' => '#joint-preservation'],
];

$TREATMENTS = [
    'acl-reconstruction' => [
        'group'  => 'knee',
        'lead'   => 'ACL',
        'accent' => 'Reconstruction',
        'desc'   => 'Minimally invasive arthroscopic ligament repair using precision anatomical graft reconstruction for rapid stability and active return to sports.',
    ],
    'acl-avulsion' => [
        'group'  => 'knee',
        'lead'   => 'ACL',
        'accent' => 'Avulsion',
        'desc'   => 'Fixation of the bony fragment the ligament has pulled away with, restoring the ACL at its own attachment rather than replacing it.',
    ],
    'mcl-tear' => [
        'group'  => 'knee',
        'lead'   => 'MCL',
        'accent' => 'Tear',
        'desc'   => 'Assessment and graded treatment of medial collateral ligament injury, from bracing and rehabilitation through to repair or reconstruction.',
    ],
    'pcl-reconstruction' => [
        'group'  => 'knee',
        'lead'   => 'PCL',
        'accent' => 'Reconstruction',
        'desc'   => 'Arthroscopic reconstruction of the posterior cruciate ligament to restore back-to-front stability and confident weight-bearing.',
    ],
    'meniscus-tears' => [
        'group'  => 'knee',
        'lead'   => 'Meniscus',
        'accent' => 'Tears',
        'desc'   => 'Repair wherever the tear pattern and blood supply allow it, because preserving meniscus tissue protects the joint for the long term.',
    ],
    'synovitis' => [
        'group'  => 'knee',
        'lead'   => 'Knee',
        'accent' => 'Synovitis',
        'desc'   => 'Investigation and treatment of a persistently inflamed joint lining — identifying the cause first, then settling the knee down.',
    ],
    'patella-dislocation' => [
        'group'  => 'knee',
        'lead'   => 'Patella',
        'accent' => 'Dislocation',
        'desc'   => 'Treatment for a kneecap that has come out of its groove, from first-time dislocation through to recurrent instability.',
    ],
    'frozen-shoulder' => [
        'group'  => 'shoulder',
        'lead'   => 'Frozen',
        'accent' => 'Shoulder',
        'desc'   => 'A staged approach to adhesive capsulitis — restoring range through guided rehabilitation, with intervention held in reserve.',
    ],
    'rotator-cuff' => [
        'group'  => 'shoulder',
        'lead'   => 'Rotator',
        'accent' => 'Cuff',
        'desc'   => 'Arthroscopic repair of the tendons that lift and rotate the arm, returning overhead strength without open surgery.',
    ],
    'ac-joint-dislocation' => [
        'group'  => 'shoulder',
        'lead'   => 'AC Joint',
        'accent' => 'Dislocation',
        'desc'   => 'Management of acromioclavicular separation, matched to the grade of injury and to the demands you place on the shoulder.',
    ],
    'knee-hto' => [
        'group'  => 'preserve',
        'lead'   => 'Knee',
        'accent' => 'HTO',
        'desc'   => 'High tibial osteotomy — realigning the leg to shift load off the worn side of the knee, so the joint you have keeps working rather than being replaced.',
    ],
    'mosaicoplasty' => [
        'group'  => 'preserve',
        /* lead and accent are joined with a space, so the word cannot be
           split across them — "Mosaic plasty" is not a thing */
        'lead'   => 'Cartilage',
        'accent' => 'Mosaicoplasty',
        'desc'   => 'Resurfacing a cartilage defect with osteochondral plugs taken from the patient\'s own joint, harvested where the surface carries no load.',
    ],
    'hip-preservation-core-decompression' => [
        'group'  => 'preserve',
        'lead'   => 'Hip Preservation —',
        'accent' => 'Core Decompression',
        'desc'   => 'Drilling to relieve pressure in the femoral head in early avascular necrosis, before the bone collapses and replacement becomes the only option.',
    ],
    'joint-replacement' => [
        'group'  => 'joint',
        'lead'   => 'Joint',
        'accent' => 'Replacement',
        'desc'   => 'Knee and hip replacement with modern implants and accelerated recovery protocols, planned around getting you moving again.',
    ],
    'arthritis' => [
        'group'  => 'joint',
        'lead'   => 'Arthritis',
        'accent' => 'Care',
        'desc'   => 'Staged treatment for a worn joint — injections, load management and physiotherapy first, with replacement held for when it is genuinely the right answer.',
    ],
    'knee-replacement' => [
        'group'  => 'joint',
        'lead'   => 'Knee',
        'accent' => 'Replacement',
        'desc'   => 'Total and partial knee replacement, sized and aligned to your own anatomy, with a rehabilitation plan written before the date is set.',
    ],
    'hip-replacement' => [
        'group'  => 'joint',
        'lead'   => 'Hip',
        'accent' => 'Replacement',
        'desc'   => 'Hip replacement through tissue-sparing approaches, aimed at early weight-bearing and a return to walking without a limp.',
    ],
    'shoulder-replacement' => [
        'group'  => 'joint',
        'lead'   => 'Shoulder',
        'accent' => 'Replacement',
        'desc'   => 'Anatomic and reverse shoulder replacement for arthritis and irreparable cuff damage, chosen on what the joint can still do.',
    ],
];

/*  THE PICTURE STRIP.

    Three images per treatment, shown between Principles and Values. This is
    the slot the hospital will fill with its own photographs of each
    procedure, so it is a per-treatment field, not a fixed block of markup:
    add 'gallery' => [ ['id' => <pexels id>, 'alt' => '...'], x3 ] to any
    entry above and that page uses its own set.

    Until a treatment has its own, it falls back to this default. Exactly
    THREE are rendered — the row is a fixed three-up and a fourth image would
    either wrap onto a line of its own or squeeze the three that matter, so
    the template takes the first three and ignores the rest rather than
    silently breaking the layout.

    When these become uploads, 'id' becomes a filename and tx_photo() below is
    the single place that has to change. */
$TREATMENT_GALLERY_DEFAULT = [
    ['id' => 6129444, 'alt' => 'A surgeon talking a patient through their imaging'],
    ['id' => 5793792, 'alt' => 'Post-operative movement work with a therapist'],
    ['id' => 6111589, 'alt' => 'Guided rehabilitation in the recovery gym'],
];

if (!function_exists('tx_photo')) {
    function tx_photo(int $id, int $w): string {
        return htmlspecialchars(
            sprintf(
                'https://images.pexels.com/photos/%d/pexels-photo-%d.jpeg?auto=compress&cs=tinysrgb&w=%d',
                $id, $id, $w
            ),
            ENT_QUOTES
        );
    }
}

/* Whitelist check. Anything unrecognised falls back rather than erroring —
   a stray link should land on a real page, not a blank one. */
$slug = strtolower(trim((string) ($_GET['slug'] ?? '')));
if (!isset($TREATMENTS[$slug])) {
    $slug = 'acl-reconstruction';
}

$t = $TREATMENTS[$slug];
$g = $TREATMENT_GROUPS[$t['group']];

$tx_gallery = array_slice($t['gallery'] ?? $TREATMENT_GALLERY_DEFAULT, 0, 3);

/* header.php reads these */
$current_slug = $slug;
$page_title   = $t['lead'] . ' ' . $t['accent'] . ' — Durva Hospital';
$page_desc    = $t['desc'];

include __DIR__ . '/include/header.php';
?>

  <main>
    <!-- Hero / Header Banner — driven by the resolved treatment -->
    <section class="about-hero" id="treatment-hero">
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
                <a class="about-breadcrumbs__link" href="<?= htmlspecialchars($g['anchor'], ENT_QUOTES) ?>"><?= htmlspecialchars($g['label'], ENT_QUOTES) ?></a>
              </li>
              <li class="about-breadcrumbs__sep" aria-hidden="true">/</li>
              <li class="about-breadcrumbs__item" aria-current="page">
                <span><?= htmlspecialchars($t['lead'] . ' ' . $t['accent'], ENT_QUOTES) ?></span>
              </li>
            </ol>
          </nav>
        </div>

        <!-- Right Bottom: Title and Paragraph -->
        <div class="about-hero__right">
          <h1 class="about-hero__title">
            <?= htmlspecialchars($t['lead'], ENT_QUOTES) ?> <span class="about-hero__accent"><?= htmlspecialchars($t['accent'], ENT_QUOTES) ?></span>
          </h1>
          <p class="about-hero__desc">
            <?= htmlspecialchars($t['desc'], ENT_QUOTES) ?>
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
          <a class="svc-btn svc-btn--solid" href="book-appointment.php">
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

    <!-- ================= Procedure Gallery (three-up) ================= -->
    <?php if (count($tx_gallery) === 3): ?>
    <section class="tx-gal" id="treatment-gallery" aria-labelledby="tx-gal-title">
      <div class="tx-gal__inner">

        <div class="tx-gal__head" data-tx-gal-head>
          <span class="tx-gal__eyebrow">
            <span class="tx-gal__mark" aria-hidden="true"></span>
            Inside the procedure
          </span>
          <h2 class="tx-gal__title" id="tx-gal-title">
            <?= htmlspecialchars($t['lead'] . ' ' . $t['accent'], ENT_QUOTES) ?>, in practice
          </h2>
        </div>

        <ul class="tx-gal__row" data-tx-gal-row>
          <?php foreach ($tx_gallery as $shot): ?>
            <li class="tx-gal__cell" data-tx-gal-item>
              <figure class="tx-gal__fig">
                <img class="tx-gal__img"
                     src="<?= tx_photo((int) $shot['id'], 1000) ?>"
                     alt="<?= htmlspecialchars($shot['alt'], ENT_QUOTES) ?>"
                     width="1000" height="750" loading="lazy" decoding="async">
                <?php if (!empty($shot['caption'])): ?>
                  <figcaption class="tx-gal__cap"><?= htmlspecialchars($shot['caption'], ENT_QUOTES) ?></figcaption>
                <?php endif; ?>
              </figure>
            </li>
          <?php endforeach; ?>
        </ul>

      </div>
    </section>
    <?php endif; ?>

    <!-- ================= Our Values Section (2x2 Grid with Accent Hero Card) ================= -->
    <section class="values-sec" id="values" aria-labelledby="values-title">

      <?php /* The ground is a real <img>, not a CSS background, so the
               browser can pick a size, defer it and decode it off the main
               thread the way it does for any other picture. alt is empty
               because it carries no information — it is wallpaper, and a
               screen reader announcing it would be noise. */ ?>
      <img class="values-sec__bg" aria-hidden="true" alt=""
           src="<?= tx_photo(8459996, 1600) ?>"
           width="1600" height="1067" loading="lazy" decoding="async">
      <span class="values-sec__scrim" aria-hidden="true"></span>

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
            <button class="impact-tab is-active" type="button" role="tab" aria-selected="true" data-tab-target="sports" onclick="switchImpactTab('sports', this)">Sports &amp; Athletics</button>
            <button class="impact-tab" type="button" role="tab" aria-selected="false" data-tab-target="mobility" onclick="switchImpactTab('mobility', this)">Daily Mobility</button>
            <button class="impact-tab" type="button" role="tab" aria-selected="false" data-tab-target="longevity" onclick="switchImpactTab('longevity', this)">Joint Longevity</button>
            <button class="impact-tab" type="button" role="tab" aria-selected="false" data-tab-target="work" onclick="switchImpactTab('work', this)">Work &amp; Activity</button>
          </div>
        </div>

        <!-- Panels Container -->
        <div class="impact-panels">

          <!-- Panel 1: Sports & Athletics (Active) -->
          <div class="impact-panel is-active" data-panel-id="sports">
            <div class="impact-cards">
              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Return to Sport</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">92% Return Rate</h3>
                  <p class="impact-card__desc">
                    Over 92% of competitive and recreational athletes achieve full return to sport following anatomical graft reconstruction.
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

              <article class="impact-card impact-card--featured">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Pivot Stability</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Zero Rotational Laxity</h3>
                  <p class="impact-card__desc">
                    Anatomical tunnel placement eliminates pivot-shift instability, restoring complete cutting and deceleration confidence.
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

              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Peak Performance</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Quadriceps Strength</h3>
                  <p class="impact-card__desc">
                    Accelerated isometric and kinetic rehab protocols restore symmetrical limb strength within 6 to 9 months.
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

              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Injury Prevention</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Graft Maturation</h3>
                  <p class="impact-card__desc">
                    High-tensile autografts and modern fixation provide strong early biological integration and lower re-tear rates.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>International Arthroscopy Review, 2024</span>
                </div>
              </article>
            </div>
          </div>

          <!-- Panel 2: Daily Mobility -->
          <div class="impact-panel" data-panel-id="mobility">
            <div class="impact-cards">
              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Day One</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Early Weight Bearing</h3>
                  <p class="impact-card__desc">
                    Modern arthroscopic techniques allow full-extension assisted walking within 24 to 48 hours post-surgery.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Orthopaedic Rehabilitation Guidelines</span>
                </div>
              </article>

              <article class="impact-card impact-card--featured">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Range of Motion</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">0° to 130° Flexion</h3>
                  <p class="impact-card__desc">
                    Targeted manual therapy and continuous motion protocols restore normal knee bending without scar stiffness.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Durva Clinical Mobility Protocol</span>
                </div>
              </article>

              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Daily Confidence</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Stairs &amp; Slopes</h3>
                  <p class="impact-card__desc">
                    Eliminates the sensation of the knee giving way when navigating stairs, uneven pavements, and sudden steps.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Patient Physical Recovery Index</span>
                </div>
              </article>

              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Swelling Control</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Minimal Effusion</h3>
                  <p class="impact-card__desc">
                    Cryotherapy and precise keyhole instrumentation minimize post-operative joint effusion and pain medication needs.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Journal of Arthroscopic Surgery</span>
                </div>
              </article>
            </div>
          </div>

          <!-- Panel 3: Joint Longevity -->
          <div class="impact-panel" data-panel-id="longevity">
            <div class="impact-cards">
              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Cartilage Defense</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">85% Arthritis Reduction</h3>
                  <p class="impact-card__desc">
                    Restoring mechanical alignment dramatically slows articular cartilage wear and prevents secondary joint breakdown.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Osteoarthritis &amp; Joint Longevity Study</span>
                </div>
              </article>

              <article class="impact-card impact-card--featured">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Meniscus Health</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Meniscal Preservation</h3>
                  <p class="impact-card__desc">
                    Simultaneous arthroscopic meniscus repair saves native shock absorption, protecting joint health for decades.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Durva Long-Term Joint Registry</span>
                </div>
              </article>

              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Natural Kinematics</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Symmetrical Loading</h3>
                  <p class="impact-card__desc">
                    Corrects asymmetric gait mechanics, preventing compensation strain on the contralateral knee and lower back.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>International Biomechanics Report</span>
                </div>
              </article>

              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Bone Quality</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Subchondral Integrity</h3>
                  <p class="impact-card__desc">
                    Normal load distribution preserves bone density and prevents premature degenerative joint wear.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Global Orthopaedic Kinematics, 2025</span>
                </div>
              </article>
            </div>
          </div>

          <!-- Panel 4: Work & Activity -->
          <div class="impact-panel" data-panel-id="work">
            <div class="impact-cards">
              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Desk &amp; Office</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Return in 7–10 Days</h3>
                  <p class="impact-card__desc">
                    Patients with sedentary or desk-based roles comfortably resume full professional work within 1 to 2 weeks.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Occupational Health &amp; Orthopaedics</span>
                </div>
              </article>

              <article class="impact-card impact-card--featured">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Active Careers</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Heavy Duty Capacity</h3>
                  <p class="impact-card__desc">
                    Engineered strength protocols enable manual workers, police, and field professionals to safely resume full physical duties.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Durva Occupational Recovery Registry</span>
                </div>
              </article>

              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Driving &amp; Commute</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Braking Reflex Return</h3>
                  <p class="impact-card__desc">
                    Emergency braking reaction time and right-leg pedal control return fully by 4 to 6 weeks post-procedure.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Driving Safety &amp; Orthopaedic Standards</span>
                </div>
              </article>

              <article class="impact-card">
                <div class="impact-card__top">
                  <span class="impact-card__tag">Travel &amp; Lifestyle</span>
                </div>
                <div class="impact-card__body">
                  <h3 class="impact-card__title">Unrestricted Living</h3>
                  <p class="impact-card__desc">
                    Full freedom to travel, trek, cycle, and enjoy family activities without fear of joint swelling or buckling.
                  </p>
                </div>
                <div class="impact-card__citation">
                  <svg class="impact-card__citation-icon" viewBox="0 0 16 16" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true">
                    <path d="M9 2H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V6L9 2Z"/>
                    <path d="M9 2v4h4"/>
                  </svg>
                  <span>Quality of Life Outcomes Journal</span>
                </div>
              </article>
            </div>
          </div>

        </div>

      </div>
    </section>

    <!-- ================= Doctor CTA ================= -->
    <section class="dcta" id="acl-specialist" aria-labelledby="dcta-title">
      <div class="dcta__inner" data-dcta>

        <div class="dcta__body">

          <p class="dcta__eyebrow" data-dcta-item>
            <span class="dcta__eyebrow-rule" aria-hidden="true"></span>
            Your ACL Specialist
          </p>

          <h2 class="dcta__title" id="dcta-title" data-dcta-item>
            Detailed evaluation.<br>
            <em class="dcta__title-em">Individual surgical planning.</em>
          </h2>

          <p class="dcta__lead" data-dcta-item>
            Dr. Hitesh Mangal is an orthopaedic surgeon in Kota with a clinical
            focus on arthroscopy, sports injuries and joint replacement — ACL and
            PCL injuries, meniscus and cartilage damage, and complex knee and
            shoulder sports injuries.
          </p>

          <ul class="dcta__list" data-dcta-item>
            <li class="dcta__item">MBBS and MS in Orthopaedics</li>
            <li class="dcta__item">Fellowship training in arthroscopy, sports injury and joint replacement</li>
            <li class="dcta__item">Management of associated meniscus and cartilage injuries</li>
            <li class="dcta__item">Structured rehabilitation and follow-up</li>
          </ul>

          <div class="dcta__actions" data-dcta-item>
            <a class="dcta__cta" href="index.php#doctors">
              View doctor profile
              <svg viewBox="0 0 14 14" fill="none" aria-hidden="true"><path d="M3 11 11 3M5 3h6v6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </a>
            <a class="dcta__tel" href="tel:+917014584948">
              <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M5.6 2.7 7 5.4 5.6 6.9c.5 1.4 2.1 3 3.5 3.5l1.5-1.4 2.7 1.4-.3 2.2c-.1.6-.6 1-1.2 1C7.4 13.5 2.5 8.6 2.4 3.2c0-.6.4-1.1 1-1.2l2.2-.3Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
              +91 70145 84948
            </a>
          </div>

        </div>

        <figure class="dcta__figure" data-dcta-figure>
          <span class="dcta__ring" aria-hidden="true"></span>
          <span class="dcta__arch">
            <img class="dcta__img" src="assets/images/doctor.jpg"
                 alt="Dr. Hitesh Mangal, orthopaedic surgeon"
                 width="683" height="1024" loading="lazy" decoding="async">
          </span>
          <figcaption class="dcta__caption">
            <span class="dcta__caption-name">Dr. Hitesh Mangal</span>
            <span class="dcta__caption-role">Knee &amp; Shoulder Specialist</span>
          </figcaption>
        </figure>

      </div>
    </section>

    <!-- ================= Scope / Let's talk ================= -->
    <section class="duo" id="scope" aria-labelledby="duo-title">
      <div class="duo__grid">

        <!-- ---------- left: the light panel ---------- -->
        <article class="duo__panel duo__panel--light" data-duo-item>
          <svg class="duo__art" viewBox="0 0 320 320" fill="none" aria-hidden="true">
            <g stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 250 160 110l140 140"/>
              <path d="M20 300 160 160l140 140"/>
              <path d="M20 200 160 60l140 140"/>
              <path d="M20 150 160 10l140 140"/>
              <path d="M20 100 160-40l140 140"/>
            </g>
          </svg>

          <h2 class="duo__title" id="duo-title">
            The care we<br>provide<span class="duo__star" aria-hidden="true">*</span>
          </h2>

          <div class="duo__copy">
            <p>
              A torn ACL is rarely just a torn ACL. Meniscus tears, cartilage
              damage and collateral ligament injury often travel with it, and
              each one changes what the operation actually has to do.
            </p>
            <p>
              So every knee is assessed on its own — examination, imaging, and
              what you need the joint to do afterwards — before a graft choice
              or a date is set. The rehabilitation plan is written at the same
              time, not handed over once the surgery is done.
            </p>
          </div>
        </article>

        <!-- ---------- right: the dark panel ---------- -->
        <!-- same composition as the light panel, inverted: cropped line-art,
             heading at the top, content pushed to the floor -->
        <article class="duo__panel duo__panel--dark" data-duo-item>
          <svg class="duo__art duo__art--dark" viewBox="0 0 320 320" fill="none" aria-hidden="true">
            <g stroke="currentColor" stroke-width="1.25" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 250 160 110l140 140"/>
              <path d="M20 300 160 160l140 140"/>
              <path d="M20 200 160 60l140 140"/>
              <path d="M20 150 160 10l140 140"/>
              <path d="M20 100 160-40l140 140"/>
            </g>
          </svg>

          <h2 class="duo__title duo__title--light">Let&rsquo;s talk!</h2>

          <div class="duo__copy duo__copy--light">
            <p>
              Bring the scan, the diagnosis, or just a knee that keeps giving
              way. A consultation takes an hour and tells you something worth
              knowing either way — including whether surgery is the right
              answer at all.
            </p>
            <p class="duo__copy-quiet">
              Knee &amp; shoulder arthroscopy &middot; ACL and PCL reconstruction &middot;
              meniscus and cartilage repair &middot; joint replacement &middot; sports
              injury rehabilitation.
            </p>

            <a class="duo__action" href="tel:+917014584948">
              <svg viewBox="0 0 16 16" fill="none" aria-hidden="true"><path d="M5.6 2.7 7 5.4 5.6 6.9c.5 1.4 2.1 3 3.5 3.5l1.5-1.4 2.7 1.4-.3 2.2c-.1.6-.6 1-1.2 1C7.4 13.5 2.5 8.6 2.4 3.2c0-.6.4-1.1 1-1.2l2.2-.3Z" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/></svg>
              Call +91 70145 84948
            </a>
          </div>
        </article>

      </div>
    </section>

    <!-- ================= FAQ ================= -->
    <!--
      CLINICAL CONTENT: the five answers below are written in general terms
      and defer to consultation throughout. Have the surgeons read them before
      this goes live — timelines in particular vary by patient.
    -->
    <?php
      $acl_faqs = [
        [
          'q' => 'How long does an ACL reconstruction take?',
          'a' => [
            'The procedure itself usually takes between one and two hours, and it is done arthroscopically through small incisions rather than as open surgery.',
            'Most patients are admitted and discharged within the same day or the following morning, depending on anaesthetic recovery and any associated meniscus or cartilage work carried out at the same time.',
          ],
        ],
        [
          'q' => 'When will I be able to walk again?',
          'a' => [
            'Most patients are up and moving with support on the same day, and walking without crutches within two to three weeks.',
            'Early movement is deliberate, not a shortcut — controlled loading protects the graft and keeps the knee from stiffening. Your own timeline is set at each follow-up rather than in advance.',
          ],
        ],
        [
          'q' => 'Does every ACL tear need surgery?',
          'a' => [
            'No. Some partial tears and some lower-demand lifestyles do well with a structured rehabilitation programme and no operation at all.',
            'Reconstruction is usually recommended where the knee gives way during daily activity, where there is an associated meniscus or cartilage injury, or where you intend to return to pivoting sport. That decision is made after examination and imaging, not from a scan alone.',
          ],
        ],
        [
          'q' => 'How long before I can return to sport?',
          'a' => [
            'Return to pivoting sport is typically somewhere between nine and twelve months, and it is decided by testing rather than by the calendar.',
            'Strength symmetry, hop testing and movement quality all have to reach target before clearance. Returning on a date instead of on readiness is the single largest risk factor for a re-tear.',
          ],
        ],
        [
          'q' => 'What does the rehabilitation programme involve?',
          'a' => [
            'Rehabilitation runs in phases: protecting the graft and restoring full extension first, then strength, then landing mechanics and change of direction.',
            'You are reviewed throughout rather than handed a sheet at discharge, and the programme is adjusted to how the knee is actually responding.',
          ],
        ],
      ];
    ?>

    <section class="faq" id="faq" aria-labelledby="faq-title">
      <div class="faq__inner">

        <p class="faq__badge" data-faq-item>
          <span class="faq__badge-num"><?= str_pad((string) count($acl_faqs), 3, '0', STR_PAD_LEFT) ?></span>
          <span class="faq__badge-dot" aria-hidden="true"></span>
          FAQs
        </p>

        <h2 class="faq__title" id="faq-title" data-faq-item>
          Common <em class="faq__title-em">Questions</em>
        </h2>

        <ul class="faq__list" data-faq>
          <?php foreach ($acl_faqs as $i => $faq): $n = $i + 1; ?>
            <li class="faq__item" data-faq-item>
              <h3 class="faq__heading">
                <button class="faq__trigger" type="button"
                        id="faq-btn-<?= $n ?>" aria-controls="faq-panel-<?= $n ?>"
                        aria-expanded="false" data-faq-trigger>
                  <span class="faq__num" aria-hidden="true"><?= $n ?></span>
                  <span class="faq__label"><?= htmlspecialchars($faq['q'], ENT_QUOTES) ?></span>
                  <span class="faq__icon" aria-hidden="true">
                    <svg viewBox="0 0 14 14" fill="none">
                      <path d="M7 1.75v10.5M1.75 7h10.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
                    </svg>
                  </span>
                </button>
              </h3>

              <div class="faq__panel" id="faq-panel-<?= $n ?>" role="region"
                   aria-labelledby="faq-btn-<?= $n ?>" data-faq-panel>
                <div class="faq__panel-inner">
                  <div class="faq__answer">
                    <?php foreach ($faq['a'] as $para): ?>
                      <p><?= htmlspecialchars($para, ENT_QUOTES) ?></p>
                    <?php endforeach; ?>
                  </div>
                </div>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="faq__foot" data-faq-item>
          <span class="faq__foot-text">Have any other questions?</span>
          <a class="faq__contact" href="tel:+917014584948">
            Talk to us
            <span class="faq__contact-arrow" aria-hidden="true">
              <svg viewBox="0 0 12 12" fill="none">
                <path d="M3.25 8.75 8.75 3.25M4.5 3.25h4.25V7.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </a>
        </div>

      </div>
    </section>

    <script>
      function switchImpactTab(targetId, btn) {
        var impactSec = document.querySelector('.impact-sec');
        if (!impactSec) return;

        var tabs = impactSec.querySelectorAll('[data-tab-target]');
        var panels = impactSec.querySelectorAll('[data-panel-id]');

        tabs.forEach(function (t) {
          t.classList.remove('is-active');
          t.setAttribute('aria-selected', 'false');
        });

        if (btn) {
          btn.classList.add('is-active');
          btn.setAttribute('aria-selected', 'true');
        }

        panels.forEach(function (panel) {
          if (panel.getAttribute('data-panel-id') === targetId) {
            panel.classList.add('is-active');
            panel.style.display = 'block';
            var cards = panel.querySelectorAll('.impact-card');
            if (window.gsap) {
              gsap.fromTo(cards,
                { opacity: 0, y: 15 },
                { opacity: 1, y: 0, duration: 0.4, stagger: 0.06, ease: 'power2.out', clearProps: 'transform,opacity' }
              );
            }
          } else {
            panel.classList.remove('is-active');
            panel.style.display = 'none';
          }
        });
      }
    </script>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
