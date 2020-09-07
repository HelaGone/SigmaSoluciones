<?php get_header(); ?>
<main id="main_container">
  <section class="hk-section main_wrapper_section">
    <div class="inner_wrapper">
      <div id="tabbed_widget">
        <ul class="tabs custom-list">
          <li>
            <button type="button" name="button" onclick="hk_hanlde_panel('recorrido')">RECORRIDO</button>
          </li>
          <li>
            <button type="button" name="button" onclick="hk_hanlde_panel('foto360')">VISTA 360</button>
          </li>
          <li>
            <button type="button" name="button" onclick="hk_hanlde_panel('galeria')">GALERÍA</button>
          </li>
          <li>
            <button type="button" name="button" onclick="hk_hanlde_panel('video')">VIDEO</button>
          </li>
        </ul>
        <ul class="tabpanels">
          <!-- RECORRIDO VIRTUAL -->
          <li class="panel selected" data-media-type="recorrido">
            <div class="item_inner_wrapper">
              <iframe src="https://players.cupix.com/p/AYvGTwTL" width="720" height="480" style="margin:0 auto;" allowFullScreen="true"></iframe>
            </div>
          </li>

          <!-- FOTO 360 -->
          <li class="panel" data-media-type="foto360">
            <div id="panorama" class="item_inner_wrapper"></div>
          </li>

          <!-- GALERÍA FOTOS -->
          <li class="panel" data-media-type="galeria">
            <div class="item_inner_wrapper">
              <?php
                $img_ids = array();
                if(has_block('gallery', $post->post_content)):
                   $post_blocks = parse_blocks($post->post_content); ?>
                   <ul class="slider">
                    <?php
                       foreach ($post_blocks as $key => $block):
                         if($block['blockName'] == 'core/gallery'):
                           if(array_key_exists('attrs', $block)):
                             if(array_key_exists('ids', $block['attrs'])):
                               for($i=0; $i<count($block['attrs']['ids']); $i++): ?>
                                 <li>
                                   <?php echo wp_get_attachment_image($block['attrs']['ids'][$i], 'full', false); ?>
                                 </li>
                            <?php
                               endfor;
                             endif;
                           endif;
                         endif;
                       endforeach; ?>
                   </ul>
              <?php
                endif; ?>
            </div>
          </li>

          <!-- VIDEO -->
          <li class="panel" data-media-type="video">
            <div>
              <iframe width="720" height="480" src="https://www.youtube.com/embed/3RrCy6Syyxk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </section>
</main>


<script type="text/javascript">
  // PANNELLUM PLUGIN
  pannellum.viewer('panorama',{
    "type":"equirectangular",
    "panorama":"https://localhost/sigmasoluciones.com.mx/wp-content/uploads/2020/09/foto360example-low-scaled.jpg"
  });

  //TABPANEL
  const hk_hanlde_panel = (type) =>{
    let panelElements = document.getElementsByClassName('panel');
    Object.keys(panelElements).forEach((index) => {
      let item = panelElements[index];
      item.classList.remove('selected');
      if(item.dataset.mediaType == type){
        item.classList.add('selected');
      }
    });
  }

  //SLIDER
  $(document).ready(function(){
    $('.slider').bxSlider();
  });
</script>

<?php get_footer(); ?>
