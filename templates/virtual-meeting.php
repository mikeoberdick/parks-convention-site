<?php
/**
 * Template Name: Virtual Meeting
 * @package understrap
**/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header(); ?>

<div id="virtualChat" class = "page-wrapper">
	<div id="content" tabindex="-1">
		<main class="site-main" id="main">
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

				<section id="headerTitle" class = "mt-5 mb-3">
					<div class="container">
						<div class="row">
							<div class="col-sm-12 text-center">
								<?php $header = get_field('header'); ?>
								<h1 class="black mb-0"><?php echo $header['top']; ?></h1>
								<h1><?php echo $header['bottom']; ?></h1>
								<p class = "text-uppercase"><?php echo $header['copy']; ?></p>
							</div><!-- .col-sm-12 -->
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #headerTitle -->

				<section id="teamMembers" class = "mb-5">
					<div class="container">
						<div class="row">
							<?php while(have_rows('team_member')) : the_row(); ?>
								<div class="col-md-4 team-member">
									<div class="inner-container">
										<?php $img = get_sub_field('picture'); ?>
										<img class = "mb-3" src = "<?php echo $img['url']; ?>" alt="<?php echo $img['alt']; ?>">
										<h5 class="name gold"><?php the_sub_field('name'); ?></h5>
										<p class="small font-weight-bold text-uppercase"><?php the_sub_field('coverage_areas'); ?></p>
										<div class="consolto-links">
											<?php if( get_sub_field('video_conference_link') ): ?>
												<a target = "_blank" href="<?php the_sub_field('video_conference_link'); ?>">
													<i class="fa fa-video-camera" aria-hidden="true"></i>
												<span>Video</span>
											</a>
											<?php endif; ?>
											<?php if( get_sub_field('chat_link') ): ?>
												<a target = "_blank" href="<?php the_sub_field('chat_link'); ?>">
													<i class="fa fa-comments-o" aria-hidden="true"></i>
												<span>Chat</span>
											</a>
											<?php endif; ?>
											<?php if( get_sub_field('call_link') ): ?>
												<a target = "_blank" href="<?php the_sub_field('call_link'); ?>">
													<i class="fa fa-phone" aria-hidden="true"></i>
												<span>Call</span>
											</a>
											<?php endif; ?>
											<?php if( get_sub_field('schedule_link') ): ?>
												<a target = "_blank" href="<?php the_sub_field('schedule_link'); ?>">
													<i class="fa fa-calendar" aria-hidden="true"></i>
												<span>Schedule</span>
											</a>
											<?php endif; ?>
										</div><!-- .links -->
									</div><!-- .inner-container -->
								</div><!-- .col-md-4 -->
							<?php endwhile; ?>
						</div><!-- .row -->
					</div><!-- .container -->
				</section><!-- #teamMembers -->

			</article><!-- #post-## -->
		</main><!-- #main -->
	</div><!-- #content -->
</div><!-- #virtualChat -->
<?php get_footer(); ?>