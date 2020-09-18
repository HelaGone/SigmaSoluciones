<?php
  $meta_precio = $args['precio'];
  $meta_venta_renta = $args['tipo'];
?>
<figure class="inm_fig_obj unit_item">
    <?php
      if(has_post_thumbnail()):
        the_post_thumbnail($post->ID, 'sig-m-480');
      else:  ?>
        <img src="<?php echo THEMEPATH .'images/default.jpg' ?>" alt="<?php echo esc_attr($post->post_title); ?>">
    <?php
      endif; ?>
  <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title); ?>">
    <figcaption class="inm_fig_caption">
      <h3><?php the_title(); ?></h3>
      <div class=""></div>
      <div class="info__bottom_bar">
        <span>
          <?php echo esc_html(strtoupper($meta_venta_renta)); ?>
        </span>
        <span class="price">
          <?php echo esc_html('$'.$meta_precio); ?>
        </span>
      </div>

    </figcaption>
  </a>
</figure>
