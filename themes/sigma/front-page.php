<?php
  /*
    Template name: Sigma Home
  */
get_header(); ?>

<main id="home_main_container" class="main_wrapper">
  <section class="hk-section main_wrapper_section">
    <div class="home_header_frame">
      <div class="side_carousel carousel1">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/img1.jpg' ?>" alt="Img 1">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/img2.jpg' ?>" alt="Img 2">
      </div>
      <div class="side_carousel carousel2">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/img3.jpg' ?>" alt="Img 3">
        <img width="720" height="720" src="<?php echo THEMEPATH .'images/carousel/img4.jpg' ?>" alt="Img 4">
      </div>
    </div>

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
                  array_push($services, $value);
                  break;
                case 'recorridos-virtuales':
                  array_push($services, $value);
                  break;
                default: null;
              }
            endforeach;
            $serv_page = get_post(65);
            array_push($services, $serv_page->post_name);

            ct_move_element($services, 2, 1);
            foreach ($services as $key => $service):
              $s_name = str_replace('-', ' ', $service);
              ?>
              <figure class="ribbon_fig_obj">
                <picture>
                  <img src="<?php echo THEMEPATH . 'images/default.jpg' ?>" alt="Cover Inmueble">
                </picture>
                <figcaption class="ribbon_fig_capion">
                  <h2 class="ribbon_fig_title">
                    <a href="#"><?php echo esc_html(strtoupper($s_name)); ?></a>
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
          <section id="blog_section" class="section_wrapper">
            <h2 class="section_heading">BLOG</h2>
            <section class="posts_pool">
              <?php
                  $i = 1;
                  while($blog->have_posts()):
                    $blog->the_post();
                    setup_postdata($post); ?>
                    <div class="blogpost_item inner_wrapper">
                      <h3 class="grid_object_header">
                        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title);?>">
                          <?php the_title(); ?>
                        </a>
                      </h3>

                      <div class="left-side g_o_section">
                        <div class="blog_count">
                          <span><?php echo (strlen($i)>1) ? $i : '0' . $i;?></span>
                        </div>
                        <span class="blogpost_author">
                          <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                        </span>
                      </div>

                      <div class="right-side g_o_section">
                        <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title);?>">
                          <?php
                            if(has_post_thumbnail()):
                              the_post_thumbnail('sig-s-320');
                            else: ?>
                              <img style="width:100%;" src="<?php echo THEMEPATH . 'images/default.jpg' ?>" alt="Cover Inmueble">
                          <?php
                            endif; ?>
                        </a>
                      </div>

                    </div>
              <?php
                    $i++;
                  endwhile;
                  wp_reset_postdata(); ?>
            </section>
            <div class="_see_more">
              <a href="<?php echo get_post_type_archive_link('post'); ?>" title="Ver más">Ver más</a>
            </div>
          </section>
      <?php
        endif; ?>
      <!-- END BLOG SECTION -->

      <!-- LOGOS DE EMPRESAS -->
      <section id="partners" class="section_wrapper">
        <div class="companies_carousel">
          <picture class="image_item_frame square">
            <img src="<?php echo THEMEPATH . 'images/companies/centro.png'; ?>" alt="Logo CENTRO">
          </picture>
          <picture class="image_item_frame square">
            <img src="<?php echo THEMEPATH . 'images/companies/LOGO_NEW_BLACK.png'; ?>" alt="Logo NEW BLACK">
          </picture>
          <picture class="image_item_frame square">
            <img src="<?php echo THEMEPATH . 'images/companies/sigma_logo_hsqua.png'; ?>" alt="Logo SIGMA">
          </picture>
          <picture class="image_item_frame square">
            <img src="<?php echo THEMEPATH . 'images/companies/centro.png'; ?>" alt="Logo CENTRO">
          </picture>
          <picture class="image_item_frame square">
            <img src="<?php echo THEMEPATH . 'images/companies/LOGO_NEW_BLACK.png'; ?>" alt="Logo NEW BLACK">
          </picture>
          <picture class="image_item_frame square">
            <img src="<?php echo THEMEPATH . 'images/companies/sigma_logo_hsqua.png'; ?>" alt="Logo SIGMA">
          </picture>
        </div>
      </section>
    </section>

  </section>
</main>
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
    const bx_conf_partners = {
      mode:'horizontal',
      easing:'ease-in',
      ticker: true,
      auto:true,
      pause:1666,
      maxSlides:3,
      slideWidth:1440,
      responsive:true,
      autoDelay:3000,
      pager:false,
      slideMargin:16
    };
    $('.carousel1').bxSlider(bx_conf_home);
    $('.carousel2').bxSlider(bx_conf_home_2);
    $('.companies_carousel').bxSlider(bx_conf_partners);
  });
</script>
<?php get_footer(); ?>
