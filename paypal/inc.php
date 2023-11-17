<?php
ini_set('include_path', '~/pear/lib' . PATH_SEPARATOR
        . ini_get('include_path'));

// From PHP 4.3.0 onward, you can use the following,
// which especially useful on shared hosts:
set_include_path('~/go-pear.php/Pear/lib' . PATH_SEPARATOR
                 . get_include_path());
?>