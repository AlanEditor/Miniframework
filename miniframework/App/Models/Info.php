<?php

namespace App\Models;

use MF\Model\Model;

class Info extends Model
{

    function getInfo()
    {
        $query = "SELECT titulo, descricao FROM tb_info";

        return $this->db->query($query)->fetchAll();
    }
}

?>