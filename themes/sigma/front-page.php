<?php
  /*
    Template name: Sigma Home
  */
  get_header(); ?>
  <section class="main_wrapper_section">
    <!-- fixed header -->
    <section class="fixed_top_section home_carousel">
      <div class="side_carousel carousel1">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/img1.jpg' ?>" alt="Img 1">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/img2.jpg' ?>" alt="Img 2">
      </div>
      <div class="side_carousel carousel2">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/img3.jpg' ?>" alt="Img 3">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/img4.jpg' ?>" alt="Img 4">
      </div>
    </section>

    <!-- SCROLL SECTION -->
    <section class="inner_container scroll_section">
      <!-- SERVICES SECTION -->
      <section id="services_section" class="section_wrapper">
        <div class="about_info">
          <?php
            $about = get_post(2);
            if(gettype($about) == 'object'&&$about!=null): ?>
              <h1 class="section_heading"><?php echo esc_html($about->post_title); ?></h1>
              <div class="post_content_container descriptive_txt">
                <?php echo apply_filters('the_content', $about->post_content); ?>
              </div>
          <?php
            endif; ?>
        </div>

        <section class="posts_pool">
          <?php
            $services = array();
            foreach (get_post_types(array(), 'names') as $key => $value):
              switch($key){
                case 'inmuebles':
                  array_push($services, array("name"=>$value, "link"=>get_post_type_archive_link($key) ));
                  break;
                case 'recorridos-virtuales':
                  array_push($services, array("name"=>$value, "link"=>get_post_type_archive_link($key) ));
                  break;
                default: null;
              }
            endforeach;
            $serv_page = get_post(65);
            array_push($services, array("name"=>$serv_page->post_name, "link"=>get_the_permalink($serv_page->ID)));

            ct_move_element($services, 2, 1);
            foreach ($services as $key => $service):
              $s_name = str_replace('-', ' ', $service['name']); ?>
              <figure class="ribbon_fig_obj">
                <picture>
                  <a href="<?php echo esc_url($service['link']); ?>" title="<?php echo esc_attr($s_name); ?>">
                    <img src="<?php echo THEMEPATH . 'images/default.jpg' ?>" alt="Cover Inmueble">
                  </a>
                </picture>
                <figcaption class="ribbon_fig_capion">
                  <h2 class="ribbon_fig_title">
                    <a href="<?php echo esc_url($service['link']); ?>" title="<?php echo esc_attr($s_name); ?>">
                      <?php echo esc_html(strtoupper($s_name)); ?>
                    </a>
                  </h2>
                </figcaption>
              </figure>
        <?php
            endforeach; ?>
        </section>
        <!-- END POSTS POOL -->

      </section>

      <!-- BLOG SECTION -->
      <?php
        $args = array(
          'post_type'=>'post',
          'posts_per_page'=>3,
          'post_status'=>'publish',
          'orderby'=>'date',
          'order'=>'date'
        );
        $blog = new WP_Query($args);
        if($blog->have_posts()): ?>
          <!-- BLOG SECTION -->
          <section id="blog_section" class="section_wrapper">
            <h2 class="section_heading">BLOG</h2>
            <section class="posts_pool">
              <?php
                  $i = 1;
                  while($blog->have_posts()):
                    $blog->the_post();
                    setup_postdata($post);
                    get_template_part('templates/figure', 'item', array("count"=>$i));
                    $i++;
                  endwhile;
                  wp_reset_postdata(); ?>
            </section>
            <div class="_see_more">
              <a href="<?php echo site_url('blog-sigma'); ?>" title="Ver más">Ver más</a>
            </div>
          </section>

      <?php
        endif; ?>
      <!-- END BLOG SECTION -->

      <?php get_template_part('templates/barra', 'partners'); ?>

    </section>

  </section>
  <script type="text/javascript">
    $(function(){
      const bx_conf_home = {
        mode:'vertical',
        captions:false,
        pager: false,
        auto:true,
        controls:false,
        autoDelay:111,
        speed:3500,
        pause:7000
      }
      const bx_conf_home_2 = {
        mode:'vertical',
        captions:false,
        pager: false,
        auto:true,
        controls:false,
        autoDirection:'prev',
        speed:3500,
        pause:7000
      }
      $('.carousel1').bxSlider(bx_conf_home);
      $('.carousel2').bxSlider(bx_conf_home_2);
    });
  </script>
<?php get_footer(); ?>
