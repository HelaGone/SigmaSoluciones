<?php get_header();
  global $wp_query;
  $query_vars = $wp_query->query_vars;
  $pt = $query_vars['post_type'];
  $arch_name = ($query_vars['post_type'] == 'inmuebles') ? 'inmobiliaria' : $pt;
  if(have_posts()): ?>
    <main id="" class="main_wrapper">
      <section class="main_wrapper_section">
        <div class="fixed_header_frame">
          <figure>
            <img src="<?php echo THEMEPATH.'images/headers/'.$pt.'.jpg' ?>" alt="">
            <figcaption>
              <h1><?php echo esc_html(strtoupper($arch_name)); ?></h1>
              <p>Lorem Ipsum Dolor Sit met consectetur adipiscing elit mecenas nullam proim esectas integer</p>
            </figcaption>
          </figure>
        </div>
        <!-- SCROLL SECTION -->
        <section class="inner_container scroll_section">
          <?php
            $i=1;
            while(have_posts()):
              the_post();
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
