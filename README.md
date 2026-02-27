# 体重管理（Laravel / 確認テスト）

## 環境構築
Dockerビルド  
・git clone git@github.com:misaki-m11111/laravel-test3-weightlog.git  
・docker compose up -d --build

## Dockerビルド

```bash
・git clone git@github.com:misaki-m11111/laravel-test3-weightlog.git  
・cd laravel-test3-weightlog.git 
・docker compose up -d --build
```

## Laravel環境構築
・docker compose exec php bash  
・composer install  
・cp .env.example .env  
・php artisan key:generate  
・php artisan migrate  
・php artisan db:seed

## 開発環境
・管理画面：http://localhost/weight_logs  
・体重登録：http://localhost/weight_logs/create  
・目標設定：http://localhost/weight_logs/goal_setting  
・会員登録：http://localhost/register/step1  
・ログイン：http://localhost/login  
・phpMyAdmin：http://localhost:8080    

## 使用技術(実行環境)
・PHP 8.1.33  
・Laravel 8.83.8  
・MySQL 8.0.26  
・Nginx 1.21  
・PHP 8.1.33  
・Laravel 8.83.8    
・MySQL 8.0.26  
・Nginx 1.21  

## ログインについて

ダミーデータはFactoryによりランダム生成されています。    
ログインする場合は、ユーザー登録画面から新規登録を行ってください。  

## ER図
<img width="1291" height="412" alt="weigthlog-er" src="https://github.com/user-attachments/assets/09d1af07-2655-4bce-988a-b4e62c9a0629" />

