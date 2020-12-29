<div id="footer">            
        <!-- end #footer -->
        <?php if (is_page('about')) {?>
            <p>A different Footer by suing conditionsl-code()--> 2020 cedcoss.com. All rights reserved. Design by <a href="http://www.cedcoss.com/" rel="nofollow">CedCoss.com</a>.</p>
        </div>
        <?php } else {?>
            <p>Copyright (c) 2020 cedcoss.com. All rights reserved. Design by <a href="http://www.cedcoss.com/" rel="nofollow">CedCoss.com</a>.</p>
        </div>
        <?php }?> 
        <?php wp_nav_menu(array( 'theme_location' => 'extra-menu'));?>
    </div>
</div>
</body>
<?php wp_footer();?>
</html>
