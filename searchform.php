<form class="search form-inline" method="get" action="<?php echo home_url(); ?>" role="search">
    <div class="form-group mx-sm-3 mb-2 w-100">
        <h2>Search</h2>
        <input class="search-input form-control w-100 mb-2" type="search" name="s"
               placeholder="<?php _e( 'To search, type and hit enter.', 'blank_theme' ); ?>">
        <button class="search-submit btn btn-primary w-100" type="submit"
                role="button"><?php _e( 'Search', 'blank_theme' ); ?></button>
    </div>
</form>
