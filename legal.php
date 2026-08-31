<?php
/*
  legal.php — one template for the three policy documents.

  URL:  legal.php?doc=privacy | terms | patient-rights

  Same routing as treatment.php and blog-detail.php: the slug is whitelisted
  against the data source before use, so it can only ever be an array key.
  Three documents that share a layout do not need three files.
*/
require_once __DIR__ . '/include/legal-data.php';

$doc_slug = strtolower(trim((string) ($_GET['doc'] ?? '')));
$doc      = legal_find($doc_slug);

/* an unknown slug lands on the privacy policy rather than a blank page */
if ($doc === null) {
    $all      = legal_all();
    $doc_slug = (string) array_key_first($all);
    $doc      = $all[$doc_slug];
}

$siblings = legal_siblings($doc_slug);
$updated  = date('j F Y', strtotime($doc['updated_at']));

/* read by include/header.php */
$page_title = $doc['title'] . ' — Durva Hospital';
$page_desc  = $doc['summary'];

include __DIR__ . '/include/header.php';
?>

  <main>

    <!-- ================= Banner ================= -->
    <section class="lg-hero" aria-labelledby="lg-title">
      <div class="lg-hero__inner">

        <nav class="lg-hero__crumbs" aria-label="Breadcrumb" data-lg-item>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li aria-hidden="true">/</li>
            <li aria-current="page"><span><?= htmlspecialchars($doc['title'], ENT_QUOTES) ?></span></li>
          </ol>
        </nav>

        <p class="lg-hero__kicker" data-lg-item><?= htmlspecialchars($doc['kicker'], ENT_QUOTES) ?></p>

        <h1 class="lg-hero__title" id="lg-title" data-lg-item>
          <?= htmlspecialchars($doc['title'], ENT_QUOTES) ?>
        </h1>

        <p class="lg-hero__summary" data-lg-item><?= htmlspecialchars($doc['summary'], ENT_QUOTES) ?></p>

        <p class="lg-hero__stamp" data-lg-item>
          Last updated
          <time datetime="<?= htmlspecialchars($doc['updated_at'], ENT_QUOTES) ?>"><?= $updated ?></time>
        </p>

      </div>
    </section>

    <!-- ================= Document ================= -->
    <div class="lg">
      <div class="lg__inner">

        <!-- ---------- contents rail ----------
             Left, not right: this is a document you read down, and the list of
             what is in it belongs where the eye starts rather than out on the
             far side of the text. -->
        <aside class="lg__side" aria-label="On this page">
          <nav class="lg__sticky" data-lg-toc>
            <h2 class="lg-toc__title">On this page</h2>
            <ol class="lg-toc">
              <?php foreach ($doc['sections'] as $i => $s): ?>
                <li>
                  <a class="lg-toc__link" href="#s-<?= $i + 1 ?>" data-lg-toc-link>
                    <span class="lg-toc__num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
                    <span class="lg-toc__label"><?= htmlspecialchars($s['heading'], ENT_QUOTES) ?></span>
                  </a>
                </li>
              <?php endforeach; ?>
            </ol>
          </nav>
        </aside>

        <!-- ---------- the document ---------- -->
        <article class="lg__main">

          <?php foreach ($doc['sections'] as $i => $s): ?>
            <section class="lg-sec" id="s-<?= $i + 1 ?>" data-lg-sec aria-labelledby="h-<?= $i + 1 ?>">
              <p class="lg-sec__num" aria-hidden="true"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></p>
              <h2 class="lg-sec__title" id="h-<?= $i + 1 ?>"><?= htmlspecialchars($s['heading'], ENT_QUOTES) ?></h2>

              <div class="lg-sec__body">
                <?php foreach ($s['blocks'] as [$type, $value]): ?>
                  <?php if ($type === 'list'): ?>
                    <ul class="lg-list">
                      <?php foreach ($value as $li): ?>
                        <li><?= htmlspecialchars($li, ENT_QUOTES) ?></li>
                      <?php endforeach; ?>
                    </ul>
                  <?php elseif ($type === 'note'): ?>
                    <p class="lg-note"><?= htmlspecialchars($value, ENT_QUOTES) ?></p>
                  <?php else: ?>
                    <p><?= htmlspecialchars($value, ENT_QUOTES) ?></p>
                  <?php endif; ?>
                <?php endforeach; ?>
              </div>
            </section>
          <?php endforeach; ?>

          <!-- ---------- close ---------- -->
          <section class="lg-end">
            <h2 class="lg-end__title">Questions about this?</h2>
            <p class="lg-end__text">
              Ask us directly rather than guessing &mdash; we would far rather
              answer the question than have you assume the answer.
            </p>
            <div class="lg-end__row">
              <a class="lg-end__cta" href="tel:+917014584948">
                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M5.6 2.7 7 5.4 5.6 6.9c.5 1.4 2.1 3 3.5 3.5l1.5-1.4 2.7 1.4-.3 2.2c-.1.6-.6 1-1.2 1C7.4 13.5 2.5 8.6 2.4 3.2c0-.6.4-1.1 1-1.2l2.2-.3Z"
                        stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"/>
                </svg>
                +91 70145 84948
              </a>
              <a class="lg-end__link" href="book-appointment.php">Book an appointment</a>
            </div>
          </section>

          <!-- ---------- the other two documents ---------- -->
          <nav class="lg-more" aria-label="Other policies">
            <?php foreach ($siblings as $sSlug => $s): ?>
              <a class="lg-more__card" href="legal.php?doc=<?= rawurlencode($sSlug) ?>">
                <span class="lg-more__label"><?= htmlspecialchars($s['title'], ENT_QUOTES) ?></span>
                <span class="lg-more__kicker"><?= htmlspecialchars($s['kicker'], ENT_QUOTES) ?></span>
                <svg class="lg-more__arrow" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M3 8h9.5M8.5 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </a>
            <?php endforeach; ?>
          </nav>

        </article>

      </div>
    </div>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
