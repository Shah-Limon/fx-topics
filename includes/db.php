<?php
/**
 * Market Pulse — MySQL Database Connection
 *
 * XAMPP defaults:
 *   Host:     localhost
 *   User:     root
 *   Password: (empty)
 *   Port:     3306
 *
 * Production এ গেলে .env বা config file থেকে load করবেন।
 */

declare(strict_types=1);

const DB_HOST    = 'localhost';
const DB_PORT    = 3306;
const DB_NAME    = 'marketpulse';
const DB_USER    = 'root';
const DB_PASS    = '';
const DB_CHARSET = 'utf8mb4';

// DSN — কোন driver ইউজ করবো
$dsn = sprintf(
    'mysql:host=%s;port=%d;dbname=%s;charset=%s',
    DB_HOST,
    DB_PORT,
    DB_NAME,
    DB_CHARSET
);

// PDO options — strict mode + array fetch by default
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
    PDO::ATTR_PERSISTENT         => false,
];

try {
    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    // Production এ error log এ লিখবেন, user কে generic message দেখাবেন
    http_response_code(500);
    exit('Database connection failed. Check XAMPP MySQL is running.');
}
