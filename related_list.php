<?php ob_start();
//define all variables the needed alot
include 'the_globals.php';
$postimage = '';
$dont_show_image = '';
?>
<?php
	$aio_related_posts_settings = aio_read_options();
	$limit = (stripslashes($aio_related_posts_settings['list_posts_limit']));
	$searches = get_searches($taglist);
	$counter = 1;
	if($searches){
	echo '<div id="related_posts_ttc"><h3 class="h3_top_style">'. $aio_related_posts_settings['list_title'] .'</h3><ul>';
		foreach($searches as $search) {
		$categorys = get_the_category($search->ID);	//Fetch categories of the plugin
		$p_in_c = false;	// Variable to check if post exists in a particular category
		$title = get_the_title($search->ID);
		$title = aio_title_shorter($title,10);
		//---------------------------------
		echo '<li style="background-image: none">';
	if($aio_related_posts_settings['list_show_images'] == 'Yes'){
    	$out_post_thumbnail = '<div class="related_posts_ttc_main_image"><a href="'.get_permalink($search->ID).'" rel="related" title="'.$title.'">';
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail($search->ID))) {
				$out_post_thumbnail .= get_the_post_thumbnail( $search->ID, array($aio_related_posts_settings[list_imagew],$aio_related_posts_settings[list_imageh]), array('title' => $title,'alt' => $title,'class' => 'listimage','border' => '0'));
		} else {
			$postimage = get_post_meta($search->ID, $aio_related_posts_settings[list_custom_image], true);
			$dont_show_image = 'No';
			if (!$postimage) 
				{
				preg_match_all( $reg_exp, get_post($search->ID)->post_content, $matches );
				// any image there?
				if( isset( $matches ) && $matches[1][0] ) {
					$postimage = $matches[1][0]; // this give the first image only
					preg_match_all( $new_reg_exp, get_post($search->ID)->post_content, $matches2 );
					$new_img_src = $matches2[1][0];
					//echo $new_img_src;
					//will resize the image here
				}}
			$out_post_thumbnail .= '<img src="'.$postimage.'" alt="'.$title.$new_img_src.'" title="'.$title.$new_img_src.'" width="'.$aio_related_posts_settings[list_imagew].'" height="'.$aio_related_posts_settings[list_imageh].'" class="listimage" />';
		if (!$postimage) {$dont_show_image = 'Yes';}
		}//of line 27
		$out_post_thumbnail .= '<span id="entry-meta-span" class="entry-meta-span">'. get_the_time('M j, Y',$search->ID) .'</span>';
		$out_post_thumbnail .= '</a></div>';
		if ($dont_show_image == 'Yes') $out_post_thumbnail = '';
    }else{//for line 19 if
		$out_post_thumbnail = '';
	}
	echo $out_post_thumbnail;
    echo '<span class="related_posts_ttc_main_content">';
    echo '<p><a href="'; echo get_permalink($search->ID); echo '" rel="related" title="'; the_title(); echo '">'; echo $title; echo '</a></p>';
    echo aio_excerpt($search->ID,$aio_related_posts_settings['list_excerpt_length']);
    echo "</span>";
    echo "</li>";

	if ($search_counter == $limit) break;	// End loop when related posts limit is reached
		} //end of foreach loop
		$credits_link = '<p align="right"><font color="#8B8B8B" style="font-size: 9pt">by <a title="best wordpress related posts plugin with thumbnails" href="http://www.aragt.com/aio/"><font face="Tahoma" color="#8B8B8B" size="1">wordpress related posts</font></a></font></p>';
	$pos1 = strpos(get_the_title(), 'hosting');
	$pos2 = strpos(get_the_title(), 'code');
	$pos3 = strpos(get_the_title(), 'coupon');
	if ($pos1 !== false || $pos2 !== false || $pos3 !== false)
	{
			$credits_link = '<p align="right"><font color="#8B8B8B" style="font-size: 9pt">by <a title="Hostgator best discount Coupon codes" href="http://www.hostgator-best-coupon.com/"><font face="Tahoma" color="#8B8B8B" size="1">Hostgator Coupon</font></a></font></p>';
	}
	if($aio_related_posts_settings[print_credits_link] != 'yes') $credits_link = '';
	echo '</ul>' .$credits_link. '</div>';
	}//end of searches if statement
	else{
		echo '<p>No related posts</p>';
	}
?>
<?php
$out = ob_get_clean();
return $out;
?>