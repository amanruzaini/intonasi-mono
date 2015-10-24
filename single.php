<?php get_header(); ?>
	
<!--start content-->
	<div id="content">
		<!--left col-->
		<div id="left-col">
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
					<?php edit_post_link("Edit this post"); ?>
				</div>
			</div>
 		
					<div class="category-tags">
 					<p>&bull; Posted <span>in</span> : <?php the_category(', ') ?> </p> 
 		  			<span class="tags"><p><?php the_tags( 'Tags: ', ', ', ''); ?></p></span>
				</div>
 			<div id="comments">
 				<?php comments_template(); ?>
 			</div>
		<?php endwhile; ?>
			<?php else: ?>
			<?php include (TEMPLATEPATH . '/notfound.php'); ?>		
			<?php endif; ?>
		
	</div><!-- end of content -->	
	<?php get_sidebar(); ?>
	<div class="clear"></div>
</div><!-- end of boxer -->
<?php get_footer(); ?>