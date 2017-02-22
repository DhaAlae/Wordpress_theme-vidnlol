<?php get_header(); ?>


    <!-- <div class='featured default section' id='featured'>
        <div class='widget HTML' data-version='1' id='HTML102'>
            <div class='widget-content'>
                5/recent-posts
            </div>
            <div class='clr'></div>
        </div>
    </div> -->
    <div class='header-below-ad section' id='header-below-ad'>
    </div>
    <div class='clr'></div>
    <div class='ct-wrapper'>
        <div class='outer-wrapper'>
            <div class='main-wrapper'>
                <div class='content section' id='content'>
                    <div class='widget Blog' data-version='1' id='Blog1'>
                        <div class='blog-posts hfeed default'>
                          <?php
                           $args = array(
                             'post_type' => 'publication'
                           );
                           $query = new WP_Query($args);
                           ?>
<!-- loop the content -->
                            <?php if( $query->have_posts() ){
                                 while ( $query->have_posts() ) : $query->the_post();
                                   ?>
                            <div class='post-outer shareable-class' style="width:100%;">
                                <article class='post hentry'>
                                    <link href='<?php the_permalink(); ?>' itemprop='mainEntityOfPage' />
                                    <div class='post-thumb'>
                                        <a href='<?php the_permalink(); ?>'>
                                            <!-- <div class='thumb' style='background-image: url(<?php the_post_thumbnail_url( 'full' ); ?> );'></div> -->
                                            <img style="align:center;" src="<?php the_post_thumbnail_url( 'full' ); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class='post-inner'>
                                        <div class='post-header'>
                                            <meta content='Chandeep J' itemprop='author' />
                                            <span class='post-labels post-meta'>
                                              <?php the_category(' ','',''); ?>
                                              <!-- <a href='search/label/Travel.html' rel='tag'>Travel</a> -->

                                            </span>
                                            <span class='post-timestamp'>
                                            <span class='fa fa-clock-o'></span>
                                            <abbr class='published' content='<?php the_time('F j, Y'); ?>' itemprop='datePublished dateModified'><?php the_time('F j, Y'); ?></abbr>
                                            </span> - <span class='fa fa-comment-o'></span><span class='post-comment-link'>
                                              <a class='comment-link' href='<?php the_permalink(); ?>' onclick=''>
                                                <?php comments_number( 'No comments', 'one comment', '% comments' ); ?>

                                              </a>
                                            </span>
                                        </div>
                                        <h2 class='post-title entry-title' itemprop='headline'>
                                          <a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
                                        </h2>
                                        <!-- <div class='post-snippet'><?php the_field('description'); ?></div> -->
                                    </div>
                                    <div class='post-footer'>
                                    </div>
                                </article>
                            </div>
                            <?php
                              endwhile;
                             }
                             wp_reset_postdata();
                             ?>
<!-- end loop content -->








                        </div>
                        <div class='clr'></div>
                        <div class='blog-pager' id='blog-pager'>
                            <span id='blog-pager-older-link'>
                              <!-- <a class='blog-pager-older-link' href='' id='Blog1_blog-pager-older-link' title='Older Posts'>Older Posts</a> -->
                            </span>
                            <!-- <a class='home-link' href='index.html'>Home</a> -->
                        </div>
                        <div class='clear'></div>
                    </div>
                </div>
            </div>

            <!-- /main-wrapper -->
            <aside class='sidebar-wrapper'>
                <div class='sidebar section' id='sidebar'>
                    <?php get_sidebar('right'); ?>
                </div>
            </aside>
            <div class='clr'></div>
        </div>
        <!-- /ct-wrapper -->
    </div>
    <!-- /outer-wrapper -->
<?php get_footer(); ?>
