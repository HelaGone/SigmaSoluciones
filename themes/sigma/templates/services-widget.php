<section class="services_grid">
  <?php
    global $wp_query;
    if(array_key_exists('post_type', $wp_query->query)):
      if($wp_query->query['post_type'] != 'inmuebles'): ?>
        <h2 class="section_heading">NUESTROS SERVICIOS</h2>
  <?php
      endif;
    elseif(array_key_exists('page', $wp_query->query)): ?>
        <h2 class="section_heading">SERVICIOS</h2>
  <?php
    endif;

    $service = $args['serv'];
    $tax = $args['tax'];
    $_args = array(
      'post_type'=>'servicios',
      'post_status'=>'publish',
      'posts_per_page'=>4,
      'orderby'=>'name',
      'order'=>'ASC',
      'tax_query'=>array(
        array(
          'taxonomy'=>$tax,
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
                <button type="button" name="button" class="serv_button">
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
