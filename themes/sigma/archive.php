<?php get_header();
  global $wp_query;
  $query_vars = $wp_query->query_vars;

  if(have_posts()): ?>
    <main id="" class="main_wrapper">
      <section class="main_wrapper_section">
        <div class="fixed_header_frame">
          <h1><?php echo esc_html(strtoupper($query_vars['post_type'])); ?></h1>
        </div>
        <!-- SCROLL SECTION -->
        <section class="rounded_container scroll_section">
          <div class="post_pool">
            <?php
              $i=1;
              while(have_posts()):
                the_post(); ?>
                <figure class="fig_object">
                  <?php
                    if(has_post_thumbnail()):
                      wp_is_mobile() ? the_post_thumbnail('medium') : the_post_thumbnail('medium');
                    endif;
                  ?>
                  <figcaption class="fig_caption">
                    <h2 class="fig_title">
                      <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
                        <?php echo esc_html(strtoupper($post->post_title)); ?>
                      </a>
                    </h2>
                  </figcaption>
                </figure>
                <?php
                $i++;
              endwhile; ?>
          </div>
        </section>
      </section>
    </main>
<?php
  endif;
  get_footer(); ?>
