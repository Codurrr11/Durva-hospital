<?php
/*
  blog-detail.php — a single article.

  URL:  blog-detail.php?slug=knee-pain-more-than-wear-and-tear

  Routing follows treatment.php: the slug is whitelisted against the data
  source before use, so it can only ever be an array key. Content comes from
  include/blog-data.php, which the home-page slider reads from too.
*/
require_once __DIR__ . '/include/blog-data.php';

$slug = strtolower(trim((string) ($_GET['slug'] ?? '')));
$post = blog_find($slug);

/* an unknown slug lands on the newest article rather than a blank page */
if ($post === null) {
    $all  = blog_all();
    $slug = (string) array_key_first($all);
    $post = $all[$slug];
}

$recent     = blog_recent($slug, 3);
$categories = blog_categories();
$readTime   = blog_read_time($post);
$dateOut    = date('j F Y', strtotime($post['published_at']));

$bd_img = 'https://images.pexels.com/photos/%d/pexels-photo-%d.jpeg?auto=compress&cs=tinysrgb&w=%d';
if (!function_exists('bd_src')) {
    function bd_src(string $tpl, int $id, int $w): string {
        return htmlspecialchars(sprintf($tpl, $id, $id, $w), ENT_QUOTES);
    }
}

/* read by include/header.php */
$page_title = $post['title'] . ' — Durva Hospital';
$page_desc  = $post['excerpt'];

include __DIR__ . '/include/header.php';
?>

  <main>

    <!-- ================= Banner ================= -->
    <!-- Type only. The featured image sits a few hundred pixels below this;
         running it behind the title as well would show the same photograph
         twice before the reader has scrolled. -->
    <section class="bd-hero" aria-labelledby="bd-title">
      <div class="bd-hero__inner">

        <nav class="bd-hero__crumbs" aria-label="Breadcrumb" data-bd-item>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li aria-hidden="true">/</li>
            <li><a href="index.php#blog">Blog</a></li>
            <li aria-hidden="true">/</li>
            <li aria-current="page"><span><?= htmlspecialchars($post['category'], ENT_QUOTES) ?></span></li>
          </ol>
        </nav>

        <p class="bd-hero__tag" data-bd-item><?= htmlspecialchars($post['category'], ENT_QUOTES) ?></p>

        <h1 class="bd-hero__title" id="bd-title" data-bd-item>
          <?= htmlspecialchars($post['title'], ENT_QUOTES) ?>
        </h1>

        <p class="bd-hero__meta" data-bd-item>
          <span class="bd-hero__author"><?= htmlspecialchars($post['author'], ENT_QUOTES) ?></span>
          <span class="bd-hero__dot" aria-hidden="true"></span>
          <time datetime="<?= htmlspecialchars($post['published_at'], ENT_QUOTES) ?>"><?= $dateOut ?></time>
          <span class="bd-hero__dot" aria-hidden="true"></span>
          <span><?= $readTime ?> min read</span>
        </p>

      </div>
    </section>

    <!-- ================= Body ================= -->
    <div class="bd">
      <div class="bd__inner">

        <!-- ---------- article ---------- -->
        <article class="bd__main">

          <figure class="bd__figure" data-bd-fig>
            <img class="bd__img" src="<?= bd_src($bd_img, $post['image'], 1600) ?>"
                 alt="<?= htmlspecialchars($post['image_alt'], ENT_QUOTES) ?>"
                 loading="eager" decoding="async">
          </figure>

          <h2 class="bd__title" data-bd-body><?= htmlspecialchars($post['title'], ENT_QUOTES) ?></h2>

          <p class="bd__lead" data-bd-body><?= htmlspecialchars($post['excerpt'], ENT_QUOTES) ?></p>

          <div class="bd__body" data-bd-body>
            <?php foreach ($post['body'] as [$type, $value]): ?>
              <?php if ($type === 'h2'): ?>
                <h3 class="bd__h"><?= htmlspecialchars($value, ENT_QUOTES) ?></h3>
              <?php elseif ($type === 'quote'): ?>
                <blockquote class="bd__quote"><p><?= htmlspecialchars($value, ENT_QUOTES) ?></p></blockquote>
              <?php elseif ($type === 'list'): ?>
                <ul class="bd__list">
                  <?php foreach ($value as $li): ?>
                    <li><?= htmlspecialchars($li, ENT_QUOTES) ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php else: ?>
                <p><?= htmlspecialchars($value, ENT_QUOTES) ?></p>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>

        </article>

        <!-- ---------- sidebar ---------- -->
        <aside class="bd__side" aria-label="More from the blog">
          <div class="bd__sticky">

            <section class="bd-card" data-bd-item>
              <h2 class="bd-card__title">Recent articles</h2>
              <ul class="bd-recent">
                <?php foreach ($recent as $rSlug => $r): ?>
                  <li>
                    <a class="bd-recent__link" href="blog-detail.php?slug=<?= rawurlencode($rSlug) ?>">
                      <img class="bd-recent__img" src="<?= bd_src($bd_img, $r['image'], 240) ?>"
                           alt="" loading="lazy" decoding="async" width="72" height="72">
                      <span class="bd-recent__meta">
                        <span class="bd-recent__title"><?= htmlspecialchars($r['title'], ENT_QUOTES) ?></span>
                        <time class="bd-recent__date" datetime="<?= htmlspecialchars($r['published_at'], ENT_QUOTES) ?>">
                          <?= date('j M Y', strtotime($r['published_at'])) ?>
                        </time>
                      </span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </section>

            <section class="bd-card" data-bd-item>
              <h2 class="bd-card__title">Categories</h2>
              <ul class="bd-cats">
                <?php foreach ($categories as $name => $count): ?>
                  <li>
                    <a class="bd-cats__link<?= $name === $post['category'] ? ' is-active' : '' ?>"
                       href="index.php#blog">
                      <span><?= htmlspecialchars($name, ENT_QUOTES) ?></span>
                      <span class="bd-cats__count"><?= $count ?></span>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </section>

            <!-- NOT WIRED UP — same as the appointment form, this posts
                 nowhere and deliberately shows no success message. -->
            <section class="bd-card bd-card--news" data-bd-item>
              <h2 class="bd-card__title">Get new articles</h2>
              <p class="bd-card__text">
                Plain-language writing from our surgeons, a few times a month.
              </p>
              <form class="bd-news" method="post" action="blog-detail.php?slug=<?= rawurlencode($slug) ?>">
                <label class="u-visually-hidden" for="bd-news-email">Email address</label>
                <input class="bd-news__input" id="bd-news-email" name="email" type="email"
                       placeholder="Your email address" autocomplete="email" required>
                <button class="bd-news__submit" type="submit">
                  Subscribe
                  <svg viewBox="0 0 14 14" fill="none" aria-hidden="true">
                    <path d="M2.5 7h9M8 3.5 11.5 7 8 10.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </button>
              </form>
            </section>

          </div>
        </aside>

      </div>
    </div>

  </main>

<?php include __DIR__ . '/include/footer.php'; ?>
