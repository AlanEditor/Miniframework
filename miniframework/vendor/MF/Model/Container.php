<?php

namespace MF\Model;

use App\Connection;

class Container
{

    static function getModel($model)
    {
        $class = "\\App\\Models\\".ucfirst($model);

        //Instancia de Conexão do PDO

        $conn = Connection::getDb(); //Chama o método estático

        return new $class($conn);
    }

}

?>