<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Gorras</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <div id="container">
        <!--CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="assets/img/gorra.png" alt="gorra logo">
                <a href="index.php">
                    Tienda Gorras
                </a>
            </div>
        </header>
         <!--MENU-->
        <nav id="menu">
            <ul>
                <li>
                    <a href="#">Inicio</a>
                </li>
                <li>
                    <a href="#">Categoria 1</a>
                </li>
                <li>
                    <a href="#">Categoria 2</a>
                </li>
                <li>
                    <a href="#">Categoria 3</a>
                </li>
                <li>
                    <a href="#">Categoria 4</a>
                </li>
                <li>
                    <a href="#">Categoria 5</a>
                </li>
            </ul>
        </nav>
        <div id=content">
        <!--BARRA LATERAL-->
            <aside id="lateral">
                <div id="login" class="block_aside">
                    <h3>Entrar a la web</h3>
                    <form action="#" method="post">
                        <label form="email">Email</label>
                        <input type="email" name="email">
                        <label form="password">Contraseña</label>
                        <input type="password" name="password">
                        <input type="submit" value="Enviar">
                    </form>
                    <ul>
                        <li>
                            <a href="#">Mis pedidos</a>
                        </li>
                        <li>
                            <a href="#">Gestionar pedidos</a>
                        </li>
                        <li>
                            <a href="#">Gestionar categorias</a>
                        </li>
                    </ul>
                </div>
            </aside>
            <!--CONTENIDO CENTRAL-->
            <div id="central">
                <h1>Productos destacados</h1>
                <div class="product">
                    <img src="assets/img/gorra.png">
                    <h2>Gorra amarilla</h2>
                    <p>22 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/gorra.png">
                    <h2>Gorra amarilla</h2>
                    <p>22 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
                <div class="product">
                    <img src="assets/img/gorra.png">
                    <h2>Gorra amarilla</h2>
                    <p>22 euros</p>
                    <a href="" class="button">Comprar</a>
                </div>
            </div>
        </div>
    </div>
    <!--PIE DE PÁGINA-->
    <footer id="footer">
        <p>Desarrollo de clase; <?= date('Y')?></p>
    </footer>
</body>
</html>