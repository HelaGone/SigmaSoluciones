<?php
  /*
    Template name: Blog
  */
  get_header();
  global $wp_query;
  $not_repeat = array();
  $queried_object = $wp_query->queried_object; ?>

    <section class="main_wrapper_section">
      <?php
        $args = array(
          'post_type'=>'post',
          'posts_per_page'=>3,
          'post_status'=>'publish',
          'orderby'=>'date',
          'order'=>'DESC'
        );
        $blogposts = new WP_Query($args);
        if($blogposts->have_posts()): ?>
          <section class="fixed_top_section">
            <div class="blog_carousel">
              <?php
                $i=1;
                while($blogposts->have_posts()):
                  $blogposts->the_post();
                  array_push($not_repeat, $post->ID);
                  setup_postdata($post); ?>
                  <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
                    <?php has_post_thumbnail() ? the_post_thumbnail() : 'NADA'; ?>
                  </a>
              <?php
                  $i++;
                endwhile;
                wp_reset_postdata(); ?>
            </div>
          </section>
      <?php
        endif;

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
          <section class="inner_container scroll_section">
            <div class="about_info">
              <h1 class="section_heading">
                <?php echo esc_html(strtoupper($queried_object->post_title)); ?>
              </h1>
              <div class="descriptive_txt">
                <?php echo apply_filters('the_content', $queried_object->post_content); ?>
              </div>
            </div>
            <?php
              while($blogpost2->have_posts()):
                $blogpost2->the_post();
                setup_postdata($post);
                get_template_part('templates/figure', 'item', array('count'=>$i));
                $i++;
              endwhile;
              wp_reset_postdata(); ?>
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
        controls:true
      });
    });
  </script>
