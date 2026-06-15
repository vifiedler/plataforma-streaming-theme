<footer id="colophon" class="fbs__footer mt-5">
    <div class="container">

        <!-- Newsletter — widget footer_5 + texto intro -->
        <div class="fbs__footer-newsletter row align-items-center py-4 mb-0">
            <div class="col-md-5 mb-3 mb-md-0">
                <h2 class="fbs__footer-newsletter-title">Suscríbete a nuestro newsletter</h2>
                <p class="fbs__footer-newsletter-desc">Recibe las últimas actualizaciones sobre lo obscuro, lo macabro y el resto de nuestro contenido aquí.</p>
            </div>
            <?php if (is_active_sidebar('footer_5')): dynamic_sidebar('footer_5'); endif; ?>
        </div>

        <!-- Links — widgets footer_2 (logo/desc) + footer_1/3/4 (columnas) -->
        <div class="fbs__footer-links row py-5">
            <?php if (is_active_sidebar('footer_2')): dynamic_sidebar('footer_2'); endif; ?>
            <div class="col-md-6">
                <div class="row g-4">
                    <?php if (is_active_sidebar('footer_1')): dynamic_sidebar('footer_1'); endif; ?>
                    <?php if (is_active_sidebar('footer_3')): dynamic_sidebar('footer_3'); endif; ?>
                    <?php if (is_active_sidebar('footer_4')): dynamic_sidebar('footer_4'); endif; ?>
                </div>
            </div>
        </div>

        <!-- Créditos -->
        <?php include get_template_directory() . '/assets/templates/footers/footer-creditos.php'; ?>

    </div>
</footer>