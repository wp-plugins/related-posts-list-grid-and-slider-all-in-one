<?php ob_start(); 
//define all variables the needed alot
include 'the_globals.php';
$aio_related_posts_settings = aio_read_options();
?>
<style type="text/css">
#related_posts_ttc h3:hover{
background:#F4F4F4;
}
//------------------------
#navigation ul {
    text-align: center;
}
#navigation ul li {
    display: inline;
}
#related_posts_ttc ul {
    text-align: center;
}
#related_posts_ttc ul li {
    display: inline;
}
.clearfix:after {
    clear: both;
    content: ".";
    display: block;
    height: 0;
    line-height: 0;
    visibility: hidden;
}
html[xmlns] .clearfix {
    display: block;
}
.posts-default, .posts-quick {
    list-style: none outside none;
    margin: 0 0 10px;
    overflow: hidden;
    padding: 0;
}
.posts-default {
    margin: 0;
}
.posts-default li, .posts-default img {
    float: left;
    overflow: hidden;
    padding: 0;
}

#related_posts_ttc ul {
    text-align: center;
}
#related_posts_ttc ul li {
    display: inline;
      height: 200px;
	width: <?php echo $aio_related_posts_settings[grid_imagew]+5; ?>px;
	position:relative;
	margin-top:0px;
	margin-right:<?php echo $aio_related_posts_settings[grid_hspace]/2; ?>px;
	margin-bottom:<?php echo $aio_related_posts_settings[grid_vspace]; ?>px;
	margin-left:<?php echo $aio_related_posts_settings[grid_hspace]/2; ?>px;
	padding:0px;
	text-align:center;
}
.entry-thumbnails{
 //display: inline;
    width:99px; height:99px;
}


.entry-thumbnails-link{
// display: inline;
    width:99px; height:99px;
}


#related_posts_ttc{
    text-align: center;
}
#related_posts_ttc h3{
	direction:ltr;
}
.h3_top_style{
text-align:left;
direction:ltr;
margin:1px 0px 10px;
}
.related_posts_ttc_main_image img {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    margin: 0px 0px 0px 0px;
    padding: 0px;
}
.related_posts_ttc_main_content{
height:100%;
}
.posts-default img {
    background: none repeat scroll 0 0 #111111;
}
.posts-default .entry-title {
    font-family: tahoma;
    font-size: 13px;
    font-weight: 700;
    line-height: 1.4em;
    margin: 5px;
}
.posts-default .entry-thumbnails-link {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #E1E1E1;
    padding: 1px;
}
.posts-default .published {
    border-bottom: medium none;
    color: #999999;
    float: right;
    font-size: 10px;
    margin: 6px 3px 0;
    text-transform: uppercase;
}

.posts-default img, .posts-default .entry-thumbnails-link {
    height: <?php echo $aio_related_posts_settings[grid_imageh]; ?>px;
	width: <?php echo $aio_related_posts_settings[grid_imagew]; ?>px;
}
.posts-default .entry-meta {
    width: 137px;
}
.posts-default .entry-thumbnails {
    height: <?php echo $aio_related_posts_settings[grid_imageh]; ?>px;
	width: <?php echo $aio_related_posts_settings[grid_imagew]; ?>px;
}
.posts-default .entry-meta{
    background: none repeat scroll 0 0 #000000;
    color: #CCCCCC;
    display: block;
    float: right;
    font-weight: 700;
    height: 25px;
	width: <?php echo $aio_related_posts_settings[grid_imagew]; ?>px;
    margin: -36px 0 0;
    opacity: 0.6;
}
#entry-meta-span{
    background: none repeat scroll 0 0 #000000;
    color: #CCCCCC;
    display: block;
    float: right;
    font-weight: 700;
    width: 97%;
    height: 25px;
	width: <?php echo $aio_related_posts_settings[grid_imagew]; ?>px;
    margin:  -80px 0 0;
    opacity: 0.3;
}
.posts-default .entry-comments, .posts-quick .entry-comments {
    background: url("../../images/comments.gif") no-repeat scroll left center transparent;
    float: left;
    margin: 6px 2px 0;
    padding: 0 0 0 12px;
}
</style>
<?php
$out = ob_get_clean();
return $out;
?>