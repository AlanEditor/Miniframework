<?php

namespace App;

use PDO;
use PDOException;

class Connection
{
    static function getDb() //Método estático
    {
        try {

            $conn = new PDO(
                "mysql:host=localhost;dbname=mvc;charset=utf8",
                "root",
                ""
            );

            return $conn;

        } catch (PDOException $e) {
            
            echo "Ocorreu um erro ao tentar acessar o Banco de Dados: ".$e;
        }
    }
}

?>