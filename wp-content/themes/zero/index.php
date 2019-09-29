<?php get_header(); ?>

<section>
    <div class="container main-content">
        <div class="row">
            <div class="col-md-12 col-lg-12 ">
                <h4 class="section-title"><b>Blogs</b></h4>
                <div class="row">
                    <?php 
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
                        ?>
                    <div class="col-sm-6 blog">
                        <div class="card mb-3">
                            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full img-thumbnail card-img-top']); ?>
                            <div class="card-body">
                                <h5 class="card-title"><a
                                        href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a></h5>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <hr>
                                by <b><?php the_author_posts_link(); ?>,</b></a>
                                <?php the_time('F jS, Y'); ?>
                                <div class="comments float-right">
                                    <i class="color-secondary fas fa-comment mr-2 ml-2"></i>
                                    <?php comments_popup_link('No Comments', '1 Comment', '% Comments', 'comment_url', 'Comments Disabled') ?>
                                </div>
                                <p><?php _e( 'Posted in' ); ?><i class="color-secondary mr-2 ml-2 fas fa-tags"></i>
                                    <?php the_category( ', ' ); ?></p>
                                <a href="<?php the_permalink(); ?>" class="btn btn-info mt-10">Read More</a>
                            </div>
                        </div>
                    </div><!-- col-sm-6 -->
                    <?php
                    } // end while
                } // end if	
            ?>
            <div class="col-12 clearfix">
            <?php if( get_previous_posts_link()) {
                ?>
                    <button type="button" class="prev-posts btn btn-dark text-dark"><?php  previous_posts_link( 'Prev' );?></button>
                  <?php 
                }else {
                        echo'<button type="button" class="prev-posts btn btn-secondary" disabled >Prev</button>';
                    }
                     ?>
                
                <?php if( get_next_posts_link()) {
                ?>
                    <button type="button" class="next-posts btn btn-dark text-dark float-right"><?php  next_posts_link( 'Next' );?></button>
                  <?php 
                }else {
                        echo'<button type="button" class="next-posts btn btn-secondary float-right" disabled >Next</button>';
                    }
                     ?>
            </div>
                 
                </div>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>