<?php
//define all variables the needed alot
//delete_option( 'aio_settings');
include 'the_globals.php';
if($_POST["action"] == 'update')
{
	$related_posts_type = $_POST["related_posts_type"];
	if($related_posts_type == ''){$related_posts_type = 'related_list';}
	//----------------------------------------------------list options array values
	$list_title = $_POST["list_title"];
	$list_show_images = $_POST["list_show_images"];
	$list_imagew = $_POST["list_imagew"];
	$list_imageh = $_POST["list_imageh"];
	$list_vspace = $_POST["list_vspace"];
	$list_custom_image = $_POST["list_custom_image"];
	$list_posts_limit = $_POST["list_posts_limit"];
	$list_css3_effect = $_POST["list_css3_effect"];
	$list_excerpt_length = $_POST["list_excerpt_length"];
	//Validation//
	if($list_imagew < 70) $list_imagew = 70;
	if($list_imageh < 70) $list_imageh = 70;
	if($list_vspace < 2) $list_vspace = 2;
	if($list_excerpt_length < 12){$list_excerpt_length = '12';}
	if($list_excerpt_length > 30){$list_excerpt_length = '30';}
	if($list_title == ''){$list_title = 'Related Posts:';}
	if($list_show_images == ''){$list_show_images = 'Yes';}
	if($list_imagew == ''){$list_imagew = '85';}
	if($list_imageh == ''){$list_imageh = '85';}
	if($list_vspace == ''){$list_vspace = '2';}
	if($list_custom_image == ''){$list_custom_image = 'No';}
	if($list_posts_limit == ''){$list_posts_limit = '5';}
	if($list_css3_effect == ''){$list_css3_effect = 'None';}
	if($list_excerpt_length == ''){$list_excerpt_length = '18';}
	//----------------------------------------------------Get grid options array values
	$grid_title = $_POST["grid_title"];
	$grid_show_images = $_POST["grid_show_images"];
	$grid_imagew = $_POST["grid_imagew"];
	$grid_imageh = $_POST["grid_imageh"];
	$grid_vspace = $_POST["grid_vspace"];
	$grid_hspace = $_POST["grid_hspace"];
	$grid_custom_image = $_POST["grid_custom_image"];
	$grid_posts_limit = $_POST["grid_posts_limit"];
	//Validation//
	if($grid_imagew < 90) $grid_imagew = 90;
	if($grid_imageh < 90) $grid_imageh = 90;
	if($grid_title == ''){$grid_title = 'Related Posts:';}
	if($grid_show_images == ''){$grid_show_images = 'Yes';}
	if($grid_imagew == ''){$grid_imagew = '85';}
	if($grid_imageh == ''){$grid_imageh = '85';}
	if($grid_vspace == ''){$grid_vspace = '33';}
	if($grid_hspace == ''){$grid_hspace = '33';}
	if($grid_custom_image == ''){$grid_custom_image = 'No';}
	if($grid_posts_limit == ''){$grid_posts_limit = '6';}
	//-----------------------------------------------------get slider options array values
	$slider_title = $_POST["slider_title"];
	$slider_show_images = $_POST["slider_show_images"];
	$slider_imagew = $_POST["slider_imagew"];
	$slider_imageh = $_POST["slider_imageh"];
	$slider_custom_image = $_POST["slider_custom_image"];
	$slider_posts_limit = $_POST["slider_posts_limit"];
	$slider_css3_effect = $_POST["slider_css3_effect"];
	//Validation//
	if($slider_imagew < 50) $slider_imagew = 50;
	if($slider_imageh < 50) $slider_imageh = 50;
	if($slider_title == ''){$slider_title = 'You may interest:';}
	if($slider_show_images == ''){$slider_show_images = 'Yes';}
	if($slider_imagew == ''){$slider_imagew = '85';}
	if($slider_imageh == ''){$slider_imageh = '85';}
	if($slider_custom_image == ''){$slider_custom_image = 'None';}
	if($slider_posts_limit == ''){$slider_posts_limit = '5';}
	if($slider_css3_effect == ''){$slider_css3_effect = 'None';}
	//-----------------------------------------------------Get general options array values
	$thumb_default = $_POST["thumb_default"];
	$use_css3_effects = $_POST["use_css3_effects"];
	$print_credits_link = $_POST["print_credits_link"];
	if($thumb_default == ''){$thumb_default = $pluginsurl.'/images/noimage.png';}

$aio_related_posts_settings = 
Array (
		'list_title' => $list_title, // Title of the list related posts block
		'list_show_images' => $list_show_images, // Display images or not?
		'list_imagew' => $list_imagew, // Thumbnail image width
		'list_imageh' => $list_imageh, // Thumbnail image height
		'list_vspace' => $list_vspace, // Space between rows
		'list_custom_image' => $list_custom_image, // Use custom field to display images?
		'list_posts_limit' => $list_posts_limit, // How many posts to display?
		'list_css3_effect' => $list_css3_effect,
		'list_excerpt_length' => $list_excerpt_length,
		'grid_title' => $grid_title, // Title of the grid related posts block
		'grid_show_images' => $grid_show_images, // Display images or not?
		'grid_imagew' => $grid_imagew, // Thumbnail image width
		'grid_imageh' => $grid_imageh, // Thumbnail image height
		'grid_vspace' => $grid_vspace, // Space between rows
		'grid_hspace' => $grid_hspace, // Space between items
		'grid_custom_image' => $grid_custom_image, // Use custom field to display images
		'grid_posts_limit' => $grid_posts_limit, // How many posts to display in the grid view?
		'slider_title' => $slider_title, // Title of the slider related posts block
		'slider_show_images' => $slider_show_images, // Display images or not?
		'slider_imagew' => $slider_imagew, // Thumbnail image width
		'slider_imageh' => $slider_imageh, // Thumbnail image height
		'slider_custom_image' => $slider_custom_image, // Use custom field to display images
		'slider_posts_limit' => $slider_posts_limit, // How many posts to display in the slider view?
		'slider_css3_effect' => $slider_css3_effect,
		'thumb_default' => $thumb_default, // Default thumbnail image
		'use_css3_effects' => $use_css3_effects, // Default thumbnail image
		'related_posts_type' => $related_posts_type, // Default thumbnail image
		'print_credits_link' => $print_credits_link
	);
	if ($aio_related_posts_settings != '' ) {
	    update_option( 'aio_settings' , $aio_related_posts_settings );
	} else {
	    $deprecated = ' ';
	    $autoload = 'no';
	    add_option( 'aio_settings', $aio_related_posts_settings, $deprecated, $autoload );
	}
		
}else //no update action
{
	$aio_related_posts_settings = aio_read_options();
}

?>
<style>
#aio_admin_main {
text-align:left;
direction:ltr;
padding:10px;
margin: 10px;
background-color: #ffffff;
border:1px solid #EBDDE2;
display: relative;
overflow: auto;
}
.inner_block{
height: 370px;
display: inline;
min-width:770px;
}
#donate{
    background-color: #EEFFEE;
    border: 1px solid #66DD66;
    border-radius: 10px 10px 10px 10px;
    height: 58px;
    padding: 10px;
    margin: 15px;
    }
</style>
<div id="donate">
<table border="0" width="100%" cellspacing="0" cellpadding="0" dir="ltr" height="88">
	<tr>
		<td align="center"><form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----
">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form></td>
		<td><strong>Your donation is like a diamond and Makes a Difference: it's forever</strong></td>
	</tr>
</table>
<div style="width: 6px; height: 0px"></div></div>
<div id="aio_admin_main">
<form method="POST">
<input type="hidden" value="update" name="action">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="77%" align="right" valign="top">

&nbsp;</td>
	</tr>
	<tr>
		<td width="77%">

<div class="inner_block">
	<?php $checkvalue = ''; if ($aio_related_posts_settings['related_posts_type'] == 'related_list') { $checkvalue = 'checked';}?>
	<h2>
	<input type="radio" value="related_list" name="related_posts_type" <?php echo $checkvalue ?> checked > Show Related Posts As List: 
	<?php if ($aio_related_posts_settings['related_posts_type'] == 'related_list') {?>
	<font face="Times New Roman" color="#008000">&#8730;</font><?php } ?></h2>
	<p><span class="st">&nbsp;&nbsp; In this mode the related posts to your 
	content will be displayed as a list of items row by row as a list, each row 
	(post) contain an image ant title and a small excerpt, you can change the 
	values for those elements to mach your needs as you like, at the options 
	block you can see that there is a default and best values web prefer for 
	each option, we recommend to let take the default values to get the best 
	view.</span></p>
	<table border="0" width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td width="60%">
	<div><font color="#C47500"><b>Change Options:</b></font></div>
	<div style="width: 490px; height: 269px; float: left; border: 1px solid #E9E9E9; padding: 4px" id="layer1">
		<table border="0" width="480" height="262" cellspacing="0" cellpadding="0">
			<tr>
				<td width="177" colspan="2">Related list custom title</td>
				<td width="178">
				<input type="text" name="list_title" size="32" style="width: 95; height:22" value="<?php echo $aio_related_posts_settings['list_title']; ?>"></td>
				<td width="125">&nbsp;</td>
			</tr>
			<tr>
				<td width="177" colspan="2">Show images</td>
				<td width="178"><select size="1" name="list_show_images">
				<?php 
				if ($aio_related_posts_settings['list_show_images'] == 'Yes')
					{
						echo '<option selected>Yes</option>';
						echo '<option>No</option>';
					}
					else
					{
						echo '<option>Yes</option>';
						echo '<option selected>No</option>';
					}
				?>
				</select></td>
				<td width="125">&nbsp;</td>
			</tr>
			<tr>
				<td width="87">Image width</td>
				<td title="Best Value: 85px" width="90"><?php echo "<img title='Best Value: 85px' src='$pluginsurl/images/what.gif' align='center' />";?></td>
				<td width="178">
				<input type="text" name="list_imagew" size="12" value="<?php echo $aio_related_posts_settings['list_imagew']; ?>"> px</td>
				<td width="125"><font color="#008000">Min value: 70</font></td>
			</tr>
			<tr>
				<td width="87">Image height</td>
				<td title="Best Value: 85px" width="90"><?php echo "<img title='Best Value: 85px' src='$pluginsurl/images/what.gif' align='center' />";?></td>
				<td width="178">
				<input type="text" name="list_imageh" size="12" value="<?php echo $aio_related_posts_settings['list_imageh']; ?>"> px</td>
				<td width="125">
				<font color="#008000">Min value: 70</font></td>
			</tr>
			<tr>
				<td width="177" colspan="2"><font size="2">Vertical space between 
				rows</font></td>
				<td width="178">
				<input type="text" name="list_vspace" size="12" value="<?php echo $aio_related_posts_settings['list_vspace']; ?>"> px</td>
				<td width="125"><font color="#008000">Min value: 2</font></td>
			</tr>
			<tr>
				<td width="177" colspan="2">Use custom image field</td>
				<td width="178">
				<input type="text" name="list_custom_image" size="12" value="<?php echo $aio_related_posts_settings['list_custom_image']; ?>"></td>
				<td width="125"><font color="#008000">Default: None</font></td>
			</tr>
			<tr>
				<td width="177" colspan="2">Posts limit</td>
				<td width="178"><select size="1" name="list_posts_limit">
				<?php for($i=1;$i<=9;$i++)
				{
					if ($i == $aio_related_posts_settings['list_posts_limit'])
						echo '<option selected>'. $i .'</option>';
					else
						echo '<option>'. $i .'</option>';
				}
				?>
				</select></td>
				<td width="125">
				<font color="#008000">Default: 5</font></td>
			</tr>
			<tr>
				<td width="177" colspan="2">Excerpt length in words</td>
				<td width="178">
				<input type="text" name="list_excerpt_length" size="12" value="<?php echo $aio_related_posts_settings['list_excerpt_length']; ?>">words</td>
				<td width="125">
				<font color="#008000">Best value: 18</font></td>
			</tr>
			<tr>
				<td width="177" colspan="2">CSS3 Effects on images</td>
				<td width="178"><select size="1" name="list_css3_effect">
				<?php 
				$choice = '';
				$css3_temp = $aio_related_posts_settings['list_css3_effect']; ?>
				<?php if ($css3_temp == 'None'){$choice = 'selected';}else{$choice = '';} ?>
				<option <?php echo $choice ?> value="None">None</option>
				<?php if ($css3_temp == '5'){$choice = 'selected';}else{$choice = '';} ?>
				<option <?php echo $choice ?> value="5">shadow 5px small</option>
				<?php if ($css3_temp == '10'){$choice = 'selected';}else{$choice = '';} ?>
				<option <?php echo $choice ?> value="10">shadow 10px medium</option>
				<?php if ($css3_temp == '15'){$choice = 'selected';}else{$choice = '';} ?>
				<option <?php echo $choice ?> value="15">shadow 15px big</option>
				</select></td>
				<td width="125">
				&nbsp;</td>
			</tr>
		</table></div>
			<p>&nbsp;</td>
			<td align="center" width="40%"><p>
		<?php echo "<img src='$pluginsurl/images/rlist2.png' align='center' />";?>&nbsp;</p></td>
		</tr>
	</table>
	
	<p>&nbsp;</p></div>
		</td>
	</tr>
	<tr>
		<td width="100%"><hr/>
		</td>
	</tr>
	<tr>
		<td width="77%">
<div class="inner_block">
	<?php $checkvalue = ''; if ($aio_related_posts_settings['related_posts_type'] == 'related_grid') { $checkvalue = 'checked';}?>
	<h2>
	<input type="radio" value="related_grid" name="related_posts_type" <?php echo $checkvalue ?>> Show Related Posts As Grid:
	<?php if ($aio_related_posts_settings['related_posts_type'] == 'related_grid') {?>
	<font face="Times New Roman" color="#008000">&#8730;</font><?php } ?>
	</h2>
	<p><span class="st">&nbsp;&nbsp; In this mode the related posts to your 
	content will be displayed as a list of items as a grid of rows, each row 
	contain some items and each item (post) an image ant title, you can change 
	the values for those elements to mach your needs as you like, at the options 
	block you can see that there is a default and best values web prefer for 
	each option, we recommend to let take the default values to get the best 
	view.</span></p>
<table border="0" width="100%" cellspacing="0" cellpadding="0">
	<tr>
		<td width="60%">
		<div><font color="#C47500"><b>Change Options:</b></font></div>
	<div style="width: 490px; height: 225px; float: left; border: 1px solid #E9E9E9; padding: 4px" id="layer2">
		<table border="0" width="100%" height="225" cellspacing="0" cellpadding="0">
			<tr>
				<td width="177">Related grid custom title</td>
				<td>
				<input type="text" name="grid_title" size="32" style="width: 158; height:22" value="<?php echo $aio_related_posts_settings['grid_title']; ?>"></td>
				<td width="153">&nbsp;</td>
			</tr>
			<tr>
				<td width="177">Image width</td>
				<td>
				<input type="text" name="grid_imagew" size="12" value="<?php echo $aio_related_posts_settings['grid_imagew']; ?>"> px</td>
				<td width="153"><font color="#008000">Min : 90 &amp; Best: 135</font></td>
			</tr>
			<tr>
				<td width="177">Image height</td>
				<td>
				<input type="text" name="grid_imageh" size="12" value="<?php echo $aio_related_posts_settings['grid_imageh']; ?>"> px</td>
				<td width="153"><font color="#008000">Min : 90 &amp; Best: 110</font></td>
			</tr>
			<tr>
				<td width="177">Vertical and Horizontal space between items</td>
				<td><b>V</b><input type="text" name="grid_vspace" size="4" value="<?php echo $aio_related_posts_settings['grid_vspace']; ?>"> px<b><font color="#C47500">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				</font>H</b><input type="text" name="grid_hspace" size="4" value="<?php echo $aio_related_posts_settings['grid_hspace']; ?>"> px</td>
				<td width="153"><font color="#008000">Best: V=25 &amp; H=30</font></td>
			</tr>
			<tr>
				<td width="177">Use custom image field</td>
				<td>
				<input type="text" name="grid_custom_image" size="12" value="<?php echo $aio_related_posts_settings['grid_custom_image']; ?>"></td>
				<td width="153"><font color="#008000">Default: None</font></td>
			</tr>
			<tr>
				<td width="177">Posts limit</td>
				<td><select size="1" name="grid_posts_limit">
				<?php for($i=1;$i<=9;$i++)
				{
					if ($i == $aio_related_posts_settings['grid_posts_limit'])
						echo '<option selected>'. $i .'</option>';
					else
						echo '<option>'. $i .'</option>';
				}
				?>
				</select></td>
				<td width="153">
				<font color="#008000">Default: 6</font></td>
			</tr>
		</table></div>
&nbsp;</td>
		<td align="center" width="40%">&nbsp;<?php echo "<img src='$pluginsurl/images/rgrid2.png' align='center' />";?></td>
	</tr>
</table>
</div>

&nbsp;</td>
	</tr>
	<tr>
		<td width="100%"><hr/>
		</td>
	</tr>
	<tr>
		<td width="77%">

<div class="inner_block">
	<?php $checkvalue = ''; if ($aio_related_posts_settings['related_posts_type'] == 'related_slider') { $checkvalue = 'checked';}?>
	<h2>
	<input type="radio" value="related_slider" name="related_posts_type" <?php echo $checkvalue ?>> Show Related Posts As 
	Bottom jQuery Slider:
	<?php if ($aio_related_posts_settings['related_posts_type'] == 'related_slider') {?>
	<font face="Times New Roman" color="#008000">&#8730;</font><?php } ?>
	</h2>
	<p><span dir="ltr"><span class="st">Displaying 
	<em style="font-style: normal">related posts</em> in a 
	very great way to help visitors staying longer on your blog. using this mode 
	will give your pages the perfect animation, </span></span>it create a 
	rotating content module. It works by creating &quot;<b>slides</b>&quot; of related 
	posts and you have several options for customization</p>
		<table border="0" width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<td width="60%">
		<div><font color="#C47500"><b>Change Options:</b></font></div>
	<div style="width: 490px; height: 239px; float: left; border: 1px solid #E9E9E9; padding: 4px" id="layer3">
		<table border="0" width="100%" height="229" cellspacing="0" cellpadding="0">
			<tr>
				<td width="177">Related slider custom title</td>
				<td>
				<input type="text" name="slider_title" size="32" style="width: 158" value="<?php echo $aio_related_posts_settings['slider_title']; ?>"></td>
				<td width="125">&nbsp;</td>
			</tr>
			<tr>
				<td width="177">Show images</td>
				<td><select size="1" name="slider_show_images">
				<?php 
				if ($aio_related_posts_settings['slider_show_images'] == 'Yes')
					{
						echo '<option selected>Yes</option>';
						echo '<option>No</option>';
					}
					else
					{
						echo '<option>Yes</option>';
						echo '<option selected>No</option>';
					}
				?>
				</select></td>
				<td width="125">&nbsp;</td>
			</tr>
			<tr>
				<td width="177">Image width</td>
				<td>
				<input type="text" name="slider_imagew" size="12" value="<?php echo $aio_related_posts_settings['slider_imagew']; ?>"> px</td>
				<td width="125"><font color="#008000">Min value: 50</font></td>
			</tr>
			<tr>
				<td width="177">Image height</td>
				<td>
				<input type="text" name="slider_imageh" size="12" value="<?php echo $aio_related_posts_settings['slider_imageh']; ?>"> px</td>
				<td width="125"><font color="#008000">Min value: 50</font></td>
			</tr>
			<tr>
				<td width="177">Use custom image field</td>
				<td>
				<input type="text" name="slider_custom_image" size="12" value="<?php echo $aio_related_posts_settings['slider_custom_image']; ?>"></td>
				<td width="125"><font color="#008000">Default: None</font></td>
			</tr>
			<tr>
				<td width="177">Posts limit</td>
				<td>
				<select size="1" name="slider_posts_limit">
				<?php for($i=1;$i<=9;$i++)
				{
					if ($i == $aio_related_posts_settings['slider_posts_limit'])
						echo '<option selected>'. $i .'</option>';
					else
						echo '<option>'. $i .'</option>';
				}
				?>
				</select></td>
				<td width="125"><font color="#008000">Default: 5</font></td>
			</tr>
			<tr>
				<td width="177">CSS3 slider effect</td>
				<td><select size="1" name="slider_css3_effect">
				<?php 
				$choice = '';
				$css3_temp = $aio_related_posts_settings['slider_css3_effect']; ?>
				<?php if ($css3_temp == 'None'){$choice = 'selected';}else{$choice = '';} ?>
				<option <?php echo $choice ?> value="None">None</option>
				<?php if ($css3_temp == '5'){$choice = 'selected';}else{$choice = '';} ?>
				<option <?php echo $choice ?> value="5">shadow 5px small</option>
				<?php if ($css3_temp == '10'){$choice = 'selected';}else{$choice = '';} ?>
				<option <?php echo $choice ?> value="10">shadow 10px medium</option>
				<?php if ($css3_temp == '15'){$choice = 'selected';}else{$choice = '';} ?>
				<option <?php echo $choice ?> value="15">shadow 15px big</option>
				</select>&nbsp;</td>
				<td width="125">
				</td>
			</tr>
		</table></div>

				<p>&nbsp;</td>
				<td align="center" width="40%">&nbsp;<?php echo "<img src='$pluginsurl/images/rslider2.png' align='center' />";?></td>
			</tr>
	</table>
<?php $checkvalue = ''; if ($aio_related_posts_settings['print_credits_link'] == 'yes') { $checkvalue = 'checked';}?>
	<p><input type="checkbox" name="print_credits_link" value="yes" <?php echo $checkvalue ?>>Show 
	credits link to support us</p>

	<p align="right">
				<input type="submit" value="     Save all Settings     " name="B4" style="width: 193; height: 29; border: 1px solid #008000; padding-left: 4px; padding-right: 4px; padding-top: 1px; padding-bottom: 1px">&nbsp;&nbsp;
	</p>

	<p>&nbsp;</p>
</div>
&nbsp;</td>
	</tr>
</table>

<p>
	</li></p>
</form></div>
<p>&nbsp;</p>