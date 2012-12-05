<h3><?php echo $word; ?></h3>

<dl>
<dt><?php echo Html::anchor('oauth/oauth','■OAuth認証')?></dt>
<dd>Twitterユーザーにアプリを認証させる</dd>
<dt><?php echo Html::anchor('oauth/post','■投稿テスト')?></dt>
<dd>認証済みログインユーザーのタイムラインに投稿</dd>
</dl>

<h4>ログインユーザー情報</h4>
<?php if($token <> ""){?>
    <ul>
        <li>HOME:<?php echo Html::anchor('http://twitter.com/'.$user->screen_name,'http://twitter.com/'.$user->screen_name,array('target'=>'_blank'))?></li>
        <li>user_id:<?php echo $user->screen_name ?></li>
        <li>user_name:<?php echo $user->name ?></li>
        <li>oauth_token:<?php echo $token['oauth_token']?></li>
        <li>oauth_token_secret :<?php echo $token['oauth_token_secret']?></li>        
    </ul>
<?php }else{ ?>
<p>登録されていません</p>
<?php } ?>
