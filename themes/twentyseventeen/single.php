<?php

$posted_data = get_post($post->ID);

// var_dump($posted_data);exit;

$id = $post->ID;

$img = get_field('メイン画像', $id);

$image_data = $imgurl = wp_get_attachment_image_src($img['id'], 'full');
$image_url = $image_data[0];

$mhs = get_field('2017_most_happy', $id);

$mds = get_field('2017_most_disappointed', $id);

?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="format-detection" content="telephone=no">
  <meta name="skype_toolbar" content="skype_toolbar_parser_compatible">
  <meta name="viewport" content="width=1000">
  <title><?php echo $posted_data->post_title ?></title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/styles/style.css">
	<style>
	.btn{
    display: inline-block;
    text-decoration: none;
    background: #ff8181;
    color: #FFF;
    width: 120px;
    height: 120px;
    line-height: 120px;
    border-radius: 50%;
    text-align: center;
    font-weight: bold;
    vertical-align: middle;
    overflow: hidden;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.29);
    border-bottom: solid 3px #bd6565;
    transition: .4s;
}

.btn:active{
    -ms-transform: translateY(2px);
    -webkit-transform: translateY(2px);
    transform: translateY(2px);
    box-shadow: 0 0 1px rgba(0, 0, 0, 0.15);
    border-bottom: none;
}
	</style>
</head>
<body>
  <main class="paper">

    <div class="row hero">
      <div class="header">
        <h1 class="title"><?php echo $posted_data->post_title ?></h1>
        <p class="date"><?php echo date('Y年n月j日', strtotime($posted_data->post_date)); ?></p>
				<p class="date"><?php echo get_the_author_meta( 'user_login', $posted_data->post_author ); ?> <br>発行</p>
      </div>

      <div class="image" style="background-image:url(<?php echo $image_url ?>);"></div>

      <div class="text">
        <p><?php echo nl2br($posted_data->post_content); ?></p>
      </div>
    </div>

    <div class="row topic">
      <h2 class="title">２０１７年<br>うれしかったこと</h2>
      <ol class="ranking">
        <li class="item">
          <div class="text">
            <p><?php echo nl2br($mhs); ?></p>
          </div>
        </li>
      </ol>
    </div>

    <div class="row topic">
      <h2 class="title">２０１７年<br>がっかりしたこと</h2>
      <ol class="ranking">
        <li class="item">
          <div class="text">
            <p><?php echo nl2br($mds); ?></p>
          </div>
        </li>
      </ol>
    </div>

  </main>
	<div style="padding-top:30px;padding-bottom:30px;text-align:center;">
		<a href="#" class="btn">届ける</a>
		<a href="#" class="btn">印刷する</a>
	</div>
</body>
</html>
