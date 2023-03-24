<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
    <meta charset="<?php bloginfo('charset') ?>">
    <?php wp_head() ?>
</head>
<body>
    <div class="wrapper">
      <!-- emmet: header>h1+p+nav>ul>li*3>a -->
      <header class="left <?= is_page() ? 'left--contact' : '' ?>">
        <h1 class="left__title"><a href="<?= home_url() ?>" class="left__title-link">O'Clock Students News</a></h1>
        <div class="left__paragraph">
          <h2 class="left__subtitle"><strong class="left__subtitle-strong">Latest news</strong> from our students</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque scelerisque suscipit nibh quis porttitor. Integer iaculis mi urna, a pulvinar quam adipiscing ut. Vivamus vel vestibulum mauris.
          </p>
        </div>
        <?php
        // wp_nav_menu() permet de générer le HTML de nos menus
        $menu = wp_nav_menu([
            'theme_location' => 'main-menu', // Ici, on indique l'emplacement occupé par le menu
            'container' => 'nav', // <nav>...</nav>
            'menu_class' => 'left__nav', // La classe à affecter à notre <ul>
            'echo' => false, // On désactive le echo pour le faire plus tard
        ]);

        // On met la classe .left__nav-item sur nos <li>
        $menu = str_replace('menu-item ', 'left__nav-item ', $menu);

        // On met la classe .left__nav-link sur nos <a>
        $menu = str_replace(' href', ' class="left__nav-link" href', $menu);

        echo $menu;
        ?>
      </header>
      <main class="right">
