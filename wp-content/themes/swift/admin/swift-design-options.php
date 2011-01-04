<?php require_once('admin-header.php');?>
<?php admin_header();?>
<div class="tabs">
  <ul class="tabmenu hidden">
  	<li><a href="#Layout">Layout Options</a></li>
  	<li><a href="#Fonts">Fonts</a></li>
    <li><a href="#colors">Colors</a></li> 
    <li><a href="#bgImages">Background Images</a></li>
    <li><a href="#Rounded-Corners">Rounded Corners</a></li>
    <li><a href="#Custom-CSS">Custom CSS</a></li>
  </ul>



<form method="post"  action="options.php">
<?php wp_nonce_field('update-options'); global $themename, $shortname2, $swift_design_options;?> 
<?php
$design_opt=NULL;
$design_opt=get_option('swift_design_opt');
foreach ($swift_design_options as $value) 
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

<?php break; case "tab-title": ?>	
    <div id="<?php echo $value['name']; ?>">
    <h2><?php echo $value['name']; ?></h2>
    
<?php break; case "heading": ?>	
    <div id="sub-heading">
    <h3><?php echo $value['name']; ?></h3>

<?php break; case "sub-heading": ?>		
<div class="sub-heading"><h4><?php echo $value['name']; ?></h4></div>

<?php break; case 'text': ?>
<div  class="text">
<input name="<?php echo $value['id']; ?>" class="color" id="<?php echo stripslashes($design_opt[$value['id']]); ?>" type="<?php echo $value['type']; ?>" value="<?php if ( $design_opt[$value['id']] != "") { echo stripslashes($design_opt[$value['id']]); } else { echo stripslashes($value['std']); } ?>" />
<span class="title"><?php echo $value['name']; ?></span> 
<div class="clear"></div>
</div>

<?php break; case 'regulartext': ?>
<div  class="text">
<span class="title"><?php echo $value['name']; ?></span>
<input class="width" name="<?php echo $value['id']; ?>" id="<?php echo stripslashes($design_opt[$value['id']]); ?>" type="<?php echo $value['type']; ?>" value="<?php if ( $design_opt[$value['id']] != "") { echo stripslashes($design_opt[$value['id']]); } else { echo stripslashes($value['std']); } ?>" />
<span class="desc"><?php echo $value['desc']; ?></span>
</div>


<?php break; case 'textarea': ?>
<div class="textarea clearfix">
<span class="title"><?php echo $value['name']; ?></span>
<textarea name="<?php echo $value['id']; ?>"type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( $design_opt[$value['id']] != "") { echo stripslashes($design_opt[$value['id']]); } else { echo $value['std']; } ?></textarea>
<span class="desc"><?php echo $value['desc']; ?></span>
<br />
</div>

<?php break; case "checkbox": ?>
<div class="checkbox">
<?php if($design_opt[$value['id']]=="true"){ $checked = "checked=\"checked\""; }else{ $checked = "";} 
?>

<input type="checkbox" class="cb" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
<span class="title"><?php echo $value['name']; ?></span>
<span class="desc">(<?php echo $value['desc']; ?>)</span>
</div>

<?php break; case 'radio': ?>
<div class="radio text">
<span class="title"><?php echo $value['name']; ?></span>
<?php foreach ($value['options'] as $option) { ?>
<label>
<input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $option?>" <?php if ( $design_opt[ $value['id'] ] == $option){ echo 'checked';} ?> /><?php echo $option?>

</label>
<?php } ?>
</div>

<?php break; case 'select': ?>
<div class="select text">
<span class="title"><?php echo $value['name']; ?></span>
<select class="width" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
	<option <?php 
	if ( $design_opt[$value['id']] == $option) {  echo ' selected'; }?> >
	<?php echo $option; ?>
    </option>
	<?php } ?>
</select>
<span class="description"><?php echo $value['desc']; ?></span>
</div>


<?php break; case 'hidden': ?>

<input name="<?php echo $value['id']; ?>" id="" type="hidden" value="<?php echo rand()?>" />

<?php 
}
}
?>  
<input type="hidden" name="action" value="update" />
<input type="hidden" name="swift_design_options" value="set" />
<input type="hidden" name="page_options" value="swift_random" />
<p class="submit">
<input type="submit" class="button-primary alignright" value="<?php _e('Save Changes') ?>" />
<input type="submit" name="design-reset" class="button-primary alignleft" value="Reset" id="reset" /> 
<div class="clear"></div>
</p> 
</div>
</form>

</div><!-- /swift-wrapper-->
