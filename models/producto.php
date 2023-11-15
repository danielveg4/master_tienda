<?php

//el controlado le pide al modelo lo que le solicita de la vista

class Producto{
    //atributos correspondientes a cada campo de la tabla productos
    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct(){
        $this->db = Database::connect();
        //inicializamos la conexión a la db
    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);
    }


    public function getDescripcion()
    {
        return $this-descripcion;
    }


    public function setDescripcion($descripcion)
    {
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    public function getPrecio()
    {
        return $this->precio;
    }


    public function setPrecio($precio)
    {
        $this->precio = $this->db->real_escape_string($precio);
    }

    public function getStock()
    {
        return $this->stock;
    }


    public function setStock($stock)
    {
        $this->stock = $this->db->real_escape_string($stock);
    }


    public function getOferta()
    {
        return $this->oferta;
    }


    public function setOferta($oferta)
    {
        $this->oferta = $this->db->real_escape_string($oferta);
    }


    public function getFecha()
    {
        return $this->fecha;
    }


    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }


    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }


    public function getDb()
    {
        return $this->db;
    }


    public function setDb($db)
    {
        $this->db = $db;
    }

    public function getAll(){
        // metodo que muestra todos los productos por orden descendente
        $productos = $this->db->query("SELECT * FROM productos ORDER BY ID DESC");
        return $productos;
    }

    public function getAllCategory(){
        // muestra todos los productos por categorias
        $sql = "SELECT p.*, c.nombre as 'catnombre' FROM productos p "
            . "INNER JOIN  categorias c ON c.id =p.categoria_id "
            . "WHERE p.categoria_id = {$this->categoria_id()}"
            . "ORDER BY id DESC";
        $productos = $this->db->query($sql);
        return $productos;
    }

    public function getRandom($limit){
        // devuelve un numero de productos ordenados aleatoriamente
        $productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
        return $productos;
    }

    public function getOne(){
        //muestra un producto determinado por su id
        $producto = $this->db->query("SELECT * FROM productos WHERE id= {$this->getId()}");
        return $producto->fetch_object();
    }

    public function save(){
        //guarda un producto en la DB
        $sql = "INSERT INTO productos VALUES(NULL, '{$this->getCategoria_id()}', '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}', '{$this->getStock()}', null, CURDATE(), '{$this->getImagen()}');";
        $save = $this->db->query($sql);

        $result = false;
        if($save){
            $result=true;
        }
        return $result;
    }




}
