<footer id="colophon" class="fbs__footer mt-3">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <?php if (is_active_sidebar('footer_1')):
                    dynamic_sidebar('footer_1');
                endif; ?>
            </div>
            <div class="col-12">
                <?php if (is_active_sidebar('footer_2')):
                    dynamic_sidebar('footer_2');
                endif; ?>
            </div>
        </div>
    </div>
    <!-- Créditos -->
    <?php include get_template_directory() . '/assets/templates/footers/footer-creditos.php'; ?>


</footer>