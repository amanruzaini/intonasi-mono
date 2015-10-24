<?php global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) { $$value['id'] = $value['std']; } else { $$value['id'] = get_settings( $value['id'] ); }
}
?>
<!--right-col-->
		<div id="right-col">
			<!--twitter-->
				<div id="twitter_div">
					<?php if($im_twitter_username) { ?>
					<h2 class="sidebar-title">Twitter Updates</h2>
						<ul id="twitter_update_list"></ul>
					<a href="http://twitter.com/<?php echo $im_twitter_username ;?>" id="twitter-link" style="display:block;text-align:right;" title="Follow me!">follow me on Twitter</a>
					<?php } ?>
				</div>
			<!--end twitter-->
			<!--widget-->
			<ul>
			<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>
			<!-- here is content(widgets) for sidebar 1 -->
			<?php endif; ?>  
			</ul>
			<!--search form-->
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" class="field" />
			</form>
			<!--end search form-->
			<!--end widget-->
		</div>
		<!--end right-col-->	
			
	</div>
	<!--end content-->
</div>
<!--end wrapper-->
	<div class="clear"></div>
	
