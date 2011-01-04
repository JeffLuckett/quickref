<div class="search">
	<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
		<fieldset>
			<p><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /> <input type="submit" id="searchsubmit" value="Search" /></p>
		</fieldset>
	</form>
</div>
