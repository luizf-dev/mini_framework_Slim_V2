<?php

namespace framework;

use framework\DB\Connection;
use \PDO;

class User extends Connection{

    private $idUser;
    private $nome;
    private $email;
    private $senha;
    

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo, $valor){

        $this->$atributo = $valor;
    }

    public function listarUsuarios(){

        $query = "select * from tb_usuarios";
        $stmt = $this->database->prepare($query);
        $stmt->execute();
        

        if($stmt->rowCount() > 0){
            $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }else{
            echo 'Nenhum usuario cadastrado';
        }

        return $users;
    }     
}