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
define('DB_NAME', 'digiwall');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'root');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', '');

/** nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '6W>yeGwbfLyEVD-s<,+_&fBO1FO&$$ruS]BtyVdvqXU)lgjW|VRF>na4+6&*# 0x');
define('SECURE_AUTH_KEY',  '4BZ?m|H@Lzu6%LJ.!)OmNJF]a+NV=ABV1<U!R`BZ<Ec<7}]Bad~}sSl<6`i86E2S');
define('LOGGED_IN_KEY',    '/=tbOXUE?RU4[_+7uoTTO+P,~wlSvXD t4ucJW mAiKX|Qr6lR<:>I#[~44nijE5');
define('NONCE_KEY',        ',d/C8-gl-<c0~sA6%ZV0L:;>fv:eV]Z|z^`li~>widEaAYi^Dj*14#[w2Xj8(b/H');
define('AUTH_SALT',        '{%98/:d?5an;.4_Kgsa|XkBM@h7~J9kK:<Ix8I3klA%Wd0=0+>K-p!uiJw~&Ed+u');
define('SECURE_AUTH_SALT', ')H(/D3]{r@-oCuMPUC@+B#1*g ;Cjo2sE5@-B%I}gJ9O~]^ |7]ZH]Uc}w#+QB0y');
define('LOGGED_IN_SALT',   'MXO31KSko(7}68AGPWZQJR`h?.@wyoaz#~Ka91c)?RO<i_mx>,x/|`i5ga<*Lrbd');
define('NONCE_SALT',       'oR}/Eq-0#W(}m6I.6:`|}uwPN~^,xaZ]|2ZG6B^Yj]P=bt++#n-1WR`t8f18>6?c');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wp_';

/**
 * O idioma localizado do WordPress é o inglês por padrão.
 *
 * Altere esta definição para localizar o WordPress. Um arquivo MO correspondente ao
 * idioma escolhido deve ser instalado em wp-content/languages. Por exemplo, instale
 * pt_BR.mo em wp-content/languages e altere WPLANG para 'pt_BR' para habilitar o suporte
 * ao português do Brasil.
 */
define('WPLANG', 'pt_BR');

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

	define( 'WP_AUTO_UPDATE_CORE', false );
	
	if ( !defined('PHANTOMJS') )
	define("PHANTOMJS",dirname(__FILE__) . '/phantom/');
	
	//define( 'CONCATENATE_SCRIPTS', false );
	
	define( 'EMPTY_TRASH_DAYS', 0 ); // Zero days
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');