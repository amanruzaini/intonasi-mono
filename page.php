<?php get_header(); ?>
	
	<!--start content-->
	<div id="content">
		
		<!--left col-->
		<div id="left-col">
			
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
				<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-info">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to Title"><?php the_title(); ?></a></h2>
				</div>
				<div class="clear"></div>
			<div class="text">
				<?php the_content('') ?>
			</div>
			
			</div>
			<!--end post-->
			<?php endwhile; ?>
			<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
			
			<?php else: ?>
			<?php include (TEMPLATEPATH . '/notfound.php'); ?>		
			<?php endif; ?>	
		</div>
		<!--end left-col-->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>	
