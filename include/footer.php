  <!-- ================= Footer ================= -->
  <!--
    CONTACT DETAILS below (email, phone, address) are placeholders. Replace
    all three before this goes live — a wrong number on a hospital site gets
    dialled. The four "Patient Care" links and the two legal links point at
    "#" because those pages do not exist yet.
  -->
  <footer class="ftr" data-ftr>

    <div class="ftr__inner">

      <!-- ---------- top band ---------- -->
      <div class="ftr__top">

        <div class="ftr__brand" data-ftr-item>
          <img class="ftr__logo" src="assets/images/logo.png" alt="Durva Hospital"
               width="858" height="250" loading="lazy" decoding="async">
          <p class="ftr__blurb">
            Durva Hospital is where precision meets compassion. We help patients
            move without limits through expert orthopaedic and specialist care.
          </p>
        </div>

        <form class="ftr__news" data-ftr-item action="#" method="post">
          <p class="ftr__news-label" id="ftr-news-label">Stay Updated</p>

          <div class="ftr__field">
            <label class="u-visually-hidden" for="ftr-email">Email address</label>
            <input class="ftr__input" id="ftr-email" name="email" type="email"
                   placeholder="Enter your email address" autocomplete="email" required>
            <button class="ftr__submit" type="submit">Subscribe</button>
          </div>

          <p class="ftr__news-note">
            Get health tips, appointment reminders, and updates from our specialists.
          </p>
        </form>

      </div>

      <!-- ---------- link columns ---------- -->
      <div class="ftr__cols">

        <nav class="ftr__col" data-ftr-item aria-labelledby="ftr-quick">
          <h2 class="ftr__col-title" id="ftr-quick">Quick Links</h2>
          <ul class="ftr__list">
            <li><a class="ftr__link" href="index.php">Home</a></li>
            <li><a class="ftr__link" href="about.php">About Us</a></li>
            <li><a class="ftr__link" href="#doctors">Our Doctors</a></li>
            <li><a class="ftr__link" href="#appointment">Book Appointment</a></li>
          </ul>
        </nav>

        <nav class="ftr__col" data-ftr-item aria-labelledby="ftr-dept">
          <h2 class="ftr__col-title" id="ftr-dept">Departments</h2>
          <ul class="ftr__list">
            <li><a class="ftr__link" href="#knee-arthroscopy">Knee Arthroscopy</a></li>
            <li><a class="ftr__link" href="#shoulder-arthroscopy">Shoulder Arthroscopy</a></li>
            <li><a class="ftr__link" href="#joint-replacement">Joint Replacement</a></li>
            <li><a class="ftr__link" href="#sports-medicine">Sports Medicine</a></li>
          </ul>
        </nav>

        <nav class="ftr__col" data-ftr-item aria-labelledby="ftr-care">
          <h2 class="ftr__col-title" id="ftr-care">Patient Care</h2>
          <ul class="ftr__list">
            <li><a class="ftr__link" href="#">FAQs</a></li>
            <li><a class="ftr__link" href="#">Insurance &amp; Billing</a></li>
            <li><a class="ftr__link" href="#">Patient Resources</a></li>
            <li><a class="ftr__link" href="#">Emergency Care</a></li>
          </ul>
        </nav>

        <div class="ftr__col ftr__col--connect" data-ftr-item>
          <h2 class="ftr__col-title">Connect With Us</h2>

          <ul class="ftr__list ftr__list--contact">
            <li><a class="ftr__link" href="mailto:care@durvahospital.com">care@durvahospital.com</a></li>
            <li><a class="ftr__link" href="tel:+919876543210">+91 98765 43210</a></li>
            <li><address class="ftr__address">Durva Hospital, Maharashtra, India</address></li>
          </ul>

          <ul class="ftr__social">
            <li>
              <a class="ftr-soc" href="#" aria-label="Durva Hospital on Instagram">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <rect x="2.75" y="2.75" width="14.5" height="14.5" rx="4.25" stroke="currentColor" stroke-width="1.4"/>
                  <circle cx="10" cy="10" r="3.6" stroke="currentColor" stroke-width="1.4"/>
                  <circle cx="14.4" cy="5.6" r="1" fill="currentColor"/>
                </svg>
              </a>
            </li>
            <li>
              <a class="ftr-soc" href="#" aria-label="Durva Hospital on Facebook">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M12.4 6.6h1.9V3.9c-.33-.05-1.45-.15-2.75-.15-2.72 0-4.58 1.71-4.58 4.86V11H4.6v3.05h2.37V20h2.9v-5.95h2.28l.36-3.05h-2.64V8.9c0-.88.24-1.49 1.53-1.49Z"
                        fill="currentColor"/>
                </svg>
              </a>
            </li>
            <li>
              <a class="ftr-soc" href="#" aria-label="Durva Hospital on LinkedIn">
                <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                  <path d="M5.4 7.7H2.9V17h2.5V7.7ZM4.15 6.6a1.45 1.45 0 1 0 0-2.9 1.45 1.45 0 0 0 0 2.9ZM17.1 17h-2.5v-4.85c0-1.16-.42-1.95-1.45-1.95-.79 0-1.26.53-1.47 1.05-.08.18-.1.44-.1.7V17H9.08s.03-8.44 0-9.3h2.5v1.32c.33-.51.93-1.24 2.26-1.24 1.65 0 2.89 1.08 2.89 3.4V17Z"
                        fill="currentColor"/>
                </svg>
              </a>
            </li>
          </ul>
        </div>

      </div>
    </div>

    <!-- ---------- motif ----------
         Replaces the reference's city skyline. A single ECG trace over two
         soft topographic echoes: abstract, medical, and calm enough to sit
         under type. Inline SVG so it can take its colour from the section. -->
    <div class="ftr__motif" aria-hidden="true">
      <svg viewBox="0 0 1440 120" fill="none" preserveAspectRatio="xMidYMax meet">
        <path class="ftr__motif-wave" d="M0 100C240 84 480 116 720 100s480-16 720 0"
              stroke="currentColor" stroke-width="1.25" stroke-linecap="round"/>
        <path class="ftr__motif-wave" d="M0 114C260 102 520 126 780 114s440 4 660-4"
              stroke="currentColor" stroke-width="1.25" stroke-linecap="round"/>
        <path class="ftr__motif-pulse"
              d="M0 78h300c16 0 20-16 36-16s20 16 36 16h188l20 0 10 10 14-64 16 82 12-36 16 8h268c20 0 28-14 50-14s30 14 50 14h424"
              stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </div>

    <!-- ---------- bottom bar ---------- -->
    <div class="ftr__bottom">
      <div class="ftr__bottom-inner">
        <p class="ftr__copy">&copy; 2026 Durva Hospital. All Rights Reserved.</p>
        <ul class="ftr__legal">
          <li><a class="ftr__link" href="#">Privacy Policy</a></li>
          <li><a class="ftr__link" href="#">Terms of Use</a></li>
        </ul>
      </div>
    </div>

  </footer>

  <!-- Scripts & CDNs -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>
