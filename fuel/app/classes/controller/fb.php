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
            $user_data = "";
            $data['word'] = 'Facebook/index';
            $data['menuClass'] = $this->menuClass;
            $data['pageTitle'] = $this->pageTitle;

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
            
            // ログインURLを作るときにscopeを下記にしないと、ユーザーのフィードが更新できない模様
            $login_url = $this->fb->getLoginUrl(Config::get('facebook.login'));
            Response::redirect($login_url);
        }
        
        /*
         * action_post
         * 
         * @access public
         */
        public function action_post(){
            $data   = array();
            $result = "";
            $post   = "";
            $data['word'] = 'facebook/post';
            $data['menuClass'] = $this->menuClass;
            $data['pageTitle'] = $this->pageTitle;
            
            if(Input::post()){
                // POST時
                // テスト用にconfigに記述してますが、適宜変更してください。
                // 本来はDBから直接取得など。
                $user = Config::get('facebook.userid');
                
                // ユーザーのアクセストークンを使わないので無制限に利用できます。
                // ここではアプリ側のapp token & seacretで投稿してますが、用途が制限されるため、
                // ウォール投稿の他の使い方は保障できません。
                
                if($user){
                    $post = Input::post('postbox');
                    if(mb_strlen($post)>0 && mb_strlen($post)<1000){
                        try{
                            $result = $this->fb->api("/". $user ."/feed", "post", array(
                            "message" => $post . "TESTtime:" . date("Y/m/d H:i:s"),
                             "access_token" => Config::get('facebook.init.appId') ."|". Config::get('facebook.init.secret')
                            ));
                        } catch (FacebookApiException $e) {
                            $result    = $e;
                        }
                        $result        = "投稿成功！";
                        $post          = "";
                        $data['login'] = true;
                    }
                }
            }

            $data['login'] = true;
            $data['result'] = $result;
            $data['post'] = $post;
            $this->template->content = View::forge('fb/post',$data);
        }
}
