<div id="form-search" class="box-search">
	<form role="search" method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
		<input type="text" placeholder="Search" class="input-search" value="<?php the_search_query(); ?>" name="s" id="s">
		<button id="searchsubmit" class="fa fa-search"></button>
	</form>
</div>

<select id="tags" name="tag-dropdown" onchange="document.location.href=this.options[this.selectedIndex].value;">
	<option value="#">All Topics</option>
	<?php dropdown_tag_cloud('number=0&order=asc'); ?>
</select>

