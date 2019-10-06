<?php get_header(); ?>

<!-- Header -->
<div class="author-header text-center mt-5">
    <h1>
        <?php the_author_meta( 'nickname');  echo "'s Page."?>
    </h1>
    <div class="author-avatar clear-fix mb-2">
        <?php  echo get_avatar(get_the_author_meta( 'ID'), '128'); ?>
    </div>
    <?php if ( get_the_author_meta('description')) {
                                ?>
    <p>
        <?php the_author_meta( 'description'); ?>
    </p>
    <?php
        } else{
            echo 'No Bio';    
        }?>
    <br><i class="far fa-clipboard"></i> Posts Count: <?php echo count_user_posts( get_the_author_meta('ID')); ?><br>
    <i class="fas fa-comment"></i> User Comments: <?php 
        $args = array(
            'user_id' => get_the_author_meta( 'ID'),
            'count'   => true
        );
    
    echo get_comments( $args ); ?>
</div><!-- End Header -->

<hr>
<!-- Content -->
<div class="container">
    <div class="row">

        <?php 
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
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

    </div>

   
        <div class="row author-comments">
        <div class="col-12 d-block clear-fix">
            <?php $args = array(
         'user_id' => get_the_author_meta( 'ID')
     ); ?>
            <?php $comments = get_comments( $args ); ?>
            <?php 
    if ( $comments) {?>
            <?php foreach ($comments as $comment){ ?>
            <a href="<?php get_permalink($comment->comment_ID); ?>"><br>
                <?php echo get_the_title($comment->comment_ID)  ?><br>
            </a>
            <?php echo $comment->comment_content ?><br>
            <span>
                <?php echo $comment->comment_date ?>
            </span><hr>
            <?php } ?>
        </div>
    </div>
</div><!-- End Content -->
<?php }else{
    echo 'The user has no comments.';
} ?>

    

<?php get_footer(); ?>