<?php
//inladen van models, helpers, controllers
require 'autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

require 'config.php';

session_start();

//connectie maken met DB
$db = new PDO($config['db_connection'] . ':dbname=' . $config['db_database'] . ';host=' . $config['db_host'] . ';port=' . $config['db_port'], $config['db_username'], $config['db_password']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

//routes aanmaken
$router = new \Bramus\Router\Router();
//$router->get('/', function() { echo 'Dit is de index vanuit de route'; });
$router->get('/', 'App\Controllers\SneakerController@index');
$router->get('/sneaker/(\d+)', 'App\Controllers\SneakerController@detail');
$router->get('/brand/(.+)', 'App\Controllers\SneakerController@index');
$router->get('/add', 'App\Controllers\AddContainer@index');
$router->post('/add-sneaker', 'App\Controllers\AddContainer@add');
$router->post('/add-bid', 'App\Controllers\AddContainer@addBid');
$router->get('/auth', 'App\Controllers\AuthController@index');

//Run
$router->run();
