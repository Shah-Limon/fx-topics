<?php
/**
 * FxTopics — Article list demo
 *
 * Pulls published articles from the DB and renders them in the
 * site's existing card style. This is a working example of how
 * the static HTML pages will eventually be backed by MySQL.
 *
 * Visit:  http://localhost/fxtopics/articles.php
 */

declare(strict_types=1);

require_once __DIR__ . '/includes/db.php';

/** @var PDO $pdo */

try {
    $sql = "
        SELECT a.id, a.slug, a.title, a.excerpt, a.featured_image,
               a.published_at, a.reading_minutes, a.views_count,
               au.name  AS author_name, au.avatar_url AS author_avatar,
               c.name   AS category_name, c.slug AS category_slug
        FROM articles a
        JOIN authors    au ON au.id = a.author_id
        JOIN categories c  ON c.id  = a.category_id
        WHERE a.status = 'published'
        ORDER BY a.published_at DESC
        LIMIT 20
    ";
    $articles = $pdo->query($sql)->fetchAll();
} catch (Throwable $e) {
    http_response_code(500);
    exit('Could not load articles: ' . htmlspecialchars($e->getMessage()));
}

function time_ago(?string $ts): string {
    if (!$ts) return '';
    $diff = time() - strtotime($ts);
    if ($diff < 3600)        return max(1, (int)($diff / 60))   . ' min ago';
    if ($diff < 86400)       return (int)($diff / 3600)        . ' hr ago';
    if ($diff < 86400 * 7)   return (int)($diff / 86400)       . ' d ago';
    return date('M j, Y', strtotime($ts));
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Latest Articles — FxTopics</title>
<script src="https://cdn.tailwindcss.com"></script>
<style>
  body { font-family: 'Inter', system-ui, sans-serif; background:#fff; color:#0A1628; }
  .display { font-family: 'Spectral', Georgia, serif; }
  .mono    { font-family: 'JetBrains Mono', monospace; }
</style>
<link href="https://fonts.googleapis.com/css2?family=Spectral:wght@500;600;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500&display=swap" rel="stylesheet">
</head>
<body class="max-w-5xl mx-auto px-6 py-12">

  <header class="mb-10 pb-6 border-b border-gray-200">
    <h1 class="display text-4xl font-bold">Latest Articles</h1>
    <p class="mono text-sm text-gray-500 mt-2">
      <?= count($articles) ?> published · fetched live from MySQL
    </p>
  </header>

  <?php if (!$articles): ?>
    <div class="bg-amber-50 border border-amber-200 text-amber-900 p-6 rounded">
      No published articles yet.
      Run <code class="mono">sql/seed.sql</code> in phpMyAdmin, then refresh.
    </div>
  <?php endif; ?>

  <div class="grid md:grid-cols-2 gap-6">
    <?php foreach ($articles as $a): ?>
      <article class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition">
        <div class="flex items-center gap-3 mb-3">
          <span class="mono text-xs uppercase tracking-wider text-blue-700 font-semibold">
            <?= htmlspecialchars($a['category_name']) ?>
          </span>
          <span class="mono text-xs text-gray-400">·</span>
          <span class="mono text-xs text-gray-500">
            <?= time_ago($a['published_at']) ?>
          </span>
        </div>

        <h2 class="display text-2xl font-semibold leading-snug mb-2">
          <a href="article.html?slug=<?= urlencode($a['slug']) ?>"
             class="hover:text-blue-800">
            <?= htmlspecialchars($a['title']) ?>
          </a>
        </h2>

        <p class="text-gray-600 text-sm leading-relaxed mb-4">
          <?= htmlspecialchars($a['excerpt'] ?? '') ?>
        </p>

        <div class="flex items-center gap-2 text-xs text-gray-500 mono">
          <img src="<?= htmlspecialchars($a['author_avatar'] ?? 'https://i.pravatar.cc/40') ?>"
               alt="" class="w-6 h-6 rounded-full">
          <span><?= htmlspecialchars($a['author_name']) ?></span>
          <span class="text-gray-300">|</span>
          <span><?= (int)$a['reading_minutes'] ?> min read</span>
          <span class="text-gray-300">|</span>
          <span><?= number_format((int)$a['views_count']) ?> views</span>
        </div>
      </article>
    <?php endforeach; ?>
  </div>

  <footer class="mt-12 pt-6 border-t border-gray-200 text-sm text-gray-500">
    <a href="db-test.php" class="mono">← connection test</a>
    &nbsp;·&nbsp;
    <a href="http://localhost/phpmyadmin/" class="mono" target="_blank">phpMyAdmin →</a>
  </footer>

</body>
</html>
