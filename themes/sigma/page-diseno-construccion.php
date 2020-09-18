<?php
  /*
    Template name: d&c
  */
  get_header();
  if(have_posts()): ?>
    <section id="page-dc" class="main_wrapper_section">
      <?php
        while(have_posts()):
          the_post(); ?>
          <div class="fixed_top_section">
              <?php
              if(has_post_thumbnail()):
                the_post_thumbnail('sig-ver-m-420');
              else: ?>
              <img src="<?php echo THEMEPATH . 'images/default.jpg' ?>" alt="Cover Inmueble">
              <?php
            endif; ?>
          </div>
          <section class="rounded_container scroll_section">
            <h1 class="section_heading"><?php echo the_title(); ?></h1>
            <div class="descriptive_txt">
              <?php the_excerpt(); ?>
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
