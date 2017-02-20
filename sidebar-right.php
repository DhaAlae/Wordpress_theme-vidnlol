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
                <?php
                // wp_get_sidebars_widgets();
                // the_widget('WP_Widget_Random_Posts');
                
                 ?>
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
