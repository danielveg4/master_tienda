<?php

require_once 'models/usuario.php';

class UsuarioController{
    // método principal
    public function index(){
        echo "Controlador Usuarios, Acción Index";
    }
    // metodo de accion registro de usuarios
    public function registro(){
        require_once 'view/usuario/registro.php';
        // mostramos la vista de registro de usuario
    }
    public function save(){
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre']: false;
            $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos']: false;
            $email = isset($_POST['email']) ? $_POST['email']: false;
            $password = isset($_POST['password']) ? $_POST['password']: false;

            if($nombre && $apellidos && $email && $password){
                $usuario = new Usuario();
                $usuario->setNombre($nombre);
                $usuario->setApellidos($apellidos);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                $save = $usuario->save(); // guarda los datos de usuario

                if($save){
                    $_SESSION['register'] = "complete";
                }else{
                    $_SESSION['register'] = "failed";
                }
            }else{
                $_SESSION['register'] = "failed";
            }
        }else{
            $_SESSION['register'] = "failed";
        }
        header("locatio:".base_url.'usuario/registro');
    }
    public function login(){
        if(isset($_POST)){
            //identificar al usuario
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $identity = $usuario->login();

            if($identity && is_object($identity)){
                $_SESSION['identity'] = $identity;
                if($identity->rol == 'admin'){
                    $_SESSION['admin'] = $true; //lanzamos una sesion específica para el administrador
                }
            }else{
                $_SESSION['error_logi'] = 'Identificación fallida!';
            }
        }
        header("location:".base_url);
    }
    //cierre de la sesion
    public function logout(){
        if(isset($_SESSION)['identity']){
            unset($_SESSION['identity']);
        }
        if(isset($_SESSION['admin'])){
            unset($_SESSION['admin']);
        }
        header("Location:".base_url);
    }
}