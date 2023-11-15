<?php if(isset($product)): ?>
    <h1><?= $product->nombre ?></h1>
    <div id="detail-product">
        <div class="image">
            <?php if($product->imagen != null): ?>
                <img src="<?=base_url ?>uploads/images/<?=$product->imagen ?>">
            <?php else: ?>
                <img src="<?= base_url ?>assets/img/gorra.png">
            <?php endig; ?>
        </div>