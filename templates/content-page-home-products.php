<?php //echo do_shortcode("[sibling-pages exclude='6,304,77,41,10,8,12,17,151,23,219,275'] "); ?>

<section>

  <?php 
  $loop5 = new WP_Query( array( 
              'post_type' => 'cpt',
              'category_name' => '' 
              )); 
  ?>


  <div class="jcarousel">
    <ul>
      <?php while ($loop5->have_posts()) : $loop5->the_post(); ?>
                
        <li>
        <? if ( has_post_thumbnail() ) { ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
            <?php the_post_thumbnail('medium'); ?>
        </a>
        <?}else {?>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="t0theme" class="logo-img">
        <?}?>

            <h3>
                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <? the_title(); ?>
                </a>
            </h3>
        </li>
        
      <?php endwhile; ?>
      <?php wp_reset_postdata(); ?>

    </ul>

  </div>

  <!-- Prev/next controls -->
    <a href="#" class="jcarousel-control-prev btn btn--slider">
    <span class="icon-arrow-left"></span></a>
    <a href="#" class="jcarousel-control-next btn btn--slider">
    <span class="icon-arrow-right"></span></a>

    </section>

