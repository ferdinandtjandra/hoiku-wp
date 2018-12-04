<?php
function create_post_type() {
  $exampleSupports = [  // supports のパラメータを設定する配列（初期値だと title と editor のみ投稿画面で使える）
    'title',  // 記事タイトル
    'editor',  // 記事本文
    'thumbnail',  // アイキャッチ画像
    'revisions'  // リビジョン
  ];
  register_post_type( 'postsecond',  // カスタム投稿名
    array(
      'label' => 'postSecond',  // 管理画面の左メニューに表示されるテキスト
      'public' => true,  // 投稿タイプをパブリックにするか否か
      'has_archive' => true,  // アーカイブを有効にするか否か
      'menu_position' => 5,  // 管理画面上でどこに配置するか今回の場合は「投稿」の下に配置
      'supports' => $exampleSupports,  // 投稿画面でどのmoduleを使うか的な設定
      'taxonomies'  => array( 'category' ),
    )
  );
}
add_action( 'init', 'create_post_type' ); // アクションに上記関数をフックします
  
