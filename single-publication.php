<?php get_header(); ?>

<body class='static_page right-sidebar'>
    <div class='header-top-ad section' id='header-top-ad'>
        <div class='widget HTML' data-version='1' id='HTML100'>
            <div class='widget-content'>
                <div class='ct-wrapper'>
                    <a href="#"><img src="http://localhost/vidnlol/wp-content/uploads/2017/02/index.jpg" /></a>
                </div>
            </div>
            <div class='clr'></div>
        </div>
    </div>

    <div class='clr'></div>
    <div class='featured default section' id='featured'>
        <div class='widget HTML' data-version='1' id='HTML102'>
        </div>
    </div>
    <div class='header-below-ad section' id='header-below-ad'></div>
    <div class='clr'></div>
    <div class='ct-wrapper'>
        <div class='outer-wrapper'>
            <div class='main-wrapper'>
                <div class='content section' id='content'>
                    <div class='widget Blog' data-version='1' id='Blog1'>
                        <div class='blog-posts hfeed default'>
                            <div class='post-outer'>
                                <article class='post hentry' itemprop='blogPost' itemscope='itemscope' itemtype='http://schema.org/CreativeWork'>
                                    <link href='sample-page.html' itemprop='mainEntityOfPage' />
                                    <h1 class='post-title entry-title' itemprop='headline'>
                                      <?php the_title(); ?>
                                      </h1>
                                    <div >
                                      <!-- qSAze9b0wrY -->
                                      <?php
                                      if( get_field('video')): ?>

                                        <iframe width="420" height="315" src="https://www.youtube.com/embed/<?php the_field('video'); ?>"></iframe>
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



</body>


<?php get_footer(); ?>
