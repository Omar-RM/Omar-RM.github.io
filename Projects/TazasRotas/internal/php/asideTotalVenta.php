<aside id="total-venta">

    <form action="index.php" method="POST" enctype="multypart/form-data">
        <input type="hidden" name="action" value="placeOrder">
        <?php $date = date("Y,m,d");
        $time = date("h:i");
        $staff = "Omar";
        $id = returnMaxId()+1;
        ?>
        <div id="venta-title">
            <div class="venta-dia">
                <h3 name="fecha-venta">
                    <?php echo $date ?>
                </h3>
                <input type="hidden" value="<?php echo $date ?>">
            </div>
            <div class="venta-Hora">
                <h3>
                    <?php echo $time ?>
                </h3>
                <input type="hidden" value="<?php echo $time ?>">
            </div>
            <div class="venta-responsable">
                <h3 name="venta-responsable-nombre">
                    <?php echo $staff ?>
                </h3>
            </div>
            <div id="venta-id">
                <h3 name="venta-id">
                    <?php echo $id ?>
                </h3>
                <input type="hidden" name="idOrderDb" value="<?php echo $id?>">
            </div>
        </div>
        <div id="sumary">

        </div>
        <div id="sumary-input">
            <input name="orderList" type="hidden" id="sumary-inputJSON">
        </div>
        <div id="subtotal-venta">
            <div class="text-sumary">
                <h2>Subtotal</h2>
            </div>
            <div class="peso">
                <h2>&dollar;</h2>
                <h2><span id="subtotal"></span></h2>
            </div>
        </div>
        <div id="propina-venta">
            <div class="text-sumary">
                <h2>Cantidad</h2>
            </div>
            <div class="peso">
                <h2><span id="cantidad-sumary">0</span></h2>
                <input type="hidden" id="cantidad-input" name="cantidad">
            </div>
        </div>
        <div id="total-venta-sumary">
            <div class="text-sumary">
                <h2>Total</h2>
            </div>
            <div class="peso">
                <h2>&dollar;</h2>
                <h2><span id="total-sumary">0</span></h2>
                <input type="hidden" name="totalsale" id="total-sumary-input">
            </div>

        </div>
        <input type="hidden" name="date" value="<?php echo $date ?>">
        <input type="hidden" name="staff" value="<?php echo $staff ?>">
        <span type="" name="order-input" id="order-input"></span>

        <button id="venta-btn">Venta</button>
    </form>
    <button id="venta-clear">Limpiar</button>


</aside>