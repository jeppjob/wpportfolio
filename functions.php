<?php


function jc_theme_support(){
    add_theme_support('title-tag');
}
add_action('after_setup_theme','jc_theme_support');

// Loading scripts function
function jc_load_scripts(){

    // Load JS files
    wp_register_script('swup_js', get_template_directory_uri() . '/node_modules/swup/dist/swup.min.js', array('jquery'), '1.2', true);
    wp_enqueue_script('swup_js');
    wp_register_script('main_script', get_template_directory_uri().'/js/main.js',array('jquery'),1, true);
    wp_enqueue_script('main_script');

    //Load CSS files
    wp_register_style('fonts', get_template_directory_uri().'/css/fonts.css', array(),false, 'all');
    wp_enqueue_style('fonts');
    wp_register_style('main_stylesheet', get_template_directory_uri().'/css/main.css', array(),false, 'all');
    wp_enqueue_style('main_stylesheet');
}
add_action('wp_enqueue_scripts','jc_load_scripts');

// Add Menu
add_theme_support('menus');
register_nav_menus(
    array(
        'primary_menu' => __('Primary Menu', 'theme'),
        'footer_menu' => __('Footer Menu','theme')
    )
    );


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



