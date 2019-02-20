
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <?php wp_head(); ?>
    <style>
      .contact-img {
  background: url("<?php echo get_theme_mod('jc-contact-image'); ?>");
      }
      .home::before{
      background: url("<?php echo get_theme_mod('jc-home-image'); ?>");
      content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-repeat: no-repeat;
  background-size: cover;
  filter: grayscale(100%);
  opacity: 0.3;
    }
      </style>
</head>
<body>
    
