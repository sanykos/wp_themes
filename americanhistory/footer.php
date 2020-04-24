<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package american-history
 */

?>

<footer class="main-footer">
    <div class="container">
        <div class="flex-items footer-items">
            <div class="flex-item footer-logo d-flex align-items-center">
                    <div class="main-title footer-logo__title"><a href="/">American <br>travel</a></div>
            </div>
            <div class="flex-item footer-info d-flex justify-content-between">
                <div class="footer-info__item d-flex flex-column justify-content-between">
                    <div class="footer-address">
                        <div class="footer-title"><strong>Адрес</strong></div>
                        <p>Санкт-Петербург, <br> Невский проспект,дом 45</p>
                    </div>
                    <div class="footer-schedule">
                        <div class="footer-title">Режим работы:</div>
                        <p>c 10:00 до 22:00</p>
                    </div>
                </div>
                <div class="footer-info__item">
                   <div class="footer-socials">
                        <div class="footer-title"><strong>Социальные сети</strong></div>
                        <ul>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Telegram</a></li>
                            <li><a href="#">Twitter</a></li>
                        </ul>
                   </div>
                   <div class="footer-mail">
                       <div class="footer-title"><strong>Почта</strong></div>
                       <a href="mailto:americantravel@gmail.com">americantravel@gmail.com</a>
                   </div>
                </div>
            </div>
            <div class="flex-item footer-phone d-flex align-items-center">
                <div class="phone"><a href="tel:+79991234555">8 999 123 45 55</a></div>
            </div>
        </div>
        <div class="footer-copyright">
            <a href="/"><small>americantravel</small> &copy; 2019 </a>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
