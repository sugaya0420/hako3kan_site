<?php //Walker_Nav_Menuまとめ
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;

///////////////////////////////////////
// グローバルナビに説明文を加えるウォーカークラス
///////////////////////////////////////
if ( !class_exists( 'menu_description_walker' ) ):
class menu_description_walker extends Walker_Nav_Menu {
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    $url = trim($item->url);

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    if ($item->description) {
      $classes[] = 'menu-item-has-description';
    } else {
      $classes[] = 'menu-item-has-no-description';
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
    $class_names = ' class="'. esc_attr( $class_names ) . '"';
    $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $url )        ? ' href="'   . esc_attr( $url ) .'"' : '';

    ///////////////////////////////////////////
    // 説明文の作成
    ///////////////////////////////////////////
    $prepend = '<div class="item-label">';
    $append = '</div>';
    $description  = ! empty( $item->description ) ? '<div class="item-description sub-caption">'.esc_html( $item->description ).'</div>' : '';
    $has_sub_menu = in_array('menu-item-has-children', $item->classes);
    $has_parent = $item->menu_item_parent;

    ///////////////////////////////////////////
    // サブメニューにアイコンフォントの準備
    ///////////////////////////////////////////
    $iconfont = null;
    //トップメニューでサブメニューを持っている場合
    if ($has_sub_menu && !$has_parent) {
      $iconfont = '<div class="top-has-sub has-sub has-icon"><div class="fa fa-angle-down" aria-hidden="true"></div></div>';
    } elseif ($has_sub_menu) {//サブメニューでサブメニューを持っている場合
      $iconfont = '<div class="sub-has-sub has-sub has-icon"><div class="fa fa-angle-right" aria-hidden="true"></div></div>';
    }

    ///////////////////////////////////////////
    // 最終組み立て
    ///////////////////////////////////////////
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= '<div class="caption-wrap">';
    $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
    $item_output .= $description.$args->link_after;
    $item_output .= '</div>'.$iconfont;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'menu_description_walker', $item_output, $item, $depth, $args );
  }
}
endif;

///////////////////////////////////////
// モバイルメニューのウォーカークラス
///////////////////////////////////////
if ( !class_exists( 'mobile_menu_walker' ) ):
  class mobile_menu_walker extends Walker_Nav_Menu {
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
      global $wp_query;
      global $_MENU_CAPTION;
      $_MENU_CAPTION = !empty($item->title) ? $item->title : null;

      global $_MENU_ICON;
      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $fa_classes = array_filter($classes, function($v, $k) { return preg_match('/^fa/', $v); }, ARRAY_FILTER_USE_BOTH);
      $_MENU_ICON = !empty($fa_classes) ? implode(' ', $fa_classes) : null;

      //定形へメニューボタンの処理
      $url = trim($item->url);
      $lower_url = strtolower($url);
      if ($lower_url === '#menu') {
        $item_output = get_mobile_navi_button_tag();
      } elseif ($lower_url === '#home') {
        $item_output = get_mobile_home_button_tag();
      } elseif ($lower_url === '#search') {
        $item_output = get_mobile_search_button_tag();
      } elseif ($lower_url === '#top') {
        $item_output = get_mobile_top_button_tag();
      } elseif ($lower_url === '#sidebar') {
        $item_output = get_mobile_sidebar_button_tag();
      } elseif ($lower_url === '#toc') {
        $item_output = get_mobile_toc_button_tag();
      } elseif ($lower_url === '#share') {
        $item_output = get_mobile_share_button_tag();
      } elseif ($lower_url === '#follow') {
        $item_output = get_mobile_follow_button_tag();
      } elseif ($lower_url === '#prev') {
        $item_output = get_mobile_prev_button_tag();
      } elseif ($lower_url === '#next') {
        $item_output = get_mobile_next_button_tag();
      } elseif ($lower_url === '#logo') {
        $item_output = get_mobile_logo_button_tag();
      } elseif ($lower_url === '#comments') {
        $item_output = get_mobile_comments_button_tag();
      } else {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        //アイコンフォントがない場合
        if (empty($fa_classes)) {
          $fa_classes[] = 'fa';
          $fa_classes[] = 'fa-star';
        }

        $classes = array_filter($classes, function($v, $k) { return !preg_match('/^fa/', $v); }, ARRAY_FILTER_USE_BOTH);

        $classes[] = 'menu-button';
        if ($item->description) {
          $classes[] = 'menu-item-has-description';
        }

        $fa_class_names = join( ' ', apply_filters( 'nav_menu_fa_css_class', array_filter( $fa_classes ), $item ) );

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';
        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $url )        ? ' href="'   . esc_attr( $url        ) .'"' : '';

        $icon_before = '<span class="custom-menu-icon menu-icon"><span class="'.esc_attr($fa_class_names).'">';
        $icon_after = '</span></span>';

        $caption_before = '<span class="custom-menu-caption menu-caption">';
        $caption_after = '</span>';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .' class="menu-button-in">';

        $item_output .= $icon_before.$icon_after;
        $item_output .= $caption_before.apply_filters( 'the_title', $item->title, $item->ID ).$caption_after;

        $item_output .= '</a>';
        $item_output .= $args->after.'</li>';
      }

      $output .= apply_filters( 'mobile_menu_walker', $item_output, $item, $depth, $args );

      $_MENU_CAPTION = null;
      $_MENU_ICON = null;
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
      $output .= "\n";
    }
  }
  endif;

