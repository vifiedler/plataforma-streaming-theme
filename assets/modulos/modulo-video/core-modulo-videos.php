<?php
function registrar_cpt_videos()
{

    $labels = array(
        'name' => 'videos',
        'singular_name' => 'video',
        'menu_name' => 'videos',
        'name_admin_bar' => 'video',
        'add_new' => 'Añadir nuevo',
        'add_new_item' => 'Añadir nuevo video',
        'new_item' => 'Nuevo video',
        'edit_item' => 'Editar video',
        'view_item' => 'Ver video',
        'all_items' => 'Todos los videos',
        'search_items' => 'Buscar video',
        'not_found' => 'No se encontraron videos',
        'not_found_in_trash' => 'No se encontraron videos en la papelera',
        'featured_image' => 'Imagen destacada',
        'set_featured_image' => 'Asignar imagen destacada',
        'remove_featured_image' => 'Quitar imagen destacada',
        'use_featured_image' => 'Usar como imagen destacada',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-video',
        'rewrite' => array('slug' => 'videos'),
        'show_in_rest' => true,
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes'),
        'menu_position' => 5,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'capability_type' => 'post',
    );

    register_post_type('hero', $args);
}
add_action('init', 'registrar_cpt_videos');
