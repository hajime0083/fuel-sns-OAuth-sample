#fuel-sns-OAuth-sample

##概要
業務で使うためにFuelのパッケージなどを色々テストしてます。
自分用なので色々汚いですが、ご自由にどうぞ。

###環境
* Version: 0.0.1
* FuelPHP1.4
* twitterAPI:1.1
* facebookAPI:2012/12/12現在
* Author: [@hajime0083](http://twitter.com/hajime0083 "hajime0083")
* package:[fuel-twitter](https://github.com/hajime0083/fuel-twitter "fuel-twitter")
* vender:[facebook-php-sdk](https://github.com/facebook/facebook-php-sdk "facebook-php-sdk")

---------------------------------------

###現在組み込んであるもの
#### fuel-twitter
TwitterのOAuthを使ってユーザーに認証＆認証したユーザーのタイムラインに投稿を行うサンプル  
**package**  
/fuel/packages/twitter  
**config**  
/fuel/app/config/twitter.php  

#### facebook-php-sdk
アプリのユーザー認証＆認証したユーザーのフィードに投稿を行うサンプル  
現在(12/12/12)ユーザートークンの有効期限は60日ですが、フィード投稿だけならアプリ側のtokenとsecretだけでできるため、  
永続的に利用可能です。ユーザートークンを使う場合は適宜変更してください。  
ユーザートークンの定期的な自動更新については考え中。  
**vender**  
/fuel/app/vendor/facebook-php-sdk  
**config**  
/fuel/app/config/fb.php  

---------------------------------------

###参考にさせていただいたもの
####[fuel-twitter]
* [あかぎメモ::FuelPHP で Twitter OAuth を使用する](http://blog.akagi.jp/archives/2677.html "あかぎメモ::FuelPHP で Twitter OAuth を使用する")

####[facebook-php-sdk]
* [ARCANA技術ブログ::Facebookアプリのウォールの投稿ではまった](http://www.s-arcana.co.jp/tech/2011/10/facebook-4.html "ARCANA技術ブログ::Facebookアプリのウォールの投稿ではまった")
* [madroom project::FuelPHPでFacebookアプリを作ってみよう。準備編。](http://madroom-project.blogspot.jp/2011/12/fuelphpfacebook.html "madroom project::FuelPHPでFacebookアプリを作ってみよう。準備編。")
* [APPOFIT::offline_accessパーミッション削除に対応する](http://appofit.com/facebook/remove_offline_access/ "APPOFIT::offline_accessパーミッション削除に対応する")
