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
                            <div class='post-outer shareable-class'>
                                <article class='post hentry'>
                                    <link href='<?php the_permalink(); ?>' itemprop='mainEntityOfPage' />
                                    <div class='post-thumb'>
                                        <a href='<?php the_permalink(); ?>'>
                                            <div class='thumb' style='background-image: url(<?php the_post_thumbnail_url( 'large' ); ?> );'></div>
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
                              <a class='blog-pager-older-link' href='' id='Blog1_blog-pager-older-link' title='Older Posts'>Older Posts</a>
                            </span>
                            <!-- <a class='home-link' href='index.html'>Home</a> -->
                        </div>
                        <div class='clear'></div>
                        <script type="text/javascript">
                            window.___gcfg = {
                                'lang': 'en_GB'
                            };
                        </script>
                    </div>
                </div>
            </div>



            <!-- /main-wrapper -->
            <aside class='sidebar-wrapper'>
                <div class='sidebar section' id='sidebar'>


                  <!-- popular post div -->
                  <div class='widget PopularPosts' data-version='1' id='PopularPosts2'>
                    <div class="widget-title">
                      <h2>Popular Posts</h2>
                    </div>

                      <div class='widget-content popular-posts'>
                          <ul>
                              <li>
                                  <div class='item-thumbnail-only'>
                                      <div class='item-thumbnail'>
                                          <a href='2016/12/she-stared-through-window-at-stars.html' target='_blank'>
                                              <img alt='' border='0' src='' />
                                          </a>
                                      </div>
                                      <div class='item-title'><a href='2016/12/she-stared-through-window-at-stars.html'>She stared through the window at the stars</a></div>
                                  </div>
                                  <div style='clear: both;'></div>
                              </li>

                              <li>
                                  <div class='item-thumbnail-only'>
                                      <div class='item-thumbnail'>
                                          <a href='2016/12/my-folks-were-always-on-me-to-groom.html' target='_blank'>
                                              <img alt='' border='0' src='../1.bp.blogspot.com/-5Q3RFjOLcbw/WFn-zEW1fmI/AAAAAAAADq8/rRA34ZEnzXMvFbrlnNQqZfgN8IzuJpNRwCLcB/w72-h72-p-k-nu/pexels-photo-175696.jpeg' />
                                          </a>
                                      </div>
                                      <div class='item-title'><a href='2016/12/my-folks-were-always-on-me-to-groom.html'>My folks were always on me to groom myself</a></div>
                                  </div>
                                  <div style='clear: both;'></div>
                              </li>

                              <li>
                                  <div class='item-thumbnail-only'>
                                      <div class='item-thumbnail'>
                                          <a href='2016/12/my-two-natures-had-memory-in-common.html' target='_blank'>
                                              <img alt='' border='0' src='../2.bp.blogspot.com/-Ml5jTMswWMM/WFn-z7cP4gI/AAAAAAAADrE/nhXpum6-QAMdrWKDF3uQ1IzIpkJtLkGqwCLcB/w72-h72-p-k-nu/pexels-photo-179912.jpeg' />
                                          </a>
                                      </div>
                                      <div class='item-title'><a href='2016/12/my-two-natures-had-memory-in-common.html'>My two natures had memory in common</a></div>
                                  </div>
                                  <div style='clear: both;'></div>
                              </li>

                              <li>
                                  <div class='item-thumbnail-only'>
                                      <div class='item-thumbnail'>
                                          <a href='2016/12/the-recorded-voice-scratched-in-speaker.html' target='_blank'>
                                              <img alt='' border='0' src='../3.bp.blogspot.com/--1EP_5eR_rU/WFn-xwtg4pI/AAAAAAAADqw/C-uttsCpcRYajLMj_jIO61TUYk_TisZVgCLcB/w72-h72-p-k-nu/fashion-person-woman-hand.jpg' />
                                          </a>
                                      </div>
                                      <div class='item-title'><a href='2016/12/the-recorded-voice-scratched-in-speaker.html'>The recorded voice scratched in the speaker</a></div>
                                  </div>
                                  <div style='clear: both;'></div>
                              </li>

                              <li>
                                  <div class='item-thumbnail-only'>
                                      <div class='item-thumbnail'>
                                          <a href='2016/12/waves-flung-themselves-at-blue-evening.html' target='_blank'>
                                              <img alt='' border='0' src='../2.bp.blogspot.com/-R2jCJs442b0/WFn-0skGSkI/AAAAAAAADrM/t5WBMxNU2d8wAlQ3n06BP_z5yyVsEamsACLcB/w72-h72-p-k-nu/pexels-photo-217860.jpeg' />
                                          </a>
                                      </div>
                                      <div class='item-title'><a href='2016/12/waves-flung-themselves-at-blue-evening.html'>Waves flung themselves at the blue evening</a></div>
                                  </div>
                                  <div style='clear: both;'></div>
                              </li>

                          </ul>
                          <div class='clear'></div>
                          <span class='widget-item-control'>
                            <span class='item-control blog-admin'>
                              <a class='quickedit' href=''>
                                <img alt='' height='18' src='../resources.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
                              </a>
                            </span>
                          </span>
                          <div class='clear'></div>
                      </div>
                  </div>
                  <!-- end of popular posts div  -->

                    <!-- ad div -->
                    <div class='widget HTML' data-version='1' id='HTML1'>
                        <div class='widget-content'>
                            <a href="#" style="text-align: center; display: block;">
                              <img src="images/index-1.jpg" />
                            </a>
                        </div>
                        <div class='clear'></div>
                        <span class='widget-item-control'>
                          <span class='item-control blog-admin'>
                            <a class='quickedit' href=''>
                              <img alt='' height='18' src='../resources.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
                            </a>
                          </span>
                        </span>
                        <div class='clear'></div>
                    </div>
                    <!-- end of ad div -->

                    <!-- random posts div -->
                      <div class='widget HTML' data-version='1' id='HTML3'>
                        <div class="widget-title">
                          <h2 class='title'>Random Posts</h2>
                        </div>
                          <div class='widget-content'>
                              5/random-posts
                          </div>
                          <div class='clear'></div>
                          <span class='widget-item-control'>
                            <span class='item-control blog-admin'>
                              <a class='quickedit' href='' >
                                <img alt='' height='18' src='../resources.blogblog.com/img/icon18_wrench_allbkg.png' width='18'/>
                              </a>
                            </span>
                          </span>
                          <div class='clear'></div>
                      </div>
                      <!-- end of random posts div  -->

                    <div class='widget Label' data-version='1' id='Label2'>
                      <div class="widget-title">
                        <h2>Labels</h2>
                      </div>
                        <div class='widget-content cloud-label-widget-content'>
                            <span class='label-size label-size-1'>
                              <a dir='ltr' href='search/label/Fashion.html'>Fashion</a>
                            </span>
                            <span class='label-size label-size-5'>
                              <a dir='ltr' href='search/label/Lifestyle.html'>Lifestyle</a>
                            </span>
                            <span class='label-size label-size-3'>
                              <a dir='ltr' href='search/label/Personal.html'>Personal</a>
                            </span>
                            <span class='label-size label-size-5'>
                              <a dir='ltr' href='search/label/Travel.html'>Travel</a>
                            </span>
                        </div>
                    </div>


                </div>
            </aside>
            <!-- /sidebar-wrapper -->
            <div class='clr'></div>
        </div>
        <!-- /ct-wrapper -->
    </div>
    <!-- /outer-wrapper -->
<?php get_footer(); ?>
