<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/header.php'; ?>

<section class="cart">
    <div class="box-container">
        <div class="box cart-box">
            <div class="box-title">
                <span>2 articulos</span>
                <hr>
            </div>

            <div class="box-product">
                <div class="img-product">
                    <img src="https://i5.walmartimages.com.mx/gr/images/product-images/img_large/00750105533384L.jpg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt>
                </div>
                <div class="description-product">
                    <span>Néctar Del Valle de mango 1 l</span>
                    <span>750105533384</span>
                </div>
                <div class="price-product">
                    <span>$26.00</span>
                    <h5>$25.00</h5>
                </div>
                <div class="footer">
                    <div class="button_count">
                        <button id="aumentar" class="btn_theme_products">+</button>
                        <span id="numero_count" value="">1</span>

                        <button id="restar" class="btn_theme_products">-</button>
                    </div>
                </div>

            </div>
            <hr>
            <div class="box-product">
                <div class="img-product">
                    <img src="https://i5.walmartimages.com.mx/gr/images/product-images/img_large/00750105533384L.jpg?odnHeight=612&odnWidth=612&odnBg=FFFFFF" alt>
                </div>
                <div class="description-product"></div>
                <div class="price-product">
                </div>
            </div>

        </div>
        <div class="box box-payment">
            <div class="box-title">
                <span>Resumen</span>
                <hr>
            </div>
            <div class="box-total">
                <div class="box-text w-100"> <span>Sub Total:</span> <span>(2
                        Articulos)</span> </div>
                <div class="box-number"> <span>$1225.00</span> </div>
            </div>
            <hr>
            <div class="box-total">
                <div class="box-text">
                    <form action="#">
                        <label for="cupon">Ingresa Cupon:</label>
                        <input class="input_form mt-2" type="text" placeholder="Cupon">
                        <button class="btn_theme_products">Aplicar</button>
                    </form>
                </div>
            </div>
            <hr>
            <div class="box-total">
                <div class="box-text w-100"> <span>Descuentos:</span> </div>
                <div class="box-number"> <span>$25.00</span> </div>
            </div>
            <hr>
            <div class="box-total">
                <div class="box-text w-100"> <span>Total:</span> </div>
                <div class="box-number"> <span>$25.00</span> </div>

            </div>
            <hr>
            <div class="box-total">
                <button class="btn_theme_products"><i class="fa-regular fa-credit-card"></i> Pagar</button>
            </div>
        </div>
    </div>
</section>



<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/footer.php'; ?>