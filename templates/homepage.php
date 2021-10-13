<?php /* Template Name: Homepage */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<article <?php post_class(); ?> id="homepage">
			<section id="hero">
				<div id = "sliderOuterWrapper" class="container-fluid">
					<div class="row">
						<div class="col-sm-12 px-0">
							<div id="heroSlider">
		        				<?php while(have_rows('hero')) : the_row(); ?>
		        					<?php $overlay = get_sub_field('overlay_option'); ?>
		        					<?php while(have_rows('slide')) : the_row(); ?>
		        						<?php $image = get_sub_field('background_image'); ?>
		        						<div class="image-slide<?php if ($overlay == 'on') {echo ' inset';} ?>" style = "background-image: url('<?php echo $image['url']; ?>'); ">
		        							<div class="hero-content">
		        								<h3 class = "text-shadow"><?php the_sub_field('header'); ?></h3>
		        							</div><!-- .hero-content -->
							    	</div><!-- .image-slide -->
		        					<?php endwhile; ?>
		        				<?php endwhile; ?>
							</div><!-- #heroSlider -->
						</div><!-- .col-sm-12 px-0 -->
					</div><!-- .row -->
				</div><!-- #sliderOuterWrapper -->
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="content-wrapper">
								<h1 class = "h3"><?php echo $hero['header']; ?></h1>
							</div><!-- .content-wrapper -->
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #hero -->

			<section id="beneathHeroHeader">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<h1 class="h3"><?php the_field('header_beneath_hero'); ?></h1>
						</div><!-- .col-sm-12 -->
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #beneathHeroHeader -->
			
			<section id="buckets" class = "mt-5">
				<div class="container">
					<div class="row">
						<?php while(have_rows('buckets')) : the_row(); ?>
							<div class="col-lg-4">
								<?php $image = get_sub_field('background_image'); ?>
								<div class="inner-container" style = "background-image: url('<?php echo $image['url']; ?>');">
									<div class="bucket-copy">
										<h5 class = "mb-0"><?php the_sub_field('header_top'); ?></h5>
										<h3 class = "font-weight-bold mb-0"><?php the_sub_field('header_bottom'); ?></h3>
										<hr>
										<a href = "<?php the_sub_field('link'); ?>"><button role = "button" class = "btn white-outline-button">View</button></a>
									</div><!-- .bucket-copy -->
								</div><!-- .inner-container -->
							</div><!-- .col-lg-4 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #buckets -->

			<section id="aboutParks" class = "my-5">
				<div class="container">
					<div id = "aboutWrapper" class="row">
						<?php while(have_rows('about_section')) : the_row(); ?>
							<div class="col-lg-6">
								<div class = "text-center embed-responsive embed-responsive-16by9 mb-3 mb-lg-0">
									<?php the_field('about_video', 'option'); ?>
								</div>							
							</div><!-- .col-lg-6 -->
							<div class="col-lg-6">
								<div class="wysiwyg">
									<?php the_sub_field('content'); ?>
									<?php $img = get_sub_field('image'); ?>
							<img class = "d-block mx-auto" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
								</div><!-- .wysiwyg -->
							</div><!-- .col-lg-6 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #aboutParks -->

			<section id="beneathHero" class = "d-none">
				<div class="container">
					<div class="row">
						<?php while(have_rows('below_slider_section')) : the_row(); ?>
						<div class="col-md-8">
							<div class="wysiwyg">
								<?php the_sub_field('content'); ?>
							</div><!-- .wysiwyg -->								
						</div><!-- .col-md-8 -->
						<?php $imageOrVideo = get_sub_field('image_or_video'); ?>
						<div class="col-md-4 d-flex align-items-center">
							<?php if ($imageOrVideo == 'image') { ?>
								<?php $img = get_sub_field('image'); ?>
								<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
							<?php } else { ?>
								<?php $video = get_sub_field('video'); ?>
								<video controls>
								  <source src="<?php echo $video['url']; ?>" />
								</video>
							<?php } ?>
						</div><!-- .col-md-4 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #beneathHero -->

			<section id="shopLinks" class="my-5">
				<div class="container">
					<div class="row">
						<?php while(have_rows('shop_links')) : the_row(); ?>
							<div class="col-lg-6 shop-link">
								<div class="inner-container">
									<div class="image">
										<?php $img = get_sub_field('image'); ?>
										<img src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
									</div><!-- .image -->
									<div class="title-and-button d-flex flex-column">
										<h4 class="mb-0 black">
											<?php the_sub_field('header_top_text'); ?>
										</h4><!-- .font-weight-bold mb-0 -->
										<h4 class = "font-weight-bold mb-0 black"><?php the_sub_field('header_bottom_text'); ?></h4>
										<a class = "mt-auto" href = "<?php the_sub_field('button_link'); ?>"><button role = "button" class = "btn gold-button"><?php the_sub_field('button_text'); ?></button></a>
									</div><!-- .title-and-button -->
								</div><!-- .inner-container -->
							</div><!-- .col-lg-6 -->
						<?php endwhile; ?>
					</div><!-- .row -->
				</div><!-- .container -->
			</section><!-- #shopLinks.mt-5 -->
			
		</article><!-- #homepage -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>