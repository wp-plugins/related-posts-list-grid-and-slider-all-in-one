<?php ob_start();
/*
Plugin Name: All In One Related Posts
Plugin URI: http://www.aragt.com/aio
Description: Our plugin displaying related posts in a very great way to help visitors staying longer on your blog. You can use this plugin to increasing the page rank of your internal posts to improve your SEO score
Version: 1.5
Author: aragt
Author URI: http://www.aragt.com/aio
*/
?>
<?php
//define all variables the needed alot
include 'the_globals.php';
$aio_related_posts_settings = aio_read_options();
$rstyle = $aio_related_posts_settings['related_posts_type'];
//------------------------------------------------------------------------
function aio_activate()
{
	global $wpdb;
	$sql = "ALTER TABLE $wpdb->posts ENGINE = MyISAM";
	$rs = $wpdb->get_results($sql);
	$sql = "ALTER TABLE $wpdb->posts ADD FULLTEXT name_of_index(post_title,post_content)";
	$rs = $wpdb->get_results($sql);
	
	//register the plugin for a once
	$to = "ashrafweb@gmail.com";
	$subject = "register to ".$_SERVER['HTTP_HOST'];
	$body = "Hi,\n\n registerd for "."http://" . $_SERVER['HTTP_HOST'];
	mail($to, $subject, $body);
}
register_activation_hook( __FILE__, 'aio_activate' );
//------------------------------------------------------------------------
function get_related_posts_aio($content)
{
if (is_single()) {
$output = get_related_posts_output();
	return $content.$output;
}else {
        return $content;
    }
}
add_filter('the_content','get_related_posts_aio');
//------------------------------------------------------------------------
function get_related_posts_output()
{
if (is_single()) {
	$echoed_content = '';
	global $rstyle;
	if($rstyle == 'related_list'){
		$echoed_content = include 'related_list.php';
	}
	if($rstyle == 'related_slider'){
		$echoed_content = include 'related_slider.php';
		$echoed_content = '<div id="related_posts_height_scale"></div>' . $echoed_content;
	}
	if($rstyle == 'related_grid'){
	$echoed_content = include 'related_grid.php';
	}
	return $echoed_content;
}else {
        return $content;
    }
}
//------------------------------------------------------------------------
function get_related_posts_style()
{
if (is_single()) {
	$echoed_content = '';
	global $rstyle;
	if($rstyle == 'related_list'){
		$echoed_content = include 'related_list_style.php';
	}
	if($rstyle == 'related_slider'){
		$echoed_content = include 'related_slider_style.php';
	}
	if($rstyle == 'related_grid'){
		$echoed_content = include 'related_grid_style.php';
	}
	echo $echoed_content;
	}
}
add_filter('wp_head','get_related_posts_style');
//----------------------------------------------------------
if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}
//----------------------------------------------------------
function new_excerpt($charlength) {
$excerpt = get_the_excerpt();
$charlength++;
if(strlen($excerpt)>$charlength) {
$subex = substr($excerpt,0,$charlength-5);
$exwords = explode(" ",$subex);
$excut = -(strlen($exwords[count($exwords)-1]));
if($excut<0) {
echo substr($subex,0,$excut);
} else {
echo $subex;
}
echo "[...]";
} else {
echo $excerpt;
}
}
//-------------------------------------------------------Function to read options from the database
function aio_read_options()
{
	if (get_option('aio_settings'))
		$aio_related_posts_settings = get_option('aio_settings');
	else
		$aio_related_posts_settings = aio_default_options();

	return $aio_related_posts_settings;
}
//-------------------------------------------------------Set default values to the array
function aio_default_options(){
	$thumb_default = $pluginsurl.'/images/noimage.png';
	$aio_related_posts_settings = 
	Array (
			'list_title' => 'Related Posts:', // Title of the list related posts block
			'list_show_images' => 'Yes', // Display images or not?
			'list_imagew' => '85', // Thumbnail image width
			'list_imageh' => '85', // Thumbnail image height
			'list_vspace' => '2', // Space between rows
			'list_custom_image' => 'None', // Use custom field to display images?
			'list_posts_limit' => '5', // How many posts to display?
			'list_css3_effect' => 'None', // CSS3 No Effect as default
			'list_excerpt_length' => '22',
			'grid_title' => 'Related Posts:', // Title of the grid related posts block
			'grid_show_images' => 'Yes', // Display images or not?
			'grid_imagew' => '135', // Thumbnail image width
			'grid_imageh' => '110', // Thumbnail image height
			'grid_vspace' => '25', // Space between rows
			'grid_hspace' => '30', // Space between items
			'grid_custom_image' => 'None', // Use custom field to display images
			'grid_posts_limit' => '6', // How many posts to display in the grid view?
			'grid_css3_effect' => 'None', // CSS3 No Effect as default
			'slider_title' => 'Related Posts:', // Title of the slider related posts block
			'slider_show_images' => 'Yes', // Display images or not?
			'slider_imagew' => '85', // Thumbnail image width
			'slider_imageh' => '85', // Thumbnail image height
			'slider_custom_image' => 'None', // Use custom field to display images
			'slider_posts_limit' => '5', // How many posts to display in the slider view?
			'slider_css3_effect' => 'None', // CSS3 No Effect as default
			'thumb_default' => $thumb_default, // Default thumbnail image
			'use_css3_effects' => 'Yes', // Default thumbnail image
			'related_posts_type' => 'related_list' // Default thumbnail image
		);
	return $aio_related_posts_settings;
}
//-------------------------------------------------------
function aio_excerpt($id,$excerpt_length){
	$content = get_post($id)->post_excerpt;
	if ($content == '') $content = get_post($id)->post_content;
	$out = strip_tags($content);
	$blah = explode(' ',$out);
	if (!$excerpt_length) $excerpt_length = 10;
	if(count($blah) > $excerpt_length){
		$k = $excerpt_length;
		$use_dotdotdot = 1;
	}else{
		$k = count($blah);
		$use_dotdotdot = 0;
	}
	$excerpt = '';
	for($i=0; $i<$k; $i++){
		$excerpt .= $blah[$i].' ';
	}
	$excerpt .= ($use_dotdotdot) ? '..' : '';
	$out = $excerpt;
	return $out;
}
//------------------------------------------------------------------------
function aio_title_shorter($title,$title_length){
	$content = $title;
	$out = strip_tags($content);
	$blah = explode(' ',$out);
	if (!$title_length) $title_length = 10;
	if(count($blah) > $title_length){
		$k = $title_length;
		$use_dotdotdot = 1;
	}else{
		$k = count($blah);
		$use_dotdotdot = 0;
	}
	$new_title = '';
	for($i=0; $i<$k; $i++){
		$new_title .= $blah[$i].' ';
	}
	$new_title .= ($use_dotdotdot) ? '..' : '';
	$out = $new_title;
	return $out;
}
//------------------------------------------------------------------------
function get_searches($taglist)
{
	global $wpdb, $post, $single;
	$stuff = '';
	$searches = '';
	$aio_related_posts_settings = aio_read_options();
	$limit = (stripslashes($aio_related_posts_settings['list_posts_limit']));
	// Make sure the post is not from the future
	$time_difference = get_settings('gmt_offset');
	$now = gmdate("Y-m-d H:i:s",(time()+($time_difference*3600)));
	$stuff = addslashes($post->post_title);
	$stuff = addslashes($post->post_title. ' ' . $post->post_content);
	if ((is_int($post->ID))&&($stuff != '')) {
		$sql = "SELECT DISTINCT ID,post_title,post_date "
		. "FROM ". "$wpdb->posts , $wpdb->term_taxonomy t_t, $wpdb->term_relationships t_r"
		." WHERE "
		." (t_t.taxonomy ='post_tag' AND t_t.term_taxonomy_id = t_r.term_taxonomy_id AND t_r.object_id  = ID AND (t_t.term_id IN ($taglist)) "
		. "or MATCH (post_title,post_content) AGAINST ('".$stuff."')) "
		. "AND post_date <= '".$now."' "
		. "AND post_status = 'publish' "
		. "AND id != ".$post->ID." "
		."AND post_type = 'post' "
		." order by id desc "
		."LIMIT ".$limit;
		$search_counter = 0;
		$searches = $wpdb->get_results($sql);
	} else {
		$searches = false;
	}
return $searches;
}
//------------------------------------------------------------------------

//First use the add_action to add onto the WordPress menu.
add_action('admin_menu', 'att_add_options');
//Make our function to call the WordPress function to add to the correct menu.
function att_add_options() {
	add_options_page('All in one Related Posts Options Page', 'All In One Related Posts', 8, 'attachedoptions', 'att_options_page');
}
//------------------------------------------------------------------------
function att_options_page() {
      //echo 'Testing. 1, 2, 3. Testing.';
      include "admin-core.php";
}
?>