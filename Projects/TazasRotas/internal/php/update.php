<?php
include 'header.php';
?>
<section id="POS">
    <div id="wrap">
        <main>
        <section id="insert-product-section"> 
                <form action="index.php" method="POST" enctype="multipart/form-data" id="items">
                    <input name="action" type="hidden" value="insertProduct">
                    <label>PRIORITY</label>
                    <select name="inputPriority">
                        <option value="">---SELECT---</option>
                        <option value="2">HIGH</option>
                        <option value="1">REGULAR</option>
                        <option value="0">LOW</option>
                    </select>
                    <label class="gap">PRODUCT</label>
                    <input name="inputProductName" placeholder="PRODUCT NAME" value="papa">
                    <label class="gap">DESCRIPTION</label>
                    <textarea name="inputProductDescription" placeholder="DESCRIPTION" value="tiktok">tiktok
                    </textarea>
                    <label class="gap">PRICE</label>
                    <input name="inputPrice"placeholder="PRICE" value="10.00">
                    <label class="gap">STOCK</label>
                    <input  name="inputStock" placeholder="STOCK" value="20">
                    <label class="gap">DATE</label>
                    <input type="date" name="inputDate" placeholder="DATE" value="2023-10-03" >
                    <button> SUBMIT</button>

                </form>

            </section>
        </main>
    </div>
    <footer>
        <script src="app.js"></script>
    </footer>


    </body>
</section>
<?php
include '../php/footer.php';
?>