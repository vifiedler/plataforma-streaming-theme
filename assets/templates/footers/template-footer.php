<footer id="colophon" class="fbs__footer mt-3">
    <div class="container">
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