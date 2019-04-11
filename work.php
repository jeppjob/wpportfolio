<?php /* Template Name: Work */ ?>
<?php   get_header();   ?>
<main id="swup">
   <div class="logo"><a href="<?php echo get_home_url();?>"><img src="<?php echo get_theme_mod('jc-logo');?>"></a></div>
   <nav id="navbar">
      <!-- Mobile Navigation -->
      <div class="navbar-social transition-up-social">
         <ul>
         <li><a href="https://github.com/jeppjob"><span class="icon-github"></span></a></li>
            <li><a href="https://www.behance.net/jeffcadampog"><span class="icon-behance"></span></a></li>
            <li><a href="https://dribbble.com/jeffcadampog"><span class="icon-dribbble"></span></a></li>
            <li><a href="https://codepen.io/jeffcadampog"><span class="icon-codepen"></span></a></li>
         </ul>
      </div>
      <div class="navbar-links transition-right">
         <?php
            wp_nav_menu(array(
                'theme_location' => 'primary_menu',
            ));
            ?>
      </div>
      <div id="menu" class="menu-wrap">
         <div class="menu-icon"><span></span><span></span></div>
      </div>
   </nav>
   <div id="wrapper">
       <!-- My Work Section JC -->
        <section id="work" class="work">
        <?php
          $args = array(
            'post_type' => 'projects',
            'posts_per_page' => 6
          );

          $projects = new WP_Query($args);

          while($projects->have_posts()){
            $projects->the_post();
          
       ?>
       <div class="work-container">
          <div class="work-img">
            <div class="work-img-overlay transition-img-overlay"></div>
            <img class="transition-up" src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="">
          </div>
          <div class="work-content transition-left">
            <h2><?php the_title(); ?></h2>
            <h3><?php echo get_post_meta($post->ID,'_proj_value_key',true); ?></h3>
            <p><?php the_excerpt(); ?></p>
            <a href="<?php echo get_permalink(get_the_ID()); ?>">View Project</a>
          </div>
        </div>
        <?php } wp_reset_query(); ?>
      </section>
      
    </div>
<?php   get_footer();   ?>
