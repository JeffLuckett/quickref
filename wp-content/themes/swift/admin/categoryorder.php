<?php

 function swift_mycategoryorder_getTarget() {
	return "admin.php";
}

function swift_mycategoryorder()
{wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
	global $wpdb;
	
	$mode = "";
	$mode = $_GET['mode'];
	$parentID = 0;
	$success = "";
	if (isset($_GET['parentID']))
	    $parentID = $_GET['parentID'];
		
	if(isset($_GET['hideNote']))
		update_option('mycategoryorder_hideNote', '1');
		

	if($mode == "act_OrderCategories")
	{  
		$idString = $_GET['idString'];
		$catIDs = explode(",", $idString);
		$result = count($catIDs);
		
		$catString=$_GET['catString'];
		
		$success = '<div id="message" class="updated fade"><p>'. __('Categories Selected Successfully.', 'mycategoryorder').'</p></div>';
		update_option( 'swift_cat_inc', $catString );

	}

?>

	
<?php 


	 $categories=  get_categories('hide_empty=0'); ?>
<div id="cat-order" >
	<h3><?php _e('Select Categories','mycategoryorder'); ?></h3>
    <p>Select the categories you want to include in your nav menu, click the button below to save.</p>
	<ul id="orderCats">
    
		<?php 
			$inc=explode(',',get_option('swift_cat_inc'));
			
		foreach($categories as $row)
		{
		if (in_array($row->cat_ID, $inc))$check='"checked"'; 
		else  $check="";
			echo "<li  class='lineitem'><input id='$row->cat_ID' type='checkbox'".$check."  value='$row->cat_ID' />
			<label for='$row->cat_ID'>
			$row->category_nicename
			</label>
			</li>";
		}?>
	</ul>

	<input type="button" id="orderButton" Value="<?php _e('Click to Save Category Selection','mycategoryorder'); ?>" onclick="javascript:orderCats();">&nbsp;&nbsp;<strong id="updateText"></strong>
</div>
<div class="clear"></div>
<script language="JavaScript">
	

 // <![CDATA[

		
 
		
	

	function orderCats() {
		var cats = [];
		jQuery('#orderCats input:checked').each(function() { cats.push(this.value); });	
		var catList = cats.join(",");
		
		jQuery("#orderButton").css("display", "none");
		jQuery("#updateText").html("<?php _e('Saving Selection...','mycategoryorder'); ?>");
		
		idList = jQuery("#orderCats").sortable("toArray");
		location.href = '<?php echo swift_mycategoryorder_getTarget(); ?>?page=swift-options&mode=act_OrderCategories&parentID=<?php echo $parentID; ?>&idString='+idList+'&catString='+catList+'#Header-Options';
	}
	function goEdit ()

	{
		if(jQuery("#cats").val() != "")
			location.href="<?php echo swift_mycategoryorder_getTarget(); ?>?page=swift-options&parentID="+jQuery("#cats").val();
	}
	
	// ]]>
</script>

<?php } ?>
