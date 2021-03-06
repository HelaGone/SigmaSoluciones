<?php get_header(); global $post, $_wp_additional_image_sizes;
  // debug( $_wp_additional_image_sizes );
  $pId = $post->ID;
  $dimentions = (get_post_meta($pId, 'dimensiones', true)) ? get_post_meta($pId, 'dimensiones', true) : null;
  $rooms = (get_post_meta($pId, 'habitaciones', true)) ? get_post_meta($pId, 'habitaciones', true) : null;
  $wc = (get_post_meta($pId, 'banos', true)) ? get_post_meta($pId, 'banos', true) : null;
  $gym = (get_post_meta($pId, 'gimnasio', true)) ? get_post_meta($pId, 'gimnasio', true) : null;
  $security = (get_post_meta($pId, 'vigilancia', true)) ? get_post_meta($pId, 'vigilancia', true) : null;
  $pets = (get_post_meta($pId, 'mascotas', true)) ? get_post_meta($pId, 'mascotas', true) : null;
  $parking = (get_post_meta($pId, 'estacionamiento', true)) ? get_post_meta($pId, 'estacionamiento', true) : null;
  $pool = (get_post_meta($pId, 'alberca', true)) ? get_post_meta($pId, 'alberca', true) : null;
  $maps_location = (get_post_meta($pId, 'ubicacion', true)) ? get_post_meta($pId, 'ubicacion', true) : null;

  $recorrido_url = get_post_meta($pId, 'link_para_recorrido_virtual', true);
  $imagen360 = get_post_meta($pId, 'imagen_360', true);
  $video_promo = get_post_meta($pId, 'video_promocional', true);

  $amenities_arr = array("dimensiones"=>$dimentions,"habitaciones"=>$rooms,"banos"=>$wc,"gym"=>$gym,"seguridad"=>$security,"pets"=>$pets,"estacionamiento"=>$parking,"alberca"=>$pool);
?>
<section id="tabbed_widget" class="fixed_top_section">
  <div class="tabpanels">
    <!-- GALERÍA FOTOS -->
    <div class="panel" data-media-type="galeria">
      <div class="item_inner_wrapper">
        <?php
          $img_ids = array();
          if(has_block('gallery', $post->post_content)):
             $post_blocks = parse_blocks($post->post_content); ?>
             <ul class="inmueble_slider">
              <?php
                 foreach ($post_blocks as $key => $block):
                   if($block['blockName'] == 'core/gallery'):
                     if(array_key_exists('attrs', $block)):
                       if(array_key_exists('ids', $block['attrs'])):
                         for($i=0; $i<count($block['attrs']['ids']); $i++): ?>
                           <li>
                             <?php echo (wp_get_attachment_image($block['attrs']['ids'][$i], 'full', false)) ? wp_get_attachment_image($block['attrs']['ids'][$i], 'full', false) : '<img src="'.THEMEPATH.'images/default.jpg" alt="Default Image" width="426" height="240" />'; ?>
                           </li>
                      <?php
                         endfor;
                       endif;
                     endif;
                   endif;
                 endforeach; ?>
             </ul>
        <?php
          endif; ?>
      </div>
    </div>
  </div>
</section>
<!-- END TABBED WIDGET -->
<section class="main_wrapper_section">
  <!-- THIS SECTION SCROLLS -->
  <section class="inmo_single rounded_container scroll_section">
    <section class="title_widget">
      <ul class="header_list">
        <li class="header_item house_icon round_icon">
          <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24" viewBox="0 0 24 24" width="24" fill="#FFFFFF">
            <g><rect fill="none" height="24" width="24"/></g>
            <g><path d="M17,11V3H7v4H3v14h8v-4h2v4h8V11H17z M7,19H5v-2h2V19z M7,15H5v-2h2V15z M7,11H5V9h2V11z M11,15H9v-2h2V15z M11,11H9V9h2 V11z M11,7H9V5h2V7z M15,15h-2v-2h2V15z M15,11h-2V9h2V11z M15,7h-2V5h2V7z M19,19h-2v-2h2V19z M19,15h-2v-2h2V15z"/></g>
          </svg>
        </li>
        <li class="header_item house_name">
          <h1><?php the_title(); ?></h1>
        </li>
        <li class="header_item house_location round_icon">
          <a href="#location_section" title="Location section">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
              <path d="M0 0h24v24H0z" fill="none"/>
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
            </svg>
          </a>
        </li>
      </ul>
    </section>
    <!-- END TITLE WIDGET -->

    <section id="amenities_pool">
      <ul class="ameni_list">
        <?php
          $abrev = '';
          if(is_array($amenities_arr)&&!empty($amenities_arr)):
            foreach($amenities_arr as $key => $value):

              if(strtolower($value)!='no' || intval($value)!=0):

                switch ($key) {
                  case 'habitaciones': $abrev = ''; break;
                  case 'banos': $abrev = ''; break;
                  case 'gym': $abrev = 'Gimnasio'; break;
                  case 'seguridad': $abrev = 'Vigilancia'; break;
                  case 'pets': $abrev = 'Mascotas'; break;
                  case 'estacionamiento': $abrev = ''; break;
                  case 'alberca': $abrev = 'Alberca'; break;
                  default: $abrev = '';break;
                } ?>
                <li class="ameni_item">
                  <figure class="fig_object">
                    <img width="24" height="24" src="<?php echo THEMEPATH.'images/assets/'.$key.'.svg'; ?>" alt="<?php echo esc_attr($key); ?>">
                    <figcaption class="fig_caption">
                      <div class="">
                        <span><?php echo ($key == 'seguridad'||$key=='alberca'||$key=='pets'||$key=='gym') ? '' : esc_html($value); ?></span>
                        <span><?php echo esc_html($abrev); ?></span>
                      </div>
                    </figcaption>
                  </figure>
                </li>
        <?php
              endif;
            endforeach;
          endif; ?>
      </ul>

      <div id="media_buttons" class="inner_wrapper">
        <ul class="media_buttons_list">
          <?php
            if($recorrido_url): ?>
              <li class="media_button_item">
                <button type="button" name="button" onclick="handle_media('recorrido')">Recorrido Virtual</button>
              </li>
          <?php
            endif;
            if($imagen360): ?>
              <li class="media_button_item">
                <button type="button" name="button" onclick="handle_media('three_sixty')" data-media="<?php echo $imagen360; ?>">Imagen 360</button>
              </li>
          <?php
            endif; ?>
        </ul>
      </div>
    </section>
    <!-- END AMENITIES SECTION -->

    <!-- FULL SCREEN MEDIA -->
    <section id="full_screen" class="full_screen_container">
      <div id="recorrido_virtual" class="full_screen_media">
        <button type="button" class="close_media" name="button" onclick="handle_close_media('recorrido')">
          <img src="<?php echo THEMEPATH . 'images/assets/close-24px.svg'; ?>" alt="Close button">
        </button>
        <iframe src="<?php echo $recorrido_url?>" width="100%" height="100%" allowfullscreen ></iframe>
      </div>

      <div id="three_sixty" class="full_screen_media">
        <button type="button" class="close_media" name="button" onclick="handle_close_media('three_sixty')">
          <img src="<?php echo THEMEPATH . 'images/assets/close-24px.svg'; ?>" alt="Close button">
        </button>
        <div id="panorama"></div>
      </div>
    </section>

    <section id="description_section">
      <div class="inner_wrapper content_container">
        <?php the_content(); ?>
      </div>
      <div id="location_section" class="map_container inner_wrapper">
        <?php echo $maps_location; ?>
      </div>
    </section>

    <section id="related_pool">
      <?php
        $args = array(
          'post_type'=>'inmuebles',
          'posts_per_page'=>4,
          'post_status'=>'publish',
          'orderby'=>'date',
          'order'=>'DESC',
          'post__not_in'=>array($pId)
        );
        $related = new WP_Query($args);
        if($related->have_posts()): ?>
          <h2 class="section_heading">También te pueden interesar</h2>
          <section class="post_pool">
            <?php
              while ($related->have_posts()):
                $related->the_post();
                setup_postdata($post);
                $inmuId = $post->ID;
                $meta_venta_renta = get_post_meta($inmuId, 'venta__renta', true);
                $meta_precio = get_post_meta($inmuId, 'precio', true);
                get_template_part('templates/figure', 'inmueble', array('precio'=>$meta_precio, 'tipo'=>$meta_venta_renta)); ?>
            <?php
              wp_reset_postdata();
              endwhile; ?>
          </section>
      <?php
        endif;?>

    </section>
  </section>
</section>

<script type="text/javascript">

  // PANNELLUM PLUGIN
  pannellum.viewer('panorama',{
    "type":"equirectangular",
    "panorama":"<?php echo esc_url($imagen360); ?>"
  });

  const handle_media = (evt) => {
    document.getElementById('full_screen').style.height = '80vh';
    const scrollY = document.documentElement.style.getPropertyValue('--scroll-y');
    const body = document.body;
    body.style.top = `-${scrollY}`;
    if(evt == 'recorrido'){
      document.getElementById('recorrido_virtual').style.display = 'block';
    }else if('three_sixty'){
      document.getElementById('three_sixty').style.display = 'block';
    }
  }

  const handle_close_media = (evt) => {
    document.getElementById('full_screen').style.height = '0';
    if(evt == 'recorrido'){
      document.getElementById('recorrido_virtual').style.display = 'none';
    }else if('three_sixty'){
      document.getElementById('three_sixty').style.display = 'none';
    }
  }
</script>

<?php get_footer(); ?>
