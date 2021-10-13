<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<div id="js-heightControl" style="height: 0;">&nbsp;</div>
<?php $footerBg = get_field('footer_background', 'options'); ?>
<footer style = "background-image: url('<?php echo $footerBg['url']; ?>');">
	<div id = "footerOuterWrapper" class = "container">
		<div class="row">
			<div class="col-sm-12">
				<div id="footerCopy">
					<div class="wysiwyg">
						<?php the_field('footer_text', 'options'); ?>
					</div><!-- .wysiwyg -->
				</div><!-- #footerCopy -->
				<div id="footerSocial" class = "mb-5 text-center">
					<?php if (get_field('youtube', 'option')) : ?>
					<a class = "social-link youtube" rel="noreferrer" target = "_blank" href="<?php the_field('youtube', 'option') ?>"><i class="fa fa-2x fa-youtube" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">YouTube</span></a>
					<?php endif; ?>
					<?php if (get_field('facebook', 'option')) : ?>
					<a class = "social-link facebook" rel="noreferrer" target = "_blank" href="<?php the_field('facebook', 'option') ?>"><i class="fa fa-2x fa-facebook" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Facebook</span></a>
					<?php endif; ?>
					<?php if (get_field('linked_in', 'option')) : ?>
					<a class = "social-link linked_in" rel="noreferrer" target = "_blank" href="<?php the_field('linked_in', 'option') ?>"><i class="fa fa-2x fa-linkedin" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Linked In</span></a>
					<?php endif; ?>
					<?php if (get_field('instagram', 'option')) : ?>
					<a class = "social-link instagram" rel="noreferrer" target = "_blank" href="<?php the_field('instagram', 'option') ?>"><i class="fa fa-2x fa-instagram" aria-hidden="true"></i><span class = "sr-only sr-only-focusable">Instagram</span></a>
					<?php endif; ?>
				</div><!-- #footerSocial -->
				<div id="footerAttribution" class = "text-center">
					<p class = "mb-0">&copy;<?php echo date('Y') ?> Parks Superior Sales</p>
					<p><a href="/privacy-policy">Privacy Policy</a> | <a href="/terms-and-conditions">Terms</a></p>
					<div class = "small">
						POWERED BY <a target="_blank" href="https://www.designs4theweb.com">Designs 4 The Web</a>
					</div>
				</div><!-- #footerAttribution -->
			</div><!-- .col-sm-12 -->
		</div><!-- row -->
	</div><!-- .container -->
</footer>

<?php if (is_page_template('templates/homepage.php')) : ?>
	<div class="modal fade" id="aboutVideoModal" tabindex="-1" role="dialog" aria-labelledby="About Parks Superior Video" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	    <div class="modal-content">
	      <div class="modal-body">
	        <a class="modal-close" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i></a>
				<div class = "text-center embed-responsive embed-responsive-16by9">
					<?php the_field('about_video', 'option'); ?>
				</div>
				
	      </div><!-- .modal-body -->
	    </div><!-- .modal-content -->
	  </div><!-- .modal-dialog -->
	</div><!-- .modal -->
<?php endif; ?>

<?php wp_footer(); ?>

<?php if ( is_page_template('templates/homepage.php') ) { ?>
<script>
	jQuery('#heroSlider').slick({
	   slidesToShow: 1,
	   slidesToScroll: 1,
	   autoplay: true,
  	   autoplaySpeed: 5000,
  	   arrows: false,
  	   fade: true,
	   speed: 500,
	   infinite: true,
	   cssEase: 'ease-in-out',
	 });
</script>
<?php } ?>

<?php if ( is_page_template( 'templates/accessories.php' ) ) { ?>
	<script>
		jQuery('.accessory-image-gallery' ).each( function() {
			jQuery(this).slick({
				adaptiveHeight: true,
			    infinite: true,
			    dots: false,
			    fade: true,
				slidesToShow: 1,
				slidesToScroll: 1,
			    arrows: true,
			    appendArrows: jQuery(this).parents('.gallery-wrapper').find('.arrows'),
			    nextArrow: '<i class="fa fa-angle-right next-arrow text-shadow"></i>',
		  		prevArrow: '<i class="fa fa-angle-left prev-arrow text-shadow"></i>'
		  	});
		  });
	</script>
<?php } ?>

</body>

</html>