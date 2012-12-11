<h3><?php echo $word; ?></h3>
<dl>
<dt><?php echo Html::anchor('fb/oauth','■OAuth認証')?></dt>
<dd>Facebookユーザーにアプリを認証させる</dd>
<dt><?php echo Html::anchor('fb/post','■投稿テスト')?></dt>
<dd>認証済みログインユーザーのタイムラインに投稿</dd>
</dl>

<h4>ログインユーザー情報</h4>
<?php if($user_data <> ""){?>
    <ul>
        <li>HOME:<?php echo Html::anchor('http://www.facebook.com/profile.php?id='.$user_data['id'],'http://www.facebook.com/profile.php?id='.$user_data['id'],array('target'=>'_blank'))?></li>
        <li>user_id:<?php echo $user_data['id'] ?></li>
        <li>user_name:<?php echo $user_data['name'] ?></li>   
    </ul>
<?php }else{ ?>
<p>登録されていません</p>
<?php } ?>
