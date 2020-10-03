<?php get_header();
  global $wp_query;
  $query_vars = $wp_query->query_vars;
  $arch_name = $query_vars['post_type'];
?>
  <section id="archive-rec-vir" class="main_wrapper_section">
    <section class="fixed_top_section">
      <figure class="fig_obj">
        <picture>
          <source media="(min-width:1024px)" srcset="<?php echo THEMEPATH . 'images/headers/'.$arch_name.'-1280.jpg' ?>">
          <source media="(min-width:720px)" srcset="<?php echo THEMEPATH . 'images/headers/'.$arch_name.'-768.jpg' ?>">
          <img src="<?php echo THEMEPATH.'images/headers/'.$arch_name.'.jpg' ?>" alt="Cover Recorridos Virtuales">
        </picture>
      </figure>
    </section>
    <!-- SCROLL SECTION -->
    <section class="rounded_container scroll_section">
      <div class="about_info">
        <h1 class="section_heading"><?php echo esc_html(ucfirst(str_replace('-', ' ', $arch_name))); ?></h1>
        <div class="post_content_container">
          <p>En SIGMA rompemos barreras geográficas, brindándote una nueva manera de vivir un espacio.</p>
        </div>
      </div>


      <?php get_template_part('templates/services', 'widget', array('serv'=>'medios-digitales', 'tax'=>'rubros')); ?>

      <?php
        if(have_posts()): ?>
        <section id="recorridos" class="post_pool inner_wrapper">
          <?php
            while(have_posts()):
              the_post(); ?>
              <figure class="ribbon_fig_obj unit_item">
                <picture>
                  <a href="<?php the_permalink() ?>" title="<?php echo esc_attr($post->post_title); ?>">
                    <?php
                      if(has_post_thumbnail()):
                        the_post_thumbnail('sig-m-480');
                      else: ?>
                        <img src="<?php echo THEMEPATH . 'images/default.jpg' ?>" alt="Cover Inmueble">
                    <?php
                      endif; ?>
                  </a>
                </picture>
                <figcaption class="ribbon_fig_capion">
                  <h2 class="ribbon_fig_title">
                    <a href="<?php the_permalink() ?>" title="<?php echo esc_attr($post->post_title); ?>">
                      <?php echo the_title(); ?>
                    </a>
                  </h2>
                </figcaption>
              </figure>
          <?php
            endwhile; ?>
        </section>
      <?php
        endif; ?>

      <!-- CASOS DE EXITO WIDGET -->
      <?php get_template_part('templates/casos', 'widget', array('type'=>'arte-cultura,negocios,especiales,instituciones-educativas')); ?>

      <!-- BARRA PARTNERS  -->
      <?php get_template_part('templates/barra', 'partners'); ?>

    </section>
    <!-- END SCROLL SECTION -->
  </section>
<?php get_footer(); ?>
