<?php global $opt;?>
<?php 
	if($search_code=$opt['swift_search_code']):
	echo '<div class="nav-search">'.stripslashes($search_code).'</div>';
	else:
?>
<div class="nav-search">
	<form method="get"  action="<?php bloginfo('url'); ?>/"><input type="text" value="Type and hit enter to Search" name="s" id="navsearch" onfocus="if (this.value == 'Type and hit enter to Search') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Type and hit enter to Search';}" /> <input type="hidden"  value="GO" />
	</form>
</div>

<?php endif;?>
