<?php get_header(); ?>

	<!--start content-->
	<div id="content">
		<!--left col-->
		<div id="left-col">
			
			<?php if(have_posts()) : ?>
 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
			<?php /* If this is a category archive */ if (is_category()) { ?>				
			<h2 class="pagetitle">Category: <?php echo single_cat_title(); ?></h2>
			<?php /* If this is a tag archive */ } elseif (is_tag()) { ?>
			<h2 class="pagetitle">Archive for the '<?php single_tag_title(); ?>' tag</h2>
			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
			<h2 class="pagetitle">Archive for <?php the_time('F jS, Y'); ?></h2>
			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
			<h2 class="pagetitle">Archive for <?php the_time('F Y'); ?></h2>
			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
			<h2 class="pagetitle">Archive for <?php the_time('Y'); ?></h2>
			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
			<h2 class="pagetitle">Author archives</h2>
			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h2 class="pagetitle">Blog Archives</h2>			
		<?php } ?>

		<?php while(have_posts()) : the_post(); ?>
			
			<!--post-->
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-info">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to Title"><?php the_title(); ?></a></h2>
					<span class="post-date"><?php the_time('j F Y'); ?> by <?php the_author_posts_link(); ?> &bull; <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></span>
				</div>
				<div class="clear"></div>
			<div class="text">
				<?php the_excerpt('&raquo; Read the rest of the entry.. ') ?> 
			</div>
				</div>
			<!--end post-->
			<?php endwhile; ?>
	        <div class="navigation">
	        	<div class="alignleft"><?php posts_nav_link('','','&laquo; Previous Entries') ?></div>
	        	<div class="alignright"><?php posts_nav_link('','Next Entries &raquo;','') ?></div>
	        </div> 
			<?php else: ?>
			<?php include (TEMPLATEPATH . '/notfound.php'); ?>		
			<?php endif; ?>	
		</div>
		<!--end left-col-->

	<?php get_sidebar(); ?>

<?php get_footer(); ?>