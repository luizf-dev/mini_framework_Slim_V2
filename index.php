<?php

//*Carregamento automatico das classes
require_once("vendor/autoload.php");

//*Namespaces 
use Slim\Slim;
use framework\DB\Sql;
use framework\Page;
use framework\User;



$app = new Slim();

$app->config('debug', true);

//*Rota Index -------------------------
$app->get('/', function() {

	$page = new Page(["navbar"=>false, "footer"=>false]);
	$page->renderPage("index");
});



//*Rota home ---------------------------
$app->get('/home', function() {

	$page = new Page();
	$page->renderPage("home");

});
//*--------------------------------------




//*Rota listar usuarios------------------
$app->get('/usuarios', function(){

	//*Conexao com a base de dados
	$connect = Sql::getDatabase();
	

	//*Instancia de um novo objeto User passando a variavel de conexao
	//* e chamando o método listar usuarios
	$user = new User($connect);
	$users = $user->listarUsuarios();
	

	//* Renderiza o template usuarios.html passando a lista de usuários
    $page = new Page();
    $page->renderPage("usuarios", array(
		"users" => $users
	));		

});
//*----------------------------------------

$app->run();

