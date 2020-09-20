<?php get_header(); ?>
  <section class="main_wrapper_section">
    <section>
        <?php
          if(have_posts()): ?>
            <div class="inner_wrapper">
              <?php
                while(have_posts()):
                  the_post();
                  $p_id = $post->ID; ?>
                  <div class="heading_container">
                    <h1><?php the_title(); ?></h1>
                    <time datetime="<?php echo get_the_date('c', $post->ID); ?>" ><?php echo get_the_date('j M, Y', $post->ID); ?></time>
                    <?php the_excerpt(); ?>
                  </div>
                  <picture class="image_frame">
                    <?php has_post_thumbnail() ? the_post_thumbnail('sig-l-640') : ''; ?>
                  </picture>

                  <ul class="horizontal_list social_shares">
                      <li class="share_item">
                        <span class="share_icon fb_item">
                          <a onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
                            href="<?php echo 'https://www.facebook.com/sharer.php?u='.get_the_permalink($post->ID); ?>"
                            title="Facebook Share">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" xml:space="preserve">
                            	<path d="M15.1,11.9h-2.1v7.3H10v-7.3H8.6V9.4H10V7.7c-0.1-1.6,1-3,2.6-3.1c0.2,0,0.3,0,0.5,0h2.3v2.5h-1.6c-0.3,0-0.6,0.2-0.7,0.6c0,0,0,0.1,0,0.1v1.5h2.3L15.1,11.9z" fill="#32529f"/>
                            </svg>
                          </a>
                        </span>
                      </li>
                      <li class="share_item">
                        <span class="share_icon tw_item">
                          <a href="<?php echo "https://twitter.com/intent/tweet?text=Consulta%20nuestro%20contenido!%20"; ?>"
                            url="<?php the_permalink(); ?>"
                            onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"
                            title="Twitter Share">
                            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" xml:space="preserve">
                            	<path d="M17.8,9c0,0.1,0,0.3,0,0.4c0,4.7-3.8,8.5-8.5,8.4c-1.6,0-3.2-0.5-4.5-1.3c0.2,0,0.5,0,0.7,0c1.3,0,2.6-0.5,3.7-1.3
                            		c-1.3,0-2.4-0.9-2.8-2.1c0.2,0,0.4,0.1,0.6,0.1c0.3,0,0.5,0,0.8-0.1c-1.4-0.3-2.4-1.5-2.4-2.9l0,0c0.4,0.2,0.9,0.4,1.3,0.4
                            		C5.4,9.7,5,7.9,5.8,6.6c1.5,1.9,3.7,3,6.1,3.1c-0.3-1.6,0.8-3.2,2.4-3.5c1-0.2,2,0.1,2.7,0.8c0.7-0.1,1.3-0.4,1.9-0.7
                            		C18.7,7,18.2,7.6,17.5,8c0.6-0.1,1.2-0.2,1.7-0.5C18.9,8.1,18.3,8.6,17.8,9z" fill="#1da1f2"/>
                            </svg>
                          </a>
                        </span>
                      </li>
                      <li class="share_item">
                        <span class="share_icon wa_item">
                          <a href="<?php echo "whatsapp://send?text=".esc_html($post->post_title)."%20Chécalo%20en%20nuestro%20sitio:%20".esc_url(get_the_permalink($p_id));  ?>"
                            title="Whatsapp Share">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                              <path fill="#25d366" d="M11.636,4.509A7.443,7.443,0,0,0,5.37,15.318l-.789,3.834a.289.289,0,0,0,.35.34l3.757-.89A7.44,7.44,0,1,0,11.636,4.509Zm4.483,11.549a5.831,5.831,0,0,1-6.712,1.1L8.884,16.9l-2.3.546.485-2.354-.258-.5A5.832,5.832,0,0,1,7.881,7.82a5.825,5.825,0,0,1,8.238,8.238Z"/><path fill="#25d366" d="M15.61,13.553l-1.441-.414a.537.537,0,0,0-.531.14l-.352.359a.525.525,0,0,1-.571.12,7.673,7.673,0,0,1-2.482-2.188.524.524,0,0,1,.042-.582l.307-.4a.538.538,0,0,0,.067-.546l-.607-1.371A.537.537,0,0,0,9.2,8.481a2.423,2.423,0,0,0-.937,1.43c-.1,1.009.331,2.282,1.968,3.81,1.891,1.766,3.406,2,4.393,1.76a2.419,2.419,0,0,0,1.288-1.123A.537.537,0,0,0,15.61,13.553Z"/>
                            </svg>
                          </a>
                        </span>
                      </li>
                    </ul>

                  <section class="content_container">
                    <?php the_content(); ?>
                    <div class="tag_cloud">
                      <?php
                        $tag_names = array();
                        $tags = wp_get_post_terms($post->ID, 'post_tag');
                        if(is_array($tags)&&!empty($tags)): ?>
                          <ul class="tag_list">
                            <?php
                              foreach($tags as $key => $tag):
                                array_push($tag_names, $tag->slug); ?>
                                <li class="tag_item"><?php echo esc_html($tag->name); ?></li>
                            <?php
                              endforeach; ?>
                          </ul>
                          <?php
                        endif;
                      ?>
                    </div>
                  </section>
              <?php
                endwhile; ?>
            </div>
              <?php
                $args = array(
                  'post_type'=>'post',
                  'post_status'=>'publish',
                  'posts_per_page'=>3,
                  'orderby'=>'date',
                  'order'=>'DESC',
                  'tag'=>join(',',$tag_names),
                  'post__not_in'=>array($p_id)
                );
                $related = new WP_Query($args);
                if($related->have_posts()):
                  $i=1; ?>
                  <section id="related_pool" class=" ligh_green_bg">
                    <h2 class="section_heading">RELACIONADAS</h2>
                    <div class="post_pool">
                      <?php
                        while($related->have_posts()):
                          $related->the_post();
                          setup_postdata($post);
                          get_template_part('templates/figure', 'item', array("count"=>$i));
                          $i++;
                        endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                  </section>
              <?php
                endif;
          endif; ?>
    </section>
  </section>
<?php get_footer(); ?>
