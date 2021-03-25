<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" aria-label="Search term" aria-describedby="footer-search-button" name="s" value="<?php echo get_search_query(); ?>">
        <button class="btn btn-outline-light" type="submit" id="footer-search-button"><i class="bi bi-search"></i></button>
    </div>
</form>
