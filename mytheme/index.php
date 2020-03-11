<!-- https://vegibit.com/the-top-100-most-commonly-used-wordpress-functions/  -->
<?php get_header(); ?>
<div id="ttr_main" class="row">
<div id="ttr_content" class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="row">
		<?php $query_mentors = new WP_Query( 'category_name=mentors' );?>
		<?php if ($query_mentors->have_posts()) : while ($query_mentors->have_posts()) : $query_mentors->the_post(); ?>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<?php the_post_thumbnail();?>
				<h1><?php the_title(); ?></h1>
				<h4>Posted on <?php the_time('F jS, Y') ?></h4>
				<p><?php the_content(__('(more...)')); ?></p>
			</div>
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched for mentors category.'); ?></p>
		<?php endif; ?>
	</div>
</div>
<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>