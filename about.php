<?php /* Template Name: About */ ?>
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
      <!-- My About Section JC-->
      <section id="about" class="about">
        <div class="about-img  transition-left">
           <?php 
           $alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
           ?>
          <img src="<?php echo get_theme_mod('jc-about-image');?>" alt="<?php echo $alt_text; ?>">
        </div>
        <div class="about-content  transition-up">
        <?php if (have_post) : while(have_posts()) : the_post(); ?>
         <?php the_content(); ?>
        <?php endwhile; endif;?>
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