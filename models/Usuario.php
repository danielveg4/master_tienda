<?php

class Usuario{
    // un atributo por cada campo de la tabla usuarios de nuestra DB

private $id;
private $nombre;
private $apellidos;
private $email;
private $password;
private $rol;
private $imagen;
private $db; // atributo para establecer la conexión de la DB

public function __construct(){
    $this->db = Database::connect();
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
//escapamos el nombre de usuario

}


public function getApellidos()
{
return $this->apellidos;
}


public function setApellidos($apellidos)
{
$this->apellidos =  $this->db->real_escape_string($apellidos); 

}


public function getEmail()
{
return $this->email;
}


public function setEmail($email)
{
$this->email =  $this->db->real_escape_string($email); 

}


public function getPassword()
{
return password_hast($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['const'=> 4]);
// encripta la contraseña con nivel 4
}


public function setPassword($password)
{
$this->password = $password;

}


public function getRol()
{
return $this->rol;
}


public function setRol($rol)
{
$this->rol = $rol;

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

public function save(){
    $sql= "INSERT INTO usuarios VALUES(NULL, '{$this->getNombre()}', '{$this->getApellidos()}', '{$this->getEmail()}', '{$this->getPassword()}', 'user', null);"
    $save = $this->db->query($sql);
    $result = false;
    if($save){
        $result = true;
    }
    return $result
}

public function login(){
    $result = false;
    $email = $this->email;
    $password = $this->password;
    //comprobamos si existe el usuario

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = $this-db->query($sql);
    if($login && $login->num_rows == 1){
        $usuario = $login->fetch_object();
        $verify = password_verify($password, $usuario->password);
        //comprobamos que la contraseña introducido sea igual a la introducida en la BD
            if($verify){
                $result = $usuario;
            }
    }
    return $result;
}

}

// con todo esto tenemos el controlado de usuario, el modelo y la vista

?>