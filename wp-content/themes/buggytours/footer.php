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
                         <a href=" https://www.facebook.com/BuggyToursCostaRica" class="footer__social__link facebook" target="_blank"><i class="icon-facebook"></i></a>
                         <a href="https://www.instagram.com/buggytourscostarica" class="footer__social__link instagram" target="_blank"><i class="icon-instagram"></i></a>
                         <a href="https://www.tripadvisor.com/FAQ_Answers-g309246-d9811670-t2813425-Do_you_need_to_book_this_in_advance_or_can_you.html" class="footer__social__link tripadvisor" target="_blank"><i class="fa fa-tripadvisor"></i></a>
                         
                         
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
