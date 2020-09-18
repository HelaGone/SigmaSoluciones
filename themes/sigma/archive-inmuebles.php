<?php get_header();
  global $wp_query;
  $query_vars = $wp_query->query_vars;
  $pt = $query_vars['post_type'];
  $arch_name = ($pt == 'inmuebles') ? 'inmobiliaria' : $pt;
  if(have_posts()): ?>
    <section class="main_wrapper_section">
      <section class="fixed_top_section">
        <figure class="arc_fig_obj">
          <img src="<?php echo THEMEPATH.'images/headers/'.$pt.'.jpg' ?>" alt="">
          <figcaption class="fig_caption">
            <div class="inner_wrapper">
              <h1 class="fig_title"><?php echo esc_html(strtoupper($arch_name)); ?></h1>
              <p class="fig_descr">Lorem Ipsum Dolor Sit met consectetur adipiscing elit mecenas nullam proim esectas integer</p>
            </div>
          </figcaption>
        </figure>
      </section>
      <!-- SCROLL SECTION -->
      <section class="rounded_container scroll_section">
        <h2 class="section_heading">NUESTROS SERVICIOS</h2>
        <div class="descriptive_txt">
          <p>
            En SIGMA nos comprometemos con nuestros clientes para brindarles una
            experiencia segura y confiable en cada una de las etapas que conforman
            el proceso de compra, venta o arrendamiento de su inmueble.
          </p>
        </div>

        <!-- SERVICES GRID -->
        <?php get_template_part('templates/services', 'widget', array('serv'=>'inmobiliaria', 'tax'=>'rubros')); ?>

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
                ));

              get_template_part('templates/figure', 'inmueble', array('precio'=>$meta_precio, 'tipo'=>$meta_venta_renta));

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
<?php
  endif;
  get_footer(); ?>
