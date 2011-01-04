<?php  
 

function swift_mypageorder()
{
global $wpdb;
$mode = "";
$mode = $_GET['mode'];
$parentID = 0;

if (isset($_GET['parentID']))
	$parentID = $_GET['parentID'];
	
if(isset($_GET['hideNote']))
	update_option('mypageorder_hideNote', '1');
	
$success = "";

if($mode == "act_OrderPages")
	$success = swift_mypageorder_updateOrder();
	 
?>

<div id="page-order">
	<h2><?php _e('My Page Order', 'mypageorder') ?></h2>
	<?php 
	echo $success;

	?>
	<h3><?php _e('Select Pages', 'mypageorder') ?></h3>
	    <p>Select the pages you want to be included in the navigation bar, click the button below to save.</p>
	<ul id="order">
	<?php
	
	$inc=explode(',',get_option('swift_page_inc'));
	$results = swift_mypageorder_pageQuery();
	foreach($results as $row)
	{
		if (in_array($row->ID, $inc))$check='"checked"'; 
		else  $check="";
	$output='<li  class="lineitem"><input id='.$row->ID.' type="checkbox" name="navPages[]"'.$check.' value="'.$row->ID.'" />
	<label for='.$row->ID.'>'.$row->post_title.'</label></li>';
	echo $output;	
	}
	?>
	</ul>
	
	<input type="button" id="orderButton" Value="<?php _e('Click to Save Page Selection', 'mypageorder') ?>" onclick="javascript:orderPages();">&nbsp;&nbsp;<strong id="updateText"></strong>
</div>



<script type="text/javascript">
// <![CDATA[



	
	function orderPages() {
		jQuery("#orderButton").css("display", "none");
		jQuery("#updateText").html("<?php _e('Updating Page Selection...', 'mypageorder') ?>");
		idList = jQuery("#order").sortable("toArray");
		
		var pages = [];
		jQuery('#order input:checked').each(function() { pages.push(this.value); });	
		var pagesList = pages.join(",");
	 
		
		location.href = '<?php echo swift_mypageorder_getTarget(); ?>?page=swift-options&mode=act_OrderPages&parentID=<?php echo $parentID; ?>&idString='+idList+'&pageString='+pagesList+'#Header-Options';
				 
	}


	function goEdit () {
		if(jQuery("#pages").val() != "")
			location.href="<?php echo swift_mypageorder_getTarget(); ?>?page=swift-options&mode=dsp_OrderPages&parentID="+jQuery("#pages").val();
	}
// ]]>
</script>
<?php
}

//Switch page target depending on version
function swift_mypageorder_getTarget() {
	return "admin.php";
}

function swift_mypageorder_updateOrder()
{
	global $wpdb;	$pageList =  $_GET['pageString'];

	
	update_option( 'swift_page_inc', $pageList );
	return '<div id="message" class="updated fade"><p>'. __('Pages Selected Successfully.', 'mypageorder').'</p></div>';
}


function swift_mypageorder_pageQuery()
{
	global $wpdb;
	
	return $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'page' ORDER BY menu_order ASC");
}

function swift_mypageorder_getParentLink($parentID)
{
	global $wpdb;
	
	if($parentID != 0)
	{
		$parentsParent = $wpdb->get_row("SELECT post_parent FROM $wpdb->posts WHERE ID = $parentID ", ARRAY_N);
		return "<a href='". swift_mypageorder_getTarget() . "?page=mypageorder&parentID=$parentsParent[0]'>" . __('Return to parent page', 'mypageorder') . "</a>";
	}
	
	return "";
}

?>
