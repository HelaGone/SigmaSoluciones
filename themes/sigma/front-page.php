<?php
  /*
    Template name: Sigma Home
  */
  get_header(); ?>
  <section class="main_wrapper_section">
    <!-- fixed header -->
    <section class="fixed_top_section home_carousel">
      <div class="side_carousel carousel1">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL1-IMAGEN-1-PARTE-1.jpg' ?>" alt="Img 1">
        <!-- <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL2-IMAGEN-2-PARTE-2.jpg' ?>" alt="Img 4"> -->
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL1-IMAGEN-3-PARTE-1.jpg' ?>" alt="Img 2">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL1-IMAGEN-4-PARTE-1.jpg' ?>" alt="Img 2">
        <!-- <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL2-IMAGEN-5-PATE-1.jpg' ?>" alt="Img 4"> -->
      </div>
      <div class="side_carousel carousel2">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL2-IMAGEN-1-PARTE-2.jpg' ?>" alt="Img 3">
        <!-- <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL1-IMAGEN-5-PARTE-2.jpg' ?>" alt="Img 2"> -->
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL2-IMAGEN-4-PARTE-2.jpg' ?>" alt="Img 4">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL2-IMAGEN-3-PARTE-2.jpg' ?>" alt="Img 3">
        <!-- <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/CARRUSEL1-IMAGEN-2-PARTE-1.jpg' ?>" alt="Img 2"> -->
      </div>
    </section>

    <!-- SCROLL SECTION -->
    <section class="rounded_container scroll_section">
      <!-- SERVICES SECTION -->
      <section id="services_section" class="section_wrapper">
        <div class="about_info">
          <?php
            $about = get_page_by_path('somos-expertos');
            if(gettype($about) == 'object'&&$about!=null): ?>
              <h1 class="section_heading"><?php echo esc_html($about->post_title); ?></h1>
              <div class="post_content_container descriptive_txt">
                <?php echo apply_filters('the_content', $about->post_content); ?>
              </div>
          <?php
            endif; ?>
        </div>

        <section class="post_pool">
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
              $s_name = str_replace('-', ' ', $service['name']);
              $s_name = ($s_name == 'inmuebles') ? 'INMOBILIARIA' :  $s_name;
              $file_name = $service['name'].'-h.jpg'; ?>
              <figure class="ribbon_fig_obj">
                <picture>
                  <a href="<?php echo esc_url($service['link']); ?>" title="<?php echo esc_attr($s_name); ?>">
                    <img src="<?php echo THEMEPATH . 'images/headers/'.$file_name; ?>" alt="Cover Inmueble">
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
          'posts_per_page'=>4,
          'post_status'=>'publish',
          'orderby'=>'date',
          'order'=>'date'
        );
        $blog = new WP_Query($args);
        if($blog->have_posts()): ?>
          <!-- BLOG SECTION -->
          <section id="blog_section" class="section_wrapper">
            <h2 class="section_heading">BLOG</h2>
            <section class="post_pool">
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
<?php get_footer(); ?>
