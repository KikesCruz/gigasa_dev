<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/header.php'; ?>

<section class="page-title centred">
    <div class="pattern-layer" style="background-image: url(assets/images/background/page-title.jpg);"></div>
    <div class="auto-container">
        <div class="content-box">
            <h1>Contactanos</h1>
        </div>
    </div>
</section>


<!-- address-section -->
<section class="address-section">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-6 col-sm-12 address-column">
                <div class="single-adderss-block">
                    <div class="inner-box">
                        <h3>Oficina</h3>
                        <ul class="info-list clearfix">
                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                Cafetal 147-b, Granjas México, Iztacalco, 08400, Ciudad de México, CDMX
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 address-column">
                <div class="single-adderss-block">
                    <div class="inner-box">
                        <h3>Contacto</h3>
                        <ul class="info-list clearfix">
                            <li>
                                <i class="fas fa-phone"></i>
                                <a href="tel:48564334212234">(+48) 564-334-21-22-34</a>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:info@example.com">info@example.com</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 address-column">
                <div class="single-adderss-block">
                    <div class="inner-box">
                        <h3>Horarios:</h3>
                        <ul class="info-list clearfix">
                            <li>
                                <i class="fa fa-clock"></i>
                                Lunes a Viernes de 9:00 am a 6:00 pm
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- address-section end -->


<!-- google-map-section -->
<section class="google-map-section">
    <div class="map-column">
        <div class="google-map" id="contact-google-map">
            <iframe frameborder="0" scrolling="no" src="https://maps.google.com/maps?q=Cafetal%20147b%2C%20Granjas%20M%C3%A9xico%2C%20Iztacalco%2C%2008400%20Ciudad%20de%20M%C3%A9xico%2C%20CDMX&amp;t=m&amp;z=13&amp;output=embed&amp;iwloc=near" title="Cafetal 147b, Granjas México, Iztacalco, 08400 Ciudad de México, CDMX" aria-label="Cafetal 147b, Granjas México, Iztacalco, 08400 Ciudad de México, CDMX"></iframe>

        </div>
    </div>
</section>
<!-- google-map-section -->


<!-- contact-section -->
<section class="contact-section">
    <div class="auto-container">
        <div class="col-lg-10 col-md-12 col-sm-12 offset-lg-1 big-column">
            <div class="sec-title">
                <h2>Déjanos tus datos</h2>
                <span class="separator" style="background-image: url(assets/images/icons/separator-1.png);"></span>
            </div>
            <div class="form-inner">
                <form method="post" action="sendemail.php" id="contact-form" class="default-form">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input type="text" name="username" placeholder="Nombre" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Correo" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input type="text" name="subject" placeholder="Asunto" required>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                            <input type="text" name="phone" placeholder="Teléfono" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <textarea name="message" placeholder="Mensaje"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn centred">
                            <button type="submit" class="theme-btn-two" name="submit-form">Enviar<i class="flaticon-email"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- contact-section end -->


<?php require PATH_ROOT . 'Resources/Views/Ecommer/Shared/footer.php';
