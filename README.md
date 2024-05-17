# アプリケーション名
お問い合わせフォーム

## Dockerビルド 環境構築

 1. git clone リンク
 2. docker-compose up -d --build
 ※MySQLは、OSによって起動しない場合があるのでそれぞれのPCに合わせてdocker-compose.ymlファイルを編集してください。

## Laravel 環境構築
 1.docker-compose exec php bash
 2.composer install
 3..env.exampleファイルから.envを作成し、環境変数を変更
 4.php artisan key:generate
 5.php artisan migrate
 6.php artisan db:seed

## 使用技術(実行環境)
・php 7.4.9
・Laravel 8.83.27
・MySQL 8.0.26

## URL
・開発環境：http://localhost/
・phpMyadmin：http://localhost:8080/
