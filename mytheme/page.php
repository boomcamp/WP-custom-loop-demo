<?php get_header(); ?>
<div id="ttr_main" class="row">
<div id="ttr_content" class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="row">

		<?php 
		 
		 global $post;

		 if(is_page('Mentors Page')) {

		 	echo "<h1>Here's the post of ".$post->post_title." page</h1>";
		 	echo '<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">';
		 	echo do_shortcode('[display-shortcode terms="mentor-slug" posts_per_page="2"]');
		 	echo '</div>';

		 } else {

		?>
			<!-- Default wordpress loop -->
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<?php the_post_thumbnail();?>
					<h1><?php the_title(); ?></h1>
					<h4>Posted on <?php the_time('F jS, Y') ?></h4>
					<p><?php the_content(__('(more...)')); ?></p>
				</div>
			<?php endwhile; else: ?>
				<p><?php _e('Sorry, no posts matched'); ?></p>
			<?php endif;  ?>
			<!-- End Default loop -->

		<?php 
		 }
		?>

	</div>
</div>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>
