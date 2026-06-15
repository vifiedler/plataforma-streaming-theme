<?php
function css_functions()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css', 'all');
    wp_register_style('bootstrap-icon', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css', 'all');
    wp_register_style('fuentes', 'https://fonts.googleapis.com/css2?family=Frank+Ruhl+Libre:wght@300..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Lora:ital,wght@0,400..700;1,400..700&display=swap', 'all');
    wp_register_style('estilo-nota2', get_template_directory_uri() . '/assets/librerias/css/style.css', 'all');
    wp_register_style('footer-css', get_template_directory_uri() . '/assets/templates/footers/footer.css', 'all');

    wp_enqueue_style('footer-css');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('bootstrap-icon');
    wp_enqueue_style('fuentes');
    wp_enqueue_style('estilo-nota2');

}
add_action('wp_enqueue_scripts', 'css_functions');