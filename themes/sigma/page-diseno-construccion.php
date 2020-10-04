<?php
  /*
    Template name: d&c
  */
  get_header();
  if(have_posts()):?>
    <section id="page-dc" class="main_wrapper_section">
      <?php
        while(have_posts()):
          the_post(); ?>
          <section class="fixed_top_section">
            <figure class="arc_fig_obj">
              <picture>
                <source media="(min-width:1024px)" srcset="<?php echo THEMEPATH . 'images/headers/diseno-y-construccion-1280.jpg' ?>">
                <img src="<?php echo THEMEPATH.'images/headers/diseno-y-construccion.jpg' ?>" alt="Cover Diseño & Construcción">
              </picture>
            </figure>
          </section>
          <section class="rounded_container scroll_section">
            <div class="about_info">
              <h1 class="section_heading"><?php echo the_title(); ?></h1>
              <div class="about_info_description">
                <?php the_excerpt(); ?>
              </div>
            </div>

            <!-- SERVICES GRID -->
            <?php get_template_part('templates/services', 'widget', array('serv'=>'arquitectura', 'tax'=>'rubros')); ?>

            <!-- CASOS DE EXITO WIDGET -->
            <?php get_template_part('templates/casos', 'widget', array('type'=>'remodelacion,interiorismo,mantenimiento,diseno-construccion')); ?>

            <!-- BARRA PARTNERS  -->
            <?php get_template_part('templates/barra', 'partners'); ?>

          </section>
          <?php
        endwhile; ?>
    </section>
    <?php
  endif;
  get_footer(); ?>
