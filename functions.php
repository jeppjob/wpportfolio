<?php

// Loading scripts function
function jc_load_scripts(){

    // Load JS files
    wp_enqueue_script('swup_js', get_template_directory_uri() . '/node_modules/swup/dist/swup.min.js', array('jquery'), '1.2', true);
    wp_enqueue_script('main_script', get_template_directory_uri().'/js/main.js',array('jquery'),1, true);

    //Load CSS files
    wp_enqueue_style('fonts', get_template_directory_uri().'/css/fonts.css', array(),false, 'all');
    wp_enqueue_style('main_stylesheet', get_template_directory_uri().'/css/main.css', array(),false, 'all');
}
add_action('wp_enqueue_scripts','jc_load_scripts');

//Theme Support Defaults
function jc_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('widgets');
    add_theme_support('post-thumbnails');
    add_theme_support('html5',
    array('comment-list','comment-form','search-form')
    );
}
add_action('after_setup_theme','jc_theme_support');

// Projects Post Type
function jc_project_post_type(){
    register_post_type('projects',
    array(
        'rewrite' => array('slug'=>'projects'),
        'labels' => array(
            'name' => 'Projects',
            'singular_name' => 'Project',
            'add_new_item' => __('Add New Project'),
            'edit_item' => __('Edit Project')
        ),
        'menu-icon' => 'dashicons-media-default',
        'public' => true,
        'has_archive' => true,
        'supports' => array(
            'title', 'thumbnail','editor', 'custom-fields','excerpt', 'comments'
        )
    )
        );
}
add_action('init', 'jc_project_post_type');

// Project Meta Box

function jc_project_add_meta_box(){
    add_meta_box('project_taxonomy','Project Taxonomy','jc_project_taxonomy_callback','projects','normal','high');
}
function jc_project_taxonomy_callback($post){
    wp_nonce_field('jc_save_taxonomy_data','jc_taxonomy_nonce');

    $value = get_post_meta($post->ID,'taxonomy_value_key',true);
    echo '<label for="jc_taxonomy_field">Project Type: </label><br>';
    echo '<input type="text" id="jc_taxonomy_field" name="jc_taxonomy_field" value="' . esc_attr($value) . '" size="25">';
}
add_action('add_meta_boxes','jc_project_add_meta_box');

function jc_save_taxonomy_data($post_id){
    if (! isset($_POST['jc_taxonomy_nonce'])){
        return;
    }
    if (! wp_verify_nonce($_POST['jc_taxonomy_nonce'],'jc_save_taxonomy_data')){
        return;
    }
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return; 
    }
    if (! current_user_can('edit_post', $post_id)){
        return;
    }
    if (! isset($_POST['jc_taxonomy_field'])){
        return;
    }

    $project_data = sanitize_text_field($_POST['jc_taxonomy_field']);
    update_post_meta($post_id, 'taxonomy_value_key', $project_data);
}
add_action('save_post','jc_save_taxonomy_data');
// Add Menu
add_theme_support('menus');
register_nav_menus(
    array(
        'primary_menu' => __('Primary Menu', 'theme'),
        'footer_menu' => __('Footer Menu','theme')
    )
    );




/*

// Add Customization
function jc_customize_register($wp_customize){
    // Add Logo
    $wp_customize->add_section('jc-logo-section',array(
        'title' => __('Logo')
    ));
    // Logo Setting
    $wp_customize->add_setting('jc-logo',array(
        'default' => __('Logo'),
        'type' => 'theme_mod'
    ));
    // Logo Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jc-logo-control',array(
        'label' => __('Logo Image'),
        'settings' => 'jc-logo',
        'section' => 'jc-logo-section',
    )));
    
// Add Home Image
$wp_customize->add_section('jc-home-image-section',array(
    'title' => __('Home Image')
));
// Home Image Setting
$wp_customize->add_setting('jc-home-image',array(
    'default' => __('Home Image','Jeff Portfolio'),
    'type' => 'theme_mod'
));
// Home Image Control
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jc-home-image-control',array(
    'label' => __('Home Image','Jeff Portfolio'),
    'section' => 'jc-home-image-section',
    'settings' => 'jc-home-image'
)));


    // Add About Image
    $wp_customize->add_section('jc-about-section',array(
        'title' => __('About Image','Jeff Portfolio')
    ));
    // About Image Setting
    $wp_customize->add_setting('jc-about-image', array(
        'default' => __('About Image','Jeff Portfolio'),
        'type' => 'theme_mod'
    ));
    // About Image Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jc-about-image-control',array(
        'label' => __('About Image'),
        'section' => 'jc-about-section',
        'settings' => 'jc-about-image'
    )));

    // Portfolio Add Section
    $wp_customize->add_section('jc-portfolio-section',array(
        'title' => __('Portfolio Section')
    ));

    // Portfolio Image 1 Setting
    $wp_customize->add_setting('jc-portfolio-image-1',array(
        'default' => 'test',
        'type' => 'theme_mod'
    ));
    // Portfolio Image 1 Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jc-portfolio-image-1-control',array(
        'label' => 'Project Image 1',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-image-1',
    )));
    // Portfolio Title 1 Setting
    $wp_customize->add_setting('jc-portfolio-title-1',array(
        'default' => 'Project Title',
        'type' => 'theme_mod'
    ));
    // Portfolio Title 1 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-title-1-control',array(
        'label' => 'Project Title 1',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-title-1',
    )));
    // Portfolio Sub 1 Setting
    $wp_customize->add_setting('jc-portfolio-subtitle-1',array(
        'default' => 'Project Subtitle',
        'type' => 'theme_mod'
    ));
    // Portfolio Sub 1 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-sub-1-control',array(
        'label' => 'Project Subtitle 1',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-subtitle-1',
    )));
    // Portfolio Desc 1 Setting
    $wp_customize->add_setting('jc-portfolio-description-1',array(
        'default' => 'Project Description',
        'type' => 'theme_mod'
    ));
    // Portfolio Desc 1 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-description-1-control',array(
        'label' => 'Project Description 1',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-description-1',
        'type' => 'textarea',
    )));    
    // Portfolio Link 1 Setting
    $wp_customize->add_setting('jc-portfolio-link-1');
    // Portfolio Link 1 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-link-1-control',array(
        'label' => 'Project Link 1',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-link-1',
        'type' => 'dropdown-pages',
    )));


    // Portfolio Image 2 Setting
    $wp_customize->add_setting('jc-portfolio-image-2',array(
        'default' => 'test',
        'type' => 'theme_mod'
    ));
    // Portfolio Image 2 Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jc-portfolio-image-2-control',array(
        'label' => 'Project Image 2',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-image-2',
    )));
    // Portfolio Title 2 Setting
    $wp_customize->add_setting('jc-portfolio-title-2',array(
        'default' => 'Project Title',
        'type' => 'theme_mod'
    ));
    // Portfolio Title 2 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-title-2-control',array(
        'label' => 'Project Title 2',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-title-2',
    )));
    // Portfolio Sub 2 Setting
    $wp_customize->add_setting('jc-portfolio-subtitle-2',array(
        'default' => 'Project Subtitle',
        'type' => 'theme_mod'
    ));
    // Portfolio Sub 2 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-sub-2-control',array(
        'label' => 'Project Subtitle 2',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-subtitle-2',
    )));
    // Portfolio Desc 2 Setting
    $wp_customize->add_setting('jc-portfolio-description-2',array(
        'default' => 'Project Description',
        'type' => 'theme_mod'
    ));
    // Portfolio Desc 2 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-description-2-control',array(
        'label' => 'Project Description 2',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-description-2',
        'type' => 'textarea',
    )));    
    // Portfolio Link 2 Setting
    $wp_customize->add_setting('jc-portfolio-link-2');
    // Portfolio Link 2 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-link-2-control',array(
        'label' => 'Project Link 2',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-link-2',
        'type' => 'dropdown-pages',
    )));


    // Portfolio Image 3 Setting
    $wp_customize->add_setting('jc-portfolio-image-3',array(
        'default' => 'test',
        'type' => 'theme_mod'
    ));
    // Portfolio Image 3 Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jc-portfolio-image-3-control',array(
        'label' => 'Project Image 3',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-image-3',
    )));
    // Portfolio Title 3 Setting
    $wp_customize->add_setting('jc-portfolio-title-3',array(
        'default' => 'Project Title',
        'type' => 'theme_mod'
    ));
    // Portfolio Title 3 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-title-3-control',array(
        'label' => 'Project Title 3',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-title-3',
    )));
    // Portfolio Sub 3 Setting
    $wp_customize->add_setting('jc-portfolio-subtitle-3',array(
        'default' => 'Project Subtitle',
        'type' => 'theme_mod'
    ));
    // Portfolio Sub 3 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-sub-3-control',array(
        'label' => 'Project Subtitle 3',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-subtitle-3',
    )));
    // Portfolio Desc 3 Setting
    $wp_customize->add_setting('jc-portfolio-description-3',array(
        'default' => 'Project Description',
        'type' => 'theme_mod'
    ));
    // Portfolio Desc 3 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-description-3-control',array(
        'label' => 'Project Description 3',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-description-3',
        'type' => 'textarea',
    )));    
    // Portfolio Link 3 Setting
    $wp_customize->add_setting('jc-portfolio-link-3');
    // Portfolio Link 3 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-link-3-control',array(
        'label' => 'Project Link 3',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-link-3',
        'type' => 'dropdown-pages',
    )));


    // Portfolio Image 4 Setting
    $wp_customize->add_setting('jc-portfolio-image-4',array(
        'default' => 'test',
        'type' => 'theme_mod'
    ));
    // Portfolio Image 4 Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jc-portfolio-image-4-control',array(
        'label' => 'Project Image 4',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-image-4',
    )));
    // Portfolio Title 4 Setting
    $wp_customize->add_setting('jc-portfolio-title-4',array(
        'default' => 'Project Title',
        'type' => 'theme_mod'
    ));
    // Portfolio Title 4 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-title-4-control',array(
        'label' => 'Project Title 4',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-title-4',
    )));
    // Portfolio Sub 4 Setting
    $wp_customize->add_setting('jc-portfolio-subtitle-4',array(
        'default' => 'Project Subtitle',
        'type' => 'theme_mod'
    ));
    // Portfolio Sub 4 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-sub-4-control',array(
        'label' => 'Project Subtitle 4',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-subtitle-4',
    )));
    // Portfolio Desc 4 Setting
    $wp_customize->add_setting('jc-portfolio-description-4',array(
        'default' => 'Project Description',
        'type' => 'theme_mod'
    ));
    // Portfolio Desc 4 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-description-4-control',array(
        'label' => 'Project Description 4',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-description-4',
        'type' => 'textarea',
    )));    
    // Portfolio Link 4 Setting
    $wp_customize->add_setting('jc-portfolio-link-4');
    // Portfolio Link 4 Control
    $wp_customize->add_control(new WP_Customize_Control($wp_customize,'jc-portfolio-link-4-control',array(
        'label' => 'Project Link 4',
        'section' => 'jc-portfolio-section',
        'settings' => 'jc-portfolio-link-4',
        'type' => 'dropdown-pages',
    )));
    
    // Add Contact 
    $wp_customize->add_section('jc-contact-section',array(
        'title' => __('Contact Section','Jeff Portfolio') 
    ));
    // Contact Setting
    $wp_customize->add_setting('jc-contact-image',array(
        'default' => __('Contact Image', 'Jeff Portfolio'),
        'type' => 'theme_mod'
    ));
    // Contact Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'jc-contact-image-control',array(
        'label' => __('Contact Image', 'Jeff Portfolio'),
        'section' => 'jc-contact-section',
        'settings' => 'jc-contact-image'
    )));
    
}
add_action('customize_register','jc_customize_register');



*/