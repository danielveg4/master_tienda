<?php

require_once 'models/pedido.php';

class PedidoController{
    public function hacer(){
        //va a cargar la vista hacer.php
        require_once 'views/pedido/hacer.php';
    }
}