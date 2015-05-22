<?php
function change_footer_admin () {
echo 'Made BY <a href="#">Me<a>';
}
add_filter('admin_footer_text', 'change_footer_admin');


