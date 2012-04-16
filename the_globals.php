<?php
$option_name = 'Aio_Related_Posts_Type';
//Get The Plugins URL as http://www.yrsite.com/dir/subdir
	$pluginsurl = plugins_url( '', __FILE__ );
//get the tag id's as al list
global $post;
$tags = wp_get_post_tags($post->ID);
	
	$taglist = "'" . $tags[0]->term_id. "'";
	
	$tagcount = count($tags);
	if ($tagcount > 1) {
		for ($i = 1; $i < $tagcount; $i++) {
			$taglist = $taglist . ", '" . $tags[$i]->term_id . "'";
		}
	}
?>