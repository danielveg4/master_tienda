<?php

//los helpers son librerias utiles con pequeñas tareas que nos van a 
//ayudar a lo largo del proyecto

class Utils{
//metodos estáticos para poder invocarlos sin tener que isntanciar la clase
    public static function deleteSession($name){
        if(isset($_SESSION[$name])){
            $_SESSION[$name] = null;
            unset($_SESSION[$name]);
        }
        return $name;
    }

    public static function isAdmin(){ // comprobar si la sesion de adminsitrador existe
        if(isset($_SESSION['admin'])){
            header("location:".base_url);
        }else{
            return true;
        }
    }

    public static function isIdentity(){ //para ver si hay alguna
        if(!isset($_SESSION['identity'])){ //si no hay sesion redirigimos a la principal
            header("location:".base_url);
        }else{
            return true;
        }
    }

    public static function showCategorias(){ // invocar a todas las categorias
        require_once 'models/categorias.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        return $categorias;
    }

    public static function statsCarrito(){
        $stats = array(
            'count' => 0,
            'total' =>0
        );
        if(isset($_SESSION['carrito'])){
            $stats['count'] = count($_SESSION['carrito']);
            foreach($_SESSION['carrito'] as $producto){
                $stats['total']+=$producto['precio']*producto['unidades'];
                //realizamos una asignación para ir sumando los productos del carrito
            }
        }
        return $stats;
    }

    public static function showStatus($status){
        $value = 'Pendiente';
        if($status == 'confirm'){
            $value = 'Pendiente';
        }elseif($status == 'preparation'){
            $value = 'En preparacion';
        }elseif($status = 'ready'){
            $value = 'Preparado para enviar';
        }elseif($status = 'sended'){
            $value = 'Enviado';
        }
        return $value;
    }

}


?>