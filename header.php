<?php $im_name_first = stripslashes(get_option('im_name_first')); $im_social_facebook = stripslashes(get_option('im_social_facebook')); $im_social_flickr = stripslashes(get_option('im_social_flickr')); $im_social_lastfm = stripslashes(get_option('im_social_lastfm')); $im_social_twitter = stripslashes(get_option('im_social_twitter')); $im_notwitter = stripslashes(get_option('$im_notwitter')); $im_twitter = stripslashes(get_option('$im_twitter')); $im_twitter_username = stripslashes(get_option('$im_twitter_username')); ?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php if ( is_home() ) { ?><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?><?php } else { ?><?php wp_title($sep = ''); ?> - <?php bloginfo('name'); ?><?php } ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />

<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />

<link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_get_archives('type=monthly&format=link'); ?>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<!--[if lte IE 6]>

<link rel="stylesheet" media="all" type="text/css" href="<?php bloginfo('template_url'); ?>/ie.css" />

<![endif]-->

<?php wp_head(); ?>

</head>

<body>

<div id="wrapper">



	<div id="header">

		<div id="logo">

			<h1><a href="<?php echo get_option('home'); ?>" title="<?php bloginfo('description'); ?>"><?php bloginfo('name'); ?></a></h1>

			<br /><br />
			<div class="clear"></div>
			<h3 id="description"><?php bloginfo('description'); ?></h3>

		</div>

		<div id="navigation">

			<ul>

				<li>	

					<a href="<?php bloginfo('rss2_url')?>">Subscribe</a>

				</li>

				<?php wp_list_pages('depth=1&sort_order=desc&title_li='); ?>	

			</ul>

		</div>

	</div>

	<!--end header-->



	