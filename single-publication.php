<?php get_header(); ?>


    <div class='ct-wrapper'>
        <div class='outer-wrapper'>
            <div class='main-wrapper'>
                <div class='content section' id='content'>
                    <div class='widget Blog' data-version='1' id='Blog1'>
                        <div class='blog-posts hfeed default'>
                            <div class='post-outer'>
                                <article class='post hentry'>
                                  <div class='post-header'>
                                      <span class='post-labels post-meta'>
                                        <?php the_category(' ','',''); ?>
                                      </span>
                                      <span class='post-timestamp'>
                                      <span class='fa fa-clock-o'></span>
                                      <abbr class='published' content='<?php the_time('F j, Y'); ?>' itemprop='datePublished dateModified'><?php the_time('F j, Y'); ?></abbr>
                                      </span> - <span class='fa fa-comment-o'></span><span class='post-comment-link'>
                                        <a class='comment-link' href='#wc-main-form-wrapper-0_0' onclick=''>
                                          <?php comments_number( 'No comments', 'one comment', '% comments' ); ?>

                                        </a>
                                      </span>
                                  </div>
                                    <h1 class='post-title entry-title' itemprop='headline'>
                                      <?php the_title(); ?>
                                      </h1>
                                    <div>
                                      <!-- qSAze9b0wrY -->
                                      <?php
                                      if( get_field('video')): ?>
                                        <div class="vid-container">
                                          <iframe width="100%" height="auto" src="https://www.youtube.com/embed/<?php the_field('video'); ?>"></iframe>
                                        </div>
                                      <?php else: ?>
                                        <div class="">
                                          <img src="<?php the_post_thumbnail_url( 'large' ); ?>" alt="">
                                        </div>

                                      <?php endif; ?>
                                    </div>
                                    <script type="text/javascript">
                                      console.log('<?php $var ?>');
                                    </script>
                                    <div class='post-footer'>
                                    </div>
                                </article>
                              <div class="comment-warpper">
                              <?php
                                comments_template('', true);
                               ?>
                              </div>
                            </div>
                        </div>
                        <div class='clr'></div>

                    </div>
                </div>
            </div>
            <!-- /main-wrapper -->
          <?php get_sidebar('right'); ?>
            <!-- /sidebar-wrapper -->
            <div class='clr'></div>
        </div>
        <!-- /ct-wrapper -->
    </div>
    <!-- /outer-wrapper -->



<?php get_footer(); ?>
