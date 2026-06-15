<?php
add_filter( 'use_widgets_block_editor', '__return_false');
function zona_widget(){
    /*zona widget 1*/
    register_sidebar(
        array(
            'name'          => 'Footer columna 1',
            'id'            => 'footer_1',
            'before_widget' => '<div id="%1$s" class="col-md-4 col-lg-4 mb-4 mb-lg-0 footer-theme">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="mb-3">',
            'after_title'   => '</h3>'
        )
    );
    /*zona widget 1*/
    /*zona widget 2*/
    register_sidebar(
        array(
            'name'          => 'Footer columna 2',
            'id'            => 'footer_2',
            'before_widget' => '<div id="%1$s" class="col-md-6 mb-5 mb-lg-0">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="mb-3">',
            'after_title'   => '</h3>'
        )
    );
    /*zona widget 2*/
    /*zona widget 3*/
    register_sidebar(
        array(
            'name'          => 'Footer columna 3',
            'id'            => 'footer_3',
            'before_widget' => '<div id="%1$s" class="col-md-4 col-lg-4 mb-4 mb-lg-0 footer-theme">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="mb-3">',
            'after_title'   => '</h3>'
        )
    );
    /*zona widget 3*/
    /*zona widget 4*/
    register_sidebar(
        array(
            'name'          => 'Footer columna 4',
            'id'            => 'footer_4',
            'before_widget' => '<div id="%1$s" class="col-md-4 col-lg-4 mb-4 mb-lg-0 quick-contact footer-theme">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="mb-3">',
            'after_title'   => '</h3>'
        )
    );
    /*zona widget 4*/
    /*zona widget 5*/
    register_sidebar(
        array(
            'name'          => 'Footer columna 5',
            'id'            => 'footer_5',
            'before_widget' => '<div id="%1$s" class="col-md-5">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="mb-3">',
            'after_title'   => '</h3>'
        )
    );
    /*zona widget 5*/
}
add_action('widgets_init', 'zona_widget');