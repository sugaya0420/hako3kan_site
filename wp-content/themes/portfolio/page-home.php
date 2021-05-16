<?php
/**
Template Name: Home Page
 *
 * @package portfolio
 */

get_header('home'); ?>


    <section id="home-hero" class="hero-bg" style="background: url('<?php echo get_theme_mod( 'home_bg_image' ); ?>') 50% 0 no-repeat;" data-speed="8" data-type="background"> 

    <?php if( get_theme_mod( 'active_intro' ) == '') : ?>

        <div class="hero-container">
            <div class="hero-text">
                <?php if ( get_theme_mod( 'intro_text' ) ) : ?>
                    <h2><?php echo get_theme_mod( 'intro_text' ); ?></h2>
                <?php endif; ?>

                <?php if ( get_theme_mod( 'intro_textbox' ) ) : ?>
                    <h3><?php echo get_theme_mod( 'intro_textbox' ); ?></h3>
                <?php endif; ?>
            </div><!-- hero-text -->
        </div><!-- hero-container -->

    <?php else : ?>
    <?php endif; ?>
    <?php // end if ?>

    </section><!-- home-hero -->

    <section id="home-stickies">

        <div class="top-section">
            <div class="top-left">

                <?php
                // Allow post types to be filtered
                $posttypes = apply_filters(
                    'modernthemes_portfolio_posttypes',
                    array(
                        'post',
                        'work'
                    )
                );
                $args = array(
                    'post_type' => $posttypes,
                    'meta_key' => '_wk_work_checkbox',
                    'posts_per_page' => 11,
                    'fields' => 'ids'
                );
                $myposts = get_posts( $args ); ?>

                <?php if ( $myposts[0] ) { ?>

                <div class="square-box large-square top-left-square-large">
                    <div class="square-content sq-1">
                        <div>
                            <span>
                                <a href="<?php echo get_permalink($myposts[0]); ?>">
                                    <figure class="effect-chico">
                                        <?php echo get_the_post_thumbnail($myposts[0], 'large-square'); ?>
                                        <figcaption>
                                            <p><?php echo get_the_title($myposts[0]); ?></p>
                                        </figcaption>
                                    </figure><!-- effect-chico -->
                                </a>
                            </span>
                        </div>
                    </div>
                </div><!-- square-box -->

                <?php }
                if ( $myposts[1] ) { ?>

                <div class="square-box top-left-square">
                    <div class="square-content sq-2">
                        <div>
                            <span>
                                <a href="<?php echo get_permalink($myposts[1]); ?>">
                                    <figure class="effect-chico">
                                        <?php echo get_the_post_thumbnail($myposts[1], 'small-square'); ?>
                                        <figcaption>
                                            <p><?php echo get_the_title($myposts[1]); ?></p>
                                        </figcaption>
                                    </figure><!-- effect-chico -->
                                </a>
                            </span>
                        </div>
                    </div>
                </div><!-- square-box -->

                <?php }
                if ( $myposts[2] ) { ?>

                <div class="square-box top-left-square">
                    <div class="square-content sq-3">
                        <div>
                            <span>
                                <a href="<?php echo get_permalink($myposts[2]); ?>">
                                    <figure class="effect-chico">
                                        <?php echo get_the_post_thumbnail($myposts[2], 'small-square'); ?>
                                        <figcaption>
                                            <p><?php echo get_the_title($myposts[2]); ?></p>
                                        </figcaption>
                                    </figure><!-- effect-chico -->
                                </a>
                            </span>
                        </div>
                    </div>
                </div><!-- square-box -->

                <?php }
                if ( $myposts[5] ) { ?>

                <div class="square-box large-square top-bottom-left-square">
                    <div class="square-content sq-4">
                        <div>
                            <span>
                                <a href="<?php echo get_permalink($myposts[5]); ?>">
                                    <figure class="effect-chico">
                                        <?php echo get_the_post_thumbnail($myposts[5], 'large-square'); ?>
                                        <figcaption>
                                            <p><?php echo get_the_title($myposts[5]); ?></p>
                                        </figcaption>
                                    </figure><!-- effect-chico -->
                                </a>
                            </span>
                        </div>
                    </div>
                </div><!-- square-box -->

                <?php }
                if ( $myposts[4] ) { ?>

                <div class="square-box">
                    <div class="square-content sq-5">
                        <div>
                            <span>
                                <a href="<?php echo get_permalink($myposts[4]); ?>">
                                    <figure class="effect-chico">
                                        <?php echo get_the_post_thumbnail($myposts[4], 'small-square'); ?>
                                        <figcaption>
                                            <p><?php echo get_the_title($myposts[4]); ?></p>
                                        </figcaption>
                                    </figure><!-- effect-chico -->
                                </a>
                            </span>
                        </div>
                    </div>
                </div><!-- square-box -->

                <?php } ?>

            </div><!-- top-left -->

            <div class="top-right">

                <div class="square-box full-square top-right-square">
                    <?php if ( get_theme_mod( 'description_textbox' ) ) : ?>
                        <div class="square-content sq-6 site-description-square">
                            <div>
                                <span>
                                    <?php echo get_theme_mod( 'description_textbox' ); ?>
                                </span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div><!-- square-box -->

                <?php
                if ( $myposts[3] ) { ?>

                <div class="square-box full-square top-bottom-right-square">
                    <div class="square-content sq-7">
                        <div>
                            <span>
                                <a href="<?php echo get_permalink($myposts[3]); ?>">
                                    <figure class="effect-chico">
                                        <?php echo get_the_post_thumbnail($myposts[3], 'large-square'); ?>
                                        <figcaption>
                                            <p><?php echo get_the_title($myposts[3]); ?></p>
                                        </figcaption>
                                    </figure>
                                </a>
                            </span>
                        </div>
                    </div>
                </div><!-- square-box -->

                <?php } ?>

            </div><!-- top-right -->
        </div><!-- top-section -->

        <div class="bottom">

            <?php
            if ( $myposts[6] ) { ?>

            <div class="square-box bottom-square">
                <div class="square-content sq-8">
                    <div>
                        <span>
                            <a href="<?php echo get_permalink($myposts[6]); ?>">
                                <figure class="effect-chico">
                                    <?php echo get_the_post_thumbnail($myposts[6], 'small-square'); ?>
                                    <figcaption>
                                        <p><?php echo get_the_title($myposts[6]); ?></p>
                                    </figcaption>
                                </figure><!-- effect-chico -->
                            </a>
                        </span>
                    </div>
                </div><!-- square-content -->
            </div><!-- square-box -->

            <?php }
            if ( $myposts[7] ) { ?>

            <div class="square-box bottom-square">
                <div class="square-content sq-9">
                    <div>
                        <span>
                            <a href="<?php echo get_permalink($myposts[7]); ?>">
                                <figure class="effect-chico">
                                    <?php echo get_the_post_thumbnail($myposts[7], 'small-square'); ?>
                                    <figcaption>
                                        <p><?php echo get_the_title($myposts[7]); ?></p>
                                    </figcaption>
                                </figure><!-- effect-chico -->
                            </a>
                        </span>
                    </div>
                </div><!-- square-content -->
            </div><!-- square-box -->

            <?php }
            if ( $myposts[8] ) { ?>

            <div class="square-box bottom-square">
                <div class="square-content sq-10">
                    <div>
                        <span>
                            <a href="<?php echo get_permalink($myposts[8]); ?>">
                                <figure class="effect-chico">
                                    <?php echo get_the_post_thumbnail($myposts[8], 'small-square'); ?>
                                    <figcaption>
                                        <p><?php echo get_the_title($myposts[8]); ?></p>
                                    </figcaption>
                                </figure><!-- effect-chico -->
                            </a>
                        </span>
                    </div>
                </div><!-- square-content -->
            </div><!-- square-box -->

            <?php }
            if ( $myposts[9] ) { ?>

            <div class="square-box bottom-square">
                <div class="square-content sq-11">
                    <div>
                        <span>
                            <a href="<?php echo get_permalink($myposts[9]); ?>">
                                <figure class="effect-chico">
                                    <?php echo get_the_post_thumbnail($myposts[9], 'small-square'); ?>
                                    <figcaption>
                                        <p><?php echo get_the_title($myposts[9]); ?></p>
                                    </figcaption>
                                </figure><!-- effect-chico -->
                            </a>
                        </span>
                    </div>
                </div><!-- square-content -->
            </div><!-- square-box -->

            <?php }
            if ( $myposts[10] ) { ?>

            <div class="square-box bottom-square">
                <div class="square-content sq-12">
                    <div>
                        <span>
                            <a href="<?php echo get_permalink($myposts[10]); ?>">
                                <figure class="effect-chico">
                                    <?php echo get_the_post_thumbnail($myposts[10], 'small-square'); ?>
                                    <figcaption>
                                        <p><?php echo get_the_title($myposts[10]); ?></p>
                                    </figcaption>
                                </figure><!-- effect-chico -->
                            </a>
                        </span>
                    </div>
                </div><!-- square-content -->
            </div><!-- square-box -->

            <?php } ?>

        </div><!-- bottom -->

    </section><!-- home-stickies -->


<?php get_footer(); ?>
