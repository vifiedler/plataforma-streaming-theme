<?php
add_filter( 'use_widgets_block_editor', '__return_false');
function zona_widget(){
    /*zona widget 1*/
    register_sidebar(
        array(
            'name'          => 'Footer columna 1',
            'id'            => 'footer_1',
            'before_widget' => '<div id="%1$s" class="d-flex justify-content-center mb-3">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="mb-3 d-none">',
            'after_title'   => '</h3>'
        )
    );
    /*zona widget 1*/
    /*zona widget 2*/
    register_sidebar(
        array(
            'name'          => 'Footer columna 2',
            'id'            => 'footer_2',
            'before_widget' => '<div id="%1$s" class="d-flex justify-content-center">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="mb-3 d-none">',
            'after_title'   => '</h3>'
        )
    );
    /*zona widget 2*/
}
add_action('widgets_init', 'zona_widget');