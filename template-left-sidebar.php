<?php 
/**
 * Template Name: Left Sidebar
 *
 * @package washington
 * @subpackage washington
 */
get_header(); ?>
    <main class="ride-sidebar-page">
        <section>
            <div class="container-fluid">
                <div class="row">
                    <?php get_sidebar(); ?>
                    <div class="col-md-9 col-sm-8 col-xs-12 <?php if(!is_front_page()) echo "margin-top-60"; ?>">
                        <?php
                        while ( have_posts() ) : the_post();

                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php

get_footer();