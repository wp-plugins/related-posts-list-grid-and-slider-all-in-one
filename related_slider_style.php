<?php ob_start(); 
//define all variables the needed alot
include 'the_globals.php';
$aio_related_posts_settings = aio_read_options();
?>
<style type="text/css">
.related_posts_ttc_main_image {
	float: left;
	height: <?php echo $aio_related_posts_settings[slider_imageh]; ?>px;
	width: <?php echo $aio_related_posts_settings[slider_imagew]; ?>px;
	border: 1px solid #EEEEEE;
    margin: 7px 10px;
    padding: 3px;
}
.related_posts_ttc_main_image img {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    margin: 0px 0px 0px 0px;
    padding: 0px;
}
.no_style_img img{
	border: 0px;
}
.related_posts_ttc_time {
	display: block;
	color: #7979FF;
	direction: ltr;
	font: 13px/28px sans-serif;
	z-index: 1;
	right: 15px;top: 0px;
	text-align: right;
	width: 120px;
}
#slider h3{
	text-align:left;
	direction:ltr;
}
.related_posts_ttc_main_content {
	text-align:left;
}
.related_posts_ttc_main_content p{
	color:#4c4c4c;
}
#slider{
	margin: 0px;
	padding: 0px;
}
    
.slider_li{
	position: relative;
	background-image: url("<?php echo $pluginsurl; ?>/images/noimage.png");
	display: block;
	cursor:pointer;
	list-style:none;
	border-bottom:1px solid #EBDDE2;
	height: 110px;
	padding: 5px 5px 10px 10px !important;
	margin: 0px;
}
	
<?php $height = ''; if($aio_related_posts_settings['slider_show_images'] == 'Yes'){ $height = 'height: 155px'; }else{$height = 'height: 120px';} ?>
#tips {display:none; position: fixed; bottom: 0; right: 0;
    background-color: #ffffff;
    border:1px solid #EBDDE2;
    color: #CCCCCC;
    direction: ltr;
    font: 13px/22px sans-serif;
    <?php echo $height ?>;
    width: 400px;
    z-index: 99999;
}
#tips html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td
{
vertical-align: top;
padding: 0px;
}
#tips h3,.h3_title h3
{
margin:0px 0px 0px 0px;
}
<?php 
$css3_shadow = $aio_related_posts_settings['slider_css3_effect'];
if($css3_shadow != 'None'){ ?>
#tips {
box-shadow: 0 0 <?php echo $css3_shadow; ?>px #666666;
-moz-box-shadow: 0 0 <?php echo $css3_shadow; ?>px #666666;
-webkit-box-shadow: 0 0 <?php echo $css3_shadow; ?>px #666666;
}
<?php } ?>
.h3_title{
text-align:left;
//font-size: 120%;
direction:ltr;
padding-top:5px;
font:bold 120%/22px sans-serif;
}
.counter_num{
text-align:center;
direction:ltr;
color:#000000;
}
.h3_top_style{
text-align:left;
direction:ltr;
//font:bold 14px/22px sans-serif;
font-size: 90%;
color: #000000;
margin:1px;
height:26px;
padding-top:5px;
background-color: #F0F0F0;
}
.excerpt_span{
color: #000000;
text-align:left;
direction:ltr;
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
    z-index: 99999;
}
</style>
<script class="jsbin" src="<?php echo $pluginsurl ?>/easySlider/js/jquery.min.js"></script>
<!--[if IE]>
  <script src="<?php echo $pluginsurl ?>/easySlider/js/html5.js"></script>
<![endif]-->


<script type="text/javascript">
$(document).ready(function(){
 $(window).scroll(function(){
  // get the height of #wrap
  var h = $('#related_posts_height_scale').offset().top;
  h=h-$(window).height();
  var y = $(window).scrollTop();
  //alert(y);
  if( y > h && y != 0){
   // if we are show keyboardTips
   $("#tips").fadeIn("slow");
   //$("#related_posts_ttc_main_image").fadeOut('slow');
  } else {
   $('#tips').fadeOut('slow');
  }
 });
})
</script>

	<link href="<?php echo $pluginsurl ?>/easySlider/css/easySlider.css" type="text/css" rel="stylesheet"></link>
	<script type="text/javascript" src="<?php echo $pluginsurl ?>/easySlider/js/jquery.js" ></script>
	<script type="text/javascript" src="<?php echo $pluginsurl ?>/easySlider/js/easySlider.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#slider').easySlider({autoPlay: true});
		});
	</script>
<?php
$out = ob_get_clean();
return $out;
?>