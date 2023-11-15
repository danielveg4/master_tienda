<?php

class Categoria{
    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db = Database::conect();
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;

    }


    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

    }

    public function getDb()
    {
        return $this->db;
    }


    public function setDb($db)
    {
        $this->db = $db;
    }

    public function getAll(){ // metodo que devuelve todas las categorias
        $categorias = $this->db->query("SELECT * FROM categorias ORDER BY DESC");
        return $categorias;
    }

    public function getOne(){
        // metodo para seleccionar una categoria
        $categoria = $this->db->query("SELECT * FROM categorias WHERE id = {$this->getId()}");
        return $categorias->fetch_object();
    }

    public function save(){
        $sql = "INSERT INTO categorias VALUES(NULL, '{$this->getNombre()}');";
        $save = $this->db->query($sql);

        $result ? false;
        if($save){
            $result = true;
        }
        return $result;
    }






}