<?php //HTML5エラーチェックに関する関数
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;

//HTML5で警告が出てしまう部分をできるだけ修正する
add_filter('the_content', 'theme_html5_fix');
add_filter('widget_text', 'theme_html5_fix');
add_filter('widget_text_pc_text', 'theme_html5_fix');
//add_filter('widget_classic_text', 'theme_html5_fix');
add_filter('widget_text_mobile_text', 'theme_html5_fix');
add_filter('the_category_tag_content', 'theme_html5_fix');
if ( !function_exists( 'theme_html5_fix' ) ):
function theme_html5_fix($the_content){
  //</div>に</p></div>が追加されてしまう
  //http://tenman.info/labo/snip/archives/5197
  $the_content = str_replace( '</p></div>','</div>', $the_content );
  //Alt属性がないIMGタグにalt=""を追加する
  //$the_content = preg_replace('/<img((?![^>]*alt=)[^>]*)>/i', '<img alt=""${1}>', $the_content);
  return $the_content;
}
endif;
