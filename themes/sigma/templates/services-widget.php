<section class="services_grid">
  <?php
    $service = $args['serv'];
    $_args = array(
      'post_type'=>'servicios',
      'post_status'=>'publish',
      'posts_per_page'=>4,
      'orderby'=>'name',
      'order'=>'ASC',
      'tax_query'=>array(
        array(
          'taxonomy'=>'tipo-servicio',
          'field'=>'slug',
          'terms'=>array($service)
        )
      )
    );
    $services = get_posts($_args);
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
