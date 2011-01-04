<?php
function ads_widget($one,$two,$three,$four){
	if($one=="true"&&get_option('swift_banner1image')&&get_option('swift_banner1destination')): ?>
    
	<a href="<?php echo $swift_banner1destination;?>" /><?php }?><?php if ($swift_banner1image){  ?><img class="left" src="
	<?php echo $swift_banner1image; ?>" alt="" /></a><?php }?>
    <?php endif;?>
    
    <?php	if($two=="true"&&get_option('swift_banner2image')&&get_option('swift_banner2destination')): ?>
    
	<a href="<?php echo $swift_banner1destination;?>" /><?php }?><?php if ($swift_banner1image){  ?><img class="left" src="
	<?php echo $swift_banner1image; ?>" alt="" /></a><?php }?>
    <?php endif;?>
    
    <?php	if($three=="true"&&get_option('swift_banner3image')&&get_option('swift_banner3destination')): ?>
    
	<a href="<?php echo $swift_banner1destination;?>" /><?php }?><?php if ($swift_banner1image){  ?><img class="left" src="
	<?php echo $swift_banner1image; ?>" alt="" /></a><?php }?>
    <?php endif;?>
    
    
    <?php	if($four=="true"&&get_option('swift_banner4image')&&get_option('swift_banner4destination')): ?>
    
	<a href="<?php echo $swift_banner1destination;?>" /><?php }?><?php if ($swift_banner1image){  ?><img class="left" src="
	<?php echo $swift_banner1image; ?>" alt="" /></a><?php }?>
    <?php endif;?>
    
<?php }?>
