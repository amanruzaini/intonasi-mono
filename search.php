

<?php get_header(); ?>

	<!--start content-->
	<div id="content">
		<!--left col-->
		<div id="left-col">
			<h2 class="pagetitle">Search Results for " <?php echo $s; ?> "</h2>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<!--post-->
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-info">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to Title"><?php the_title(); ?></a></h2>
					<span class="post-date"><?php the_time('j F Y'); ?> by <?php the_author_posts_link(); ?> &bull; <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
				</div>
				<div class="clear"></div>
			<div class="text">
				<?php the_content('') ?>
			</div>
				<div class="metadata"><a href="<?php the_permalink() ?>#more-<?php the_ID(); ?>" class="read-more">Read More</a><span class="category">&bull; Posted in - <?php the_category(', '); ?></span></div>
			</div>
			<!--end post-->
			<?php endwhile; ?>
	        <div class="navigation">
	        	<?php next_posts_link('Previous Page') ?> <span class="extralarge"><?php echo $paged; ?> of <?php echo total_pages(); ?></span> <?php previous_posts_link('Next Page') ?>
	        </div> 
	        	<?php else: ?>
				<?php include (TEMPLATEPATH . '/notfound.php'); ?>
				<?php endif; ?>
			</div>
			<!--end left-col-->
			
		<?php get_sidebar(); ?>

<?php get_footer(); ?>