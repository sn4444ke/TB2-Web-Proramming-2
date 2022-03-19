<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
     
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM news LIMIT 1');
        $row   = $query->getRow();
        $data['data_saya'] = $row;

        return var_dump($row);
    }
}
