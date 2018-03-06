<?php

use Slim\Http\Request;
use Slim\Http\Response;

/*
function getDBInstance()
{
    $db_exists = file_exists('database.sqlite');
    $db = new PDO('sqlite:database.sqlite');
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
    if (! $db_exists) {
        // https://www.if-not-true-then-false.com/2012/php-pdo-sqlite3-example/
        // http://www.sqlitetutorial.net/sqlite-autoincrement/
        $db->exec("CREATE TABLE IF NOT EXISTS users (
            username TEXT NOT NULL
        )");




    }
} */


// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

// get all folders
$app->get('/folders', function (Request $request, Response $response, array $args) {
    $data = array("foo" => "bar", "bar" => "baz");
    return $response->withJson($data);

});

// get the content of a specific folder
// $app->get('/folder/{id}')


// $app->delete('/{folder}/{file}', function (Request $request, Response $response, array $args) {
    // delete file
// });
