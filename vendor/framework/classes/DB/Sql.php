<?php 

namespace framework\DB;

use PDO;
use PDOException;

class Sql{

	const HOSTNAME = "nome_host";
	const USERNAME = "nome_usuario";
	const PASSWORD = "password_base_dados";
	const DBNAME = "nome_base_de_dados";

	public static function getDatabase() {

		try{
			$connect = new PDO(
				"mysql:dbname=".Sql::DBNAME.";host=".Sql::HOSTNAME, 
				Sql::USERNAME,
				Sql::PASSWORD);

			return $connect;

		}catch (PDOException $error) {
			//* Tratamento da exceção
			echo 'Erro ao conectar ao banco de dados: ' . $error->getMessage();
		}
	}
}
?>