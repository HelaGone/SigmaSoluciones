<?php get_header();
  global $wp_query;
  $query_vars = $wp_query->query_vars;
  $arch_name = $query_vars['post_type'];
?>
  <section id="archive-rec-vir" class="main_wrapper_section">
    <section class="fixed_top_section">
      <figure class="fig_obj">
        <img src="<?php echo THEMEPATH.'images/headers/'.$arch_name.'.jpg' ?>" alt="Cover Recorridos Virtuales">
      </figure>
    </section>
    <!-- SCROLL SECTION -->
    <section class="inner_container scroll_section">
      <h1 class="section_heading"><?php echo esc_html(ucfirst(str_replace('-', ' ', $arch_name))); ?></h1>
      <p class="descriptive_txt">En SIGMA rompemos barreras geográficas, brindándote una nueva manera de vivir un espacio.</p>

      <?php get_template_part('templates/services', 'widget', array('serv'=>'medios-digitales', 'tax'=>'rubros')); ?>

      <?php
        if(have_posts()): ?>
        <section id="recorridos" class="section_wrapper inner_wrapper">
          <?php
            while(have_posts()):
              the_post(); ?>
              <figure class="ribbon_fig_obj">
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
