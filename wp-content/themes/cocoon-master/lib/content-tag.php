<?php //タグ関係
/**
 * Cocoon WordPress Theme
 * @author: yhira
 * @link: https://wp-cocoon.com/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 */
if ( !defined( 'ABSPATH' ) ) exit;

///////////////////////////////////////
// 拡張タグ設定
///////////////////////////////////////

if ( !function_exists( 'get_the_tag_meta_key' ) ):
function get_the_tag_meta_key($tag_id){
  return 'tag_meta_'.$tag_id;
}
endif;

//タグメタ情報の取得
if ( !function_exists( 'get_the_tag_meta' ) ):
function get_the_tag_meta($tag_id = null){
  if (empty($tag_id) && is_tag()) {
    //タグがないときはタグIDを取得
    $tag_id = get_query_var('tag_id');
  }
  //タグIDが正常な場合
  if ($tag_id) {
    $key = get_the_tag_meta_key($tag_id);
    if (term_metadata_exists($tag_id, $key)) {
      $res = get_term_meta( $tag_id, $key, true );
      if (is_array($res)) {
        return $res;
      }
    }
  }
  return array();
}
endif;

//タグタイトルの取得
if ( !function_exists( 'get_the_tag_title' ) ):
function get_the_tag_title($tag_id = null, $is_tag_name = true){
  if (!$tag_id) {
    $tag_id = get_query_var('tag_id');
  }
  $res = null;
  if (term_metadata_exists($tag_id, 'the_tag_title')) {
    $res = get_term_meta( $tag_id, 'the_tag_title', true );
  } else {//旧バージョン対応
    $meta = get_the_tag_meta($tag_id);
    if (!empty($meta['title'])){
      $res = $meta['title'];
    }
  }
  //タイトルが存在しない場合はタグ名を利用する
  if (!$res && $is_tag_name) {
    $res = get_tag($tag_id)->name;
  }
  return $res;
}
endif;

//タグ本文の取得
if ( !function_exists( 'get_the_tag_content' ) ):
function get_the_tag_content($tag_id = null, $for_editor = false){
  if (!$tag_id) {
    $tag_id = get_query_var('tag_id');
  }
  if (term_metadata_exists($tag_id, 'the_tag_content')) {
    //取得できた場合はそのまま返す（本文編集などでも使われる）
    $content = get_term_meta( $tag_id, 'the_tag_content', true );
  } else {//旧バージョン対応
    $meta = get_the_tag_meta($tag_id);
    if (!empty($meta['content']))
      $content = $meta['content'];
    else
      $content = tag_description($tag_id);
  }
  if (!$for_editor) {
    //$content = wpautop($content);
    $content = apply_filters( 'the_category_tag_content', $content );//カテゴリ・タグ本文共通
    $content = apply_filters( 'the_tag_content', $content );
  }
  return $content;
}
endif;

//アイキャッチの取得
if ( !function_exists( 'get_the_tag_eye_catch_url' ) ):
function get_the_tag_eye_catch_url($tag_id = null){
  if (!$tag_id) {
    $tag_id = get_query_var('tag_id');
  }
  if (term_metadata_exists($tag_id, 'the_tag_eye_catch_url')) {
    $eye_catch_url = get_term_meta( $tag_id, 'the_tag_eye_catch_url', true );
  } else {//旧バージョン対応
    $meta = get_the_tag_meta($tag_id);
    if (!empty($meta['eye_catch'])){
      $eye_catch_url = $meta['eye_catch'];
    } else {
      $eye_catch_url = '';
    }
  }

  //画像が存在しているか
  if (file_exists(url_to_local($eye_catch_url))) {
    return $eye_catch_url;
  } else {
    return '';
  }
}
endif;

//タグのメタディスクリプション
if ( !function_exists( 'get_the_tag_meta_description' ) ):
function get_the_tag_meta_description($tag_id = null){
  if (!$tag_id) {
    $tag_id = get_query_var('tag_id');
  }
  if (term_metadata_exists($tag_id, 'the_tag_meta_description')) {
    return get_term_meta( $tag_id, 'the_tag_meta_description', true );
  } else {//旧バージョン対応
    $meta = get_the_tag_meta($tag_id);
    if (!empty($meta['description']))
      return $meta['description'];
  }
}
endif;

//タグのスニペット文を取得
if ( !function_exists( 'get_the_tag_snippet' ) ):
function get_the_tag_snippet($tag_id){
  $snippet = get_the_tag_meta_description($tag_id);
  if (!$snippet) {
    //タグ説明を取得
    $snippet = tag_description($tag_id);
  }
  if (!$snippet) {
    //タグ内容の抜粋
    $snippet = get_content_excerpt(get_the_tag_content($tag_id), get_entry_card_excerpt_max_length());
  }
  if (!$snippet) {
    //タグ説明を取得
    $tag = get_tag($tag_id);
    if ($tag) {
      $snippet = sprintf( __( '「%s」の記事一覧です。', THEME_NAME ), $tag->name );
    }
  }
  return $snippet;
}
endif;

//キーワードの取得
if ( !function_exists( 'get_the_tag_meta_keywords' ) ):
function get_the_tag_meta_keywords($tag_id = null){
  if (!$tag_id) {
    $tag_id = get_query_var('tag_id');
  }
  if (term_metadata_exists($tag_id, 'the_tag_meta_keywords')) {
    return get_term_meta( $tag_id, 'the_tag_meta_keywords', true );
  } else {//旧バージョン対応
    $meta = get_the_tag_meta($tag_id);
    if (!empty($meta['keywords']))
      return $meta['keywords'];
  }
}
endif;

//拡張タグ編集フォーム
add_action ( 'edit_tag_form_fields', 'extra_tag_fields');
if ( !function_exists( 'extra_tag_fields' ) ):
function extra_tag_fields( $tag ) {
    $tag_id = $tag->term_id;
    //$tag_meta = get_the_tag_meta($tag_id);
?>
<tr class="form-field term-title-wrap">
  <th><label for="title"><?php _e( 'タグタイトル', THEME_NAME ) ?></label></th>
  <td>
    <?php
    $the_tag_title = get_the_tag_title($tag_id, false);
    ?>
    <input type="text" name="the_tag_title" id="title" size="25" value="<?php echo esc_attr($the_tag_title) ?>" placeholder="<?php _e( 'タグページのタイトル', THEME_NAME ) ?>" />
    <p class="description"><?php _e( 'タグページのタイトルを指定します。タグページのタイトルタグにここで入力したテキストが適用されます。', THEME_NAME ) ?></p>
  </td>
</tr>
<tr class="form-field term-content-wrap">
  <th><label for="content"><?php _e( 'タグ本文', THEME_NAME ) ?></label></th>
  <td><?php
    $the_tag_content = get_the_tag_content($tag_id, true);
    generate_visuel_editor_tag('the_tag_content', $the_tag_content, 'content');
    ?>
    <p class="description"><?php _e( 'タグページで表示されるメインコンテンツを入力してください。', THEME_NAME ) ?></p>
    </td>
</tr>
<tr class="form-field term-eye-catch-wrap">
  <th><label for="eye_catch"><?php _e( 'アイキャッチ', THEME_NAME ) ?></label></th>
  <td><?php
    $the_tag_eye_catch_url = get_the_tag_eye_catch_url($tag_id);
    generate_upload_image_tag('the_tag_eye_catch_url', $the_tag_eye_catch_url, 'eye_catch');
    ?>
    <p class="description"><?php _e( 'タイトル下に表示されるアイキャッチ画像を選択してください。', THEME_NAME ) ?></p>
    </td>
</tr>
<tr class="form-field term-meta-description-wrap">
  <th><label for="description"><?php _e( 'メタディスクリプション', THEME_NAME ) ?></label></th>
  <td>
    <?php
    $the_tag_meta_description = get_the_tag_meta_description($tag_id);
    generate_textarea_tag('the_tag_meta_description', $the_tag_meta_description, __( 'タグページの説明文を入力してください', THEME_NAME ), 3) ;
      ?>
    <p class="description"><?php _e( 'タグページの説明を入力します。ここに入力したテキストはメタディスクリプションタグとして利用されます。', THEME_NAME ) ?></p>
  </td>
</tr>
<tr class="form-field term-meta-keywords-wrap">
  <th><label for="keywords"><?php _e( 'メタキーワード', THEME_NAME ) ?></label></th>
  <td>
    <?php
    $the_tag_meta_keywords = get_the_tag_meta_keywords($tag_id);
    ?>
    <input type="text" name="the_tag_meta_keywords" id="keywords" size="25" value="<?php echo esc_attr($the_tag_meta_keywords) ?>" placeholder="<?php _e( 'キーワード1,キーワード2,キーワード3', THEME_NAME ) ?>" />
    <p class="description"><?php _e( 'タグページのメタキーワードをカンマ区切りで入力してください。※現在はあまり意味のない設定となっています。', THEME_NAME ) ?></p>
  </td>
</tr>
<?php
}
endif;

//拡張タグ情報の保存
add_action ( 'edited_term', 'save_extra_tag_fileds');
if ( !function_exists( 'save_extra_tag_fileds' ) ):
function save_extra_tag_fileds( $term_id ) {
  $tag_id = $term_id;

  if ( isset( $_POST['the_tag_title'] ) ) {
    $the_tag_title = $_POST['the_tag_title'];
    update_term_meta( $tag_id, 'the_tag_title', $the_tag_title );
  }

  if ( isset( $_POST['the_tag_content'] ) ) {
    $the_tag_content = $_POST['the_tag_content'];
    update_term_meta( $tag_id, 'the_tag_content', $the_tag_content );
  }

  if ( isset( $_POST['the_tag_eye_catch_url'] ) ) {
    $the_tag_eye_catch_url = $_POST['the_tag_eye_catch_url'];
    update_term_meta( $tag_id, 'the_tag_eye_catch_url', $the_tag_eye_catch_url );
  }

  if ( isset( $_POST['the_tag_meta_description'] ) ) {
    $the_tag_meta_description = $_POST['the_tag_meta_description'];
    update_term_meta( $tag_id, 'the_tag_meta_description', $the_tag_meta_description );
  }

  if ( isset( $_POST['the_tag_meta_keywords'] ) ) {
    $the_tag_meta_keywords = $_POST['the_tag_meta_keywords'];
    update_term_meta( $tag_id, 'the_tag_meta_keywords', $the_tag_meta_keywords );
  }

  //旧バージョンの値を削除
  $key = get_the_tag_meta_key($tag_id);
  if (term_metadata_exists($tag_id, $key)) {
    delete_term_meta($tag_id, $key);
  }
}
endif;
