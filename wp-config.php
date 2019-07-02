<?php
/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');
/** Load the Studio 24 WordPress Multi-Environment Config. */
require_once(ABSPATH . 'deployment/multienvs/wp-config.load.php');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
?>
