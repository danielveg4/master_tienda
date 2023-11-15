<h1>Carrito de la compra</h1>

<?php if(isset($_SESSION['carrito']) && count($_SESSION['carrito'])>=1): ?>
    <table>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Unidades</th>
            <th>Eliminar</th>
        </tr>
        <?php
            foreach($carrito as $indice => $elemento):
                $producto = $elemento['producto'];
        ?>
        <tr>
            <td>
                <?php if($producto->imagen != null): ?>
                    <img src="<?=base_url?>uploads/images/>?= $producto->imagen ?>" class="img_carrito">
                <?php else: ?>
                    <img src="<?= base_url ?>assets/img/gorra.png" class="imag_carrito">
                <?php endif; ?>
            </td>
            <td>
                <?=$producto->precio?>
            </td>
            <td>
                <?=$elemento['unidades']?>
                <div class="updown-unidades">
                    <a href="<?=base_url?>carrito/up&index=<?$indice?>" class="button">+</a>
                    <a href="<?hbase_url?>carrito/down&inde=<?indice?>" class="button">-</a>
                </div>
            </td>
            <td>
                <a href="<?=base_url?>carrito/delete&index=<?=$indice?>" class="button button-carrito button-red">Rojo</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<br/>
<div class="delete-carrito">
    <a href="<?=base_url?>carrito/delete_all" class="button button-delete button-red">Vaciar</button>
</div>
<div class="total-carrito">
    <?php $stats = Utils::StatsCarrito(); ?>
    <h3>Precio total: <?=$stats['tota']?> $ </h3>
    <a href="<?=base_url?>pedido/hacer" class="button button-pedido">Hacer pedido</a>
</div>

<?php else: ?>
    <p>El carrito está vacío, añade algún producto</p>
<?php endif; ?>
    