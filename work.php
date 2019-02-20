<?php /* Template Name: Work */ ?>
<?php   get_header();   ?>
<main id="swup" class="f">
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
        <div class="work-container">
          <div class="work-img">
            <div class="work-img-overlay transition-img-overlay"></div>
            <img class="transition-up" src="<?php echo get_theme_mod('jc-portfolio-image-1'); ?>" alt="">
          </div>
          <div class="work-content transition-left">
            <h2><?php echo get_theme_mod('jc-portfolio-title-1'); ?></h2>
            <h3><?php echo get_theme_mod('jc-portfolio-subtitle-1'); ?></h3>
            <p><?php echo get_theme_mod('jc-portfolio-description-1'); ?></p>
            <a href="<?php echo get_permalink(get_theme_mod('jc-portfolio-link-1')); ?>">View Project</a>
          </div>
        </div>
        <div class="work-container">
          <div class="work-img">
            <div class="work-img-overlay transition-img-overlay"></div>
            <img class="transition-up" src="<?php echo get_theme_mod('jc-portfolio-image-2'); ?>" alt="">
          </div>
          <div class="work-content transition-left">
          <h2><?php echo get_theme_mod('jc-portfolio-title-2'); ?></h2>
            <h3><?php echo get_theme_mod('jc-portfolio-subtitle-2'); ?></h3>
            <p><?php echo get_theme_mod('jc-portfolio-description-2'); ?></p>
            <a href="<?php echo get_permalink(get_theme_mod('jc-portfolio-link-2')); ?>">View Project</a>
          </div>
        </div>
        <div class="work-container">
          <div class="work-img">
            <div class="work-img-overlay transition-img-overlay"></div>
            <img class="transition-up" src="<?php echo get_theme_mod('jc-portfolio-image-3'); ?>" alt="">
          </div>
          <div class="work-content transition-left">
          <h2><?php echo get_theme_mod('jc-portfolio-title-3'); ?></h2>
            <h3><?php echo get_theme_mod('jc-portfolio-subtitle-3'); ?></h3>
            <p><?php echo get_theme_mod('jc-portfolio-description-3'); ?></p>
            <a href="<?php echo get_permalink(get_theme_mod('jc-portfolio-link-3')); ?>">View Project</a>
          </div>
        </div>
        <div class="work-container">
          <div class="work-img">
            <div class="work-img-overlay transition-img-overlay"></div>
            <img class="transition-up" src="<?php echo get_theme_mod('jc-portfolio-image-4'); ?>" alt="">
          </div>
          <div class="work-content transition-left">
          <h2><?php echo get_theme_mod('jc-portfolio-title-4'); ?></h2>
            <h3><?php echo get_theme_mod('jc-portfolio-subtitle-4'); ?></h3>
            <p><?php echo get_theme_mod('jc-portfolio-description-4'); ?></p>
            <a href="<?php echo get_permalink(get_theme_mod('jc-portfolio-link-4')); ?>">View Project</a>
          </div>
        </div>
      </section>
    </div>
   <!-- My Contact Section JC-->
   <section class="contact">
      <span class="close"></span>
      <div class="contact-img"></div>
      <div class="contact-content">
         <h1>Say Hello!</h1>
         <p>If you have any questions or just want to say hi, feel free to use the form below. </p>
         <form name="contact" method="POST" data-netlify="true">
            <input type="text" placeholder="Name" name="name">
            <input type="text" placeholder="Email" name="email">
            <textarea placeholder="Message" name="message" id="" cols="30" rows="10"></textarea>
            <div data-netlify-recaptcha="true"></div>
            <input name="send" type="submit" value="Send">
         </form>
      </div>
   </section>
</main>

<?php   get_footer();   ?>
