<?php require_once('admin-header.php');?>
<?php admin_header();?>
<div class="tabs">
  <ul class="tabmenu hidden">
    <li><a href="#General-Settings">General</a></li>
    <li><a href="#Header-Options">Header</a></li>
    <li><a href="#Homepage">Home and Archive Pages</a></li>
    <li><a href="#SinglePage">Single Page</a></li>
    <li><a href="#SocialMedia">Social Media</a></li>
    <li><a href="#Ad-Management">Ad Management</a></li>
  </ul>
  

 
<form method="post"  action="options.php">
<?php wp_nonce_field('update-options'); global $themename, $shortname, $swift_options;?> 
<?php
global $opt;
foreach ($swift_options as $value) 
{
	if($value['id']!=NULL)$options_list.=$value['id'].',';
	switch ( $value['type'] ) 
	{
		case "open":
?>
<div class="open"> 

<?php break; case "close": ?>
</div>

<?php break; case "clear": ?>
<div class="clear"></div>

<?php break; case "heading": ?>	
    <div id="<?php echo $value['name']; ?>">
    <h2><?php echo $value['name']; ?></h2>

<?php break; case "sub-heading": ?>		
<div class="sub-heading"><h4><?php _e($value['name']); ?></h4></div>

<?php break; case 'text': ?>
<div  class="text">
<span class="title"><?php  _e($value['name']); ?></span>
<input class="width" name="<?php echo $value['id']; ?>" id="<?php echo stripslashes($opt[ $value['id'] ]); ?>" type="<?php echo $value['type']; ?>" value="<?php if ( $opt[ $value['id'] ] != "") { echo stripslashes($opt[ $value['id'] ]); } else { echo stripslashes($value['std']); } ?>" />
<span class="desc"><?php echo $value['desc']; ?></span>
</div>

<?php break; case 'textarea': ?>
<div class="textarea clearfix">
<span class="title"><?php echo $value['name']; ?></span>
<textarea name="<?php echo $value['id']; ?>"type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( $opt[ $value['id'] ] != "") { echo stripslashes($opt[ $value['id'] ]); } else { echo $value['std']; } ?></textarea>
<span class="desc"><?php echo $value['desc']; ?></span>
<br />
</div>

<?php break; case "checkbox": ?>
<div class="checkbox">
<?php if($opt[$value['id']]=="true"){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" class="cb" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?>  />

<label for="<?php echo $value['id']; ?>"><span class="title"><?php echo $value['name']; ?></span>
<span class="desc">(<?php echo $value['desc']; ?>)</span></label>
</div>

<?php break; case 'ordering': ?>
<p style="padding:1em; background:#FC6;width:77.4%;">
According to the reviewer at WordPress.org's theme directoy, themes are not allowed to modify core WordPress tables. To be compliant and be listed in the directory, Page reorder and Category reorder feature have been removed since v5.02. You can use the plugins <a href="http://www.geekyweekly.com/mypageorder" target="_blank"><strong>My Page Order</strong></a> and <a href="http://geekyweekly.com/mycategoryorder" target="_blank"><strong>My Category Order</strong></a> to modify the order of categories and pages.
</p>
<?php
	swift_mypageorder();
 	swift_mycategoryorder();
?>

<?php break; case 'radio': ?>
<div class="radio text">
<span class="title"><?php echo $value['name']; ?></span>
<?php foreach ($value['options'] as $option) { ?>
<label><input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option?>" <?php if ( $opt[ $value['id'] ] == $option){ echo 'checked';} ?>/><?php echo $option?></label>
<?php } ?>
</div>

<?php break; case 'select': ?>
<div class="select text">
<span class="title"><?php echo $value['name']; ?></span>
<select class="width" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
	<option <?php 
	if ( $opt[ $value['id'] ] == $option) {  echo ' selected'; }?> >
	<?php echo $option; ?>
    </option>
	<?php } ?>
</select>
<span class="description"><?php echo $value['desc']; ?></span>
</div>

<?php break; case 'hidden': ?>

<input name="<?php echo $value['id']; ?>" id="<?php echo stripslashes($opt[ $value['id'] ]); ?>" type="hidden" value="<?php echo rand()?>" />


<?php 
} 
}
?> 

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="swift_random" />
<input type="hidden" name="swift_options" value="set" />
<p class="submit">
<input type="submit" class="button-primary alignright" value="<?php _e('Save Changes') ?>" />
<input type="submit" name="general-reset" class="button-primary alignleft" value="Reset" id="reset" /> 
<div class="clear"></div>
</p>

</div>
   



</form>
</div><!-- /swift-wrapper-->
