<?php
  get_header();
  global $wp_query;
  $serv = array_key_exists('name', $wp_query->query) ? $wp_query->query['name'] : '';
  if(have_posts()):
    while(have_posts()):
      the_post(); ?>

      <section class="main_wrapper_section">
        <section class="inner_container">
          <h1><?php the_title(); ?></h1>
          <div class="content_container">
            <?php the_content(); ?>
          </div>
        </section>

        <?php get_template_part('templates/casos', 'widget', array('type'=>$serv)); ?>

      </section>

<?php
    endwhile;
  endif;
get_footer();?>
