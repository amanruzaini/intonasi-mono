<?php global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<!--start footer-->
	<div id="footer">
		<div id="fcontent">
			<div class="about">
				<h2 class="title">About <?php if ($im_name_first) { ?><?php echo $im_name_first; ?><?php } ?></h2>
				<p><?php if ($im_self_desc) { ?><?php echo $im_self_desc; ?><?php } ?></p>
					
				<div class="social-net">
					<h2 class="title">Social Networking</h2>
					<ul>
						<?php if ($im_social_facebook) { ?><li class="facebook"><a href="<?php echo $im_social_facebook; ?>">Facebook</a></li><?php } ?>
						<?php if ($im_social_twitter) { ?><li class="twitter"><a href="<?php echo $im_social_twitter; ?>">Twitter</a></li><?php } ?>
						<?php if ($im_social_lastfm) { ?><li class="last"><a href="<?php echo $im_social_lastfm; ?>">Last.fm</a></li><?php } ?>
						<?php if ($im_social_flickr) { ?><li class="flickr"><a href="<?php echo $im_social_flickr; ?>">Flickr</a></li><?php } ?>
					</ul>
				</div>
			</div>
			
			<div class="posts">
				<h2 class="title">Recent Posts</h2>
				<ul>
					<?php query_posts('showposts=5'); ?>
			        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			        <li><a href="<?php the_permalink() ?>"><?php the_title() ?></a><br />
			        <em><?php the_time('F jS Y') ?></em>
			        </li>
			        <?php endwhile; endif; ?>
				</ul>
			</div>
			
			<div class="comments">
				<h2 class="title">Recent Comments</h2>
				<ul>
					<?php im_recent_comments(); ?>
				</ul>
			</div>
		</div>
		
		<div class="clear"></div>
		
		<div id="info-footer">
			<div id="ifcontent">
			<div class="powered">
				<ul>
					<li>Powered by <a href="http://wordpress.org">Wordpress</a></li>
					<li>Intonasi Mono by <a href="http://amanruzaini.com/blog">Aman Ruzaini</a></li>
				</ul>
			</div>
			
			<div class="nav-links">
				<ul>
					<li><a href="#">&#x21E7; Back to Top</a></li>
					<li>&bull;</li>
					<?php wp_list_pages('depth=1&sort_order=desc&title_li='); ?>
				</ul>
			</div>

			</div>
		</div>
		
	</div>
	<!--end footer-->
	<?php if ($im_twitter_username) { ?>
		<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
		<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/<?php echo $im_twitter_username; ?>.json?callback=twitterCallback2&amp;count=5"></script>
	<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
