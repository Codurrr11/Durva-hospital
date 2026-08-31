<?php
/*
  gallery.php — photo and video gallery.

  MEDIA: the stills are stock stand-ins and both video cards point at the same
  Pexels clip, because it is the only remote video URL that resolves. Swap
  $GALLERY for the clinic's own media — the layout reads `span` off each item,
  so changing the mix is a data edit, not a CSS one.

  Video is NOT loaded with the page. A card shows its poster and the <video>
  element is only built when the lightbox opens it, so the clip costs nothing
  until someone asks for it.
*/
$page_title = 'Gallery — Durva Hospital';
$page_desc  = 'Inside Durva Hospital: theatre, rehabilitation and the day-to-day of orthopaedic care in Kota.';

include __DIR__ . '/include/header.php';

$img = 'https://images.pexels.com/photos/%d/pexels-photo-%d.jpeg?auto=compress&cs=tinysrgb&w=%d';

/*  THE PATTERN, repeating every five items:

        row A   [ ---- wide (4) ---- ][ narrow (2) ]
        row B   [ (2) ][ (2) ][ (2) ]

    Ten items is exactly two full cycles. That number matters — a leftover
    item would sit alone on a half-empty row and break the rhythm the pattern
    exists to create. Add to this list in FIVES, keeping the 4,2,2,2,2 order.

    No card spans two rows: in the reference every tile in a row shares one
    height and only the WIDTH varies, which is what makes the wide ones read
    as landscape and the narrow ones as portrait off a single row track.   */
$GALLERY = [
    // ---- cycle 1 ----
    // NOT 3376790 — that frame shows an open surgical site. Nothing in a
    // public gallery should need a content warning.
    ['type' => 'image', 'id' => 2324837, 'span' => 4, 'alt' => 'The surgical team at work in theatre'],
    ['type' => 'image', 'id' => 5793695, 'span' => 2, 'alt' => 'A physiotherapy session'],
    ['type' => 'image', 'id' => 7108344, 'span' => 2, 'alt' => 'A consultation in progress'],
    ['type' => 'video', 'id' => 6129197, 'span' => 2, 'alt' => 'Reviewing imaging before a procedure',
     'src' => 'https://videos.pexels.com/video-files/7584467/7584467-uhd_2732_1440_25fps.mp4'],
    ['type' => 'image', 'id' => 8459996, 'span' => 2, 'alt' => 'The waiting area'],

    // ---- cycle 2 ----
    ['type' => 'video', 'id' => 6129444, 'span' => 4, 'alt' => 'Talking a patient through their knee imaging',
     'src' => 'https://videos.pexels.com/video-files/7584467/7584467-uhd_2732_1440_25fps.mp4'],
    ['type' => 'image', 'id' => 6111589, 'span' => 2, 'alt' => 'Guided rehabilitation exercise'],
    ['type' => 'image', 'id' => 5793792, 'span' => 2, 'alt' => 'Post-operative stretching with a therapist'],
    ['type' => 'image', 'id' => 7579831, 'span' => 2, 'alt' => 'A follow-up appointment'],
    ['type' => 'image', 'id' => 4266944, 'span' => 2, 'alt' => 'Discussing treatment options'],
];
?>

  <main>

    <!-- ================= Banner ================= -->
    <!-- No photograph here on purpose: the gallery underneath is entirely
         pictures, so a picture in the banner competes with it. Type only. -->
    <section class="gal-hero" aria-labelledby="gal-title">
      <div class="gal-hero__inner">
        <nav class="gal-hero__crumbs" aria-label="Breadcrumb">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li aria-hidden="true">/</li>
            <li aria-current="page"><span>Gallery</span></li>
          </ol>
        </nav>

        <div class="gal-hero__row">
          <h1 class="gal-hero__title" id="gal-title">
            Photo <em class="gal-hero__em">&amp; Video</em><br>Gallery
          </h1>
          <p class="gal-hero__lead">
            Inside the hospital &mdash; theatre, rehabilitation, and the
            day-to-day of orthopaedic care in Kota.
          </p>
        </div>

        <p class="gal-hero__count">
          <span><?= count($GALLERY) ?></span> items
        </p>
      </div>
    </section>

    <!-- ================= Grid ================= -->
    <section class="gal" aria-label="Gallery">
      <ul class="gal__grid" data-gal>
        <?php foreach ($GALLERY as $i => $item):
            $isVideo = $item['type'] === 'video';
            $thumb   = sprintf($img, $item['id'], $item['id'], 1000);
            $full    = sprintf($img, $item['id'], $item['id'], 1800);
        ?>
          <li class="gal__cell gal__cell--s<?= (int) $item['span'] ?>">
            <button class="gal__card" type="button"
                    data-gal-item
                    data-index="<?= $i ?>"
                    data-type="<?= $isVideo ? 'video' : 'image' ?>"
                    data-full="<?= $isVideo ? htmlspecialchars($item['src'], ENT_QUOTES) : htmlspecialchars($full, ENT_QUOTES) ?>"
                    data-poster="<?= htmlspecialchars($full, ENT_QUOTES) ?>"
                    data-caption="<?= htmlspecialchars($item['alt'], ENT_QUOTES) ?>">
              <img class="gal__img" src="<?= htmlspecialchars($thumb, ENT_QUOTES) ?>"
                   alt="<?= htmlspecialchars($item['alt'], ENT_QUOTES) ?>"
                   loading="lazy" decoding="async" draggable="false">

              <?php if ($isVideo): ?>
                <span class="gal__play" aria-hidden="true">
                  <svg viewBox="0 0 12 14" fill="currentColor"><path d="M0 0v14l12-7z"/></svg>
                </span>
              <?php endif; ?>

              <span class="gal__veil" aria-hidden="true"></span>
              <span class="gal__cap"><?= htmlspecialchars($item['alt'], ENT_QUOTES) ?></span>
              <span class="u-visually-hidden"><?= $isVideo ? 'Play video' : 'Open image' ?></span>
            </button>
          </li>
        <?php endforeach; ?>
      </ul>
    </section>

    <!-- ================= Lightbox ================= -->
    <div class="lbx" data-lbx hidden>
      <div class="lbx__backdrop" data-lbx-close></div>

      <div class="lbx__panel" role="dialog" aria-modal="true" aria-label="Gallery viewer">
        <div class="lbx__stage" data-lbx-stage></div>

        <p class="lbx__cap">
          <span class="lbx__cap-text" data-lbx-cap></span>
          <span class="lbx__count"><span data-lbx-now>1</span> / <span data-lbx-total><?= count($GALLERY) ?></span></span>
        </p>

        <button class="lbx__btn lbx__btn--close" type="button" aria-label="Close viewer" data-lbx-close>
          <svg viewBox="0 0 16 16" fill="none"><path d="M4 4l8 8M12 4l-8 8" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/></svg>
        </button>

        <button class="lbx__btn lbx__btn--prev" type="button" aria-label="Previous item" data-lbx-prev>
          <svg viewBox="0 0 18 18" fill="none">
            <path d="M11 3.5 5.5 9l5.5 5.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>

        <button class="lbx__btn lbx__btn--next" type="button" aria-label="Next item" data-lbx-next>
          <svg viewBox="0 0 18 18" fill="none">
            <path d="M7 3.5 12.5 9 7 14.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>
        </button>
      </div>
    </div>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
