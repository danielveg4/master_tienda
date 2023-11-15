<?php

class database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'tienda_master');
        // si fuese servidor externo habria que poner la dire del servidor
        $db->set_charset("utf8"); //establecer conjunto caracteres basicos
        return $db;
    }
}



?>