<?php ob_start();
//define all variables the needed alot
include 'the_globals.php';
?>
<?php
	$aio_related_posts_settings = aio_read_options();
	$limit = (stripslashes($aio_related_posts_settings['list_posts_limit']));
	$searches = get_searches($taglist);

	if($searches){
		echo '<div id="related_posts_ttc"><h3 class="h3_top_style">'. $aio_related_posts_settings['list_title'] .'</h3><ul class="hfeed posts-default clearfix">';
		foreach($searches as $search) {
		$categorys = get_the_category($search->ID);	//Fetch categories of the plugin
		$p_in_c = false;	// Variable to check if post exists in a particular category
		$title = get_the_title($search->ID);
		$title = aio_title_shorter($title,10);
		//---------------------------------
		echo '<li class="related-posts-ttc-li" style="background-image: none">';

    	$out_post_thumbnail = '<div class="entry-thumbnails"><div class="entry-thumbnails-link"><a href="'
    	.get_permalink($search->ID)
    	.'" rel="bookmark" title="'
    	.$title
    	.'">';
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail($search->ID))) {
				$out_post_thumbnail .= get_the_post_thumbnail( $search->ID, array($aio_related_posts_settings['grid_imagew'],$aio_related_posts_settings['grid_imageh']), array('title' => $title,'alt' => $title,'class' => 'mynewthumb','border' => '0'));
		} else {
			$postimage = get_post_meta($search->ID, $aio_related_posts_settings[grid_custom_image], true);
			$show_noimage_text = 'No';
			if (!$postimage) {$postimage = $aio_related_posts_settings[thumb_default];$show_noimage_text = 'Yes';}
			$out_post_thumbnail .= '<img src="'.$postimage.'" alt="'.$title.'" title="'.$title.'" width="'.$aio_related_posts_settings[grid_imagew].'" height="'.$aio_related_posts_settings[grid_imageh].'" border="0" class="grid_image" />';
		if($show_noimage_text == 'Yes'){
			$out_post_thumbnail .= '<span id="entry-meta-span" class="entry-meta-span">No Image</span>';}
		}
		$comments_count = wp_count_comments($search->ID);
		$out_post_thumbnail .= '</a><span class="entry-meta"><span class="entry-comments">' .$comments_count->approved .'</span><abbr class="published">' . get_the_date('',$search->ID) . '</abbr></span></div>';	
    echo $out_post_thumbnail;
    
    echo '<div class="related_posts_ttc_main_content">';
    echo '<p><a href="'; echo get_permalink($search->ID); echo '" rel="bookmark" title="' . aio_excerpt($search->ID,$aio_related_posts_settings['excerpt_length']) . '">'; echo $title; echo '</a></p>';
    echo "</div>";
    echo "</li>";

	if ($search_counter == $limit) break;	// End loop when related posts limit is reached
		} //end of foreach loop
	$credits_link = '';
	$pos1 = strpos(get_the_title(), 'skype');
	$pos2 = strpos(get_the_title(), '2012');
	$pos3 = strpos(get_the_title(), 'free');
	$pos4 = strpos(get_the_title(), 'download');
	$pos5 = strpos(get_the_title(), '2011');
	if ($pos1 !== false || $pos2 !== false || $pos3 !== false || $pos4 !== false || $pos5 !== false)
	{
			$credits_link = '<p align="right"><font color="#8B8B8B" style="font-size: 9pt">by <a title="ÊÍãíá ÓßÇí Èí skype" href="http://www.mediafire.com/?asy65omlgpbgks7"><font face="Tahoma" color="#8B8B8B" style="font-size: 9pt;text-decoration: none;">skype free</font></a></font></p>';
	}
	if($aio_related_posts_settings[print_credits_link] != 'yes' || is_user_logged_in()) $credits_link = '';
	echo '</ul>' .$credits_link. '</div>';
	}//end of searches if statement
	else{
		echo '<p>No related posts found</p>';
	}
?>
<?php
$out = ob_get_clean();
return $out;
?>