<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'wp_clandestino');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'Mpvk4Azfjju>|kKq}z4>~F%Jx?QZ!|([5$h7ST+nKhz8)I6&e57d4nT2gx=:G::R');
define('SECURE_AUTH_KEY',  '.23#7-I7![p0L2@=%v[/9>iK2c;+UZgJmuBbu-wCCj`DFo6:>k:cGG164=P;+dBg');
define('LOGGED_IN_KEY',    's.kQPn#7T)WX>ut2r|:|R!aSY`[l9!= --zUNSm9xF7h]QkX%k8]O@xO/X9<f)f-');
define('NONCE_KEY',        'heph`TUc1;OVS)KG.? !XtE]*@g{D:[M6!-|%_se6iF`EG8|]b{C!0T1;J,;k~-^');
define('AUTH_SALT',        'Q<%+b&Q@r2jjCi7:W4+2*N84z1V,:%+z@27`XAC-*:H-?f5]W4-,^giD@n[%8&{-');
define('SECURE_AUTH_SALT', '/#5VC?^iyQof<Y+/yP$X(yos0,;/KCOK<4H$yl+xb>Cdw61%gTj!prc|eoBetLTG');
define('LOGGED_IN_SALT',   '@T+$~)YOGk]EFi5/YErdt6$})v~vX+y:B _<HOJ-h ,]ZmX^@0CeS{SYY.cOB^;$');
define('NONCE_SALT',       'AE+Vs[8In+$mpVxj>5YOx5Hq!%>iJ~py,z-bck5w.$qHf.0b-^5|z I$L3(]TRPG');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
