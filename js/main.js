/* ==========================================================================
   FX TOPICS - Main JavaScript
   Vanilla JS for interactivity
   ========================================================================== */

(function () {
  'use strict';

  /* ---------- Lucide Icons ---------- */
  if (window.lucide && typeof window.lucide.createIcons === 'function') {
    window.lucide.createIcons();
  }

  /* ---------- Sticky Navigation ---------- */
  const nav = document.querySelector('.nav');
  const navOffset = nav ? nav.offsetTop : 0;

  function handleScroll() {
    if (!nav) return;
    if (window.scrollY > navOffset) {
      nav.classList.add('is-stuck');
    } else {
      nav.classList.remove('is-stuck');
    }
  }

  if (nav) {
    window.addEventListener('scroll', handleScroll, { passive: true });
    handleScroll();
  }

  /* ---------- Mobile Navigation Toggle ---------- */
  const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
  const navEl = document.querySelector('.nav');

  if (mobileMenuBtn && navEl) {
    // Insert mobile close button
    const closeBtn = document.createElement('button');
    closeBtn.className = 'nav-mobile-close';
    closeBtn.setAttribute('aria-label', 'Close menu');
    closeBtn.innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>';
    navEl.prepend(closeBtn);
    closeBtn.style.display = 'none';

    function openMobileMenu() {
      navEl.classList.add('is-mobile-open');
      closeBtn.style.display = 'flex';
      document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
      navEl.classList.remove('is-mobile-open');
      closeBtn.style.display = 'none';
      document.body.style.overflow = '';
    }

    mobileMenuBtn.addEventListener('click', openMobileMenu);
    closeBtn.addEventListener('click', closeMobileMenu);

    // Close menu on link click (mobile)
    navEl.querySelectorAll('.nav__link').forEach(function (link) {
      link.addEventListener('click', function () {
        if (window.innerWidth <= 768) {
          closeMobileMenu();
        }
      });
    });
  }

  /* ---------- Search Trigger ---------- */
  const searchTriggers = document.querySelectorAll('.search-trigger');
  searchTriggers.forEach(function (trigger) {
    trigger.addEventListener('click', function () {
      window.location.href = 'search.html';
    });
  });

  /* ---------- Newsletter Form ---------- */
  const newsletterForms = document.querySelectorAll('.newsletter__form');
  newsletterForms.forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const input = form.querySelector('.newsletter__input');
      if (!input || !input.value.trim()) return;
      const submit = form.querySelector('.newsletter__submit');
      const original = submit.textContent;
      submit.textContent = 'Subscribed';
      submit.style.background = 'var(--color-up)';
      submit.style.borderColor = 'var(--color-up)';
      submit.style.color = 'var(--color-paper)';
      input.value = '';
      setTimeout(function () {
        submit.textContent = original;
        submit.style.background = '';
        submit.style.borderColor = '';
        submit.style.color = '';
      }, 2400);
    });
  });

  /* ---------- Lazy Loading Images (fallback for browsers without native lazy) ---------- */
  if ('loading' in HTMLImageElement.prototype) {
    document.querySelectorAll('img[loading="lazy"]').forEach(function (img) {
      if (img.dataset.src) img.src = img.dataset.src;
    });
  } else {
    // Fallback IntersectionObserver
    if ('IntersectionObserver' in window) {
      const lazyImgObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            const img = entry.target;
            if (img.dataset.src) {
              img.src = img.dataset.src;
              img.removeAttribute('data-src');
            }
            lazyImgObserver.unobserve(img);
          }
        });
      });
      document.querySelectorAll('img[loading="lazy"]').forEach(function (img) {
        lazyImgObserver.observe(img);
      });
    }
  }

  /* ---------- Smooth scroll for anchor links ---------- */
  document.querySelectorAll('a[href^="#"]').forEach(function (link) {
    link.addEventListener('click', function (e) {
      const href = this.getAttribute('href');
      if (href === '#' || href.length < 2) return;
      const target = document.querySelector(href);
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  /* ---------- Active nav link highlighting ---------- */
  const currentPath = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav__link').forEach(function (link) {
    const href = link.getAttribute('href');
    if (href === currentPath) {
      link.classList.add('is-active');
    }
  });

  /* ---------- Search filter chips (search.html) ---------- */
  const filterChips = document.querySelectorAll('.search-filter');
  filterChips.forEach(function (chip) {
    chip.addEventListener('click', function () {
      filterChips.forEach(function (c) { c.classList.remove('is-active'); });
      chip.classList.add('is-active');
    });
  });

  /* ---------- Current year in footer ---------- */
  document.querySelectorAll('[data-year]').forEach(function (el) {
    el.textContent = new Date().getFullYear();
  });

  /* ---------- Reading time calc ---------- */
  document.querySelectorAll('[data-reading-time]').forEach(function (el) {
    const targetSelector = el.getAttribute('data-reading-time');
    const target = document.querySelector(targetSelector);
    if (!target) return;
    const text = target.textContent || '';
    const wordsPerMinute = 220;
    const words = text.trim().split(/\s+/).length;
    const minutes = Math.max(1, Math.round(words / wordsPerMinute));
    el.textContent = minutes + ' min read';
  });

})();