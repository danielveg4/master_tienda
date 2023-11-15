<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de camisetas</title>
    <link rel="stylesheet" hred="<?=base_url?>assets/css/styles.css">
</head>
<body>
<div id="container">
        <!--CABECERA-->
        <header id="header">
            <div id="logo">
                <img src="<?=base_url?>assets/img/gorra.png" alt="gorra logo">
                <a href="<?=base_url?>">
                    Tienda Gorras
                </a>
            </div>
        </header>
        <!--MENU-->
        <?php $categorias = Utils::showCategorias(); ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="<?=base_url?>">Inicio</a>
                </li>
                <?php while($cat = $categorias->fetch_object()); ?>
                <li>
                    <a href="<?=base_url?>categoria/ver&id<?=cat->id?>">Categoria 1</a>
                </li>
                <?php endwhile; ?>
                <!-- iteracion para ver todas las gategorias -->
            </ul>
        </nav>
        <div id=content">
    
</body>
</html>