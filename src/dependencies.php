<?php
// DIC configuration

$container = $app->getContainer();
$hello_world = new HelloClass();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};


$container['db'] = function ($c) {
    // Setup a PDO database instance
    $db_exists = file_exists('database.sqlite');
    $db = new PDO('sqlite:database.sqlite');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    if (! $db_exists) {
        // TODO: add some schema to the database
        // https://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
        // http://www.sqlitetutorial.net/sqlite-autoincrement/
        $db->exec("CREATE TABLE IF NOT EXISTS users (
            username TEXT NOT NULL
        )");
    }
    return $db;
};