<?php /* Template Name: Inventory */ 

//Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

 get_header(); ?>

<div id="content" class = "page-wrapper" tabindex="-1">
	<main id="main" class="site-main">
		<article <?php post_class(); ?> id="inventory">
			<?php $hero = get_field('hero'); ?>
			<div id="hero" class = "inset" style = "background: url('<?php echo $hero['background']['url']; ?>');" >
				<div class="content-container p-3 text-center">
					<h1 class = "mb-3 text-shadow"><?php echo $hero['header']; ?></h1>
					<h3 class = "text-shadow mb-0"><?php echo $hero['subheader']; ?></h3>
				</div><!-- .content-container -->
				
			</div><!-- #hero -->
			<div id="cars" class="container mb-5">
					<div class="row">
					<?php $args = array(  
				        'post_type' => 'car',
				        'post_status' => 'publish',
				        'posts_per_page' => -1, 
	    				'orderby' => 'title', 
	    				'order' => 'DESC',
	    				'meta_key' => 'flag',
	    				'meta_value' => 'New'
					);

					$loop = new WP_Query( $args ); $i = 1;
					while ( $loop->have_posts() ) : $loop->the_post(); ?>

					<?php $status = strtolower(get_field('new-preowned'));
					if ( !empty($status) ) {
    					$status = preg_replace("/[^a-z0-9_\s-]/", "", $status);
    					$status = preg_replace("/[\s-]+/", " ", $status);
    					$status = ' ' . preg_replace("/[\s_]/", "_", $status);
					} else {
						$status = '';
					}
					
					$year = strtolower(get_field('year'));
					if ( !empty($year) ) {
    					$year = preg_replace("/[^a-z0-9_\s-]/", "", $year);
    					$year = preg_replace("/[\s-]+/", " ", $year);
    					$year = ' ' . preg_replace("/[\s_]/", "_", $year);
    				} else {
    					$year = '';
    				}
					
					$make = strtolower(get_field('coachbuilder'));
					if ( !empty($make) ) {
					$make = preg_replace("/[^a-z0-9_\s-]/", "", $make);
					$make = preg_replace("/[\s-]+/", " ", $make);
					$make = ' ' . preg_replace("/[\s_]/", "_", $make);
    				} else {
    					$make = '';
    				}
					
					$model = strtolower(get_field('model'));
					if ( !empty($model) ) {
					$model = preg_replace("/[^a-z0-9_\s-]/", "", $model);
					$model = preg_replace("/[\s-]+/", " ", $model);
					$model = ' ' . preg_replace("/[\s_]/", "_", $model);
					} else {
    					$model = '';
    				}

    				$body = strtolower(get_field('body'));
					if ( !empty($body) ) {
					$body = preg_replace("/[^a-z0-9_\s-]/", "", $body);
					$body = preg_replace("/[\s-]+/", " ", $body);
					$body = ' ' . preg_replace("/[\s_]/", "_", $body);
					} else {
    					$body = '';
    				}
					
					$price = get_field('price');
					if ( is_numeric($price) && !empty($price) ) {
						$price = number_format($price);
						$price = strtolower($price);
    					$price = preg_replace("/[^a-z0-9_\s-]/", "", $price);
    					$price = preg_replace("/[\s-]+/", " ", $price);
    					$price = ' ' . preg_replace("/[\s_]/", "_", $price);
					} else {
						$price = ' call_for_pricing';
					}
    					
					$flag = get_field('flag');
					//May need to add an additional condition to make it if it's not empty and it's equal to 'auction'
					if (!empty($flag)) {
						$flag = strtolower(get_field('flag'));
						$flag = preg_replace("/[^a-z0-9_\s-]/", "", $flag);
					$flag = preg_replace("/[\s-]+/", " ", $flag);
					$flag = ' ' . preg_replace("/[\s_]/", "_", $flag);
					} else {
						$flag = '';
					}
					?>

					<?php //grab variables to use for sorting
					$vars = $status . $year . $make . $model . $price . $flag . $body;
					?>

					<div class = "col-md-6 col-lg-4 car mb-3 all<?php echo $vars; ?> mix">					
						<?php get_template_part( 'snippets/car'); ?>
					</div><!-- .col-md-6 -->

					<?php endwhile; wp_reset_postdata(); ?>
				</div><!-- .row -->
				</div><!-- .container -->
		</article><!-- #inventory -->
	</main><!-- #main -->
</div><!-- #content -->

<?php get_footer(); ?>