  <!-- ================= Footer Section ================= -->
  <footer class="site-footer" id="site-footer" aria-label="Site Footer">

    <!-- Ambient glowing accents -->
    <div class="site-footer__glow site-footer__glow--left" aria-hidden="true"></div>
    <div class="site-footer__glow site-footer__glow--right" aria-hidden="true"></div>

    <div class="site-footer__inner">

      <!-- TOP BAND — 2-Column Split -->
      <div class="footer-top" data-footer-top>
        <div class="footer-top__brand">
          <a class="footer-logo" href="index.php" aria-label="Durva Hospital — Home">
            <img class="footer-logo__img" src="assets/images/logo.png" alt="Durva Hospital" width="858" height="250" loading="lazy">
          </a>
          <p class="footer-top__desc">
            Durva Hospital is where precision meets compassion. We help patients move without limits through expert orthopaedic and specialist care.
          </p>
        </div>

        <div class="footer-top__newsletter">
          <p class="footer-newsletter__label">Stay Updated</p>
          <form class="footer-newsletter__form" action="#" method="post" onsubmit="event.preventDefault();">
            <div class="footer-newsletter__field">
              <input class="footer-newsletter__input" type="email" name="email" placeholder="Enter your email address" required aria-label="Email address for newsletter">
              <button class="footer-newsletter__btn" type="submit" aria-label="Subscribe to newsletter">
                <span>Subscribe</span>
                <svg viewBox="0 0 16 16" fill="none" aria-hidden="true">
                  <path d="M3.33 8h9.34M8.67 4l4 4-4 4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
              </button>
            </div>
          </form>
          <p class="footer-newsletter__sub">
            Get health tips, appointment reminders, and updates from our specialists.
          </p>
        </div>
      </div>

      <!-- TABS & DATA ROW (3 Columns) -->
      <div class="footer-grid">

        <!-- Column 1: Quick Links -->
        <div class="footer-col" data-footer-col>
          <h3 class="footer-col__title">Quick Links</h3>
          <ul class="footer-dash-list">
            <li><a class="footer-dash-link" href="treatment.php?slug=acl-avulsion"><span class="footer-dash-mark" aria-hidden="true">&minus;</span><span>ACL Avulsion</span></a></li>
            <li><a class="footer-dash-link" href="treatment.php?slug=acl-reconstruction"><span class="footer-dash-mark" aria-hidden="true">&minus;</span><span>ACL Reconstruction</span></a></li>
            <li><a class="footer-dash-link" href="treatment.php?slug=pcl-reconstruction"><span class="footer-dash-mark" aria-hidden="true">&minus;</span><span>PCL Reconstruction</span></a></li>
            <li><a class="footer-dash-link" href="treatment.php?slug=frozen-shoulder"><span class="footer-dash-mark" aria-hidden="true">&minus;</span><span>Frozen Shoulder</span></a></li>
            <li><a class="footer-dash-link" href="treatment.php?slug=synovitis"><span class="footer-dash-mark" aria-hidden="true">&minus;</span><span>Synovitis</span></a></li>
            <li><a class="footer-dash-link" href="about.php"><span class="footer-dash-mark" aria-hidden="true">&minus;</span><span>About Us</span></a></li>
            <li><a class="footer-dash-link" href="gallery.php"><span class="footer-dash-mark" aria-hidden="true">&minus;</span><span>Gallery</span></a></li>
            <li><a class="footer-dash-link" href="book-appointment.php"><span class="footer-dash-mark" aria-hidden="true">&minus;</span><span>Contact</span></a></li>
          </ul>
        </div>

        <!-- Column 2: Recent Posts -->
        <div class="footer-col" data-footer-col>
          <h3 class="footer-col__title">Recent Posts</h3>
          <div class="footer-posts">

            <article class="footer-post">
              <a class="footer-post__thumb" href="#blog" aria-label="Advance Shoulder training Programme">
                <img class="footer-post__img" src="assets/images/dr-1.png" alt="Advance Shoulder training Programme" width="60" height="60" loading="lazy">
              </a>
              <div class="footer-post__meta">
                <h4 class="footer-post__title">
                  <a class="footer-post__title-link" href="#blog">Advance Shoulder training Programme</a>
                </h4>
                <time class="footer-post__date" datetime="2025-11-17">
                  <svg class="footer-post__date-icon" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                    <rect x="2" y="3" width="12" height="11" rx="2" stroke="currentColor" stroke-width="1.3"/>
                    <path d="M5 1.5v2.5M11 1.5v2.5M2 6.5h12" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
                  </svg>
                  November 17, 2025
                </time>
              </div>
            </article>

            <article class="footer-post">
              <a class="footer-post__thumb" href="#blog" aria-label="DR Hitesh Mangal">
                <img class="footer-post__img" src="assets/images/dr-2.png" alt="DR Hitesh Mangal" width="60" height="60" loading="lazy">
              </a>
              <div class="footer-post__meta">
                <h4 class="footer-post__title">
                  <a class="footer-post__title-link" href="#blog">DR Hitesh Mangal</a>
                </h4>
                <time class="footer-post__date" datetime="2024-11-18">
                  <svg class="footer-post__date-icon" viewBox="0 0 16 16" fill="none" aria-hidden="true">
                    <rect x="2" y="3" width="12" height="11" rx="2" stroke="currentColor" stroke-width="1.3"/>
                    <path d="M5 1.5v2.5M11 1.5v2.5M2 6.5h12" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"/>
                  </svg>
                  November 18, 2024
                </time>
              </div>
            </article>

          </div>
        </div>

        <!-- Column 3: Contact Us -->
        <div class="footer-col footer-col--contact" data-footer-col>
          <h3 class="footer-col__title">Contact Us</h3>
          <ul class="footer-contact">
            <li class="footer-contact__item">
              <svg class="footer-contact__icon" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M10 10.833a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" stroke="currentColor" stroke-width="1.5"/>
                <path d="M10 18.333S16.667 13.333 16.667 8.333a6.667 6.667 0 1 0-13.334 0c0 5 6.667 10 6.667 10Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
              <span class="footer-contact__text">Plot Number 3,4 Allied Ample city, 80 Feet Link Rd, Borkhera, Kota, Rajasthan 324001</span>
            </li>
            <li class="footer-contact__item">
              <svg class="footer-contact__icon" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M2.5 5.833A2.5 2.5 0 0 1 5 3.333h10a2.5 2.5 0 0 1 2.5 2.5v8.334a2.5 2.5 0 0 1-2.5 2.5H5a2.5 2.5 0 0 1-2.5-2.5V5.833Z" stroke="currentColor" stroke-width="1.5"/>
                <path d="m3.333 5 5.753 4.315a1.667 1.667 0 0 0 1.998 0L16.833 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
              </svg>
              <a class="footer-link footer-link--contact" href="mailto:durvahospitalkota@gmail.com">durvahospitalkota@gmail.com</a>
            </li>
            <li class="footer-contact__item">
              <svg class="footer-contact__icon" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <rect x="5.833" y="2.5" width="8.334" height="15" rx="2" stroke="currentColor" stroke-width="1.5"/>
                <circle cx="10" cy="14.5" r="0.75" fill="currentColor"/>
              </svg>
              <a class="footer-link footer-link--contact" href="tel:917014584948">917014584948</a>
            </li>
          </ul>

          <div class="footer-social">
            <a class="footer-social__btn" href="https://instagram.com" target="_blank" rel="noopener noreferrer" aria-label="Instagram">
              <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <rect x="2.5" y="2.5" width="15" height="15" rx="4" stroke="currentColor" stroke-width="1.5"/>
                <circle cx="10" cy="10" r="3.5" stroke="currentColor" stroke-width="1.5"/>
                <circle cx="14.5" cy="5.5" r="0.75" fill="currentColor"/>
              </svg>
            </a>
            <a class="footer-social__btn" href="https://facebook.com" target="_blank" rel="noopener noreferrer" aria-label="Facebook">
              <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M15 1.667h-2.5a4.167 4.167 0 0 0-4.167 4.166v2.5H5.833v3.334h2.5v6.666h3.334v-6.666h2.5L15 8.333h-3.333v-2.5a.833.833 0 0 1 .833-.833H15V1.667Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
              </svg>
            </a>
            <a class="footer-social__btn" href="https://linkedin.com" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn">
              <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <path d="M13.333 6.667a4.167 4.167 0 0 1 4.167 4.166v6.667h-3.333v-6.667a1.667 1.667 0 0 0-3.334 0v6.667H7.5V10.833a4.167 4.167 0 0 1 4.167-4.166v0Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <rect x="2.5" y="7.5" width="3.333" height="10" rx="0.5" stroke="currentColor" stroke-width="1.5"/>
                <circle cx="4.167" cy="3.75" r="1.25" fill="currentColor"/>
              </svg>
            </a>
          </div>
        </div>

      </div>

      <!-- Bottom Bar (sitting cleanly above the skyline, matching reference) -->
      <div class="footer-bottom" data-footer-bottom>
        <div class="footer-bottom__inner">
          <p class="footer-bottom__copy">&copy; 2026 Durva Hospital. All Rights Reserved.</p>
          <ul class="footer-bottom__links">
            <li><a class="footer-bottom__link" href="legal.php?doc=privacy">Privacy Policy</a></li>
            <li><span class="footer-bottom__sep" aria-hidden="true">&bull;</span></li>
            <li><a class="footer-bottom__link" href="legal.php?doc=terms">Terms &amp; Conditions</a></li>
            <li><span class="footer-bottom__sep" aria-hidden="true">&bull;</span></li>
            <li><a class="footer-bottom__link" href="legal.php?doc=patient-rights">Patient Rights</a></li>
          </ul>
        </div>
      </div>

    </div>

    <!-- Very Bottom Edge-to-Edge Hospital Skyline (matching reference) -->
    <div class="footer-skyline" aria-hidden="true" data-footer-skyline>
      <img class="footer-skyline__img" src="assets/images/footer-bg.png" alt="" loading="lazy" decoding="async">
    </div>

  </footer>

  <!-- ================= Floating Contact Button ================= -->
  <aside class="floating-contact" id="floating-contact" aria-label="Direct Contact Helpline">
    <a class="floating-contact__btn" href="tel:+917014584948" aria-label="Call Durva Hospital Helpline: +91 70145 84948">
      <span class="floating-contact__icon-box" aria-hidden="true">
        <svg class="floating-contact__icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
          <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
        </svg>
      </span>
      <span class="floating-contact__content">
        <span class="floating-contact__label">Contact Us</span>
        <span class="floating-contact__number">+91 70145 84948</span>
      </span>
    </a>
  </aside>

  <!-- Scripts & CDNs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="assets/js/main.js?v=<?= time() ?>"></script>
</body>
</html>
