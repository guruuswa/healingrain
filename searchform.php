<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">
    <div>
	    <input class="input" type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="Search" autocomplete="off">
	    <input type="hidden" name="post_type" value="book">	    
    	<input class="submit" type="submit" id="searchsubmit" value="Search">
    </div>
</form>