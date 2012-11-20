<?php
$option_name = 'Aio_Related_Posts_Type';
$ver_type = 'free';
//Get The Plugins URL as http://www.yrsite.com/dir/subdir
	$pluginsurl = plugins_url( '', __FILE__ );
//get the tag id's as al list
global $post;
$tags = wp_get_post_tags($post->ID);
$tagcount = count($tags);
$result = $tags;
if ($tagcount > 1) {
for ($i = 0; $i < $tagcount; $i++)
   {
	$mytags[$i]['term_id'] = $tags[$i]->term_id;
	$mytags[$i]['count'] = $tags[$i]->count;
   }
$result = sortTwoDimensionArrayByKey($mytags,'count');
}
	$taglist = "'" . $result[0]->term_id. "'";
	$countlist = "'" . $result[0]->count. "'";

	if ($tagcount > 1) {
		for ($i = 1; $i < $tagcount; $i++) {
			if ($result[$i]['count'] < 9) {
			$taglist = $taglist . ", '" . $result[$i]['term_id'] . "'";
			$countlist = $countlist . ", '" . $result[$i]['count'] . "'";}
		}
	}
$reg_exp = '|<img.*?src=[\'"](.*?)[\'"].*?>|';
$new_reg_exp = '@<img.+src="(.*)".*>@Uims';

?>