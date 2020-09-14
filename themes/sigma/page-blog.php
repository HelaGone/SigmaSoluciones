<?php
  /*
    Template name: Blog
  */
  get_header();

  $args = array(
    'post_type'=>'post',
    'posts_per_page'=>20,
    'post_status'=>'publish',
    'orderby'=>'date',
    'order'=>'DESC'
  );
  $blogposts = new WP_Query($args);
  if($blogposts->have_posts()): ?>
    <main id="" class="main_wrapper">
      HOLA
      <section class="main_wrapper_section">
        <div class="fixed_header_frame">
          <h1><?php echo 'BLOG'; ?></h1>
        </div>

        <!-- SCROLL SECTION -->
        <section class="inner_container scroll_section">
          <?php
            $i=1;
            while($blogposts->have_posts()):
              $blogposts->the_post();
              setup_postdata($post);
              get_template_part('templates/block', 'blog_item', array('count'=>$i));
              $i++;
            endwhile;
            wp_reset_postdata(); ?>
        </section>
      </section>
    </main>
<?php
  endif;
  get_footer(); ?>
