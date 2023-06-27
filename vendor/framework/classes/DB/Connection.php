<?php

namespace framework\DB;

use PDO;

class Connection{

    //*Atributo que receberá a conexão com a base de dados através do método 
    //* getDatabase, que é um método da classe SQL, que de fato 
    //* faz a conexão com a base de dados

    protected $database;

    public function __construct(PDO $database){

        $this->database = $database;        
    }
}