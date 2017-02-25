<?php
  /*
    Template Name: Right Sidebar
  */
 ?>

<aside class='sidebar-wrapper'>
    <div class='sidebar section' id='sidebar'>
      <!-- popular post div -->
      <div class='widget PopularPosts' data-version='1' id='PopularPosts2'>
        <div class="widget-title">
          <h2>Popular Posts</h2>
        </div>

          <div class='widget-content popular-posts'>
              <ul>
                <?php
                $p = 0;
                $param = array(
                   'post_type' => 'publication',
                   'orderby' => 'comment_count'
                  );
                  $quer = new WP_Query( $param );
                  if( $quer->have_posts() ){
                       while ( $p < 5 && $quer->have_posts() ) : $quer->the_post();
                  ?>
                  <li>
                      <div class='item-thumbnail-only'>
                          <div class='item-thumbnail'>
                              <a href='<?php the_permalink(); ?>' target='_blank'>
                                  <img alt='' border='0' src='<?php the_post_thumbnail_url( 'thumbnail' ); ?>' />
                              </a>
                          </div>
                          <div class='item-title'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></div>
                          <div class="comment-sidebar">
                            <span class='fa fa-comment-o'></span><span class='post-comment-link'>
                              <a class='comment-link' href='<?php the_permalink(); ?>' onclick=''>
                                <?php comments_number( 'No comments', 'one comment', '% comments' ); ?>

                              </a>
                          </div>
                      </div>
                      <div style='clear: both;'></div>
                  </li>
                <?php
                $p++;
               endwhile;
              }
              wp_reset_postdata();?>

              </ul>
              <div class='clear'></div>
          </div>
      </div>
      <!-- end of popular posts div  -->

        <!-- ad div -->
        <div class='widget HTML' data-version='1' id='HTML1'>
            <div class='widget-content'>
                <a href="#" style="text-align: center; display: block;">
                  <img src="http://localhost/vidnlol/wp-content/uploads/2017/02/ad-sidebar.png" />
                </a>
            </div>
            <div class='clear'></div>
        </div>
        <!-- end of ad div -->

        <!-- social media div -->
        <div class='widget HTML' data-version='1' id='HTML1'>
          <div class="widget-title">
            <h2>Stay social with us</h2>
          </div>
            <div class='widget-content'>
                <ul class="social-icons">
                  <li>
                    <a href="https://www.facebook.com/vidnlol" class="social-icon" target="_blank">
                       <i class="fa fa-facebook"></i>
                    </a>
                  </li>
                  <li>
                    <a href="" class="social-icon" target="_blank">
                       <i class="fa fa-twitter"></i>
                     </a>
                   </li>
                  <li>
                    <a href="" class="social-icon" target="_blank">
                       <i class="fa fa-rss"></i>
                     </a>
                   </li>
                  <li>
                    <a href="" class="social-icon" target="_blank">
                       <i class="fa fa-youtube"></i>
                     </a>
                   </li>
                  <li>
                    <a href="" class="social-icon" target="_blank">
                       <i class="fa fa-linkedin"></i>
                     </a>
                   </li>
                  <li>
                    <a href="" class="social-icon" target="_blank">
                       <i class="fa fa-google-plus"></i>
                     </a>
                   </li>
                </ul>
            </div>
            <div class='clear'></div>
        </div>
        <!-- end of social media div -->

        <!-- random posts div -->
          <div class='widget PopularPosts' data-version='1' id='HTML3'>
            <div class="widget-title">
              <h2 class='title'>Random Posts</h2>
            </div>
              <div class='widget-content popular-posts'>
                <ul>
                  <?php
                     $args = array(
                       'orderby' 				=> 'rand',
                       'post_type' => 'publication'
                     );
                     $query = new WP_Query($args);
                     $q = 0;
                     if( $query->have_posts() ){
                          while ( $q < 5 && $query->have_posts() ) : $query->the_post();
                   ?>
                    <li>
                        <div class='item-thumbnail-only'>
                            <div class='item-thumbnail'>
                                <a href='<?php the_permalink(); ?>' target='_blank'>
                                    <img alt='' border='0' src='<?php the_post_thumbnail_url( 'thumbnail' ); ?>' />
                                </a>
                            </div>
                            <div class='item-title'><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></div>
                        </div>
                        <div style='clear: both;'></div>
                    </li>
                    <?php
                    $q++;
                      endwhile;
                     }
                     wp_reset_postdata();
                  ?>
                </ul>
              </div>
              <div class='clear'></div>
          </div>
          <!-- end of random posts div  -->

        <div class='widget Label' data-version='1' id='Label2'>
          <div class="widget-title">
            <h2>Categories</h2>
          </div>
            <?php
            // $cats = wp_list_categories();
            $cats = get_categories();
             ?>
            <div class='widget-content cloud-label-widget-content'>
              <?php foreach ($cats as $cat): ?>
                <span class='label-size label-size-1'>
                  <a dir='ltr' href='<?php echo get_category_link( $cat->term_id ); ?>'><?php echo $cat->cat_name ?></a>
                </span>
              <?php endforeach; ?>
            </div>
        </div>
    </div>
</aside>
<!-- /sidebar-wrapper -->
