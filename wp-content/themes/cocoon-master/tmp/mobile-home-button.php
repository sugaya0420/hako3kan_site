<?php //モバイル用のホームボタン
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;
global $_MENU_CAPTION;
global $_MENU_ICON;
$icon_class = $_MENU_ICON ? $_MENU_ICON : 'fa fa-home'; ?>

<!-- ホームボタン -->
<li class="home-menu-button menu-button">
  <a href="<?php echo esc_url(get_home_url()); ?>" class="menu-button-in">
    <span class="home-menu-icon menu-icon">
      <span class="<?php echo esc_attr($icon_class); ?>" aria-hidden="true"></span>
    </span>
    <span class="home-menu-caption menu-caption"><?php echo $_MENU_CAPTION ? $_MENU_CAPTION : __( 'ホーム', THEME_NAME ); ?></span>
  </a>
</li>
