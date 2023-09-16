<?php
include '../php/header.php';
?>
<div id="contenido">
    <form action="index.php" method="POST" enctype="multipart/form-data" id="items">
        <input name="action" value="addProducto" type="hidden">
        <input class="item-input" name="input-product" placeholder="PRODUCTO" required autofocus>
        <input class="item-input" name="input-price" placeholder="PRECIO" required>
        <input class="item-input" name="input-description" placeholder="CATEGORIA" required> <br>
        <button type="submit">Agregar</button>
    </form>
    <section id="items-list">
        <div class="fila">
            <div class="item it">PRODUCTO</div>
            <div class="price it"><span>PRECIO</div>
            <div class="categoria it">CATEGORIA</div>
            <div class="borrar it">ELIMINAR</div>
        </div>
        <?php
        $allProductos = showAllProductos();
        foreach ($allProductos as $product) {
            echo ' <div class="fila">
                            <div class="item it">' . $product['productName'] . '</div>
                            <div class="price it"><span>&dollar;</span>' . $product['price'] . '</div>
                            <div class="categoria it">' . $product['description'] . '</div>
                            <div class="borrar it">X</div>
                        </div>';

        }
        ?>
    </section>
</div>
<?php

include '../php/footer.php';
?>