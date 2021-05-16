<?php
/**
 * WordPress の基本設定
 *
 * このファイルは、インストール時に wp-config.php 作成ウィザードが利用します。
 * ウィザードを介さずにこのファイルを "wp-config.php" という名前でコピーして
 * 直接編集して値を入力してもかまいません。
 *
 * このファイルは、以下の設定を含みます。
 *
 * * MySQL 設定
 * * 秘密鍵
 * * データベーステーブル接頭辞
 * * ABSPATH
 *
 * @link http://wpdocs.osdn.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86
 *
 * @package WordPress
 */

// 注意:
// Windows の "メモ帳" でこのファイルを編集しないでください !
// 問題なく使えるテキストエディタ
// (http://wpdocs.osdn.jp/%E7%94%A8%E8%AA%9E%E9%9B%86#.E3.83.86.E3.82.AD.E3.82.B9.E3.83.88.E3.82.A8.E3.83.87.E3.82.A3.E3.82.BF 参照)
// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。

// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //
/** WordPress のためのデータベース名 */
define('DB_NAME', 'LAA1146950-y43743');

/** MySQL データベースのユーザー名 */
define('DB_USER', 'LAA1146950');

/** MySQL データベースのパスワード */
define('DB_PASSWORD', 'ulgQKrrG');

/** MySQL のホスト名 */
define('DB_HOST', 'mysql141.phy.lolipop.lan');

/** データベースのテーブルを作成する際のデータベースの文字セット */
define('DB_CHARSET', 'utf8');

/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */
define('DB_COLLATE', '');

/**#@+
 * 認証用ユニークキー
 *
 * それぞれを異なるユニーク (一意) な文字列に変更してください。
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。
 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '<$EiK)&cq27.T1EVsjD;-7~BT${lc-7c,Hb!2+korW(xwd,Gyf1VIeYH;56w^{xv');
define('SECURE_AUTH_KEY', 'Dzol%GLT&l9xjpF[9S&-7`zhNB8_69O(@I){tM.A~6RNNq.nn!&~ABY.3G.hHQ#[');
define('LOGGED_IN_KEY', '`}*~?6@sd^RoQ?ktTbwypvTj*J8RAhmtw^CSpz^5ezhQeDIV41[{Z(Jg>*2_8.X}');
define('NONCE_KEY', 'MrFy,[0`-z|26XT0$C4gGPEeYT?[BIC2|Oad!iN=NK|4u0`LkG;&pw[=YghF:6Cq');
define('AUTH_SALT', 'oB%T#^9HN.{GUs<3E!eo{FaFt!(`mu57PoU;L*#oN:bYQ<A;~H"ZQw+EtTnf[Bx2');
define('SECURE_AUTH_SALT', '["{~{I!FZj(x5UF++w/3i6M3"H/GZ:A0|J(|?yH;Tpk)8j$Em]QgVb8WXirfW;-z');
define('LOGGED_IN_SALT', '7):r=THPC!0HZwTU*zS_sqJzuJ~f_+"m6#@U`zKoBL3HTiPtO:3JqG^ir}R%[X."');
define('NONCE_SALT', 'bdFL}B4thi)Zi+;9a:omP=E|$Co#NB2Z_TmWzpS1}8oUfGL}-iRFH(50z7(gU]mf');

/**#@-*/

/**
 * WordPress データベーステーブルの接頭辞
 *
 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を
 * インストールすることができます。半角英数字と下線のみを使用してください。
 */
$table_prefix  = 'wp2_';

/**
 * 開発者へ: WordPress デバッグモード
 *
 * この値を true にすると、開発中に注意 (notice) を表示します。
 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。
 *
 * その他のデバッグに利用できる定数については Codex をご覧ください。
 *
 * @link http://wpdocs.osdn.jp/WordPress%E3%81%A7%E3%81%AE%E3%83%87%E3%83%90%E3%83%83%E3%82%B0
 */
define('WP_DEBUG', false);

/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
  define('ABSPATH', dirname(__FILE__) . '/');
}

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
