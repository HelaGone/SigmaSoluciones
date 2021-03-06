<?php get_header();
  global $wp_query;
  $query_vars = $wp_query->query_vars;
  $pt = $query_vars['post_type'];
  $arch_name = ($pt == 'inmuebles') ? 'inmobiliaria' : $pt; ?>

  <section class="fixed_top_section">
    <figure class="arc_fig_obj">
      <picture>
        <source media="(min-width:1024px)" srcset="<?php echo THEMEPATH.'images/headers/'.$pt.'-1280.jpg' ?>" />
        <img src="<?php echo THEMEPATH.'images/headers/'.$pt.'.jpg' ?>" alt="Header Inmobiliaria">
      </picture>
    </figure>
  </section>
  <!-- END FIXED SECTION -->

    <section class="main_wrapper_section">
      <!-- SCROLL SECTION -->
      <section class="rounded_container scroll_section">
        <div class="about_info">
          <h1 class="section_heading"><?php echo esc_html(strtoupper($arch_name)); ?></h1>
          <div class="about_info_description">
            <p>
              En SIGMA nos comprometemos con nuestros clientes para brindarles una
              experiencia segura y confiable en cada una de las etapas que conforman
              el proceso de compra, venta o arrendamiento de su inmueble.
            </p>
          </div>
        </div>

        <!-- SERVICES GRID -->
        <?php get_template_part('templates/services', 'widget', array('serv'=>'inmobiliaria', 'tax'=>'rubros')); ?>

        <?php
          if(have_posts()): ?>
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

              <section class="post_pool">
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
                    ));

                    get_template_part('templates/figure', 'inmueble', array('precio'=>$meta_precio, 'tipo'=>$meta_venta_renta));

                    $i++;
                  endwhile; ?>
              </section>
            </section>
            <!-- END INMUEBLES LIST -->
        <?php
          endif; ?>
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
            <section id="asesores_list" class="section_wrapper">
              <h2 class="section_heading">Conoce a nuestros asesores</h2>
              <ul class="bottom_carousel">
                <?php
                  foreach($asesores as $key => $asesor):
                    $a_id = $asesor->ID;
                     ?>
                    <li class="bottom_car_list_item inner_wrapper">
                      <figure class="bottom_car_fig_obj">
                        <?php
                          if(has_post_thumbnail()):
                            echo get_the_post_thumbnail($a_id, 'sig-m-480');
                          else: ?>
                            <img width="420" height="420" src="<?php echo THEMEPATH .'images/default_squa.jpg' ?>" alt="<?php echo esc_attr($asesor->post_title); ?>">
                        <?php
                          endif; ?>
                        <figcaption class="ases_fig_caption">
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
<?php get_footer(); ?>
