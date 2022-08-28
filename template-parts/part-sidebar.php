<aside>
    <div class="sidebar--wrapper">
        <div class="sidebar--blocks">
            <div class="sidebar--block">
            <?php if ( is_active_sidebar( 'sidebar-main' ) ) { ?>
                    <ul id="emw-sidebar">
                        <?php dynamic_sidebar('sidebar-main'); ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    </div>
</aside>