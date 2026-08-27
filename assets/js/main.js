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
