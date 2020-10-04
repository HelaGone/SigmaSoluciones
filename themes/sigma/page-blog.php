<?php
  /*
    Template name: Blog
  */
  get_header();
  global $wp_query;
  $not_repeat = array();
  $queried_object = $wp_query->queried_object;

  $args = array(
    'post_type'=>'post',
    'posts_per_page'=>3,
    'post_status'=>'publish',
    'orderby'=>'date',
    'order'=>'DESC'
  );
  $blogposts = new WP_Query($args);
  debug(count($blogposts->posts));
  if($blogposts->have_posts()): ?>
    <section class="fixed_top_section">
      <?php
      if(count($blogposts->posts) > 2): ?>
        <div class="blog_carousel">
          <?php
            $i=1;
            while($blogposts->have_posts()):
              $blogposts->the_post();
              array_push($not_repeat, $post->ID);
              setup_postdata($post);
              if(has_post_thumbnail()): ?>
              <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
                <figure class="arc_fig_obj">
                  <picture>
                    <source media="(min-width:1280px)" srcset="<?php echo get_the_post_thumbnail_url($post->ID, 'sig-xxl-1280'); ?>">
                    <source media="(min-width:768px)" srcset="<?php echo get_the_post_thumbnail_url($post->ID, 'sig-ver-l-768'); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'sig-ver-m-420'); ?>" alt="<?php echo esc_attr($post->post_title); ?>" style="width:100%;" >
                  </picture>
                </figure>
              </a>
          <?php
              endif;
              $i++;
            endwhile;
            wp_reset_postdata(); ?>
        </div><?php
      else: ?>
        <figure class="arc_fig_obj">
          <picture>
            <!-- <source media="(min-width:1280px)" srcset="<?php echo get_the_post_thumbnail_url($post->ID, 'sig-xxl-1280'); ?>">
            <source media="(min-width:768px)" srcset="<?php echo get_the_post_thumbnail_url($post->ID, 'sig-ver-l-768'); ?>"> -->
            <img src="<?php echo THEMEPATH . 'images/default.jpg' ?>" alt="<?php echo esc_attr($post->post_title); ?>" style="width:100%;" >
          </picture>
        </figure>
        <?php
      endif;  ?>
    </section>
<?php
  endif; ?>

    <section class="main_wrapper_section">

      <?php
        // SCROLL SECTION /////////////////////////////////////////////////////
        $args2 = array(
          'post_type'=>'post',
          'posts_per_page'=>20,
          'post_status'=>'publish',
          'orderby'=>'date',
          'order'=>'DESC',
          'post__not_in'=>$not_repeat
        );
        $blogpost2 = new WP_Query($args2);
        if($blogpost2->have_posts()):
          $i=1; ?>
          <section class="rounded_container scroll_section">
            <div class="about_info" style="color:white;">
              <h1 class="section_heading">
                <?php echo esc_html(strtoupper($queried_object->post_title)); ?>
              </h1>
              <div class="about_info_description">
                <?php echo apply_filters('the_content', $queried_object->post_content); ?>
              </div>
            </div>
            <section class="post_pool inner_wrapper">
              <?php
                while($blogpost2->have_posts()):
                  $blogpost2->the_post();
                  setup_postdata($post);
                  get_template_part('templates/figure', 'item', array('count'=>$i));
                  $i++;
                endwhile;
                wp_reset_postdata(); ?>
            </section>
          </section>
      <?php
        endif; ?>

      </section>
<?php
  get_footer(); ?>

  <script type="text/javascript">
    $(function(){
      $('.blog_carousel').bxSlider({
        mode:'horizontal',
        auto:'true',
        pager:false,
        controls:false
      });
    });
  </script>
