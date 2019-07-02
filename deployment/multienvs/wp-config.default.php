<?php
/**
 * Default config settings
 *
 * Enter any WordPress config settings that are default to all environments
 * in this file.
 * 
 * Please note if you add constants in this file (i.e. define statements) 
 * these cannot be overridden in environment config files so make sure these are only set once.
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    2.0.0
 * @author     Studio 24 Ltd  <hello@studio24.net>
 */
  

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'hCT/wOYLvAUI?Ze2n.]e[4E*3Wy,/3-KsRwL3e_F?jLuMV4O^Vh,PNx_8;zQ$Ws/');
define('SECURE_AUTH_KEY',  'B{]l;NEIi^#fx62lU@Glfg<W2& :[z%?Qp5(Fm*sNG;G/cEgYf$H58PpolbFwQ[q');
define('LOGGED_IN_KEY',    '5<zf7oeD&#m0!8vpB3{mv;;1Ru<#Db+]&~X)>|UuXjT`pnsn4CfM<5[BX<ODtY<0');
define('NONCE_KEY',        'u3-HGQG#GiB:D95X]A~m6q+{4zC4nta&:=K_01yEZ&c/1w2!o|wR}!+OJ-@HXGgZ');
define('AUTH_SALT',        'Q{OUp(_0<7T+AJ-40;S#t)9:r{&~%+AVVUtpD}*5Wq{OlV_>])1uRcR;g:#WB>Jo');
define('SECURE_AUTH_SALT', ']a(I4to}o;wDGHE$s^K9DPlS~m0LN![K1@6-rnN24[=f8n9DQNsx#@hQR{I+Dr[T');
define('LOGGED_IN_SALT',   '3&_TOs945bnU-(JA=>N1XPrXmA}Xt$dm.??XTj(]o(r9-z56V*4^NbH,y8}=X$~L');
define('NONCE_SALT',       '6[8:XO02UDGD@@)XM|ZeR?B,]| 8~FG*Fy*&1T~[f8Lo~|DqnxSvIw[7!{lp;Q:N');
/**#@-*/
/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix  = 'wp_';
define('FS_METHOD','direct');

/**#@-*/


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
// define('WPLANG', '');


// Recommended WP config settings, uncomment to use these

/**
 * Increase memory limit. 
 */
//define('WP_MEMORY_LIMIT', '64M');

/**
 * Limit post revisions.
 */
//define('WP_POST_REVISIONS', 5);

/**
 * Disable automatic updates.
 */
//define( 'AUTOMATIC_UPDATER_DISABLED', true );

/**
 * Disable file editor.
 */
//define( 'DISALLOW_FILE_EDIT', true );
