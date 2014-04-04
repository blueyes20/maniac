<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'cuarent_holidays_nerja');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'holidaysnerja');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'terratec2');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '.J nhSQ5Z;De(q=?j:I:vBUI;F|@T$!]b%2ZQtC;-V-uCL>vjh!tKYESuqw0{UMl'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_KEY', 't;#%5zdV;2svh_s@C6bvmr]K1+q]IY7}.|!uTlG;U!:)|oxWLS]-wds1MnB<7X[,'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_KEY', 'b|RO;8.bKL3-T.li:tb+`W45vYsjo|9]CSJ2Wv2lMaK5$nY?W:c75frBA&/.]rg)'); // Cambia esto por tu frase aleatoria.
define('NONCE_KEY', 'G4~q@RwDei/O_&PkgvTahlEb#Lo S-swf8qCL?@DZy+8z4!cI8]pC%?X+fVy$JF-'); // Cambia esto por tu frase aleatoria.
define('AUTH_SALT', '1_.MpnYL~B(ga:e/I=YCE8{yX`uX-.s{:IG[y^q&.wrM*[@AEz+ci83_GH%=.(73'); // Cambia esto por tu frase aleatoria.
define('SECURE_AUTH_SALT', 'F}@RKhe>Z:m[5S4t)9X#T^aM?Ai2yF^dN(5)=o_[F4a poPl_>Rk<4AXi+TTsg*r'); // Cambia esto por tu frase aleatoria.
define('LOGGED_IN_SALT', '6PMBWdCp_o|s8/:.o[3z|c9-$]E)ooUn;Rv[3(h}m$z.L35)9jaNTfp! f+V0>mF'); // Cambia esto por tu frase aleatoria.
define('NONCE_SALT', '|8y`FtSjaQ-XI[>{p-C=.y?6#!Zehg?|&1I}*987O4 qRCmn0GoaZE^+@jj+$tz,'); // Cambia esto por tu frase aleatoria.

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';

/**
 * Idioma de WordPress.
 *
 * Cambia lo siguiente para tener WordPress en tu idioma. El correspondiente archivo MO
 * del lenguaje elegido debe encontrarse en wp-content/languages.
 * Por ejemplo, instala ca_ES.mo copiándolo a wp-content/languages y define WPLANG como 'ca_ES'
 * para traducir WordPress al catalán.
 */
define('WPLANG', 'es_ES');

/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

