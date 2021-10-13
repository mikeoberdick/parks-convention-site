<?php
/**
 * Template Name: Accessories
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="accessoryDetail" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  				<?php
	  			$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
  				?>
  				<?php $hero = get_field('hero'); ?>
				<div id="hero" class = "mb-5 inset" style="background-image: url('<?php echo $image[0]; ?>')">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<h1 class = "mb-0 text-shadow"><?php echo $hero['hero_title']; ?></h1>
								<h3><?php echo $hero['hero_subtitle']; ?></h3>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</div><!-- #hero -->

				<section id="beneathHero" class = "mt-5">
					<div class="container">
						<div class="row">
							<?php while(have_rows('beneath_hero')) : the_row(); ?>
								<div class="col-sm-12">
									<div class="wysiwyg">
										<?php the_sub_field('content'); ?>
									</div><!-- .wysiwyg -->								
								</div><!-- .col-sm-12 -->
							<?php endwhile; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #beneathHero -->

				<?php if ( have_rows('accessory_detail') ) : ?>
					<div class="container mt-5">
						<div class="row">
							<?php $i = 0; ?>
				<?php while( have_rows('accessory_detail') ): the_row(); ?>
					<div class="col-sm-12 accessory-section mt-5">
						<div class="row">
							<div class="col-md-6">
								<h3 class = "mb-3"><?php the_sub_field('header'); ?></h3>
								<p><?php the_sub_field('copy'); ?></p>
							</div><!-- .col-md-6 -->
							<div class="col-md-6">
								<?php if (get_sub_field('image_gallery_header')) : ?>
								<h3 class = "mb-3 gold"><?php the_sub_field('image_gallery_header'); ?></h3>
								<?php endif; ?>
								<?php $images = get_sub_field('image_gallery'); $count = count($images); ?>
								<?php if ( $count > 1 ) { ?>
									<div class="gallery-wrapper position-relative">
								<div id="gallery-<?php echo $i; ?>" class = "accessory-image-gallery">
				        			<?php foreach( $images as $image ): ?>
				                		<div class = "slide">
				                    		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
				                		</div>
				            		<?php endforeach; ?>
				            	</div><!-- .accessory-image-gallery -->
				            	<div class="arrows"></div>
				            </div><!-- .gallery-wrapper -->
							<?php } else { ?>
			        			<?php foreach( $images as $image ): ?>
			                    		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			                    		<p class = 'image-caption'><?php echo esc_html($image['caption']); ?></p>
			            		<?php endforeach; ?>
							<?php } ?>
							</div><!-- .col-md-6 -->
							<hr>
						</div><!-- .row -->
					</div><!-- .col-sm-12 -->
					<?php $i++; ?>
				<?php endwhile; ?>
			</div><!-- .row -->
		</div><!-- .container -->
	<?php endif; ?>

	<?php get_template_part( 'snippets/contact-box'); ?>

	<div class = "text-center pb-5">
		<a href="/" class="d-inline-flex justify-content-end align-items-center">
			<i class="fa fa-3x fa-chevron-left mr-4" aria-hidden="true"></i><h1 class="gold mb-0">Back to Homepage</h1>
		</a>	
	</div>
			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #accessoryDetail -->
<?php get_footer(); ?>