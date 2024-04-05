



<?php get_header();?>
<?php  if (have_posts()):
while (have_posts()):the_post();?>


<li class="map__card">
               
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

    <?php endwhile; endif;?>