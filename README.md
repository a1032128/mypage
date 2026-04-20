# [專題名稱]

> 結訓成果專題 — 能力展示型作品集

本專題為結訓課程的綜合能力展示，整合課程所學的前端、後端、資料庫、
設計等技術，以 SPA（單頁應用）為基底呈現。作品採 ARG（Alternate
Reality Game）形式，以虛構的 SF 反烏托邦敘事作為技術展示的載體。

## 技術棧

**前端**

- HTML5 / CSS3
- Bootstrap 5
- JavaScript / jQuery
- AJAX

**後端**

- Laravel（作為 API 後端）
- PHP
- Session-based 認證
- Middleware 路由保護

**資料庫**

- MySQL
- phpMyAdmin

**設計**

- Figma（視覺設計、流程規劃）

**版本控制**

- Git / GitHub

## 專題定位

本專題不作為商業產品設計，而是以策展形式呈現結訓課程的技術能力。
透過虛構敘事的外殼，展示前後端整合、資料庫設計、使用者驗證、
前端互動等核心技術的實作能力。

## 專案結構

[專案名稱]/
├── app/ # Laravel 後端邏輯
├── database/ # 資料庫 migration
├── public/ # 前端靜態資源
├── resources/
│ └── views/ # Blade 模板
├── routes/
│ └── web.php # 路由定義
└── README.md

## 如何執行

### 環境需求

- PHP 8.x
- MySQL 8.x（或 MariaDB）
- Composer
- XAMPP 或同等 LAMP/WAMP 環境

### 安裝步驟

```bash
# 1. clone 專案
git clone [repo url]
cd [專案資料夾]

# 2. 安裝依賴
composer install

# 3. 設定環境變數
cp .env.example .env
php artisan key:generate

# 4. 資料庫設定
# 編輯 .env 檔案，設定 DB_DATABASE / DB_USERNAME / DB_PASSWORD
php artisan migrate

# 5. 啟動
php artisan serve
```

瀏覽器開啟 `http://localhost:8000` 即可看到專題首頁。

## 開發進度

目前階段：**開發中**

- [x] 專案架構建立
- [x] 路由與頁面骨架
- [ ] 使用者認證系統
- [ ] 資料庫 Schema 設計
- [ ] 前端視覺設計
- [ ] ARG 互動機制
- [ ] Figma 設計稿
- [ ] 內容與文案

## 備註

本作品為學習用途，部分素材使用網路公開免費資源，
實際上線前會替換為原創或已取得授權之素材。
