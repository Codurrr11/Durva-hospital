// assets/js/main.js — nav interactions only

(function () {
  'use strict';

  var header = document.querySelector('[data-header]');
  var toggle = document.querySelector('[data-nav-toggle]');
  var dropdowns = Array.prototype.slice.call(document.querySelectorAll('[data-dropdown]'));
  var collapsed = window.matchMedia('(max-width: 1024px)');
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- submenus ----------
     Above 1024px the CSS opens them on hover and focus-within. Below it the
     nav is a full-screen sheet, so the parent link toggles an accordion
     instead of navigating.                                                */
  function closeDropdowns(except) {
    dropdowns.forEach(function (item) {
      if (item === except) return;
      item.classList.remove('is-open');
      var link = item.querySelector('.nav__link');
      if (link) link.setAttribute('aria-expanded', 'false');
    });
  }

  dropdowns.forEach(function (item) {
    var link = item.querySelector('.nav__link');
    if (!link) return;

    link.addEventListener('click', function (event) {
      if (!collapsed.matches) return; // desktop: let the link work
      event.preventDefault();
      var open = !item.classList.contains('is-open');
      closeDropdowns(item);
      item.classList.toggle('is-open', open);
      link.setAttribute('aria-expanded', String(open));
    });
  });

  collapsed.addEventListener('change', function () {
    closeDropdowns(null);
  });

  /* ---------- mobile sheet ---------- */
  function closeMenu() {
    closeDropdowns(null);
    if (!header || !toggle) return;
    header.classList.remove('is-open');
    toggle.setAttribute('aria-expanded', 'false');
    document.body.style.removeProperty('overflow');
  }

  if (header && toggle) {
    toggle.addEventListener('click', function () {
      var open = header.classList.toggle('is-open');
      toggle.setAttribute('aria-expanded', String(open));
      document.body.style.overflow = open ? 'hidden' : '';
    });
  }

  // any link that actually navigates should shut the sheet
  document.querySelectorAll('.menu__link').forEach(function (link) {
    link.addEventListener('click', closeMenu);
  });

  document.querySelectorAll('.nav__item:not([data-dropdown]) > .nav__link').forEach(function (link) {
    link.addEventListener('click', closeMenu);
  });

  document.addEventListener('keydown', function (event) {
    if (event.key !== 'Escape') return;
    if (header && header.classList.contains('is-open')) {
      closeMenu();
      if (toggle) toggle.focus();
    } else {
      closeDropdowns(null);
      if (document.activeElement) document.activeElement.blur();
    }
  });

  /* ---------- services slider ----------
     Scrolling itself is native (overflow-x + scroll-snap) so touch and
     trackpad keep their momentum for free. This only adds what native
     scrolling lacks on desktop: click-drag and arrow buttons.            */
  function initSlider(root) {
    var track = root.querySelector('[data-track]');
    if (!track) return;

    var prev = root.querySelector('[data-prev]');
    var next = root.querySelector('[data-next]');

    function stepSize() {
      var card = track.querySelector('.svc-card');
      if (!card) return track.clientWidth * 0.8;
      var gap = parseFloat(getComputedStyle(track).columnGap) || 0;
      return card.getBoundingClientRect().width + gap;
    }

    function syncArrows() {
      var max = track.scrollWidth - track.clientWidth;
      if (prev) prev.disabled = track.scrollLeft <= 2;
      if (next) next.disabled = track.scrollLeft >= max - 2;
    }

    if (prev) prev.addEventListener('click', function () {
      track.scrollBy({ left: -stepSize(), behavior: 'smooth' });
    });
    if (next) next.addEventListener('click', function () {
      track.scrollBy({ left: stepSize(), behavior: 'smooth' });
    });

    track.addEventListener('scroll', syncArrows, { passive: true });
    window.addEventListener('resize', syncArrows);
    syncArrows();
  }

  document.querySelectorAll('[data-slider]').forEach(initSlider);

  /* ---------- blog carousel ----------
     Scrolling is native (overflow-x + scroll-snap) so touch and trackpad
     keep their momentum. JS adds the three things native scrolling has no
     notion of: a step of exactly one card, the disabled states at either
     end, and the readout in the left column — the counter and the line under
     it are a display of where the track is, so they are driven from the
     scroll position rather than from a click counter. That way dragging the
     track by hand updates them too.                                       */
  function initBlog(root) {
    var track = root.querySelector('[data-blog-track]');
    if (!track) return;

    var cards = Array.prototype.slice.call(track.querySelectorAll('.blog-card'));
    if (!cards.length) return;

    var prev = root.querySelector('[data-blog-prev]');
    var next = root.querySelector('[data-blog-next]');
    var indexOut = root.querySelector('[data-blog-index]');
    var stepOut = root.querySelector('[data-blog-step]');
    var shown = -1;

    function step() {
      var gap = parseFloat(getComputedStyle(track).columnGap) || 0;
      return cards[0].getBoundingClientRect().width + gap;
    }

    function maxScroll() {
      return track.scrollWidth - track.clientWidth;
    }

    /* The LEADING card, not the last visible one. With ~2.5 cards in view the
       final card can never scroll to the left edge, so forcing the readout to
       the last index at the end made the counter jump 02 -> 04 and skip a
       number, which looks like a bug. Reporting the leading card gives
       01 -> 02 -> 03 and stays true: at 03 you are looking at 3 and 4. */
    function currentIndex() {
      return Math.max(0, Math.min(cards.length - 1, Math.round(track.scrollLeft / step())));
    }

    function pad(n) {
      return n < 10 ? '0' + n : String(n);
    }

    function sync() {
      var max = maxScroll();
      if (prev) prev.disabled = track.scrollLeft <= 2;
      if (next) next.disabled = track.scrollLeft >= max - 2;

      var i = currentIndex();
      if (i === shown) return;
      shown = i;

      if (indexOut) indexOut.textContent = pad(i + 1);

      // cross-fade rather than swap: two different sentences snapping in
      // place reads as a glitch
      if (stepOut) {
        var text = cards[i].getAttribute('data-blog-step-text');
        if (!text) return;
        if (reduceMotion) {
          stepOut.textContent = text;
          return;
        }
        stepOut.classList.add('is-swapping');
        window.setTimeout(function () {
          stepOut.textContent = text;
          stepOut.classList.remove('is-swapping');
        }, 200);
      }
    }

    function go(dir) {
      track.scrollBy({
        left: dir * step(),
        behavior: reduceMotion ? 'auto' : 'smooth'
      });
    }

    if (prev) prev.addEventListener('click', function () { go(-1); });
    if (next) next.addEventListener('click', function () { go(1); });

    track.addEventListener('scroll', sync, { passive: true });
    window.addEventListener('resize', sync);
    sync();
  }

  document.querySelectorAll('.blog').forEach(initBlog);

  /* ---------- scroll reveals ----------
     gsap.from() is deliberate here: the markup renders visible, so if the
     CDN fails or motion is reduced the section is simply already in place —
     no hidden-forever content to rescue.                                  */
  function initReveals() {
    if (reduceMotion) return;
    if (typeof window.gsap === 'undefined' || typeof window.ScrollTrigger === 'undefined') return;

    var gsap = window.gsap;
    gsap.registerPlugin(window.ScrollTrigger);

    var head = gsap.utils.toArray('[data-reveal]');
    if (head.length) {
      gsap.from(head, {
        opacity: 0,
        y: 26,
        duration: 0.9,
        ease: 'power3.out',
        stagger: 0.12,
        scrollTrigger: { trigger: '.showcase__head', start: 'top 78%', once: true }
      });
    }

    var card = document.querySelector('[data-reveal-card]');
    if (card) {
      gsap.from(card, {
        opacity: 0,
        y: 44,
        scale: 0.985,
        duration: 1.05,
        delay: 0.15, // lands just after the headline settles
        ease: 'power3.out',
        scrollTrigger: { trigger: '.showcase__stage', start: 'top 88%', once: true }
      });
    }

    /* ---------- about ----------
       Headline leads; the image and paragraph follow together on a slight
       delay, so the block reads top-down rather than all at once. */
    var aboutHead = gsap.utils.toArray('[data-about-reveal]');
    if (aboutHead.length) {
      gsap.from(aboutHead, {
        opacity: 0,
        y: 30,
        duration: 0.95,
        ease: 'power3.out',
        scrollTrigger: { trigger: '.about', start: 'top 74%', once: true }
      });
    }

    var aboutRest = gsap.utils.toArray('[data-about-stagger]');
    if (aboutRest.length) {
      gsap.from(aboutRest, {
        opacity: 0,
        y: 36,
        duration: 1,
        delay: 0.18,
        ease: 'power3.out',
        stagger: 0.14,
        scrollTrigger: { trigger: '.about__row', start: 'top 88%', once: true }
      });
    }

    /* ---------- services ---------- */
    var svcHead = gsap.utils.toArray('[data-svc-reveal]');
    if (svcHead.length) {
      gsap.from(svcHead, {
        opacity: 0,
        y: 28,
        duration: 0.9,
        ease: 'power3.out',
        scrollTrigger: { trigger: '.services', start: 'top 76%', once: true }
      });
    }

    var svcCards = gsap.utils.toArray('.services__track .svc-card');
    if (svcCards.length) {
      gsap.from(svcCards, {
        opacity: 0,
        y: 40,
        duration: 0.9,
        ease: 'power3.out',
        stagger: 0.08,
        // x is untouched on purpose — animating it would fight scrollLeft
        scrollTrigger: { trigger: '.services__slider', start: 'top 88%', once: true }
      });
    }

    /* count-up. Only runs where a numeric [data-count] exists, so "24/7"
       is left alone rather than mangled into a number. */
    gsap.utils.toArray('[data-count]').forEach(function (el) {
      var target = parseFloat(el.getAttribute('data-count'));
      if (isNaN(target)) return;
      var suffix = el.getAttribute('data-suffix') || '';
      var counter = { value: 0 };

      el.textContent = '0' + suffix;

      gsap.to(counter, {
        value: target,
        duration: 1.6,
        ease: 'power2.out',
        scrollTrigger: { trigger: '.svc-stats', start: 'top 86%', once: true },
        onUpdate: function () {
          el.textContent = Math.round(counter.value).toLocaleString('en-US') + suffix;
        },
        onComplete: function () {
          el.textContent = target.toLocaleString('en-US') + suffix;
        }
      });
    });

    /* ---------- doctors ----------
       A "coming together": the figure arrives first from the centre, then the
       two detail blocks slide in from their own sides behind it. The offsets
       are timed so the blocks are still moving when the figure lands, which
       is what makes it read as one gesture rather than three entrances. */
    var docFigure = document.querySelector('[data-doc-figure]');
    if (docFigure) {
      gsap.timeline({
        scrollTrigger: { trigger: '.doc__head', start: 'top 82%', once: true }
      })
        .from('[data-doc-eyebrow]', { opacity: 0, y: 14, duration: 0.55, ease: 'power2.out' }, 0)
        .from('[data-doc-title]', { opacity: 0, y: 24, duration: 0.8, ease: 'power3.out' }, 0.1);

      gsap.timeline({
        scrollTrigger: { trigger: '.doc__stage', start: 'top 72%', once: true }
      })
        .from(docFigure, { opacity: 0, scale: 0.92, duration: 1.15, ease: 'power3.out' }, 0)
        .from('[data-doc-mark]', { opacity: 0, duration: 1.3, ease: 'power2.out' }, 0.15)
        .from('[data-doc-left]', { opacity: 0, x: -60, duration: 0.95, ease: 'power3.out' }, 0.38)
        .from('[data-doc-right]', { opacity: 0, x: 60, duration: 0.95, ease: 'power3.out' }, 0.5);
    }

    /* ---------- testimonials ----------
       Header only. The rows below it run on a CSS marquee that starts on
       load and never stops, so there is nothing here to reveal — a GSAP
       `from` on a card would fight the animation moving it. */
    var tstLabel = document.querySelector('[data-tst-label]');
    var tstTitle = document.querySelector('[data-tst-title]');

    if (tstLabel && tstTitle) {
      gsap.timeline({
        scrollTrigger: { trigger: '.tst__intro', start: 'top 84%', once: true }
      })
        .from(tstLabel, { opacity: 0, y: 14, duration: 0.6, ease: 'power2.out' }, 0)
        .from(tstTitle, { opacity: 0, y: 26, duration: 0.85, ease: 'power3.out' }, 0.12)
        .from('[data-tst-lead]', { opacity: 0, y: 18, duration: 0.7, ease: 'power3.out' }, 0.26)
        .from('[data-tst-cta]', { opacity: 0, y: 16, duration: 0.65, ease: 'power2.out' }, 0.38);

      // the rail fades up as a block — the columns are already in motion, so
      // animating the cards individually would fight the marquee
      gsap.from('[data-tst-rail]', {
        opacity: 0,
        y: 40,
        duration: 1,
        ease: 'power3.out',
        scrollTrigger: { trigger: '[data-tst-rail]', start: 'top 86%', once: true }
      });
    }

    /* ---------- community care ---------- */
    var ccHead = gsap.utils.toArray('[data-cc-reveal]');
    if (ccHead.length) {
      gsap.from(ccHead, {
        opacity: 0,
        y: 28,
        duration: 0.9,
        ease: 'power3.out',
        stagger: 0.13,
        scrollTrigger: { trigger: '.community__banner', start: 'top 76%', once: true }
      });
    }

    var ccCards = gsap.utils.toArray('[data-cc-cards] > *');
    if (ccCards.length) {
      gsap.from(ccCards, {
        opacity: 0,
        y: 52,
        duration: 1,
        ease: 'power3.out',
        stagger: 0.11,
        // fires on the card row itself so the two entrances stay independent
        scrollTrigger: { trigger: '[data-cc-cards]', start: 'top 92%', once: true }
      });
    }

    /* ---------- footer ----------
       One stagger across the whole block. The footer is the last thing on
       the page, so it is usually already in view by the time it is reached —
       the trigger sits low (top 92%) to keep the entrance from being missed
       entirely on a short scroll. */
    var ftrItems = gsap.utils.toArray('[data-ftr-item]');
    if (ftrItems.length) {
      gsap.from(ftrItems, {
        opacity: 0,
        y: 28,
        duration: 0.8,
        ease: 'power3.out',
        stagger: 0.09,
        clearProps: 'transform,opacity',
        scrollTrigger: { trigger: '[data-ftr]', start: 'top 92%', once: true }
      });
    }

    /* ---------- blog ----------
       Head first, then the meta column and the card row together — the two
       are one horizontal band, so staggering them apart would break it. */
    var blogTitle = document.querySelector('[data-blog-title]');
    if (blogTitle) {
      gsap.timeline({
        scrollTrigger: { trigger: '.blog__panel', start: 'top 80%', once: true }
      })
        .from('[data-blog-badge]', { opacity: 0, y: 14, duration: 0.55, ease: 'power2.out' }, 0)
        .from(blogTitle, { opacity: 0, y: 26, duration: 0.85, ease: 'power3.out' }, 0.1)
        .from('[data-blog-intro]', { opacity: 0, y: 18, duration: 0.7, ease: 'power3.out' }, 0.22);

      var blogCards = gsap.utils.toArray('.blog__track .blog-card');
      if (blogCards.length) {
        gsap.from(blogCards, {
          opacity: 0,
          y: 34,
          duration: 0.85,
          ease: 'power3.out',
          stagger: 0.08,
          // x is untouched on purpose — animating it would fight scrollLeft
          clearProps: 'transform,opacity',
          scrollTrigger: { trigger: '.blog__body', start: 'top 88%', once: true }
        });
      }
    }

    /* ---------- about page: founding section ---------- */
    var founding = document.querySelector('.founding');
    if (founding) {
      gsap.timeline({
        scrollTrigger: { trigger: '.founding', start: 'top 78%', once: true }
      })
        .from('[data-founding-head]', { opacity: 0, y: 35, duration: 0.9, ease: 'power3.out' }, 0)
        .from('[data-founding-copy]', { opacity: 0, y: 30, duration: 0.85, ease: 'power3.out' }, 0.2)
        .from('[data-founding-portrait]', { opacity: 0, y: 45, scale: 0.96, duration: 1.1, ease: 'power3.out' }, 0.15);
    }

    /* ---------- about page: highlights section ---------- */
    var highlights = document.querySelector('.highlights');
    if (highlights) {
      gsap.timeline({
        scrollTrigger: { trigger: '.highlights', start: 'top 80%', once: true }
      })
        .from('[data-highlights-head]', { opacity: 0, y: 30, duration: 0.85, ease: 'power3.out' }, 0)
        .from('[data-highlights-cards] .highlights__item', { opacity: 0, y: 35, duration: 0.9, ease: 'power3.out', stagger: 0.15 }, 0.2);
    }

    /* ---------- why choose us section ---------- */
    var whyChoose = document.querySelector('.why-choose');
    if (whyChoose) {
      gsap.timeline({
        scrollTrigger: { trigger: '.why-choose', start: 'top 78%', once: true }
      })
        .from('[data-why-eyebrow]', { opacity: 0, y: 20, duration: 0.7, ease: 'power3.out' }, 0)
        .from('[data-why-header]', { opacity: 0, y: 30, duration: 0.85, ease: 'power3.out' }, 0.1)
        .from('[data-why-narrative]', { opacity: 0, y: 25, duration: 0.8, ease: 'power3.out' }, 0.2)
        .from('[data-why-card]', { opacity: 0, y: 35, duration: 0.85, ease: 'power3.out', stagger: 0.1 }, 0.25);
    }

    /* ---------- service page: intro split section ---------- */
    var svcIntro = document.querySelector('.svc-intro');
    if (svcIntro) {
      gsap.timeline({
        scrollTrigger: { trigger: '.svc-intro', start: 'top 78%', once: true }
      })
        .from('[data-svc-content]', { opacity: 0, x: -35, duration: 0.9, ease: 'power3.out' }, 0)
        .from('[data-svc-media]', { opacity: 0, scale: 0.98, duration: 1.1, ease: 'power3.out' }, 0.15);
    }

    /* ---------- service page: principles section ---------- */
    var principles = document.querySelector('.principles');
    if (principles) {
      gsap.timeline({
        scrollTrigger: { trigger: '.principles', start: 'top 80%', once: true }
      })
        .from('[data-principles-head]', { opacity: 0, y: 30, duration: 0.85, ease: 'power3.out' }, 0)
        .from('[data-principles-cards] .principle-card', { opacity: 0, y: 35, duration: 0.9, ease: 'power3.out', stagger: 0.12 }, 0.2);
    }

    /* ---------- service page: values section ---------- */
    var valuesSec = document.querySelector('.values-sec');
    if (valuesSec) {
      gsap.timeline({
        scrollTrigger: { trigger: '.values-sec', start: 'top 80%', once: true }
      })
        .from('[data-values-head]', { opacity: 0, x: -30, duration: 0.85, ease: 'power3.out' }, 0)
        .from('[data-values-cards] .value-card', { opacity: 0, y: 30, duration: 0.85, ease: 'power3.out', stagger: 0.1 }, 0.15);
    }

    /* ---------- service page: recovery impact section ---------- */
    var impactSec = document.querySelector('.impact-sec');
    if (impactSec) {
      gsap.timeline({
        scrollTrigger: { trigger: '.impact-sec', start: 'top 80%', once: true }
      })
        .from('[data-impact-head]', { opacity: 0, y: 30, duration: 0.85, ease: 'power3.out' }, 0)
        .from('[data-impact-cards] .impact-card', { opacity: 0, y: 35, duration: 0.9, ease: 'power3.out', stagger: 0.1 }, 0.2);

      /* Interactive Category Tabs with Full Data Engine */
      var impactTabs = impactSec.querySelectorAll('.impact-tab');
      var impactCardsContainer = impactSec.querySelector('[data-impact-cards]');
      var impactCards = impactSec.querySelectorAll('.impact-card');

      var impactData = {
        sports: [
          {
            tag: 'Return to Sport',
            title: '92% Return Rate',
            desc: 'Over 92% of competitive and recreational athletes achieve full return to sport following anatomical graft reconstruction.',
            citation: 'Clinical Sports Medicine Journal, 2025',
            featured: false
          },
          {
            tag: 'Pivot Stability',
            title: 'Zero Rotational Laxity',
            desc: 'Anatomical tunnel placement eliminates pivot-shift instability, restoring complete cutting and deceleration confidence.',
            citation: 'Durva Orthopaedic Arthroscopy Registry',
            featured: true
          },
          {
            tag: 'Peak Performance',
            title: 'Quadriceps Strength',
            desc: 'Accelerated isometric and kinetic rehab protocols restore symmetrical limb strength within 6 to 9 months.',
            citation: 'American Journal of Sports Medicine',
            featured: false
          },
          {
            tag: 'Injury Prevention',
            title: 'Graft Maturation',
            desc: 'High-tensile autografts and modern fixation provide strong early biological integration and lower re-tear rates.',
            citation: 'International Arthroscopy Review, 2024',
            featured: false
          }
        ],
        mobility: [
          {
            tag: 'Day One',
            title: 'Early Weight Bearing',
            desc: 'Modern arthroscopic techniques allow full-extension assisted walking within 24 to 48 hours post-surgery.',
            citation: 'Orthopaedic Rehabilitation Guidelines',
            featured: false
          },
          {
            tag: 'Range of Motion',
            title: '0° to 130° Flexion',
            desc: 'Targeted manual therapy and continuous motion protocols restore normal knee bending without scar stiffness.',
            citation: 'Durva Clinical Mobility Protocol',
            featured: true
          },
          {
            tag: 'Daily Confidence',
            title: 'Stairs & Slopes',
            desc: 'Eliminates the sensation of the knee giving way when navigating stairs, uneven pavements, and sudden steps.',
            citation: 'Patient Physical Recovery Index',
            featured: false
          },
          {
            tag: 'Swelling Control',
            title: 'Minimal Effusion',
            desc: 'Cryotherapy and precise keyhole instrumentation minimize post-operative joint effusion and pain medication needs.',
            citation: 'Journal of Arthroscopic Surgery',
            featured: false
          }
        ],
        longevity: [
          {
            tag: 'Cartilage Defense',
            title: '85% Arthritis Reduction',
            desc: 'Restoring mechanical alignment dramatically slows articular cartilage wear and prevents secondary joint breakdown.',
            citation: 'Osteoarthritis & Joint Longevity Study',
            featured: false
          },
          {
            tag: 'Meniscus Health',
            title: 'Meniscal Preservation',
            desc: 'Simultaneous arthroscopic meniscus repair saves native shock absorption, protecting joint health for decades.',
            citation: 'Durva Long-Term Joint Registry',
            featured: true
          },
          {
            tag: 'Natural Kinematics',
            title: 'Symmetrical Loading',
            desc: 'Corrects asymmetric gait mechanics, preventing compensation strain on the contralateral knee and lower back.',
            citation: 'International Biomechanics Report',
            featured: false
          },
          {
            tag: 'Bone Quality',
            title: 'Subchondral Integrity',
            desc: 'Normal load distribution preserves bone density and prevents premature degenerative joint wear.',
            citation: 'Global Orthopaedic Kinematics, 2025',
            featured: false
          }
        ],
        work: [
          {
            tag: 'Desk & Office',
            title: 'Return in 7–10 Days',
            desc: 'Patients with sedentary or desk-based roles comfortably resume full professional work within 1 to 2 weeks.',
            citation: 'Occupational Health & Orthopaedics',
            featured: false
          },
          {
            tag: 'Active Careers',
            title: 'Heavy Duty Capacity',
            desc: 'Engineered strength protocols enable manual workers, police, and field professionals to safely resume full physical duties.',
            citation: 'Durva Occupational Recovery Registry',
            featured: true
          },
          {
            tag: 'Driving & Commute',
            title: 'Braking Reflex Return',
            desc: 'Emergency braking reaction time and right-leg pedal control return fully by 4 to 6 weeks post-procedure.',
            citation: 'Driving Safety & Orthopaedic Standards',
            featured: false
          },
          {
            tag: 'Travel & Lifestyle',
            title: 'Unrestricted Living',
            desc: 'Full freedom to travel, trek, cycle, and enjoy family activities without fear of joint swelling or buckling.',
            citation: 'Quality of Life Outcomes Journal',
            featured: false
          }
        ]
      };

      impactTabs.forEach(function (tab) {
        tab.addEventListener('click', function () {
          var targetTab = tab.getAttribute('data-tab');
          if (!impactData[targetTab]) return;

          impactTabs.forEach(function (t) {
            t.classList.remove('is-active');
            t.setAttribute('aria-selected', 'false');
          });
          tab.classList.add('is-active');
          tab.setAttribute('aria-selected', 'true');

          var items = impactData[targetTab];

          gsap.to(impactCards, {
            opacity: 0,
            y: 10,
            duration: 0.22,
            stagger: 0.03,
            ease: 'power2.in',
            onComplete: function () {
              impactCards.forEach(function (card, idx) {
                var data = items[idx];
                if (!data) return;

                if (data.featured) {
                  card.classList.add('impact-card--featured');
                } else {
                  card.classList.remove('impact-card--featured');
                }

                var tagEl = card.querySelector('.impact-card__tag');
                var titleEl = card.querySelector('.impact-card__title');
                var descEl = card.querySelector('.impact-card__desc');
                var citationEl = card.querySelector('.impact-card__citation span');

                if (tagEl) tagEl.textContent = data.tag;
                if (titleEl) titleEl.textContent = data.title;
                if (descEl) descEl.textContent = data.desc;
                if (citationEl) citationEl.textContent = data.citation;
              });

              gsap.fromTo(
                impactCards,
                { opacity: 0, y: 15 },
                { opacity: 1, y: 0, duration: 0.45, stagger: 0.08, ease: 'power2.out' }
              );
            }
          });
        });
      });
    }

    /* ---------- footer ---------- */
    var footer = document.querySelector('.site-footer');
    if (footer) {
      gsap.timeline({
        scrollTrigger: { trigger: '.site-footer', start: 'top 85%', once: true }
      })
        .from('[data-footer-top]', { opacity: 0, y: 30, duration: 0.8, ease: 'power3.out' }, 0)
        .from('[data-footer-col]', { opacity: 0, y: 25, duration: 0.7, ease: 'power3.out', stagger: 0.1 }, 0.15)
        .from('[data-footer-bottom]', { opacity: 0, duration: 0.8, ease: 'power2.out' }, 0.35)
        .from('[data-footer-skyline]', { opacity: 0, y: 20, duration: 0.9, ease: 'power2.out' }, 0.45);
    }
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initReveals);
  } else {
    initReveals();
  }
})();
