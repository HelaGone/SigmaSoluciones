<?php
  if(array_key_exists('type', $args)):
    $types = explode(',', $args['type']);
  endif;

  $_args = array(
    'post_type'=>'casos-de-exito',
    'post_status'=>'publish',
    'posts_per_page'=>4,
    'orderby'=>'date',
    'order'=>'DESC',
    'tax_query'=>array(
      array(
        'taxonomy'=>'tipo-servicio',
        'field'=>'slug',
        'terms'=>$types
      )
    )
  );
  $casos = new WP_Query($_args);
  $section_title = str_replace('-', ' ', $casos->query['post_type']);
  if($casos->have_posts()): ?>
    <section id="success_cases" class="section_wrapper dark_blue_bg">
      <h2 class="section_heading"><?php echo esc_html(strtoupper($section_title)); ?></h2>
      <ul class="bottom_carousel">
        <?php
          while($casos->have_posts()):
            $casos->the_post();
            setup_postdata($post);
            $c_id = $post->ID; ?>
            <li class="bottom_car_list_item">
              <figure class="bottom_car_fig_obj">
                <?php
                  if(has_post_thumbnail()):
                    the_post_thumbnail('thumbnail');
                  else: ?>
                    <img src="<?php echo THEMEPATH . 'images/default_squa.jpg' ?>" alt="Cover Sigma Soluciones">
                <?php
                  endif; ?>
                  <figcaption class="cases_fig_caption">
                    <h3><?php the_title(); ?></h3>
                    <div class="descriptive_txt">
                      <?php the_excerpt(); ?>
                    </div>
                  </figcaption>
              </figure>
            </li>
            <?php
          endwhile; ?>
      </ul>
    </section>
    <?php
  endif; ?>
