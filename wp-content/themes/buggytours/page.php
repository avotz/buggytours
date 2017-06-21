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
	  <section class="intro intro-page">
               
                    <!-- <article class="intro__content">
                        <h2 class="intro__subtitle wow fadeInLeft">Explore Buggy tours</h2>
                        <h1 class="intro__title wow fadeInRight">YOUR DREAM DESTINATION AWAITS</h1>

                    </article> -->
                     <?php if ( has_post_thumbnail() ) :

					  	 	$id = get_post_thumbnail_id($post->ID);
					  	 	$thumb_url = wp_get_attachment_image_src($id,'full', true);
					  	 	?>
					    	
							<div class="item" style="background-image: url('<?php echo $thumb_url[0] ?>');">
					  	  		
					  	  	</div>
							
						<?php else : ?>
					  	  <div class="item" style="background-image: url('<?php echo get_template_directory_uri();  ?>/img/intro.jpg');">
					  	  		
					  	  </div>
					  	 
					  	<?php endif; ?>
                   
               

             

       </section>
	 <section class="main">
        <div class="inner">
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
        
    </section>
	
<?php
/*get_sidebar();*/
get_footer();
