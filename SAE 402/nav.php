<nav class="nav">
        <img class="logo" src="<?php the_field('img_logo'); ?>" alt="">



        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'header-primary-menu',
                'menu_id' => 'footer', 
                'container' => 'ul', 
                'menu_class' => 'nav__link-contain',
            )
        ); 

        ?>


        <a class="nav__btn" href="<?php the_field('link_btn-nav'); ?>"><?php the_field('btn_4');?></a>
      
</nav>




