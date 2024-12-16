<?php 

include __DIR__ . '/src/Framework/Database.php';

use Framework\Database;
use APP\Config\Paths;

$dotenv = Dotenv\Dotenv::createImmutable(Paths::ROOT);
$dotenv->load();

$databaseFactory = [
    Database::class => fn() => new Database(
        $_ENV['DB_DRIVER'], 
        [
            'host' => $_ENV['DB_HOST'],
            'port' => $_ENV['DB_PORT'],
            'dbname' => $_ENV['DB_NAME']
        ], 
        $_ENV['DB_USER'], 
        $_ENV['DB_PASS']
    )
];

$database = $databaseFactory[Database::class]();