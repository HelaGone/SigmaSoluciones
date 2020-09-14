<div class="blogpost_item inner_wrapper">
  <h3 class="grid_object_header">
    <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr($post->post_title);?>">
      <?php the_title(); ?>
    </a>
  </h3>

  <div class="left-side g_o_section">
    <div class="blog_count">
      <span><?php echo (strlen($args['count'])>1) ? $args['count'] : '0' . $args['count'];?></span>
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
