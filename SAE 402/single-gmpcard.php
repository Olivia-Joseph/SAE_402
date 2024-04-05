<?php get_header();?>
<?php  if (have_posts()):
while (have_posts()):the_post();?>


<li class="gameplay__card">
        <div class="gameplay__img" id="gmpimg1" style="background-image: url('<?php the_field("gmp_img"); ?>');"></div>
        <div class="gameplay__card-info">
            <h3 class="gameplay__card-title"><?php the_field("gmp_title"); ?>
            </h3>
            <p class="gameplay__card-desc"><?php the_field("card_desc"); ?>
            </p>
        </div>
    </li>

    <?php endwhile; endif;?>