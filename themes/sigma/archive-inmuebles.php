<?php get_header();
  global $wp_query;
  $query_vars = $wp_query->query_vars;
  $pt = $query_vars['post_type'];
  $arch_name = ($pt == 'inmuebles') ? 'inmobiliaria' : $pt;
  if(have_posts()): ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $('button').on('click', function(){
          console.log("click");
          $(this).parent().parent().find('.view_box').show();
        });
        $('.close_viewbox').on('click', function(){
          $(this).parent().hide();
        });
      });
    </script>
    <section class="main_wrapper_section">
      <section class="fixed_top_section">
        <figure class="fig_obj">
          <img src="<?php echo THEMEPATH.'images/headers/'.$pt.'.jpg' ?>" alt="">
          <figcaption class="fig_caption">
            <div class="">
              <h1 class="fig_title"><?php echo esc_html(strtoupper($arch_name)); ?></h1>
              <p class="fig_descr">Lorem Ipsum Dolor Sit met consectetur adipiscing elit mecenas nullam proim esectas integer</p>
            </div>
          </figcaption>
        </figure>
      </section>
      <!-- SCROLL SECTION -->
      <section class="inner_container scroll_section">
        <h2 class="section_heading">NUESTROS SERVICIOS</h2>
        <div class="descriptive_txt">
          <p>
            En SIGMA nos comprometemos con nuestros clientes para brindarles una
            experiencia segura y confiable en cada una de las etapas que conforman
            el proceso de compra, venta o arrendamiento de su inmueble.
          </p>
        </div>

        <section class="services_grid">
          <?php
            $args = array(
              'post_type'=>'servicios',
              'post_status'=>'publish',
              'posts_per_page'=>4,
              'orderby'=>'name',
              'order'=>'ASC',
              'tax_query'=>array(
                array(
                  'taxonomy'=>'tipo-servicio',
                  'field'=>'slug',
                  'terms'=>array('inmobiliarios')
                )
              )
            );
            $services = get_posts($args);
            if(is_array($services)&&!empty($services)): ?>
              <ul class="services_list">
                <?php
                  foreach($services as $key => $service):
                    $cover_slug = $service->post_name;
                    $service_name = $service->post_title;
                    $permalink = get_the_permalink($service->ID);
                    $excerpt = get_the_excerpt($service->ID);
                     ?>
                    <li class="service_item">
                      <figure class="infocard_obj">
                        <button type="button" name="button">
                          <img width="48" height="48" src="<?php echo THEMEPATH .'images/assets/'.$cover_slug.'.svg' ?>" alt="<?php echo esc_attr($service_name); ?>">
                        </button>
                        <figcaption class="infocard_caption">
                          <h3 class="infocard_title">
                            <?php echo esc_html($service_name); ?>
                          </h3>
                        </figcaption>
                      </figure>
                      <div class="view_box" hidden>
                        <button class="close_viewbox">Cerrar</button>
                        <p><?php echo $excerpt; ?></p>
                        <span class="calltoaction">
                          <a href="<?php echo esc_url($permalink); ?>" title="<?php echo esc_attr($service_name); ?>">Conoce más</a>
                        </span>
                      </div>
                    </li>
                <?php
                  endforeach; ?>
              </ul>
          <?php
            endif; ?>
        </section>
        <!-- END SERVICES GRID -->

        <!-- INMUEBLES LIST -->
        <section id="inm_list_section" class="section_wrapper">
          <h2 class="section_heading"><?php echo esc_html(strtoupper($pt)); ?></h2>
          <section id="filter_widget">
            <?php echo get_search_form(); ?>
            <div class="selectors_wrapper inner_wrapper">
              <select class="" name="ventarenta">
                <option value="venta">Venta</option>
                <option value="renta">Renta</option>
              </select>
              <select class="" name="casadepto">
                <option value="casa">Casa</option>
                <option value="departamento">Departamento</option>
              </select>
            </div>
          </section>
          <?php
            $i=1;
            while(have_posts()):
              the_post();
              $p_id = $post->ID;
              $meta_dimensiones = get_post_meta($p_id, 'dimensiones', true);
              $meta_habitaciones = get_post_meta($p_id, 'habitaciones', true);
              $meta_banos = get_post_meta($p_id, 'banos', true);
              $meta_gimnasio = get_post_meta($p_id, 'gimnasio', true);
              $meta_vigilancia = get_post_meta($p_id, 'vigilancia', true);
              $meta_mascotas = get_post_meta($p_id, 'mascotas', true);
              $meta_estacionamiento = get_post_meta($p_id, 'estacionamiento', true);
              $meta_alberca = get_post_meta($p_id, 'alberca', true);
              $meta_ubicacion = get_post_meta($p_id, 'ubicacion', true);
              $meta_venta_renta = get_post_meta($p_id, 'venta__renta', true);
              $meta_precio = get_post_meta($p_id, 'precio', true);
              $amenities_arr = array(
                array(
                  'gym'=>$meta_gimnasio,
                  'seguridad'=>$meta_vigilancia,
                  'pets'=>$meta_mascotas,
                  'alberca'=>$meta_alberca
                )); ?>

              <figure class="inm_fig_obj">
                <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
                  <?php
                    if(has_post_thumbnail()):
                      the_post_thumbnail($p_id, 'sig-m-480');
                    else:  ?>
                      <img src="<?php echo THEMEPATH .'images/default.jpg' ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                  <?php
                    endif; ?>
                </a>
                <figcaption class="inm_fig_caption">
                  <h3><?php the_title(); ?></h3>
                  <div class=""></div>
                  <div class="info__bottom_bar">
                    <span>
                      <?php echo esc_html(strtoupper($meta_venta_renta)); ?>
                    </span>
                  <!--
                    <ul class="amenities_row_list">
                      <?php
                        if(is_array($amenities_arr)&&!empty($amenities_arr)):
                          foreach($amenities_arr as $key => $amenities):
                            foreach ($amenities as $key => $amenity): ?>
                              <li class="amenitie_item">
                                <img width="24" height="24" src="<?php echo THEMEPATH .'images/assets/'.$key.'.svg'; ?>" alt="Amenity icon">
                              </li>
                      <?php
                            endforeach;
                          endforeach;
                        endif; ?>
                    </ul>
                  -->
                    <span class="price">
                      <?php echo esc_html('$'.$meta_precio); ?>
                    </span>
                  </div>

                </figcaption>
              </figure>
          <?php
              $i++;
            endwhile; ?>
        </section>
        <!-- END INMUEBLES LIST -->

        <!-- ASESORES CAROUSEL -->
        <?php
          $args = array(
            'post_type'=>'asesores',
            'post_status'=>'publish',
            'posts_per_page'=>4,
            'orderby'=>'name',
            'order'=>'ASC'
          );
          $asesores = get_posts($args);
          if(is_array($asesores)&&!empty($asesores)): ?>
            <section id="asesores_list" class="section_wrapper inner_wrapper">
              <h2 class="section_heading">Conoce a nuestros asesores</h2>
              <ul class="ases_carousel">
                <?php
                  foreach($asesores as $key => $asesor):
                    $a_id = $asesor->ID;
                     ?>
                    <li class="ases_list_item inner_wrapper">
                      <figure class="ases_fig_obj">
                        <?php
                          if(has_post_thumbnail()):
                            echo get_the_post_thumbnail($a_id, 'sig-m-480');
                          else: ?>
                            <img width="420" height="420" src="<?php echo THEMEPATH .'images/default_squa.jpg' ?>" alt="<?php echo esc_attr($asesor->post_title); ?>">
                        <?php
                          endif; ?>
                        <figcaption class="ases_fig_caption inner_wrapper">
                          <h3><?php echo esc_html($asesor->post_title); ?></h3>
                          <p><?php echo esc_html($asesor->post_excerpt); ?></p>
                        </figcaption>
                        <a class="cover_anchor" href="<?php echo get_the_permalink($a_id); ?>" title="<?php echo esc_attr($asesor->post_title); ?>"></a>
                      </figure>
                    </li>
                <?php
                  endforeach;
                ?>
              </ul>
            </section>
        <?php
          endif;
        ?>

        <!-- END ASESORES CAROUSEL -->

      </section>
      <!-- END SCROLL SECTION -->
    </section>
    <script type="text/javascript">
      $(function(){
       $('.ases_carousel').bxSlider({
         pager:false,
         controls:false,
         auto:true,
         slideMargin:16
       });
      });
    </script>
<?php
  endif;
  get_footer(); ?>
