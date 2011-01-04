<?php function admin_header(){?>

<div class="swift-wrapper" class="wrap clearfix">


<div id="swift-header" class="clearfix">

	<div id="swift-logo" class="alignleft">
	<a href="http://swiftthemes.com" rel="external" ><img src="<?php bloginfo('template_url')?>/admin/images/swift-logo.png" /></a>
	</div>

	<div id="donate-form" class="alignright">
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input name="cmd" value="_xclick" type="hidden">
    	<input name="business" value="satish_g2009@yahoo.co.in" type="hidden">
    	<input name="item_name" value="SwiftTheme Donation" type="hidden">
    	<input name="item_number" value="SwiftThemes-DONATE" type="hidden">
    	<input name="no_note" value="1" type="hidden">

    	<input name="currency_code" value="USD" type="hidden">
    	<input name="return" value="http://swiftthemes.com/thank-you" type="hidden">

    	<input name="tax" value="0" type="hidden">
    	<input name="lc" value="US" type="hidden">
		<b>Enter amount in $</b> <input name="amount" value="15.00" size="6" type="text"><br />
		<input name="submit" value="Buy Satish a Coffee" type="submit" class="donate">
		</form>
	</div>
    
</div>	
    
	<div id="nav">
    	<ul style="float:left;border-bottom:none">
        <li style="padding:.2em 1em; border:none" >You are using v5.28</li>
        </ul>
    	<ul class="clearfix">
    		<li><a href="http://swiftthemes.com/2009/09/wordpress-themes/a-complete-guide-to-installing-and-customizing-swift/" title="A complete guide to installing and customizing SWIFT">User Guide</a></li>
			<li><a href="http://swiftthemes.com/forums" title="Need more help? Check out support forum.">Support forum</a></li>
			<li><a href="http://swiftthemes.com/testimonials/" title="Write a testimonial for SWIFT">Write a Testimonial</a></li>
			<li class="last"><a href="http://swiftthemes.com/hire-me/" title="Hire Satish Gandham for a custom theme modification">Request a custom theme modification</a></li>
    	</ul>
	</div><!--/nav1-->
    <!-- BuySellAds.com Zone Code -->
    <div id="ad-container">
<!-- END BuySellAds.com Zone Code -->
	</div>
<div class="clear"></div>
<?php }?>