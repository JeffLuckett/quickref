<?php require_once('admin-header.php');?>
<?php
admin_header();

//echo  get_option('swift_design_opt') ;
//echo serialize (get_option('swift_design_opt'));

?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<h3 style="padding:.5em; background:#FC9; border: solid 2px #FC6; line-height:1.5em; color:#315607">To export options copy paste the text in both the fields into your new blog, to import options from another blog do the opposite.
Do not make any changes to the import / export text string.
</h3>
<table class="form-table">

<tr valign="top">
<th scope="row"><h3>Swift Options</h3></th>
<td><textarea name="swift_opt" style="width:80%" rows="20"><?php echo stripslashes(serialize (get_option('swift_opt'))); ?></textarea></td>
</tr>
<tr valign="top">
<th scope="row"><h3>Swift Design Options</h3></th>
<td><textarea name="swift_design_opt" style="width:80%" rows="20"><?php echo  stripslashes(serialize (get_option('swift_design_opt'))); ?></textarea></td>
</tr>
 </table>
<input name="swift_random" id="<?php echo stripslashes($opt[ 'swift_random' ]); ?>" type="hidden" value="<?php echo rand()?>" />
<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="swift_random" />
<input type="hidden" name="swift_importExport" value="set" />
<p class="submit">
<input type="submit" class="button-primary" value="<?php _e('Import Options') ?>"  style="float:right; margin-right:15%;"/>
</p>
<div class="clear"></div>
</form> 
</div><!-- /swift-wrapper-->
