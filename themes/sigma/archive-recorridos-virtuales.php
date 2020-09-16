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
      <h1 class="section_heading"><?php echo esc_html(strtoupper(str_replace('-', ' ', $arch_name))); ?></h1>
      <p>En SIGMA rompemos barreras geográficas, brindándote una nueva manera de vivir un espacio.</p>

      <?php get_template_part('templates/services', 'widget', array('serv'=>'recorridos')); ?>

    </section>
    <!-- END SCROLL SECTION -->
  </section>
<?php get_footer(); ?>
