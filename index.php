<?php 

session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);

$app->get('/', function() {
    
	$page = new Page(); //chama o construtor, entao, o header

	$page->setTpl("index"); // chama o conteudo, entao, o index

});// finalizou entao chama o destruct, entao, o footer

$app->get('/admin', function() {

	User::verifyLogin();
    
	$page = new PageAdmin(); //chama o construtor, entao, o header

	$page->setTpl("index"); // chama o conteudo, entao, o index

});// finalizou entao chama o destruct, entao, o footer

$app->get('/admin/login', function() {
    
	$page = new PageAdmin([
		"header"=>false,
		"footer"=>false
	]); //desativa o construtor para header e o destruct para footer

	$page->setTpl("login"); // chama o conteudo, entao, o login

});

$app->post('/admin/login', function(){

	User::login($_POST["login"], $_POST["password"]); // recebe os names login e password

	header("Location: /admin"); // redireciona para a rota /admin
	exit;
});

$app->get('/admin/logout', function() {
    
	User::logout();

	header("Location: /admin/login"); // redireciona para a rota /admin
	exit;

});

$app->run();

?>