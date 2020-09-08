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

  $amenities_arr = array("dimensiones"=>$dimentions,"habitaciones"=>$rooms,"banos"=>$wc,"gym"=>$gym,"seguridad"=>$security,"pets"=>$pets,"estacionamiento"=>$parking,"alberca"=>$pool);
?>
<main id="main_container" class="main_wrapper">
  <section class="hk-section main_wrapper_section">
    <section id="tabbed_widget">
      <ul class="tabs custom-list inner_wrapper">
        <li class="tab_item">
          <button type="button" name="button" onclick="hk_hanlde_panel(this, 'recorrido')">RECORRIDO</button>
        </li>
        <li class="tab_item">
          <button type="button" name="button" onclick="hk_hanlde_panel(this, 'foto360')">VISTA 360</button>
        </li>
        <li class="tab_item">
          <button type="button" name="button" onclick="hk_hanlde_panel(this, 'galeria')">GALERÍA</button>
        </li>
        <li class="tab_item">
          <button type="button" name="button" onclick="hk_hanlde_panel(this, 'video')">VIDEO</button>
        </li>
      </ul>
      <ul class="tabpanels">
        <!-- RECORRIDO VIRTUAL -->
        <li class="panel" data-media-type="recorrido">
          <div class="item_inner_wrapper">
            <!-- <iframe src="https://players.cupix.com/p/AYvGTwTL" width="720" height="480" style="margin:0 auto;" allowFullScreen="true"></iframe> -->
          </div>
        </li>

        <!-- FOTO 360 -->
        <li class="panel selected" data-media-type="foto360">
          <div id="panorama" class="item_inner_wrapper"></div>
        </li>

        <!-- GALERÍA FOTOS -->
        <li class="panel" data-media-type="galeria">
          <div class="item_inner_wrapper">
            <?php
              $img_ids = array();
              if(has_block('gallery', $post->post_content)):
                 $post_blocks = parse_blocks($post->post_content); ?>
                 <ul class="slider">
                  <?php
                     foreach ($post_blocks as $key => $block):
                       if($block['blockName'] == 'core/gallery'):
                         if(array_key_exists('attrs', $block)):
                           if(array_key_exists('ids', $block['attrs'])):
                             for($i=0; $i<count($block['attrs']['ids']); $i++): ?>
                               <li>
                                 <?php echo wp_get_attachment_image($block['attrs']['ids'][$i], 'full', false); ?>
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
        </li>

        <!-- VIDEO -->
        <li class="panel" data-media-type="video">
          <div class="item_inner_wrapper">
            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/3RrCy6Syyxk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </li>
      </ul>
    </section>
    <!-- END TABBED WIDGET -->

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
          <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
            <path d="M0 0h24v24H0z" fill="none"/>
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>
          </svg>
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
                  case 'habitaciones': $abrev = 'Hab.'; break;
                  case 'banos': $abrev = 'WC'; break;
                  case 'gym': $abrev = 'Gimnasio'; break;
                  case 'seguridad': $abrev = 'Vigilancia'; break;
                  case 'pets': $abrev = 'Mascotas'; break;
                  case 'estacionamiento': $abrev = 'E'; break;
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
    </section>
    <!-- END AMENITIES SECTION -->

    <section id="description_section">
      <div class="inner_wrapper content_container">
        <?php the_content(); ?>
      </div>
      <div class="map_container">
        <?php echo $maps_location; ?>
      </div>
    </section>

    <section>
      <?php
        $args = array(
          'post_type'=>'inmuebles',
          'posts_per_page'=>4,
          'post_status'=>'publish',
          'orderby'=>'date',
          'order'=>'DESC',
          'post__not_in'=>array($pId)
        );
        $related = get_posts($args);
        if(is_array($related)&&!empty($related)): ?>
          <h2>También te pueden interesar</h2>
          <section class="related_pool">
            <?php
              // debug(get_intermediate_image_sizes());
              foreach ($related as $key => $item):
                $inmuId = $item->ID;
                $thumbId = get_post_thumbnail_id($inmuId); ?>
                <figure>
                  <picture>
                    <source media="(min-width:650px)" srcset="<?php echo (get_the_post_thumbnail_url($inmuId, 'large')) ? get_the_post_thumbnail_url($inmuId, 'large') : ''; ?>">
                    <source media="(min-width:465px)" srcset="<?php echo (get_the_post_thumbnail_url($inmuId, 'medium')) ? get_the_post_thumbnail_url($inmuId, 'medium') : ''; ?>">
                    <img src="<?php echo get_the_post_thumbnail_url($inmuId, 'thumbnail'); ?>" alt="Cover Inmueble">
                  </picture>
                  <figcaption>
                    <h3><?php echo esc_html($item->post_title); ?></h3>
                  </figcaption>
                </figure>
            <?php
              endforeach; ?>
          </section>
      <?php
        endif;?>

    </section>
  </section>
</main>


<script type="text/javascript">
  // PANNELLUM PLUGIN
  pannellum.viewer('panorama',{
    "type":"equirectangular",
    "panorama":"https://localhost/sigmasoluciones.com.mx/wp-content/uploads/2020/09/foto360example-low-scaled.jpg"
  });

  //TABPANEL
  const hk_hanlde_panel = (elemt, type) =>{
    let tabButtons = document.getElementsByClassName('tab_item')
    Object.keys(tabButtons).forEach((index) => {
      let tab = tabButtons[index];
      let button = $(tab).find('button');
      button.removeClass('selected_tab');
    });
    elemt.classList.add('selected_tab');

    //PANELS
    let panelElements = document.getElementsByClassName('panel');
    Object.keys(panelElements).forEach((index) => {
      let item = panelElements[index];
      item.classList.remove('selected');
      if(item.dataset.mediaType == type){
        item.classList.add('selected');
      }
    });
  } //END HANDLE PANEL FUNCTION

  //SLIDER
  $(document).ready(function(){
    console.log('loaded');
    $('.slider').bxSlider({
      mode:'fade'
    });
  });
</script>

<?php get_footer(); ?>
