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
      <section id="services_section">
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

      </section>

      <!-- BLOG SECTION -->
      <section id="blog_section">

      </section>

      <!-- LOGOS DE EMPRESAS -->
      <section id="partners">

      </section>
    </section>

  </section>
</main>
<script type="text/javascript">

  $(function(){
    $('.carousel1').bxSlider({
      mode:'vertical',
      captions:false,
      pager: false,
      auto:true,
      controls:false,
      autoDelay:111,
      speed:3500,
      pause:7000
    });

    $('.carousel2').bxSlider({
      mode:'vertical',
      captions:false,
      pager: false,
      auto:true,
      controls:false,
      autoDirection:'prev',
      speed:3500,
      pause:7000
    });
  });
</script>
<?php get_footer(); ?>
