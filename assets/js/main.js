// assets/js/main.js — nav interactions only

(function () {
  'use strict';

  var header = document.querySelector('[data-header]');
  var toggle = document.querySelector('[data-nav-toggle]');
  var dropdowns = Array.prototype.slice.call(document.querySelectorAll('[data-dropdown]'));
  /* Must match the nav's own breakpoint in main.css (--bp-nav). The CSS
     decides whether the nav is a bar or a sheet; this decides whether tapping
     a parent item opens an accordion or follows its link. If the two drift,
     one width ends up with a sheet whose groups will not open. */
  var collapsed = window.matchMedia('(max-width: 1259px)');
  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ---------- submenus ----------
     Above that width the CSS opens them on hover and focus-within. Below it the
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
      if (open) header.classList.remove('is-hidden');
    });
  }

  // the in-sheet close button, which is the only visible way out once the
  // opaque sheet covers the burger
  document.querySelectorAll('[data-nav-close]').forEach(function (el) {
    el.addEventListener('click', closeMenu);
  });

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

  /* ---------- sticky reveal ----------
     Down hides the bar, up brings it back, and the top of the page is left
     exactly as it was — the hero's own transparent bar, no white, no shadow.

     TOP_ZONE is why the reveal never fights the hero. Inside it neither class
     is set at all, so scrolling the first few dozen pixels cannot flicker the
     white bar on and off; past it the two classes take over.

     DELTA exists because a trackpad emits a stream of one- and two-pixel
     deltas, some of them against the direction of travel. Reacting to every
     one of those would flip the bar on and off on a single flick. A move
     smaller than DELTA is not a direction change, and — importantly — does
     not update lastY either, so a slow drag still accumulates until it is
     unambiguous rather than being swallowed a pixel at a time.            */
  var TOP_ZONE = 72;
  var DELTA = 6;
  var lastY = window.scrollY || window.pageYOffset || 0;
  var queued = false;

  function syncHeader() {
    queued = false;
    if (!header) return;

    var y = window.scrollY || window.pageYOffset || 0;

    /* the sheet is open: the bar is the thing holding it, so it stays put and
       the scroll position is only remembered for when the sheet closes */
    if (header.classList.contains('is-open')) {
      lastY = y;
      return;
    }

    if (y <= TOP_ZONE) {
      header.classList.remove('is-stuck', 'is-hidden');
      lastY = y;
      return;
    }

    var diff = y - lastY;
    if (diff > -DELTA && diff < DELTA) return; // too small to be a direction

    if (diff > 0) {
      /* Going down. `is-stuck` is deliberately NOT removed here: if the bar
         is already wearing the white skin it leaves in it, rather than
         fading back to glass on its way off the screen. */
      header.classList.add('is-hidden');
    } else {
      header.classList.add('is-stuck');
      header.classList.remove('is-hidden');
    }

    lastY = y;
  }

  window.addEventListener('scroll', function () {
    if (queued) return;
    queued = true;
    window.requestAnimationFrame(syncHeader);
  }, { passive: true });

  /* a reload part-way down a page starts scrolled, and the bar should not be
     mid-state when it does */
  syncHeader();

  /* ---------- policy pages: contents rail ----------
     Marks the section you are currently reading in the left-hand rail.

     IntersectionObserver, not a scroll handler doing getBoundingClientRect on
     every section: the browser does the geometry off the main thread and only
     calls back when a section actually crosses the line.

     The rootMargin is what makes it read correctly. '-30% 0px -60% 0px'
     shrinks the observed area to a band a third of the way down the screen,
     so the active item is the section under the reader's eye rather than
     whichever one happens to be touching the bottom edge.               */
  function initLegalToc() {
    var toc = document.querySelector('[data-lg-toc]');
    if (!toc || !('IntersectionObserver' in window)) return;

    var links = Array.prototype.slice.call(toc.querySelectorAll('[data-lg-toc-link]'));
    var sections = Array.prototype.slice.call(document.querySelectorAll('[data-lg-sec]'));
    if (!links.length || !sections.length) return;

    function mark(id) {
      links.forEach(function (a) {
        a.classList.toggle('is-active', a.getAttribute('href') === '#' + id);
      });
    }

    var seen = {};

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        seen[e.target.id] = e.isIntersecting;
      });

      /* first section still in the band wins — going back up the page, the
         one nearer the top is the one being read */
      for (var i = 0; i < sections.length; i++) {
        if (seen[sections[i].id]) {
          mark(sections[i].id);
          return;
        }
      }
    }, { rootMargin: '-30% 0px -60% 0px', threshold: 0 });

    sections.forEach(function (s) { io.observe(s); });
    mark(sections[0].id);
  }

  initLegalToc();

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

  /* ---------- appointment dropdown ----------
     A listbox replacing the native <select>, because the native popup cannot
     be styled and was inheriting the closed control's muted colour into every
     option. The value posts through a hidden input.

     Keyboard is the whole reason this is more than a click handler: a custom
     listbox that only responds to the mouse is a downgrade on the native
     control it replaced, not an upgrade.                                    */
  function initDropdown(root) {
    var btn = root.querySelector('[data-dd-btn]');
    var list = root.querySelector('[data-dd-list]');
    var text = root.querySelector('[data-dd-text]');
    var value = root.querySelector('[data-dd-value]');
    if (!btn || !list || !text || !value) return;

    // group headings are role="presentation" and must never be landed on
    var options = Array.prototype.slice.call(list.querySelectorAll('[role="option"]'));
    if (!options.length) return;

    var activeIndex = -1;
    var typeahead = '';
    var typeaheadTimer = null;

    function isOpen() {
      return !list.hidden;
    }

    function setActive(i, scroll) {
      if (i < 0 || i >= options.length) return;
      options.forEach(function (o) { o.classList.remove('is-active'); });
      activeIndex = i;
      var opt = options[i];
      opt.classList.add('is-active');
      btn.setAttribute('aria-activedescendant', opt.id);
      if (scroll !== false) opt.scrollIntoView({ block: 'nearest' });
    }

    function open() {
      if (isOpen()) return;
      list.hidden = false;
      root.classList.add('is-open');
      btn.setAttribute('aria-expanded', 'true');
      // land on the current choice if there is one, otherwise the first row
      var selected = options.findIndex(function (o) {
        return o.getAttribute('aria-selected') === 'true';
      });
      setActive(selected > -1 ? selected : 0);
    }

    function close(focusBtn) {
      if (!isOpen()) return;
      list.hidden = true;
      root.classList.remove('is-open');
      btn.setAttribute('aria-expanded', 'false');
      btn.removeAttribute('aria-activedescendant');
      options.forEach(function (o) { o.classList.remove('is-active'); });
      activeIndex = -1;
      if (focusBtn !== false) btn.focus();
    }

    function choose(i) {
      var opt = options[i];
      if (!opt) return;
      options.forEach(function (o) { o.setAttribute('aria-selected', 'false'); });
      opt.setAttribute('aria-selected', 'true');
      value.value = opt.getAttribute('data-value') || '';
      text.textContent = opt.textContent.trim();
      root.classList.add('is-filled');
      close();
    }

    btn.addEventListener('click', function () {
      if (isOpen()) close(); else open();
    });

    // pointerdown, not click: the list closes on blur, and a click would have
    // already lost the row by the time it fired
    list.addEventListener('click', function (event) {
      var opt = event.target.closest('[role="option"]');
      if (!opt) return;
      choose(options.indexOf(opt));
    });

    btn.addEventListener('keydown', function (event) {
      var key = event.key;

      if (!isOpen()) {
        if (key === 'ArrowDown' || key === 'ArrowUp' || key === 'Enter' || key === ' ') {
          event.preventDefault();
          open();
        }
        return;
      }

      if (key === 'ArrowDown') {
        event.preventDefault();
        setActive(Math.min(activeIndex + 1, options.length - 1));
      } else if (key === 'ArrowUp') {
        event.preventDefault();
        setActive(Math.max(activeIndex - 1, 0));
      } else if (key === 'Home') {
        event.preventDefault();
        setActive(0);
      } else if (key === 'End') {
        event.preventDefault();
        setActive(options.length - 1);
      } else if (key === 'Enter' || key === ' ') {
        event.preventDefault();
        choose(activeIndex);
      } else if (key === 'Escape') {
        event.preventDefault();
        close();
      } else if (key === 'Tab') {
        close(false);
      } else if (key.length === 1 && /\S/.test(key)) {
        // type-ahead, the one affordance people miss most from a real select
        window.clearTimeout(typeaheadTimer);
        typeahead += key.toLowerCase();
        typeaheadTimer = window.setTimeout(function () { typeahead = ''; }, 600);
        var hit = options.findIndex(function (o) {
          return o.textContent.trim().toLowerCase().indexOf(typeahead) === 0;
        });
        if (hit > -1) setActive(hit);
      }
    });

    document.addEventListener('click', function (event) {
      if (!root.contains(event.target)) close(false);
    });
  }

  document.querySelectorAll('[data-dd]').forEach(initDropdown);

  /* ---------- gallery lightbox ----------
     One viewer for both media types. The <video> element is BUILT ON OPEN and
     destroyed on close — the clip is tens of megabytes, and a <video> sitting
     in the markup would start fetching on page load for something most
     visitors never click.

     Focus is moved into the dialog and returned to the card that opened it,
     and Tab is kept inside while it is open: a modal you can Tab out of
     leaves a keyboard user stranded behind the backdrop.               */
  function initGallery(grid) {
    var cards = Array.prototype.slice.call(grid.querySelectorAll('[data-gal-item]'));
    var box = document.querySelector('[data-lbx]');
    if (!cards.length || !box) return;

    var stage = box.querySelector('[data-lbx-stage]');
    var capOut = box.querySelector('[data-lbx-cap]');
    var nowOut = box.querySelector('[data-lbx-now]');
    var prevBtn = box.querySelector('[data-lbx-prev]');
    var nextBtn = box.querySelector('[data-lbx-next]');
    var closers = Array.prototype.slice.call(box.querySelectorAll('[data-lbx-close]'));
    var panel = box.querySelector('.lbx__panel');

    var index = 0;
    var opener = null;

    function render(i) {
      index = (i + cards.length) % cards.length;
      var card = cards[index];
      var type = card.getAttribute('data-type');
      var full = card.getAttribute('data-full');
      var cap = card.getAttribute('data-caption') || '';

      // dropping the old node is what stops a video carrying on in the
      // background when you page past it
      stage.innerHTML = '';

      if (type === 'video') {
        var video = document.createElement('video');
        video.src = full;
        video.poster = card.getAttribute('data-poster') || '';
        video.controls = true;
        video.autoplay = true;
        video.playsInline = true;
        video.preload = 'metadata';
        stage.appendChild(video);
      } else {
        var img = document.createElement('img');
        img.src = full;
        img.alt = cap;
        stage.appendChild(img);
      }

      capOut.textContent = cap;
      if (nowOut) nowOut.textContent = String(index + 1);
    }

    function open(i, from) {
      opener = from || null;
      box.hidden = false;
      document.body.style.overflow = 'hidden';
      render(i);
      (nextBtn || panel).focus();
    }

    function close() {
      // clear the stage BEFORE hiding, or a playing video keeps its audio
      stage.innerHTML = '';
      box.hidden = true;
      document.body.style.removeProperty('overflow');
      if (opener) opener.focus();
      opener = null;
    }

    cards.forEach(function (card, i) {
      card.addEventListener('click', function () { open(i, card); });
    });

    if (prevBtn) prevBtn.addEventListener('click', function () { render(index - 1); });
    if (nextBtn) nextBtn.addEventListener('click', function () { render(index + 1); });
    closers.forEach(function (el) { el.addEventListener('click', close); });

    document.addEventListener('keydown', function (event) {
      if (box.hidden) return;

      if (event.key === 'Escape') {
        event.preventDefault();
        close();
      } else if (event.key === 'ArrowRight') {
        event.preventDefault();
        render(index + 1);
      } else if (event.key === 'ArrowLeft') {
        event.preventDefault();
        render(index - 1);
      } else if (event.key === 'Tab') {
        // keep Tab inside the dialog
        var focusable = panel.querySelectorAll('button, video, [href]');
        if (!focusable.length) return;
        var first = focusable[0];
        var last = focusable[focusable.length - 1];
        if (event.shiftKey && document.activeElement === first) {
          event.preventDefault();
          last.focus();
        } else if (!event.shiftKey && document.activeElement === last) {
          event.preventDefault();
          first.focus();
        }
      }
    });

    /* swipe, so the viewer is not button-only on a phone */
    var touchX = null;
    box.addEventListener('touchstart', function (e) {
      touchX = e.changedTouches[0].clientX;
    }, { passive: true });

    box.addEventListener('touchend', function (e) {
      if (touchX === null) return;
      var dx = e.changedTouches[0].clientX - touchX;
      if (Math.abs(dx) > 45) render(index + (dx < 0 ? 1 : -1));
      touchX = null;
    }, { passive: true });
  }

  document.querySelectorAll('[data-gal]').forEach(initGallery);

  /* ---------- FAQ accordion ----------
     One open at a time, matching the reference. The panel height is animated
     in CSS (grid 0fr -> 1fr), so this only owns state: the is-open class and
     aria-expanded. Keyboard comes free — the triggers are real buttons.   */
  function initFaq(root) {
    var triggers = Array.prototype.slice.call(root.querySelectorAll('[data-faq-trigger]'));
    if (!triggers.length) return;

    function setOpen(item, trigger, open) {
      item.classList.toggle('is-open', open);
      trigger.setAttribute('aria-expanded', String(open));
    }

    triggers.forEach(function (trigger) {
      trigger.addEventListener('click', function () {
        var item = trigger.closest('.faq__item');
        if (!item) return;
        var willOpen = !item.classList.contains('is-open');

        // close the rest first, so two panels are never mid-animation
        triggers.forEach(function (other) {
          var otherItem = other.closest('.faq__item');
          if (otherItem && otherItem !== item) setOpen(otherItem, other, false);
        });

        setOpen(item, trigger, willOpen);
      });
    });
  }

  document.querySelectorAll('[data-faq]').forEach(initFaq);

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

    /* ---------- scope / let's talk (ACL page) ----------
       The two panels arrive together on a short stagger — pulling them
       further apart would break the pair. */
    var duoItems = gsap.utils.toArray('[data-duo-item]');
    if (duoItems.length) {
      gsap.from(duoItems, {
        opacity: 0,
        y: 30,
        duration: 0.85,
        ease: 'power3.out',
        stagger: 0.1,
        clearProps: 'transform,opacity',
        scrollTrigger: { trigger: '.duo', start: 'top 82%', once: true }
      });
    }

    /* ---------- blog detail ----------
       Banner first as one ordered run, then the featured image, then the
       prose — the image is given its own tween because it scales as well as
       fades, and lumping it into the stagger would have applied that scale
       to the headline too. */
    var bdItems = gsap.utils.toArray('[data-bd-item]');
    if (bdItems.length) {
      gsap.from(bdItems, {
        opacity: 0,
        y: 22,
        duration: 0.7,
        ease: 'power3.out',
        stagger: 0.08,
        clearProps: 'transform,opacity',
        scrollTrigger: { trigger: '.bd-hero', start: 'top 88%', once: true }
      });
    }

    var bdFig = document.querySelector('[data-bd-fig]');
    if (bdFig) {
      gsap.from(bdFig, {
        opacity: 0,
        y: 30,
        scale: 0.985,
        duration: 0.95,
        ease: 'power3.out',
        clearProps: 'transform,opacity',
        scrollTrigger: { trigger: bdFig, start: 'top 90%', once: true }
      });

      gsap.from(gsap.utils.toArray('[data-bd-body]'), {
        opacity: 0,
        y: 20,
        duration: 0.75,
        ease: 'power3.out',
        stagger: 0.1,
        delay: 0.12,
        clearProps: 'transform,opacity',
        scrollTrigger: { trigger: '.bd__main', start: 'top 78%', once: true }
      });
    }

    /* ---------- appointment form ---------- */
    var apptItems = gsap.utils.toArray('[data-appt-item]');
    if (apptItems.length) {
      gsap.from(apptItems, {
        opacity: 0,
        y: 26,
        duration: 0.75,
        ease: 'power3.out',
        stagger: 0.08,
        clearProps: 'transform,opacity',
        scrollTrigger: { trigger: '.appt', start: 'top 84%', once: true }
      });
    }

    /* ---------- FAQ (treatment + booking pages) ---------- */
    var faqItems = gsap.utils.toArray('[data-faq-item]');
    if (faqItems.length) {
      gsap.from(faqItems, {
        opacity: 0,
        y: 24,
        duration: 0.7,
        ease: 'power3.out',
        stagger: 0.07,
        clearProps: 'transform,opacity',
        scrollTrigger: { trigger: '.faq', start: 'top 84%', once: true }
      });
    }

    /* ---------- doctor CTA (ACL page) ----------
       Only present on the service pages; the guard means the home page skips
       it rather than throwing on a null trigger. */
    var dctaItems = gsap.utils.toArray('[data-dcta-item]');
    if (dctaItems.length) {
      gsap.from(dctaItems, {
        opacity: 0,
        y: 26,
        duration: 0.8,
        ease: 'power3.out',
        stagger: 0.09,
        clearProps: 'transform,opacity',
        scrollTrigger: { trigger: '[data-dcta]', start: 'top 84%', once: true }
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

    /* ---------- service page: picture strip ----------
       clearProps because the figures have a hover transform of their own, and
       a tween that finishes leaves its inline transform behind — which would
       win over the CSS :hover and kill the lift on every card it touched. */
    var txGal = document.querySelector('.tx-gal');
    if (txGal) {
      gsap.timeline({
        scrollTrigger: { trigger: '.tx-gal', start: 'top 82%', once: true }
      })
        .from('[data-tx-gal-head]', { opacity: 0, y: 26, duration: 0.8, ease: 'power3.out' }, 0)
        .from('[data-tx-gal-item]', {
          opacity: 0,
          y: 34,
          duration: 0.85,
          ease: 'power3.out',
          stagger: 0.11,
          clearProps: 'transform,opacity'
        }, 0.15);
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
        .from('.impact-panel.is-active .impact-card', { opacity: 0, y: 35, duration: 0.9, ease: 'power3.out', stagger: 0.1 }, 0.2);

      /* Interactive Category Tabs */
      var impactTabs = impactSec.querySelectorAll('[data-tab-target]');
      var impactPanels = impactSec.querySelectorAll('[data-panel-id]');

      impactTabs.forEach(function (tab) {
        tab.addEventListener('click', function (e) {
          e.preventDefault();
          var targetId = tab.getAttribute('data-tab-target');
          if (!targetId) return;

          impactTabs.forEach(function (t) {
            t.classList.remove('is-active');
            t.setAttribute('aria-selected', 'false');
          });
          tab.classList.add('is-active');
          tab.setAttribute('aria-selected', 'true');

          impactPanels.forEach(function (panel) {
            if (panel.getAttribute('data-panel-id') === targetId) {
              panel.classList.add('is-active');
              var cards = panel.querySelectorAll('.impact-card');
              gsap.fromTo(
                cards,
                { opacity: 0, y: 20 },
                { opacity: 1, y: 0, duration: 0.45, stagger: 0.08, ease: 'power2.out', clearProps: 'transform,opacity' }
              );
            } else {
              panel.classList.remove('is-active');
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

  /* ==========================================================================
     Floating Contact Button Entrance
     ========================================================================== */
  function initFloatingContact() {
    var widget = document.getElementById('floating-contact');
    if (!widget) return;

    if (window.gsap && typeof gsap.from === 'function') {
      gsap.from(widget, {
        opacity: 0,
        y: 16,
        duration: 0.6,
        delay: 0.4,
        ease: 'power3.out',
        clearProps: 'transform,opacity'
      });
    }
  }

  function initApp() {
    initReveals();
    initFloatingContact();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initApp);
  } else {
    initApp();
  }
})();
