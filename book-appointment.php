<?php
/*
  book-appointment.php — appointment request page.

  Banner only for now; the form and everything under it come next.

  $page_title / $page_desc are read by include/header.php, the same hooks
  treatment.php uses.
*/
$page_title = 'Book an Appointment — Durva Hospital';
$page_desc  = 'Request an appointment with Durva Hospital. Knee and shoulder arthroscopy, joint replacement, sports injury and rehabilitation.';

include __DIR__ . '/include/header.php';
?>

  <main>

    <!-- ================= Banner ================= -->
    <section class="about-hero" id="appointment-hero">
      <div class="about-hero__media" aria-hidden="true">
        <img class="about-hero__bg-img"
             src="https://images.pexels.com/photos/8459996/pexels-photo-8459996.jpeg?auto=compress&amp;cs=tinysrgb&amp;w=2000"
             alt="" loading="eager" decoding="async">
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
                <span>Book Appointment</span>
              </li>
            </ol>
          </nav>
        </div>

        <!-- Right Bottom: Title and Paragraph -->
        <div class="about-hero__right">
          <h1 class="about-hero__title">
            Book an <span class="about-hero__accent">Appointment</span>
          </h1>
          <p class="about-hero__desc">
            Tell us what is going on with the joint and when you are free. We will
            confirm a time with the right specialist &mdash; no referral needed.
          </p>
        </div>
      </div>
    </section>

    <!-- ================= Appointment form ================= -->
    <!--
      NOT WIRED UP. The form posts to this page and nothing reads it — there
      is deliberately no success message, because telling a patient their
      request was received when nothing recorded it is worse than no form.
      Add the handler where marked at the top of this file.
    -->
    <section class="appt" id="appointment" aria-labelledby="appt-title">
      <div class="appt__inner">

        <header class="appt__head">
          <div>
            <p class="appt__eyebrow" data-appt-item>
              <span class="appt__eyebrow-rule" aria-hidden="true"></span>
              Appointments
            </p>
            <h2 class="appt__title" id="appt-title" data-appt-item>
              Request <em class="appt__title-em">a time</em>
            </h2>
          </div>

          <p class="appt__intro" data-appt-item>
            Tell us what is going on with the joint and when you are free. We
            will call you back to confirm a slot with the right specialist.
          </p>
        </header>

        <div class="appt__body">

          <!-- ---------- left: the details ---------- -->
          <aside class="appt__aside" data-appt-item>
            <div class="appt__block">
              <h3 class="appt__block-title">Where we are</h3>
              <address class="appt__block-text">
                Plot Number 3&amp;4, Allied Ample City,<br>
                80 Feet Link Rd, Borkhera,<br>
                Kota, Rajasthan 324001
              </address>
            </div>

            <div class="appt__block">
              <h3 class="appt__block-title">OPD hours</h3>
              <p class="appt__block-text">
                Monday &ndash; Saturday<br>
                10:00 am &ndash; 7:00 pm
              </p>
            </div>

            <div class="appt__block">
              <h3 class="appt__block-title">Or reach us directly</h3>
              <p class="appt__block-text">
                <a class="appt__link" href="tel:+917014584948">+91 70145 84948</a><br>
                <a class="appt__link" href="mailto:durvahospitalkota@gmail.com">durvahospitalkota@gmail.com</a>
              </p>
            </div>
          </aside>

          <!-- ---------- right: the form ---------- -->
          <form class="appt__form" method="post" action="book-appointment.php" data-appt-item>

            <div class="appt__row">
              <p class="appt__field">
                <label class="appt__label" for="appt-name">Your name</label>
                <input class="appt__input" id="appt-name" name="name" type="text"
                       autocomplete="name" required>
              </p>

              <p class="appt__field">
                <label class="appt__label" for="appt-phone">Phone number</label>
                <input class="appt__input" id="appt-phone" name="phone" type="tel"
                       inputmode="tel" autocomplete="tel" required>
              </p>
            </div>

            <div class="appt__row">
              <p class="appt__field">
                <label class="appt__label" for="appt-email">Email <span class="appt__opt">(optional)</span></label>
                <input class="appt__input" id="appt-email" name="email" type="email"
                       autocomplete="email">
              </p>

              <p class="appt__field">
                <label class="appt__label" for="appt-age">Patient age <span class="appt__opt">(optional)</span></label>
                <input class="appt__input" id="appt-age" name="age" type="number"
                       inputmode="numeric" min="0" max="120">
              </p>
            </div>

            <div class="appt__row">
              <?php /* a DIV, not a P: a <p> cannot contain a <ul>, and the
                       parser silently closes the paragraph at the list, which
                       leaves the listbox outside the component root */ ?>
              <div class="appt__field appt__field--dd" data-dd>
                <span class="appt__label" id="dd-label">What is it about?</span>

                <?php /* the real value the form posts; the listbox below is the UI */ ?>
                <input type="hidden" name="concern" data-dd-value>

                <button class="appt__dd-btn" type="button" id="dd-btn"
                        role="combobox" aria-haspopup="listbox" aria-expanded="false"
                        aria-controls="dd-list" aria-labelledby="dd-label dd-btn"
                        data-dd-btn>
                  <span class="appt__dd-text" data-dd-text>Choose one</span>
                  <svg class="appt__dd-caret" viewBox="0 0 10 6" fill="none" aria-hidden="true">
                    <path d="m1 1 4 4 4-4" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>

                <ul class="appt__dd-list" id="dd-list" role="listbox"
                    aria-labelledby="dd-label" tabindex="-1" data-dd-list hidden>
                    <li class="appt__dd-opt" role="option" id="dd-opt-0" data-value="not-sure" aria-selected="false">Not sure yet — need advice</li>
                    <li class="appt__dd-group" role="presentation">Knee</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-1" data-value="acl-reconstruction" aria-selected="false">ACL Reconstruction</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-2" data-value="acl-avulsion" aria-selected="false">ACL Avulsion</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-3" data-value="mcl-tear" aria-selected="false">MCL Tear</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-4" data-value="pcl-reconstruction" aria-selected="false">PCL Reconstruction</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-5" data-value="meniscus-tears" aria-selected="false">Meniscus Tears</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-6" data-value="synovitis" aria-selected="false">Synovitis</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-7" data-value="patella-dislocation" aria-selected="false">Patella Dislocation</li>
                    <li class="appt__dd-group" role="presentation">Shoulder</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-8" data-value="frozen-shoulder" aria-selected="false">Frozen Shoulder</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-9" data-value="rotator-cuff" aria-selected="false">Rotator Cuff</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-10" data-value="ac-joint-dislocation" aria-selected="false">AC Joint Dislocation</li>
                    <li class="appt__dd-group" role="presentation">Other</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-11" data-value="joint-replacement" aria-selected="false">Joint Replacement</li>
                    <li class="appt__dd-opt" role="option" id="dd-opt-12" data-value="other" aria-selected="false">Something else</li>
                </ul>
              </div>

              <p class="appt__field">
                <label class="appt__label" for="appt-date">Preferred day</label>
                <input class="appt__input" id="appt-date" name="date" type="date">
              </p>
            </div>

            <p class="appt__field appt__field--wide">
              <label class="appt__label" for="appt-message">Tell us a little more</label>
              <textarea class="appt__input appt__textarea" id="appt-message" name="message"
                        rows="3" placeholder="When did it start, what makes it worse, any scans already done."></textarea>
            </p>

            <div class="appt__actions">
              <button class="appt__submit" type="submit">
                Request appointment
                <svg viewBox="0 0 14 14" fill="none" aria-hidden="true">
                  <path d="M2.5 7h9M8 3.5 11.5 7 8 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
              <p class="appt__note">
                We reply within one working day. For anything urgent, please call.
              </p>
            </div>

          </form>
        </div>
      </div>
    </section>

    <!-- ================= FAQ ================= -->
    <?php
      $appt_faqs = [
        [
          'q' => 'Do I need a referral to book?',
          'a' => [
            'No. You can book directly, and most of our patients do.',
            'If you already have a referral letter or a report from another doctor, bring it — it saves repeating investigations that have already been done.',
          ],
        ],
        [
          'q' => 'What should I bring to the first visit?',
          'a' => [
            'Any imaging you already have — X-rays, MRI films or discs, and the written reports that go with them.',
            'A list of the medicines you take, and anything you have already tried for the problem: braces, physiotherapy, injections.',
          ],
        ],
        [
          'q' => 'How soon can I be seen?',
          'a' => [
            'We will call you back within one working day of receiving this form to agree a slot.',
            'If the joint has locked, given way badly, or you cannot bear weight on it, please call rather than waiting on the form.',
          ],
        ],
        [
          'q' => 'Will I need surgery?',
          'a' => [
            'Often not. A large part of what we see is managed with rehabilitation, bracing or an injection.',
            'The first appointment is an assessment, not a booking for an operation. If surgery is the right answer you will be told why, and what happens if you choose not to have it.',
          ],
        ],
        [
          'q' => 'Do you handle insurance and cashless claims?',
          'a' => [
            'Yes. Bring your policy details and ID to the appointment and our front desk will start the paperwork.',
            'Approval timelines are set by the insurer, so it is worth beginning the process as early as you can.',
          ],
        ],
      ];
    ?>

    <section class="faq" id="faq" aria-labelledby="faq-title">
      <div class="faq__inner">

        <p class="faq__badge" data-faq-item>
          <span class="faq__badge-num"><?= str_pad((string) count($appt_faqs), 3, '0', STR_PAD_LEFT) ?></span>
          <span class="faq__badge-dot" aria-hidden="true"></span>
          FAQs
        </p>

        <h2 class="faq__title" id="faq-title" data-faq-item>
          Before you <em class="faq__title-em">book</em>
        </h2>

        <ul class="faq__list" data-faq>
          <?php foreach ($appt_faqs as $i => $faq): $n = $i + 1; ?>
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
          <span class="faq__foot-text">Rather just speak to someone?</span>
          <a class="faq__contact" href="tel:+917014584948">
            Call the clinic
            <span class="faq__contact-arrow" aria-hidden="true">
              <svg viewBox="0 0 12 12" fill="none">
                <path d="M3.25 8.75 8.75 3.25M4.5 3.25h4.25V7.5" stroke="currentColor" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </span>
          </a>
        </div>

      </div>
    </section>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
