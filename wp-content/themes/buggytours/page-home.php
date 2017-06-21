<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package buggytours
 */

get_header(); ?>

	 <section class="intro">
                <div class="inner">
                    <article class="intro__content">
                        <h2 class="intro__subtitle wow fadeInLeft">Explore Buggy tours</h2>
                        <h1 class="intro__title wow fadeInRight">YOUR DREAM DESTINATION AWAITS</h1>

                        <div class="intro__cuadro fusia wow fadeInDown">
                            <span class="intro__cuadro__subtitle">Explore</span>
                            <h2 class="intro__cuadro__title">Tours</h2>
                            <a href="<?php echo esc_url( home_url( '/tours' ) ); ?>" class="intro__cuadro__link"></a>
                            
                        </div>
                         <div class="intro__cuadro celeste  wow fadeInDown">
                            <span class="intro__cuadro__subtitle">Rental</span>
                            <h2 class="intro__cuadro__title">Buggy</h2>
                            <a href="#" class="intro__cuadro__link"></a>
                           
                        </div>
                        
                    </article>
                   
                </div>
                <div class="intro__video">
                   <video preload="" autobuffer="" loop="loop" autoplay="autoplay"><source src="<?php echo get_template_directory_uri();  ?>/img/home.mp4" type="video/mp4"></video>
                </div>
                
                
            </section>
        <section id="tours" class="tours">
            
            <div class="tours__text">
                <?php rewind_posts(); ?>
                        <?php query_posts( 'post_type=page&page_id=7' ); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                     <h1 class="tours__title"><?php the_title( );?></h1>
                                    <div class="tours__content">
                                      
                                        <?php the_excerpt(); ?>

                                    </div>
                                   

                             <?php endwhile; ?>
                            <!-- post navigation -->
                          
                        <?php endif; ?>
               

            </div>
            <div class="tours__imgs">

                <div class="cycle-slideshow" 
                            data-cycle-fx="scrollHorz"
                            data-cycle-timeout="0"
                            data-cycle-slides=".tours__imgs__slide"
                            >
                            
                            <div class="cycle-pager tours__imgs__pager"></div>
                            <div class="cycle-prev"><i class="icon-angle-left"></i></div>
                            <div class="cycle-next"><i class="icon-angle-right"></i></div>

                            <div class="tours__imgs__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/home-tours1.jpg');">
                                <h2 class="tours__imgs__slide__title ">Amateur</h2>
                                <a href="#" class="tours__imgs__slide__link verde">View Tours</a>
                            </div>
                            <div class="tours__imgs__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/home-tours2.jpg');">
                                <h2 class="tours__imgs__slide__title ">Medium</h2>
                                <a href="#" class="tours__imgs__slide__link celeste">View Tours</a>
                            </div>
                            <div class="tours__imgs__slide" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/home-tours3.jpg');">
                                <h2 class="tours__imgs__slide__title ">Pro</h2>
                                 <a href="#" class="tours__imgs__slide__link naranja">View Tours</a>
                            </div>
                           
                            
                            
                        </div>          
            </div>
        </section>
        <section class="buggy">
            <?php rewind_posts(); ?>
                        <?php query_posts( 'post_type=page&page_id=34' ); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                            <div class="inner">
                                <h1 class="buggy__title"><?php the_title( );?></h1>
                                <div class="buggy__content">
                                     <?php the_excerpt(); ?>

                                </div>
                                <a href="<?php echo esc_url( home_url( '/buggy' ) ); ?>" class="buggy__link">View Collection</a>
                            </div>
                            

                             <?php endwhile; ?>
                            <!-- post navigation -->
                          
                        <?php endif; ?>

            
        </section>
         <section class="about">
            <div class="about__text">
                 <?php rewind_posts(); ?>
                        <?php query_posts( 'post_type=page&page_id=5' ); ?>
                        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                                     <h1 class="about__title"><?php the_title( );?></h1>
                                    <div class="about__content">
                                      
                                        <?php the_excerpt(); ?>

                                    </div>
                                   

                             <?php endwhile; ?>
                            <!-- post navigation -->
                          
                        <?php endif; ?>
                            
               
            </div>
            <div class="about__img">

                <div class="about__img__container" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/about.jpg');"></div>
                 <a href="<?php echo esc_url( home_url( '/about-us' ) ); ?>" class="about__link">Meet the team</a>                 
            </div>
        </section>
<?php

get_footer();
