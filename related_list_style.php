<?php ob_start(); 
//define all variables the needed alot
include 'the_globals.php';
$aio_related_posts_settings = aio_read_options();
?>
<style type="text/css">
.related_posts_ttc_main_image {
	float: left;
	height: 87px;
	width: 87px;
	//border: 1px solid #EEEEEE;
    margin: 7px 10px;
    padding: 3px;
}
.related_posts_ttc_main_image img{
    background: none repeat scroll 0 0 #FFFFFF;
   // border: 1px solid #CCCCCC;
    margin: 0px 0px 0px 0px;
    padding: 0px;
}
.related_posts_ttc_main_image a img{
//border: 3px solid #f5f5f5;
}
<?php 
$css3_shadow = $aio_related_posts_settings['list_css3_effect'];
if($css3_shadow != 'None'){ ?>
.related_posts_ttc_main_image img {
position: relative;
-webkit-box-shadow: 0 0 <?php echo $css3_shadow; ?>px #666666;// Safari and chrome
-khtml-box-shadow: 0 0 <?php echo $css3_shadow; ?>px #666666;// Linux browsers
behavior: url(ie-css3.htc);
-moz-box-shadow: 0px 0px <?php echo $css3_shadow; ?>px #666666;
box-shadow: 0px 0px <?php echo $css3_shadow; ?>px #666666;
z-index: 2;
behavior: url(<?php echo $pluginsurl; ?>/ie-css3.htc);
}
<?php } ?>

.imgshadow_light {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #777777;
    box-shadow: 0 0 5px #666666;
}
.related_posts_ttc_time {
	position: absolute;display: block;
	color: #CCCCCC;direction: ltr;font: 13px/28px sans-serif;z-index: 1;right: 15px;top: 0px;
	text-align: right;
	width: 120px;
}
#related_posts_ttc h3{
	text-align:left;
	direction:ltr;
	font-size: 14px;
	border: medium none;
	padding: 0px;
	margin: 0px;
}
#related_posts_ttc ul h3{
	width:88%;
}
.related_posts_ttc_main_content {
	text-align:left;
	direction:ltr;
}
.related_posts_ttc_main_content p{
	color:#4c4c4c;
	direction:ltr;
}
#related_posts_ttc ul{
	margin:0px;
	padding: 0px;
}
	
#related_posts_ttc li{
	text-align:left;
	position: relative;display: block;
	cursor:pointer;
	list-style:none;
	border-bottom:1px solid #EBDDE2;
	height: 110px;
	padding-top: 5px;
	padding-right: 5px !important;
	padding-bottom:<?php echo $aio_related_posts_settings['list_vspace']; ?>px;
	padding-left:10px;
	margin:0px;
	-moz-transition: all 0.3s ease-out 0.2s;
}
#entry-meta-span {
    background: none repeat scroll 0 0 #000000;
    color: #CCCCCC;
    display: block;
    font-weight: 700;
    height: 25px;
    margin: -42px 0 0;
    opacity: 0.5;
    position: relative;
    text-align: center;
    width: 97%;
    z-index: 99999;
}
#related_posts_ttc li:hover{background:#F9F9F9;-moz-transition: all 0.3s ease-out 0s;}
</style>
<?php
$out = ob_get_clean();
return $out;
?>