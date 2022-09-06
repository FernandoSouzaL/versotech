<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wp-versotech' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'I|/budTr6(u;4lD5,rBH#y*In>52u~Bj]ON)nfn7n^VA8!8lb;UkQt<i[zX ;<DV' );
define( 'SECURE_AUTH_KEY',  'P*9n7yxRBTXB3@4EZN{a}nCR QO[L8HiNjXogUMkTkjA)<_bU!8fN@=U(4tczypF' );
define( 'LOGGED_IN_KEY',    'c5M|1_KLj^`E$AhZoACQ;Vf@(Gz9)kA###:^c W6-mOqyrH-b!kh:%LP?rEu|p46' );
define( 'NONCE_KEY',        'aQA5Cc=0;YF>B.]i(?C9RS*J&s6p@?2&XQ,B~4C4EIV$4w~!dS>}aW~2r&KR2+1p' );
define( 'AUTH_SALT',        '|_720U>*Z>V,U/s*{4.(cjQw8D2.bmpm|ZLw,BrT}>=wrjZ^L<F~,OZbcf4gp;m!' );
define( 'SECURE_AUTH_SALT', 'y%#@9o_pZw.0{,JNIduxS.I/xxG+e^6A{z$fLi_t-T=R;{9 rxk3Gl3XR3YDmI2h' );
define( 'LOGGED_IN_SALT',   'E;^UNvj^2X>on05z/)p>i;~LsKzY*k5BX=*@l53pyTk6/[(Moejt=dy`/u0.Uv%j' );
define( 'NONCE_SALT',       ';7.sP%F7~[m8[n&f6Rz^4K]Qo:9bc3*%01tu%Xx7_Fx_U|totuiT[<tsxQ]V)Xl[' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'vt_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
