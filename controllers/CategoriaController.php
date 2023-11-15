<?php

require_once 'models/categoria.php';
require_once 'models/producto.php';

// inclusión de modelos

class CategoriaController{
    public function index(){
        Utils::isAdmin();
        // comprobamos si el usuario es adminsitrador
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        require_once 'views/categoria/index.php';
    }

    public function ver(){
        if(iiset($_GET['id'])){
            $id = $_GET['id'];
        }

        //conseguir la categoria
        $categoria= new Categoria();
        $categoria->setId($id);
        $categoria = categoria->getOne();

        //conseguir productos:
        $producto = new Producto();
        $producto->setCategoria_id($id);
        $producto = $producto->getAllCategory();
    }

    require_once 'views/categoria/ver.php';
}

public function crear(){
    // muestra la vista especifica para el administrador y llamamos a la cista crear
    Utils::isAdmin();
    require_once 'views/categoria/crear.php';
}

public function save(){
    // metodo para guardar la categoria que hemos creado
    Utils::isAdmin();
    if(isset($_POST) && isset($_POST['nombre'])){
        //guardar la categoria en la db
        $categoria = new Categoria();
        $categoria->setNombre($_POST['nombre']);
        $save = $categoria->save();
    }
    header("Location:".base_url."categoria/index");
    //para mostrar todas las categorias
}