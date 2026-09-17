-- =============================================================
-- FxTopics — Starter Schema
-- Run this in phpMyAdmin → fxtopics → SQL tab
-- =============================================================

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- -------------------------------------------------------------
-- authors
-- -------------------------------------------------------------
DROP TABLE IF EXISTS authors;
CREATE TABLE authors (
  id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  slug          VARCHAR(120) NOT NULL UNIQUE,
  name          VARCHAR(120) NOT NULL,
  bio           TEXT NULL,
  avatar_url    VARCHAR(255) NULL,
  twitter       VARCHAR(60)  NULL,
  created_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------
-- categories
-- -------------------------------------------------------------
DROP TABLE IF EXISTS categories;
CREATE TABLE categories (
  id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  slug          VARCHAR(80) NOT NULL UNIQUE,
  name          VARCHAR(120) NOT NULL,
  description   VARCHAR(255) NULL,
  sort_order    INT NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------
-- articles
-- -------------------------------------------------------------
DROP TABLE IF EXISTS articles;
CREATE TABLE articles (
  id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  slug            VARCHAR(180) NOT NULL UNIQUE,
  title           VARCHAR(255) NOT NULL,
  excerpt         TEXT NULL,
  body            LONGTEXT NOT NULL,
  featured_image  VARCHAR(255) NULL,
  author_id       INT UNSIGNED NOT NULL,
  category_id     INT UNSIGNED NOT NULL,
  status          ENUM('draft','published','archived') NOT NULL DEFAULT 'draft',
  is_featured     TINYINT(1) NOT NULL DEFAULT 0,
  is_sponsored    TINYINT(1) NOT NULL DEFAULT 0,
  views_count     INT UNSIGNED NOT NULL DEFAULT 0,
  reading_minutes TINYINT UNSIGNED NOT NULL DEFAULT 3,
  meta_title      VARCHAR(255) NULL,
  meta_description VARCHAR(255) NULL,
  published_at    TIMESTAMP NULL,
  created_at      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_status_published (status, published_at DESC),
  INDEX idx_category         (category_id, published_at DESC),
  INDEX idx_author           (author_id),
  CONSTRAINT fk_articles_author   FOREIGN KEY (author_id)   REFERENCES authors(id)   ON DELETE RESTRICT,
  CONSTRAINT fk_articles_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------
-- tags (flat list — articles ↔ tags via article_tags)
-- -------------------------------------------------------------
DROP TABLE IF EXISTS tags;
CREATE TABLE tags (
  id    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  slug  VARCHAR(80) NOT NULL UNIQUE,
  name  VARCHAR(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS article_tags;
CREATE TABLE article_tags (
  article_id INT UNSIGNED NOT NULL,
  tag_id     INT UNSIGNED NOT NULL,
  PRIMARY KEY (article_id, tag_id),
  CONSTRAINT fk_at_article FOREIGN KEY (article_id) REFERENCES articles(id) ON DELETE CASCADE,
  CONSTRAINT fk_at_tag     FOREIGN KEY (tag_id)     REFERENCES tags(id)     ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------
-- brokers
-- -------------------------------------------------------------
DROP TABLE IF EXISTS brokers;
CREATE TABLE brokers (
  id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  slug            VARCHAR(120) NOT NULL UNIQUE,
  name            VARCHAR(160) NOT NULL,
  logo_url        VARCHAR(255) NULL,
  rating          DECIMAL(2,1) NOT NULL DEFAULT 0.0,        -- e.g. 4.6
  founded_year    SMALLINT NULL,
  headquarters    VARCHAR(120) NULL,
  regulation      VARCHAR(255) NULL,                         -- comma-separated regulators
  min_deposit_usd DECIMAL(10,2) NULL,
  max_leverage    VARCHAR(30)  NULL,                         -- e.g. "1:500"
  spreads_from    DECIMAL(6,2) NULL,                         -- pips on EUR/USD
  platforms       VARCHAR(255) NULL,                         -- comma-separated: MT4,MT5,cTrader
  account_types   VARCHAR(255) NULL,                         -- Standard,ECN,Pro
  pros            TEXT NULL,                                 -- JSON array of bullets
  cons            TEXT NULL,                                 -- JSON array of bullets
  verdict         TEXT NULL,
  status          ENUM('draft','published','archived') NOT NULL DEFAULT 'draft',
  sort_order      INT NOT NULL DEFAULT 0,
  created_at      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at      TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_brokers_status (status, sort_order)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

DROP TABLE IF EXISTS broker_promotions;
CREATE TABLE broker_promotions (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  broker_id   INT UNSIGNED NOT NULL,
  title       VARCHAR(180) NOT NULL,
  promo_type  ENUM('bonus','cashback','contest','deposit_match') NOT NULL DEFAULT 'bonus',
  amount      VARCHAR(80) NULL,                              -- "$50 Welcome Bonus", "20% Cashback"
  expires_at  DATE NULL,
  terms_url   VARCHAR(255) NULL,
  is_active   TINYINT(1) NOT NULL DEFAULT 1,
  CONSTRAINT fk_promo_broker FOREIGN KEY (broker_id) REFERENCES brokers(id) ON DELETE CASCADE,
  INDEX idx_promo_active (is_active, expires_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------
-- newsletter_subscribers
-- -------------------------------------------------------------
DROP TABLE IF EXISTS newsletter_subscribers;
CREATE TABLE newsletter_subscribers (
  id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email           VARCHAR(190) NOT NULL UNIQUE,
  ip_address      VARBINARY(16) NULL,                         -- packed for IPv4/IPv6
  user_agent      VARCHAR(255) NULL,
  source          VARCHAR(60)  NULL,                          -- e.g. "footer", "popup", "broker_page"
  status          ENUM('pending','confirmed','unsubscribed') NOT NULL DEFAULT 'confirmed',
  confirm_token   CHAR(40) NULL,
  subscribed_at   TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  unsubscribed_at TIMESTAMP NULL,
  INDEX idx_ns_status (status)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -------------------------------------------------------------
-- market_data_cache (latest tick per instrument)
-- -------------------------------------------------------------
DROP TABLE IF EXISTS market_data_cache;
CREATE TABLE market_data_cache (
  symbol        VARCHAR(20)  NOT NULL PRIMARY KEY,           -- EURUSD, XAUUSD, BTCUSD...
  display_name  VARCHAR(80)  NOT NULL,
  category      ENUM('forex','indices','commodities','crypto','stocks','bonds') NOT NULL,
  last_price    DECIMAL(18,6) NULL,
  change_pct    DECIMAL(8,4)  NULL,
  updated_at    TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  INDEX idx_mdc_category (category, updated_at)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
