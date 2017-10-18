<?php 

require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page(); //chama o construtor, entao, o header

	$page->setTpl("index"); // chama o conteudo, entao, o index

});// finalizou entao chama o destruct, entao, o footer

$app->get('/admin', function() {
    
	$page = new PageAdmin(); //chama o construtor, entao, o header

	$page->setTpl("index"); // chama o conteudo, entao, o index

});// finalizou entao chama o destruct, entao, o footer

$app->run();

?>