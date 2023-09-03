<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать файл в "wp-config.php"
 * и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'fitlove_db' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу. Можно сгенерировать их с помощью
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}.
 *
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными.
 * Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'SnOxGrJp.j[eL9,rLy{0pMI#)IAK2L>R<d/xBp[D|0`p(k7Ct[ZQw{lk2/+3f?.G' );
define( 'SECURE_AUTH_KEY',  'p~[gJJ$07-i<O9]G /m.0RNE$;q[/G,$#~m%P_K[KiOL~]CtLl1YQD.IpUE&/fD7' );
define( 'LOGGED_IN_KEY',    '(,D!Y1_vOK@+`YT-UDuE#C#F5ULZ7qp6#$tGrNOd8s):g;|?#ot+k%C;B~Q9L^z5' );
define( 'NONCE_KEY',        'Kqit.((Up>djcm-U)h?7TRhFk,|noB:<Zy4*u1z,QhT-!v/Z$-.H>Puyx;Y%wSwe' );
define( 'AUTH_SALT',        '7/3Rd%.Vtad6kaR1:s6g{0y2?,)G!NBgC?lWG}eYc-s<p#8M4$U0ng;V8x4dZ<[b' );
define( 'SECURE_AUTH_SALT', 'S^wwTN)MM/8/IQ%9MZA?PL+OQiZWcJLrgQ_{7>MV^U1Ro:rU:@k^i~M*}diLevw^' );
define( 'LOGGED_IN_SALT',   '*ZMVu->jEW]BN7aWS@/kZ%rFXbt95_}B/3uMja-*g[dLMu3`2Ri]OC`@8hW gXMc' );
define( 'NONCE_SALT',       ' zJ=Ajmb_.a46Z;Qroa5ub<sh8iK2LRrw.DI4 Qkj3X[W$9/&|(y6a4gDl3d[<=v' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Произвольные значения добавляйте между этой строкой и надписью "дальше не редактируем". */



/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
