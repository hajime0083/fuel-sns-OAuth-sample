<?php
require_once APPPATH.'vendor/facebook-php-sdk/src/facebook.php';
/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_fb extends Controller_Template
{
        private $fb;
        var $menuClass = "";
        var $pageTitle = "";
        
        public function __construct(){
            $this->menuClass = "fb";
            $this->pageTitle = "Facebook関係";
        }
        
        public function before(){
            parent::before();
            $this->fb = new Facebook(Config::get('facebook.init'));
        }
        
        /**
	 * action_index
	 * 
	 * @access public
	 */
	public function action_index()
	{
            $data  = array();
            $token = "";
            $user  = "";
            $user_data = "";
            $data['word'] = 'Facebook/index';
            $data['menuClass'] = $this->menuClass;
            $data['pageTitle'] = $this->pageTitle;
            
            $user = $this->fb->getUser();
            if($user){
                $token = $this->fb->getAccessToken();
                $this->fb->setAccessToken($token);
                $user_data = $this->fb->api($user . "?fields=id,name");
            }

            $data['user_data'] = $user_data;
            $this->template->content = View::forge('fb/index',$data);
	}
        
        /*
         * action_oauth
         * 
         * @access public
         */
        public function action_oauth(){
            $data['word'] = 'Facebook/oauth';
            $data['menuClass'] = $this->menuClass;
            $data['pageTitle'] = $this->pageTitle;
            
            if(!$this->fb->getUser()){
                // ログインURLを作るときにscopeを下記にしないと、ユーザーのフィードが更新できない模様
                $login_url = $this->fb->getLoginUrl(Config::get('facebook.login'));
                Response::redirect($login_url);
            }else{
                Response::redirect(Uri::create('fb/index'));
            }
        }
        
        /*
         * action_post
         * 
         * @access public
         */
        public function action_post(){
            $data   = array();
            $token  = "";
            $result = "";
            $post   = "";
            $data['word'] = 'facebook/post';
            $data['menuClass'] = $this->menuClass;
            $data['pageTitle'] = $this->pageTitle;
            
            if(Input::post()){
                // POST時
                $user = $this->fb->getUser();
                if($user){
                    $token = $this->fb->getAccessToken();
                    $this->fb->setAccessToken($token);
                    $post = Input::post('postbox');
                    if(mb_strlen($post)>0 && mb_strlen($post)<1000){
                        try{
                            $result = $this->fb->api("/". $user ."/feed", "post", array(
                            "message" => $post,
                            ));
                        } catch (FacebookApiException $e) {
                            $result    = $e;
                        }
                        $result        = "投稿成功！";
                        $post          = "";
                        $data['login'] = true;
                    }
                }
            }else{
                // 初期表示
                if($this->fb->getUser()){
                    $data['login'] = true;
                }else{
                    $data['login'] = false;
                }
            }
            $data['result'] = $result;
            $data['post'] = $post;
            $this->template->content = View::forge('fb/post',$data);
        }
}
