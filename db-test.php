<?php
/**
 * FX Topics — Connection Test Page
 *
 * Visit:  http://localhost/marketpulse/db-test.php
 *
 * প্রথমে phpMyAdmin এ গিয়ে `marketpulse` database create করুন,
 * তারপর এই page refresh করুন।
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/db.php';

$tests = [];

// ১. Connection alive?
$tests[] = [
    'name'    => 'PDO connection',
    'status'  => true,
    'message' => 'Connected to MySQL ' . $pdo->getAttribute(PDO::ATTR_SERVER_VERSION),
];

// ২. Database accessible?
try {
    $stmt = $pdo->query('SELECT DATABASE() AS db');
    $currentDb = $stmt->fetch()['db'];
    $tests[] = [
        'name'    => 'Current database',
        'status'  => $currentDb === DB_NAME,
        'message' => $currentDb ?: '(none selected)',
    ];
} catch (Throwable $e) {
    $tests[] = [
        'name'    => 'Current database',
        'status'  => false,
        'message' => $e->getMessage(),
    ];
}

// ৩. Tables list
try {
    $stmt = $pdo->query('SHOW TABLES');
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $tests[] = [
        'name'    => 'Tables in database',
        'status'  => true,
        'message' => $tables ? implode(', ', $tables) : '(database খালি — phpMyAdmin এ গিয়ে table তৈরি করুন)',
    ];
} catch (Throwable $e) {
    $tests[] = [
        'name'    => 'Tables in database',
        'status'  => false,
        'message' => $e->getMessage(),
    ];
}

// ৪. Server info
$tests[] = [
    'name'    => 'Server charset',
    'status'  => true,
    'message' => $pdo->query('SHOW VARIABLES LIKE "character_set_server"')->fetch()['Value'] ?? 'unknown',
];
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>FX Topics — DB Connection Test</title>
<style>
  body { font: 14px/1.5 -apple-system, system-ui, sans-serif; background: #0A1628; color: #E5E7EB; padding: 40px; }
  h1   { font-family: Georgia, serif; color: #C9A961; margin: 0 0 24px; }
  .card{ background:#0F1E3A; border:1px solid #1F2937; border-radius:8px; padding:20px; max-width:760px; }
  .row { display:flex; gap:12px; padding:12px 0; border-bottom:1px solid #1F2937; }
  .row:last-child{border-bottom:0;}
  .name{ font-weight:600; min-width:200px; color:#fff;}
  .ok  { color:#047857; font-weight:700; }
  .bad { color:#B91C1C; font-weight:700; }
  code { background:#1F2937; padding:2px 6px; border-radius:4px; font-family:'JetBrains Mono', monospace; }
  a    { color:#C9A961; }
</style>
</head>
<body>
<h1>FX Topics — Database Connection Test</h1>
<div class="card">
  <?php foreach ($tests as $t): ?>
    <div class="row">
      <div class="name"><?= htmlspecialchars($t['name']) ?></div>
      <div>
        <span class="<?= $t['status'] ? 'ok' : 'bad' ?>">
          <?= $t['status'] ? '✓ OK' : '✗ FAIL' ?>
        </span>
        &nbsp; <?= htmlspecialchars((string)$t['message']) ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<p style="margin-top:24px;color:#9CA3AF;">
  Next step: <a href="http://localhost/phpmyadmin/">phpMyAdmin open করুন</a> এবং <code>marketpulse</code> database এ প্রথম table তৈরি করুন।
</p>
</body>
</html>
