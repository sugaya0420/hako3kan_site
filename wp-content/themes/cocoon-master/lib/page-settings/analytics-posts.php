<?php //アクセス解析設定をデータベースに保存
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;

//サイト管理者を解析するか
update_theme_option(OP_ANALYTICS_ADMIN_INCLUDE);

//Google Tag ManagerのトラッキングID
update_theme_option(OP_GOOGLE_TAG_MANAGER_TRACKING_ID);

//Google Tag ManagerのAMPトラッキングID
update_theme_option(OP_GOOGLE_TAG_MANAGER_AMP_TRACKING_ID);

//Google AnalyticsトラッキングID
update_theme_option(OP_GOOGLE_ANALYTICS_TRACKING_ID);

//Google Analyticsのスクリプト
update_theme_option(OP_GOOGLE_ANALYTICS_SCRIPT);

//Google Search Console ID
update_theme_option(OP_GOOGLE_SEARCH_CONSOLE_ID);

//PtengineのトラッキングID
update_theme_option(OP_PTENGINE_TRACKING_ID);


//その他のアクセス解析<head></head>内タグ
update_theme_option(OP_OTHER_ANALYTICS_HEAD_TAGS);

//その他のアクセス解析ヘッダー（body直後）タグ
update_theme_option(OP_OTHER_ANALYTICS_HEADER_TAGS);

//その他のアクセス解析フッター（/body直前）タグ
update_theme_option(OP_OTHER_ANALYTICS_FOOTER_TAGS);
