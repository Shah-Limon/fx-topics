<?php
/**
 * Site Footer — 5-column layout + bottom bar + compliance disclaimer
 */
?>
<footer class="site-footer">
  <div class="site-footer__grid">
    <div class="site-footer__brand">
      <a href="index.php" class="site-logo">
        <span class="site-logo__mark" aria-hidden="true"></span>
        <span class="site-logo__text">
          Fx<span style="color:var(--color-accent)">Topics</span>
          <span class="site-logo__sub"><?= htmlspecialchars(FXTOPICS_TAGLINE) ?></span>
        </span>
      </a>
      <p class="site-footer__about">Independent financial journalism, in-depth broker reviews and market analysis for serious traders and institutional professionals.</p>
      <div class="site-footer__social">
        <a href="#" aria-label="Twitter"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
        <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.063 2.063 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
        <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
        <a href="#" aria-label="RSS"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M6.18 15.64a2.18 2.18 0 0 1 2.18 2.18C8.36 19.014 7.374 20 6.18 20 4.984 20 4 19.014 4 17.82a2.18 2.18 0 0 1 2.18-2.18M4 4.44A15.56 15.56 0 0 1 19.56 20h-2.83A12.73 12.73 0 0 0 4 7.27V4.44m0 5.66a9.9 9.9 0 0 1 9.9 9.9h-2.83A7.07 7.07 0 0 0 4 12.93V10.1z"/></svg></a>
      </div>
    </div>

    <div class="site-footer__col">
      <h4>Markets</h4>
      <ul>
        <li><a href="#forex">Forex</a></li>
        <li><a href="#stocks">Stocks</a></li>
        <li><a href="#crypto">Crypto</a></li>
        <li><a href="#commodities">Commodities</a></li>
        <li><a href="#">Bonds &amp; Rates</a></li>
        <li><a href="#">Indices</a></li>
      </ul>
    </div>

    <div class="site-footer__col">
      <h4>Trading</h4>
      <ul>
        <li><a href="broker-review.php">Broker Reviews</a></li>
        <li><a href="#comparison">Comparison</a></li>
        <li><a href="#education">Education</a></li>
        <li><a href="#education">Strategies</a></li>
        <li><a href="#education">Risk Management</a></li>
        <li><a href="#bonuses">Promotions</a></li>
      </ul>
    </div>

    <div class="site-footer__col">
      <h4>Company</h4>
      <ul>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Editorial Team</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Advertise</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Press Kit</a></li>
      </ul>
    </div>

    <div class="site-footer__col">
      <h4>Legal</h4>
      <ul>
        <li><a href="#">Privacy Policy</a></li>
        <li><a href="#">Terms of Service</a></li>
        <li><a href="#">Cookie Policy</a></li>
        <li><a href="#">Disclaimer</a></li>
        <li><a href="#">Risk Disclosure</a></li>
        <li><a href="#">Editorial Standards</a></li>
      </ul>
    </div>
  </div>

  <div class="site-footer__bottom">
    <div>© <span data-year>2026</span> <?= htmlspecialchars(FXTOPICS_BRAND) ?> Media Ltd. All rights reserved.</div>
    <div class="site-footer__bottom-links">
      <a href="#">Sitemap</a>
      <a href="#">Accessibility</a>
      <a href="#">RSS</a>
      <a href="#">Press</a>
    </div>
  </div>
</footer>

<div class="disclaimer-bar">
  <div class="disclaimer-bar__inner">
    <strong>Risk Disclosure:</strong> Trading forex, CFDs and other leveraged financial instruments carries a high level of risk and may not be suitable for all investors. You could lose more than your initial deposit. Past performance is not indicative of future results. The information on this site is for informational purposes only and does not constitute investment advice. <?= htmlspecialchars(FXTOPICS_BRAND) ?> does not provide execution services.
  </div>
</div>
