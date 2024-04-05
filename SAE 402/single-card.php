



<?php get_header();?>
<?php  if (have_posts()):
while (have_posts()):the_post();?>


<li class="map__card">
               
               <div class="map__card-img" id="imgCard2" style="background-image: url('<?php the_field("card_img"); ?>');"></div>
               <div class="map__card-info">
                   <h3 class="map__card-title" id="titleCard2"><?php the_field("card_title"); ?></h3>
                   <p class="map__card-desc"><?php the_field("card_desc"); ?>
                   </p>
               </div>
               <div class="map__card-bot" id="card2" style="background-color:var(<?php the_field("card_bot-bg"); ?>);">
                   <p class="map__card-lvl"><?php the_field("card_lvl"); ?></p>
                   <p class="map__card-dist"><?php the_field("card_dist"); ?> </p>
               </div>

       </li>

    <?php endwhile; endif;?>