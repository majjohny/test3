<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'test3');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '`*KD!srn0M/DQHEAG] ^R76% -,V1<.IE%$.BG:[h%[2#Vz@ax7sB>D}]Wgzn=##');
define('SECURE_AUTH_KEY',  ' zN!g)yttyf/H}Y19nZ8RV$-oKv`r]B}f-PRMVRCR@n:v=*faGiC?dXysU&=->!6');
define('LOGGED_IN_KEY',    '7^0t6LHYd:[e_ eJJQTnN!s?o 7f%6a=)nZ]:45J#J.{+|jr^.Iq$C5$:z[6krs<');
define('NONCE_KEY',        'C<8V}FMz/d%3Jn*e{s]VAG^3(/|=/4M?}W@`:*^]m><:FXI&{zQ(KJH,|GE^M=x=');
define('AUTH_SALT',        'v==cE*fAg)yIc+M9M*s)Dw3e~1Z3c]e_MJuY}W2>A2XnAJuif^DP#Z3Y3I{g5u)@');
define('SECURE_AUTH_SALT', 'gfM@3v@|*sd~o0s^h?+w4IPESkneduA.L]Z,!UGw  vY_*?r@L(z9Xw#Y_H:MVee');
define('LOGGED_IN_SALT',   '@rzgRzrEna}bx#XWjVTZt.N5~D<i<Nw#K>R#/eNqz#[6sC2#uQ.ZJ>}gO(6?YUsm');
define('NONCE_SALT',       ']Kc~lT6Z]HCMB{v!rvPn(>i!K%Rv`0+:H4,>9XWPU m;i3- }ZI^.>=KN!>gbCA2');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
