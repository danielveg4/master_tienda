        <!--BARRA LATERAL-->
            <aside id="lateral">
                <div id="carrito" class="block_aside">
                    <h3>Mi carrito</h3>
                    <ul>
                        <?php $status = Utils::statusCarrito(); ?>
                        <li>
                            <a href="<?=base_url?>carrito/index">Productos <?=$stats['count']?></a>
                        </li>
                        <li>
                            <a href="<?=base_url?>carrito/index">Total: <?=$stats['total']?></a>
                        </li>
                        <li>
                            <a href="<?=base_url?>carrito/index">Ver el carrito</a>
                        </li>
                    </ul>
                </div>
                <div id="login" class="block_aside">
                    <?php if(!isset($_SESSION['identity'])) ?>
                        <h3>Entrar a la web</h3>
                        <form action="<?base_url?>usuario/logi" method="post">
                            <label for="email">Email</label>
                            <input type="email" name="email">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password">
                            <input type="submit" value="enviar">
                            <a href=".base_url.'/usuario/registro'">
                            <button type="button" name="registro">Registro></button>
                            </a>  
                        </form>
                    <?php else: ?>
                        <h3><?=$_SESSION['identity']->nombre?> <?=$_SESSION['identity']->apellidos?></h3>
                    <?php endif; ?>
            </aside>