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
            <li><a href="https://codepen.io/jeffcadampog"><span class="icon-codepen"></span></a></li>         </ul>
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
       <section class="work-page">
       <div class="work-page-container">
       <h2><?php the_title();?></h2>

       <p>
       <?php
        while(have_posts()){
            the_post();
        }
        the_content();
       ?>
       </p>
        </div>
      </section>
    </div>

<?php   get_footer();   ?>
