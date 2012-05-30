<?php ob_start();
//define all variables the needed alot
include 'the_globals.php';
?>
<?php
	$aio_related_posts_settings = aio_read_options();
	$limit = (stripslashes($aio_related_posts_settings['list_posts_limit']));
	$searches = get_searches($taglist);

    $counter = 1;
	if($searches){?>
	
	<div id="tips"><h3 class='h3-top-style'><?php echo $aio_related_posts_settings['slider_title']; ?></h3><ul id="slider">
<?php	foreach($searches as $search) {
		$categorys = get_the_category($search->ID);	//Fetch categories of the plugin
		$p_in_c = false;	// Variable to check if post exists in a particular category
		$title = get_the_title($search->ID);
		$title = aio_title_shorter($title,6);
		//---------------------------------
	if($aio_related_posts_settings['slider_show_images'] == 'Yes'){
		$out_post_thumbnail = '<div class="related_posts_ttc_main_image"><a href="'
    	.get_permalink($search->ID)
    	.'" rel="bookmark" title="'
    	.$title
    	.'">';
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail($search->ID))) {
				$out_post_thumbnail .= get_the_post_thumbnail( $search->ID, array($aio_related_posts_settings['slider_imagew'],$aio_related_posts_settings['slider_imageh']), array('title' => $title,'alt' => $title,'class' => 'crp_thumb','border' => '0'));
		} else {
			$postimage = get_post_meta($search->ID, $aio_related_posts_settings['slider_custom_image'], true);
			$show_noimage_text = 'No';
			if (!$postimage) {$postimage = $aio_related_posts_settings[thumb_default];$show_noimage_text = 'Yes';}
			$out_post_thumbnail .= '<img src="'.$postimage.'" alt="'.$title.'" title="'.$title.'" width="'.$aio_related_posts_settings[slider_imagew].'" height="'.$aio_related_posts_settings[slider_imageh].'" border="0" class="crp_thumb" />';
			if($show_noimage_text == 'Yes'){
			$out_post_thumbnail .= '<span id="entry-meta-span">No Image</span>';}
		}
		$out_post_thumbnail .= '</a></div>';
	}else{//if user dont want to show images from control panel 
		$out_post_thumbnail = '<div class="no_style_img"><img src="'. $pluginsurl .'/images/bullet.jpg"/></div>';
		$out_post_thumbnail = '<div class="counter_num"><font size="4">'. $counter++ .'. </font></div>';
	}
    $h3div = '<div class="h3_title"><a href="' .get_permalink($search->ID). '" rel="bookmark" title="' .$title. '">'. $title .'</a></div>';
    $excerptdiv = '<span class="excerpt_span">';
    $excerptdiv .= aio_excerpt($search->ID,22);
    $excerptdiv .='</span>';
    $timediv = '<div class="related_posts_ttc_time">'.get_the_time('M j, Y',$search->ID). '</div>';
    ?>
<li style="background-image: none" class="slider_li">
<div id="related_posts_ttc_main_content" class="related_posts_ttc_main_content">
<div align="left" dir="ltr">
	<table border="0" width="100%" cellspacing="0" cellpadding="0" dir="rtl" bgcolor="#FFFFFF" bordercolor="#FFFFFF" style="background-color: #FFFFFF">
		<tr>
			<td height="22px"><?php echo $h3div ?></td>
			<?php $width = '';
			if($aio_related_posts_settings['slider_show_images'] == 'No'){ $width='width="22px"'; } ?>
			<td valign="top" <?php echo $width; ?> align="center" rowspan="3"><?php echo $out_post_thumbnail; ?></td>
			
		</tr>
		<tr>
			<td dir="ltr" align="left" valign="top" height="62"><?php echo $excerptdiv; ?></td>
		</tr>
		<tr>
			<td valign="top" align="right"><?php echo $timediv; ?></td>
		</tr>
	</table>
</div></div>
<?php    echo "</li>";

	if ($search_counter == $limit) break;	// End loop when related posts limit is reached
		} //end of foreach loop
	echo '</ul></div>';
	}//end of searches if statement
	else{
		echo '<p>No related posts found</p>';
	}
?><?php
$out = ob_get_clean();
return $out;
?>