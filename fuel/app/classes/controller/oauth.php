<?php

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 * 
 * @package  app
 * @extends  Controller
 */
class Controller_oauth extends Controller_Template
{
        var $menuClass = "";
        var $pageTitle = "";
        
        public function __construct(){
            $this->menuClass = "oauth";
            $this->pageTitle = "TwitterOAuth関係";
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
            $data['word'] = 'oauth/index';
            $data['menuClass'] = $this->menuClass;
            $data['pageTitle'] = $this->pageTitle;

            if(Twitter::logged_in()){
                // ユーザ情報の取得
                $token = Twitter::get_tokens();
                $user  = Twitter::get('account/verify_credentials');
            }

            $data['token'] = $token;
            $data['user']  = $user;
            $this->template->content = View::forge('oauth/index',$data);
	}
        
        /*
         * action_oauth
         * 
         * @access public
         */
        public function action_oauth(){
            Twitter::set_callback(Uri::create('oauth/index'));
            Twitter::logout();
            Twitter::login();
            // callback後にユーザーのトークンなどはテーブルに保存
        }
        
        /*
         * action_post
         * 
         * @access public
         */
        public function action_post(){
            $data  = array();
            $token = "";
            $result = "";
            $tweet = "";
            $data['word'] = 'oauth/post';
            $data['menuClass'] = $this->menuClass;
            $data['pageTitle'] = $this->pageTitle;
            
            if(Input::post()){
                // POST時
                if(Twitter::logged_in()){
                    
                    $tweet = Input::post('tweetbox');
                    if(mb_strlen($tweet) <= 140 && mb_strlen($tweet) > 0){
                        // post先ユーザーのトークンをセット(実際はテーブルやら何やらから取得)
                        $token = Twitter::get_tokens();
                        Twitter::set_tokens($token);
                        // 投稿
                        $result = Twitter::post('statuses/update',array('status' => $tweet));
                        if(array_key_exists('error',$result)){
                            $result = "error:" . $result['error'];
                        }else{
                            $tweet = "";
                        }
                        
                    }else{
                        $result = "文字数が１文字以上１４０文字以内ではありません";
                    }
                    $data['login'] = true;
                }
            }else{
                // 初期表示
                if(Twitter::logged_in()){
                    $data['login'] = true;
                }else{
                    $data['login'] = false;
                }
            }
            
            $data['result'] = $result;
            $data['tweet'] = $tweet;
            $this->template->content = View::forge('oauth/post',$data);
        }
}
