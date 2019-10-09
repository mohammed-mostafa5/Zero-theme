<?php get_header(); ?>

<section>
    <div class="container main-content">
        <div class="row">
            <div class="col-md-9 col-lg-9 ">
                <h4 class="section-title"><b><?php the_title(); ?></b></h4>
                <div class="row">
                    <?php
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        ?>
                    <div class="card mb-3">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full img-thumbnail card-img-top']); ?>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
                            </h5>
                            <p class="card-text"><?php the_content(); ?></p>
                            <hr>
                            </b></a>
                            <?php the_time('F jS, Y'); ?>
                            <div class="comments float-right">
                                <i class="color-secondary fas fa-comment mr-2 ml-2"></i>
                                <?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comment_url', 'Comments Disabled') ?>
                            </div>
                            <p><?php _e( 'Posted in' ); ?><i class="color-secondary mr-2 ml-2 fas fa-tags"></i>
                                <?php the_category( ', ' ); ?></p>
                        </div>
                    </div>
                    <?php
                    } // end while
                } // end if
            ?>
                    <div class="row author-data col-12">
                        <div class="col-2">
                            <?php  echo get_avatar(get_the_author_meta( 'ID')); ?>
                        </div>
                        <div class="clear-fix"></div>
                        <div class="col-10">
                            <h4>
                                <?php the_author_meta( 'nickname'); ?>
                            </h4>
                            <?php if ( get_the_author_meta('description')) {
                                ?>
                            <p>
                                <?php the_author_meta( 'description'); ?>
                            </p>
                            <?php
                            } else{
                                echo 'No Bio';
                            }?>
                            <div class="clear-fix"></div>
                            <i class="far fa-clipboard"></i> Posts Count:
                            <?php echo count_user_posts( get_the_author_meta('ID')); ?><br>
                            <i class="fas fa-link"></i> User Link: <?php the_author_posts_link(); ?>
                        </div>
                    </div>
                    <div class="col-12 clearfix">
                        <?php if( get_previous_post_link()) {
                ?>
                        <button type="button"
                            class="prev-posts btn btn-dark text-dark"><?php  previous_post_link( '%link', '%title' );?></button>
                        <?php
                }else {
                        echo'<button type="button" class="prev-posts btn btn-secondary" disabled >No Previous Posts</button>';
                    }
                     ?>
                        <?php if( get_next_post_link()) {
                ?>
                        <button type="button"
                            class="next-posts btn btn-dark text-dark float-right"><?php  next_post_link( '%link', '%title' );?></button>
                        <?php
                }else {
                        echo'<button type="button" class="next-posts btn btn-secondary float-right" disabled >No Next Posts</button>';
                    }
                     ?>
                    </div>



                    <div class="col-12">
                        <?php comments_template(); ?>
                        <?php
                        $args= array(
                            'fields'        => array(
                                        'author'    => '<div class="form-group"><label for="name">Your Name</label><input type="text" id="author" name="author"  class="form-control"></div>',
                                        'email'     => '<div class="form-group"><label for="email">Your Email</label><input type="email"id="email"  name="email" class="form-control"></div>',
                                        'url'       => '<div class="form-group"><label for="url">Your url</label><input type="text" id="comment"  name="url" class="form-control"></div>'
                            ),
                            'comment_field' => '<div class="form-group"><label for="comment">Comment</label><textarea class="form-control" id="comment" name="comment" rows="5"></textarea></div>',
                            'class_submit'  => 'btn btn-primary',
                            'title_reply' => __( 'Write a Reply or Comment', 'textdomain' ),
                        );
                        comment_form($args); ?>
                    </div>
                </div>
            </div>
            <div class="sidebar col-3">
              <?php get_sidebar( 'main-sidebar' ) ?>
            </div>
        </div>
    </div>
<hr>
    <div class="related-posts"> <!-- Show Related Posts -->
      <h2>Related Posts</h2>
      <?php
      $post_id = get_queried_object_id();
          // The Query
          $args= array(
            'orderby'        => 'rand',
            'post__not_in'   => array($post_id),
            'posts_per_page'      => 3,
          );
          $the_query = new WP_Query( $args );
?>
          <!-- The Loop -->
          <div class="row container-fluid">
              <?php
          if ( $the_query->have_posts() ) {
              while ( $the_query->have_posts() ) {
                  $the_query->the_post();
                  ?>
                  <div class="col-4">
                    <div class="card mb-3">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full img-thumbnail card-img-top']); ?>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
                            </h5>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <hr>
                            </b></a>
                            <?php the_time('F jS, Y'); ?>
                            <div class="comments float-right">
                                <i class="color-secondary fas fa-comment mr-2 ml-2"></i>
                                <?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comment_url', 'Comments Disabled') ?>
                            </div>
                            <p><?php _e( 'Posted in' ); ?><i class="color-secondary mr-2 ml-2 fas fa-tags"></i>
                                <?php the_category( ', ' ); ?></p>
                        </div>
                    </div>
                  </div>

              <?php
              } // end while
          } // end if
      ?>
<?php
          /* Restore original Post Data */
          wp_reset_postdata();
      ?>
    </div><!-- End Show Related Posts -->

</section>


<?php get_footer(); ?>
