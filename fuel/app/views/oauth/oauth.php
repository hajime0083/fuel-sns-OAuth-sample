<h3>Twitter - <?php echo $word; ?></h3>

<?php if($token <> ""){?>
    <ul>
        <li>access_key:<?php echo $token['access_key']?></li>
        <li>access_secret:<?php echo $token['access_secret']?></li>        
    </ul>
<?php } ?>