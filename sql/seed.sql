-- =============================================================
-- FX Topics — Sample Seed Data
-- Run AFTER schema.sql
-- =============================================================

-- authors
INSERT INTO authors (slug, name, bio, avatar_url, twitter) VALUES
  ('james-whitford',  'James Whitford',  'Senior forex analyst covering G10 currency markets for over a decade.', 'https://i.pravatar.cc/120?img=12', 'jwhitford'),
  ('priya-kapoor',    'Priya Kapoor',    'Equities and commodities editor; previously at a tier-1 sell-side desk.',   'https://i.pravatar.cc/120?img=47', 'priyakapoor'),
  ('marcus-okonkwo',  'Marcus Okonkwo',  'Crypto and DeFi correspondent. Tracks on-chain flows and ETF flows daily.',  'https://i.pravatar.cc/120?img=68', 'marcusok');

-- categories
INSERT INTO categories (slug, name, description, sort_order) VALUES
  ('forex',      'Forex',      'Currency market news, analysis and broker intelligence.', 1),
  ('stocks',     'Stocks',     'Global equities coverage and earnings analysis.',         2),
  ('crypto',     'Crypto',     'Bitcoin, Ethereum and digital asset markets.',            3),
  ('commodities','Commodities','Gold, oil, agriculture and metals.',                      4),
  ('fintech',    'FinTech',    'Banking, payments, regulation and innovation.',           5);

-- tags
INSERT INTO tags (slug, name) VALUES
  ('ecb','ECB'),('fed','Fed'),('gold','Gold'),('bitcoin','Bitcoin'),('earnings','Earnings');

-- articles
INSERT INTO articles
  (slug, title, excerpt, body, author_id, category_id, status, is_featured, published_at, reading_minutes, meta_description)
VALUES
  ('ecb-holds-rates-signals-summer-cut',
   'ECB Holds Rates, Signals Summer Cut as Inflation Cools',
   'Frankfurt — The Governing Council kept the deposit rate at 3.75% but softened its forward guidance.',
   'Full article body would live here in production. The body field accepts long-form HTML or Markdown that the front-end renders.',
   1, 1, 'published', 1, NOW() - INTERVAL 2 HOUR, 4,
   'ECB holds rates at 3.75%; forward guidance hints at a summer cut as eurozone inflation eases.'),
  ('gold-tests-2400-as-fed-pivot-bets-build',
   'Gold Tests $2,400 as Fed Pivot Bets Build',
   'Spot gold extended its rally to a fresh intraday high on softer US payrolls.',
   'Full article body would live here in production.',
   2, 4, 'published', 0, NOW() - INTERVAL 6 HOUR, 3,
   'Spot gold extends rally toward $2,400 on softer US payrolls and rising Fed cut probabilities.'),
  ('bitcoin-etf-flows-turn-positive-after-3-weeks',
   'Bitcoin ETF Flows Turn Positive After 3 Weeks of Outflows',
   'US spot BTC ETFs absorbed $412M yesterday — the largest net inflow since February.',
   'Full article body would live here in production.',
   3, 3, 'published', 0, NOW() - INTERVAL 1 DAY, 4,
   'US spot Bitcoin ETFs see $412M net inflow, snapping a three-week outflow streak.');

INSERT INTO article_tags (article_id, tag_id) VALUES
  (1,1),(1,2),
  (2,2),(2,3),
  (3,4);

-- brokers
INSERT INTO brokers
  (slug, name, rating, founded_year, headquarters, regulation,
   min_deposit_usd, max_leverage, spreads_from, platforms, account_types, pros, cons, verdict, status, sort_order)
VALUES
  ('ironfx-global',     'IronFX Global',     4.5, 2010, 'Limassol, Cyprus',       'CySEC,FCA,ASIC',
   100.00, '1:500', 0.7,  'MT4,MT5,cTrader', 'Standard,ECN,Pro',
   '["Tight ECN spreads","Strong regulatory footprint","Wide platform choice"]',
   '["Inactivity fee after 6 months","Limited educational content"]',
   'A versatile multi-platform broker best suited to active forex traders.',
   'published', 1),
  ('north-pip-markets', 'NorthPip Markets',  4.3, 2014, 'Sydney, Australia',     'ASIC,FSC',
   50.00,  '1:400', 1.1,  'MT5,WebTrader',   'Standard,Raw',
   '["Low minimum deposit","Fast withdrawals","Transparent fee schedule"]',
   '["No MetaTrader 4","Limited product range"]',
   'Solid choice for beginners who value clarity over breadth.',
   'published', 2),
  ('apex-trading-hub',  'Apex Trading Hub',  4.6, 2008, 'Dubai, UAE',            'DFSA,SCA',
   250.00, '1:300', 0.5,  'MT4,MT5,ATHub',   'Standard,ECN,VIP',
   '["Institutional-grade execution","VIP account perks","Wide crypto CFD range"]',
   '["Higher minimum deposit","UAE residents only for DFSA accounts"]',
   'A premium broker for serious traders who want VIP treatment.',
   'published', 3);

INSERT INTO broker_promotions (broker_id, title, promo_type, amount, expires_at, is_active) VALUES
  (1, '$50 Welcome Bonus',    'bonus',  '$50',       DATE_ADD(CURDATE(), INTERVAL 60 DAY), 1),
  (2, '20% Cashback Fridays', 'cashback','20%',      DATE_ADD(CURDATE(), INTERVAL 30 DAY), 1),
  (3, '100% Deposit Match',   'deposit_match','100%',DATE_ADD(CURDATE(), INTERVAL 45 DAY), 1);

-- newsletter subscribers
INSERT INTO newsletter_subscribers (email, source, status) VALUES
  ('reader@example.com', 'footer', 'confirmed');

-- market data cache
INSERT INTO market_data_cache (symbol, display_name, category, last_price, change_pct) VALUES
  ('EURUSD','EUR/USD','forex',       1.0854,  0.0021),
  ('GBPUSD','GBP/USD','forex',       1.2671, -0.0014),
  ('USDJPY','USD/JPY','forex',     154.82,    0.0045),
  ('XAUUSD','Gold','commodities',  2389.50,   0.0122),
  ('WTI','WTI Crude','commodities',   78.34, -0.0083),
  ('BTCUSD','Bitcoin','crypto',   67542.00,   0.0234),
  ('ETHUSD','Ethereum','crypto',   3741.20,   0.0167),
  ('SPX','S&P 500','indices',      5230.40,   0.0042),
  ('NDX','Nasdaq 100','indices',   18412.30,  0.0061),
  ('TSLA','Tesla','stocks',         178.65, -0.0211);
