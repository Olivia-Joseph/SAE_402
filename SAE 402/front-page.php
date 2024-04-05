<?php get_header(); ?>


<!-- Home Page -->
<main >
<article id="home" class="home__content " style="background-image: url('<?php the_field("home_img"); ?>');">
        <main class="home__main">
            <div class="home__main-top">
            <img class="logo" src="<?php the_field('img_logo'); ?>" alt=""> 
                           <h2 class="home__main-title">Spy Drive</h2>
            </div>

            <div class="home__main-bottom">

                <button class="home__main-button"> Trailer</button>

                <div class="middle">
                    <div class="mouse">

                    </div>
                </div>


            </div>

        </main>

    </article>    

    <!-- Présentation -->
    <article class="presentation__section ">
        <section class="presentation__content">
            <div class="presentation__img" style="background-image: url('<?php the_field("pres_img"); ?>');"></div>
            <div class="presentation__info">
                <h2 class="presentation__title">Spy Drive</h2>
                <p class="presentation__desc">Dive into the adrenaline-fueled action of Spy Drive, a high-octane racing game where you play as a spy on the run. Evade your pursuers, maneuver through obstacles, and employ clever tactics to survive. Are you ready to outsmart your enemies and become the master of escape?</p>
                
            </div>
        </section>
    </article>
    <!-- Détails des maps -->
    <article id="maps" class="map__section ">
    <main class="map__content">
        <div class="map__content-top">
            <h2 class="map__title">Discover all the map</h2>
            <p class="map__desc">ride and carry out each of your missions in a different setting. Each of its decorations present their particularities
            </p>
        </div>
        <ul class="map__cards">



        <?php
    $args = array(
        'post_type' => 'mapCard', 
    );

    $query = new WP_Query($args);

    
    if ($query->have_posts()) {
        
        while ($query->have_posts()) {
            $query->the_post();
            ?>
<li class="map__card">
               
               <div class="map__card-img" id="imgCard2" style="background-image: url('<?php the_field("card_img"); ?>');"></div>
               <div class="map__card-info">
                   <h3 class="map__card-title" id="titleCard2"><?php the_field("card_title"); ?></h3>
                   <p class="map__card-desc"><?php the_field("card_desc"); ?>
                   </p>
               </div>
               <div class="map__card-bot" id="card2" style="background-color: var(<?php the_field('card_bot-bg'); ?>);">

                   <p class="map__card-lvl"><?php the_field("card_lvl"); ?></p>
                   <p class="map__card-dist"><?php the_field("card_dist"); ?> </p>
               </div>

       </li>
            <?php
        }
        wp_reset_postdata(); 
    } 
    ?>

    

            <!-- <li class="map__card">
               
                <div class="map__card-img" id="imgCard2"></div>
                <div class="map__card-info">
                    <h3 class="map__card-title" id="titleCard2">Montain</h3>
                    <p class="map__card-desc">Race against time across dangerous mountainous terrain, with the ticking of the timer echoing your every move. Will you manage to get there in time?
                    </p>
                </div>
                <div class="map__card-bot" id="card2">
                    <p class="map__card-lvl">Level 2</p>
                    <p class="map__card-dist">200 Miles </p>
                </div>

        </li>

        <li class="map__card" id="mapCard1">
               
                    <div class="map__card-img" id="imgCard1"></div>
                    <div class="map__card-info">
                        <h3 class="map__card-title" id="titleCard1">Forest Road</h3>
                        <p class="map__card-desc" id="desCard1">Navigate the dense forest, where every turn hides secrets and every shadow hides danger. Can you outwit your captors and escape this spy race unscathed?
                        </p>
                    </div>
                    <div class="map__card-bot" id="card1">
                        <p class="map__card-lvl">Level 1</p>
                        <p class="map__card-dist">124 Miles </p>
                    </div>

            </li>
        <li class="map__card">
               
            <div class="map__card-img" id="imgCard3"></div>
            <div class="map__card-info">
                <h3 class="map__card-title" id="titleCard3">The City</h3>
                <p class="map__card-desc">Immerse yourself in the urban jungle over time. Maneuver through busy city streets, avoid obstacles and navigate traffic before disaster strikes.
                </p>
            </div>
            <div class="map__card-bot" id="card3">
                <p class="map__card-lvl">Level 3</p>
                <p class="map__card-dist">290 Miles </p>
            </div>

    </li> -->
        </ul>


    </main>
</article>
    <!-- Gameplay -->
    <article id="gameplay" class="gameplay__section ">

<div class="gameplay__top">
    <h2 class="gameplay__title">Thrill of the chase. Adrenaline at every turn
    </h2>
    <p class="gameplay__desc">You have no room for error, you have no time to waste behind the wheel of one of the most efficient cars in the world
    </p>
</div>

<ul class="gameplay__cards">

        <?php
    $args = array(
        'post_type' => 'gmp_card', 
    );

    $query = new WP_Query($args);

    
    if ($query->have_posts()) {
        
        while ($query->have_posts()) {
            $query->the_post();
            ?>
<li class="gameplay__card">
        <div class="gameplay__img" id="gmpimg1" style="background-image: url('<?php the_field("gmp_img"); ?>');"></div>
        <div class="gameplay__card-info">
            <h3 class="gameplay__card-title"><?php the_field("gmp_title"); ?>
            </h3>
            <p class="gameplay__card-desc"><?php the_field("gmp_desc"); ?>
            </p>
        </div>
    </li>
            <?php
        }
        wp_reset_postdata(); 
    } 
    ?>

    <!-- <li class="gameplay__card">
        <div class="gameplay__img" id="gmpimg2"></div>
        <div class="gameplay__card-info">
            <h3 class="gameplay__card-title">Don't let time pass

            </h3>
            <p class="gameplay__card-desc">Be careful, every second counts! Don't let the timer run out or the bomb will explode. Keep your cool and act quickly to save the day

            </p>
        </div>
    </li>

    <li class="gameplay__card">
        <div class="gameplay__img" id="gmpimg3"></div>
        <div class="gameplay__card-info">
            <h3 class="gameplay__card-title">Escape in a breathtaking chase

            </h3>
            <p class="gameplay__card-desc">In this chase, the pressure is at its peak. Avoid running out of time or risk being overwhelmed by events. Rush at full speed, because every second counts to capture your target or escape your pursuers.

            </p>
        </div>
    </li>-->
</ul> 

</article>
    <!-- Call to action -->
    <article class="cta__section ">
        <section class="cta__content">
            <div class="cta__container">
                <h2 class="cta__title">Spy Drive</h2>
                <p class="cta__desc"> join the crazy adventure of spy drive
                </p>
                <a class="cta__button" href="<?php the_field('link_cta-btn');?>"><?php the_field('cta_btn');?></a>
                            <video class="cta__video" autoplay muted loop src="<?php the_field("video_cta")?>"></video>

            </div>
  
        </section>
    </article>
    <!-- Footer -->
    <article class="footer ">

<div class="footer__img-containeur">
    
<img class="logo" src="<?php the_field('img_logo'); ?>" alt="">
</div>
<H2 class="footer__title"> SpyDrive</H2>


<section class="footer__content">

    <section class="footer__content-top">
        <ul class="footer__socials">
            <li class="footer__icon">
                <div class="icon__contain">
                            <img class="footer__svg" src="<?php the_field("instagram_icon")?>" alt="">
                </div>
        
            </li>

            <li class="footer__icon">
                <div class="icon__contain">
                <img class="footer__svg" src="<?php the_field("youtube_icon")?>" alt="">
            </div>
            </li>

            <li class="footer__icon">
                <div class="icon__contain">
                    <img class="footer__svg" src="<?php the_field("discord_icon")?>" alt="">
                </div>
                
            </li>

            <li class="footer__icon">
                <div class="icon__contain">
                      <img class="footer__svg" src="<?php the_field("twitter_icon")?>" alt="">
                </div>
              
            </li>

        </ul>

    </section>

    <section class="footer__content-bot">
        <p class="footer__conditions">Legal Notice</p>
        <p class="footer__conditions">Cookie Policy</p>
        <p class="footer__conditions">Privacy Policy</p>
        <p class="footer__conditions">Terms & Conditions</p>

    </section>

</section>

</article>
</main>
