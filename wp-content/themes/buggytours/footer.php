<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package buggytours
 */

?>

	 <footer class="footer">
            <div class="footer__top">
                
                    <?php wp_nav_menu( array(
			             'theme_location' => 'footer',
			             'menu_id' => 'footer-menu',
			             'container'       => 'nav',
			            'container_class' => 'footer__menu',
			            'container_id'    => '',
			            'menu_class'      => 'footer__menu__ul',
			              ) 
			          ); 
			          ?>
                
            </div>
            <div class="footer__bottom">
                <div class="inner">
                <div class="footer__social">
                         <a href="#" class="footer__social__link facebook"><i class="icon-facebook"></i></a>
                         <a href="#" class="footer__social__link twitter"><i class="icon-twitter"></i></a>
                         <a href="#" class="footer__social__link google"><i class="icon-google-plus"></i></a>
                         <a href="#" class="footer__social__link youtube"><i class="icon-youtube"></i></a>
                         <a href="#" class="footer__social__link pinterest"><i class="icon-pinterest-p"></i></a>
                         
                    </div>
                     
                    <div class="footer__logo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer__logo__link" title="Rental Bikes Costa Rica">Buggy Tours Costa Rica</a>
                         <span> (506) 2672 1248 -  (506) 8833 1410</span>
                    </div>
                    
                    
                    <div class="footer__copyright">
                        <p>Website by <a href="http://avotz.com"><i class="icon-avotz"></i></a></p>
                        <span>Copyright &copy; <?php echo date('Y'); ?></span>
                    </div>
                   
                   
                </div>
            </div>
            
        </footer>
        <div id="tour-popup" class="request-popup white-popup mfp-hide mfp-with-anim">
        
         <?php  echo do_shortcode('[contact-form-7 id="50" title="Book Tour"]') ;?>
              
        
    </div>
<?php wp_footer(); ?>

</body>
</html>
