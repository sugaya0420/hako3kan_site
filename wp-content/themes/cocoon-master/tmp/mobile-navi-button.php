<?php //モバイル用のグローバルナビメニューボタン
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;
global $_MENU_CAPTION;
global $_MENU_ICON;
$icon_class = $_MENU_ICON ? $_MENU_ICON : 'fa fa-bars'; ?>

<?php if (has_nav_menu( NAV_MENU_HEADER ) || has_nav_menu( NAV_MENU_MOBILE_SLIDE_IN )): ?>
  <!-- メニューボタン -->
  <li class="navi-menu-button menu-button">
    <input id="navi-menu-input" type="checkbox" class="display-none">
    <label id="navi-menu-open" class="menu-open menu-button-in" for="navi-menu-input">
      <span class="navi-menu-icon menu-icon">
        <span class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></span>
      </span>
      <span class="navi-menu-caption menu-caption"><?php echo $_MENU_CAPTION ? $_MENU_CAPTION : __( 'メニュー', THEME_NAME ); ?></span>
    </label>
    <label class="display-none" id="navi-menu-close" for="navi-menu-input"></label>
    <div id="navi-menu-content" class="navi-menu-content menu-content">
      <label class="navi-menu-close-button menu-close-button" for="navi-menu-input"><span class="fa fa-close" aria-hidden="true"></span></label>
      <?php //ヘッダーナビ
      ob_start();
      if (has_nav_menu( NAV_MENU_MOBILE_SLIDE_IN )) {
        wp_nav_menu(
          array (
            //カスタムメニュー名
            'theme_location' => NAV_MENU_MOBILE_SLIDE_IN,
            //ul 要素に適用するCSS クラス名
            'menu_class' => 'menu-drawer',
            //コンテナを表示しない
            'container' => false,
            //カスタムメニューを設定しない際に固定ページでメニューを作成しない
            'fallback_cb' => false,
          )
        );
      } else {
        wp_nav_menu(
          array (
            //カスタムメニュー名
            'theme_location' => NAV_MENU_HEADER,
            //ul 要素に適用するCSS クラス名
            'menu_class' => 'menu-drawer',
            //コンテナを表示しない
            'container' => false,
            //カスタムメニューを設定しない際に固定ページでメニューを作成しない
            'fallback_cb' => false,
          )
        );
      }

      $wp_nav_menu = ob_get_clean();
      //ドロワーメニュー用のグローバルナビからIDを削除（IDの重複HTML5エラー対応）
      $wp_nav_menu = preg_replace('/ id="[^"]+?"/i', '', $wp_nav_menu);
      // //ドロワーメニューのアンカーリンク対策
      // if (preg_match_all('# href="(.+?)"#', $wp_nav_menu, $m)) {
      //   foreach ($m[1] as $url) {
      //     if (includes_string($url, '#')) {
      //       $requested_url = get_requested_url();
      //       // _v($requested_url);
      //       // _v($url);
      //       if (preg_match('/\?$/', $requested_url)) {
      //         if (includes_string($url, '?')) {
      //           $changed_url = str_replace('?', '', $url);
      //         }
      //       } else {
      //         if (includes_string($url, '?')) {
      //           $changed_url = str_replace('#', '&#', $url);
      //         } else {
      //           $changed_url = str_replace('#', '?#', $url);
      //         }
      //       }
      //       $wp_nav_menu = str_replace($url, $changed_url, $wp_nav_menu);
      //     }
      //   }
      // }
      echo $wp_nav_menu;
        ?>
    </div>
  </li>
<?php endif ?>
