<?php

use Slim\Http\Request;
use Slim\Http\Response;


// Routes

$app->get('/', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");
    // Just render a plain index view to greet the user
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
