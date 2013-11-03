<?php
/*
  Template Name: Model Page
 */
?>
<?php get_header(); ?>
<!--Start Content Grid-->
<div class="grid_24 content">
    <div class="grid_24 alpha">
        <div class="content-wrap">
            <div class="content-info">
                <?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?>
            </div>
            <div class="blog" id="blogmain">
                <ul class="blog_post" style="padding: 15px">
                    <?php

//                    echo "catid:" . get_field('cat_id')[0] ;

                    $limit = get_option('posts_per_page');
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $catId = get_field('cat_id')[0];
                    query_posts('showposts=' . $limit . '&paged=' . $paged. "&cat=". $catId);
                    $wp_query->is_archive = true;
                    $wp_query->is_home = false;
                    ?>
                    <!-- Start the Loop. -->
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <li id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="float:left;width:33%;margin-left:0;text-align: center">
                                <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>

                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('post_thumbnail', array('class' => 'postimg')); ?>
                                    </a>

                                    <?php
                                } else {
                                    echo inkthemes_main_image();
                                }
                                ?>
<!--                                <h1><a href="--><?php //the_permalink() ?><!--" rel="bookmark" title="Permanent Link to --><?php //the_title_attribute(); ?><!--">--><?php //the_title(); ?><!--</a></h1>-->

<!--                                --><?php //the_excerpt(); ?>
                                <div class="clear"></div>
                                <div class="tags">
                                    <?php the_tags('Post Tagged with ', ', ', ''); ?>
                                </div>
                                <div class="clear"></div>
                        <div style="text-align: center">
                        <h1><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                        </div>

<!--                                --><?php //comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?>
<!--                                <div class="clear"></div>-->
<!--                                <a href="--><?php //the_permalink() ?><!--">--><?php //_e('Continue Reading...', 'colorway'); ?><!--</a> </li>-->
                            <!-- End the Loop. -->
                        <?php endwhile;
                    else:
                        ?>
                        <li>
                            <p> <?php echo ('Sorry, no posts matched your criteria.'); ?> </p>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
            <?php inkthemes_pagination(); ?>
        </div>
    </div>
<?php //get_sidebar(); ?>
</div>
<div class="clear"></div>
<!--End Content Grid-->
</div>
<!--End Container Div-->
<?php get_footer(); ?>
