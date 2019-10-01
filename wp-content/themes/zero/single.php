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

                    <div class="card mb-3">
                        <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full img-thumbnail card-img-top']); ?>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?php the_permalink(); ?>"><b><?php the_title(); ?></b></a>
                            </h5>
                            <p class="card-text"><?php the_content(); ?></p>
                            <hr>
                            by <b><?php the_author_posts_link(); ?>,</b></a>
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

                    <?php comments_template(); ?>
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

                </div>
            </div>
        </div>


    </div>
</section>


<?php get_footer(); ?>