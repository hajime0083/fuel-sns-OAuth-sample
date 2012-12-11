<?php
return array(
    'facebook' => array(
        'init' => array(
            'appId'  => 'YOUR_FACEBOOK_APP_ID',
            'secret' => 'YOUR_FACEBOOK_APP_SECRET',
        ),
        'login' => array(
            'redirect_uri' => Uri::create('fb/index'),
            'scope' => array('status_update,publish_stream',),
        ),
        'logout' => array(
            'next' => Uri::create('fb/index'),
        ),
    ),
);
 
/* End of file custom.php */