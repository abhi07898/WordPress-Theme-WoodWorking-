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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'Practise_WordPress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '/&#(PEwSy3;;cYYA0,;8EDHo5)nB1?chU!KS8XwQU(#U.>!T]Rj%^|ua|8pKuH:r' );
define( 'SECURE_AUTH_KEY',  '.EvU2;IwoxlVX_peC#yB>M$_(^}3HR|qGwMR+u?e{K^SDH}H#Cm@A+lYi{mxF/$,' );
define( 'LOGGED_IN_KEY',    'l<IlncIMte:}!#K}Do;{EZ~ZpQDk5%i,}/4_ZP*u^7[XX|?tT)7itr0NhHg;o7?n' );
define( 'NONCE_KEY',        'Y?9_[_H=k}OC$Ln|TbE4qB6$1|9ADqKK)vg.@F5`S~O?!<.$~?xM)3tM_-c2~vRa' );
define( 'AUTH_SALT',        '8{e9#I}MQ<8XpgYw_<Z9N~E&FlsPIuMlsE~Ms~p?,U>]:<A`=kO-er)*YmB0Fb}P' );
define( 'SECURE_AUTH_SALT', 'W*U$#BA17JY{(fakEv8w,I]9h%:;l3lc+U],Y,2rn@<P%@t7dy[cUL{$5geim|o5' );
define( 'LOGGED_IN_SALT',   '8LlqQ-299SX8c|I9.fR/D|OA)!K7+FB)Y.}Ol5fxus+q8KFSP0tkHbK175Nkn%Cz' );
define( 'NONCE_SALT',       'Mg%sA9Ri92:wLdz9g<faLRo:qmU|g@g.=1~J-4+R$$4<5xj^>lLY?PKKkq9rcFo ' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
define('FS_METHOD','direct');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
