# [專題名稱]

> 結訓成果專題 — 能力展示型作品集

本專題為結訓課程的綜合能力展示，整合課程所學的前端、後端、資料庫、
設計等技術，以 SPA（單頁應用）為基底呈現。作品採 ARG（Alternate
Reality Game）形式，以虛構的 SF 反烏托邦敘事作為技術展示的載體。

虛構舞台為人工島上的企業「ノバス / Novas」，玩家以訪客 → 一般會員 →
內部職員的身份逐步解鎖網站內容，過程中需要結合網站暗號、實體線索、
檔案操作等多重機制，才能抵達最終頁面。

## 專題定位

本專題不作為商業產品設計，而是以策展形式呈現結訓課程的技術能力。
透過虛構敘事的外殼，展示前後端整合、資料庫設計、使用者驗證、
前端互動等核心技術的實作能力。

每一項技術實作同時承擔兩種角色：**課程技術展示**與**ARG 敘事機制**。

## 技術線與敘事功能對照

| 技術元件 | 課程技術展示 | 在 ARG 中的角色 |
|---------|-------------|----------------|
| Bootstrap 5 SPA | 前端切版、RWD、jQuery 互動 | 企業官網外殼（Novas 公開形象） |
| Laravel | Session 認證、Middleware 路由保護、Blade 模板 | 一般會員登入（section02） |
| Flask（獨立服務） | Python Web 後端、檔案上傳驗證、跨服務溝通 | 內部職員驗證終端（section10） |
| Python 爬蟲 + Notion API | 資料自動化、API 串接、排程任務 | 企業內部資料庫（解謎提示來源） |
| Python 檔名工具 | 檔案處理、字串操作、正規表達式 | 玩家需自行改名後上傳的「暗號檔案」 |
| MySQL / phpMyAdmin | 資料庫設計、角色權限欄位 | 會員分級制度（訪客 / 會員 / 職員） |
| Figma | 視覺設計、流程規劃 | 概念補遺、未實作想法的思考路徑存檔 |
| 園區地圖 + 實景攝影 | 視覺素材整合 | 虛構人工島 ↔ 真實園區的實境對應 |
| Git / GitHub | 版本控制、協作流程 | 專案公開載體 |

## 系統架構

```
[瀏覽器]
    │
    ├──  Bootstrap SPA  ──────  靜態前端
    │
    ├──  Laravel (port 8000)  ─  一般會員認證、資料庫 CRUD
    │         │
    │         └─  MySQL
    │
    └──  Flask  (port 5000)  ──  檔案上傳驗證、暗號判定
                                        │
                                        └─  成功 → 跳轉隱藏頁面

[背景服務]
    └──  Python 爬蟲  →  Notion API  →  ARG 解謎提示頁面
```

## ARG 核心機制概要

本專題採三層解鎖結構，對應三種使用者身份：

1. **訪客層** — 自由瀏覽企業官網，公開頁面為主
2. **會員層** — 透過 Laravel 認證登入，解鎖 section02 以後的內容
3. **職員層** — 取得暗號檔案後透過 Flask 驗證，進入隱藏頁面

線索來源不限於網站本身：部分提示需從 Notion 資料庫讀取，
部分線索則對應真實園區的實景照片（虛構人工島的實體地圖）。

*詳細解謎路徑不在公開文件中說明。*

## 技術線

**前端**

- HTML5 / CSS3
- Bootstrap 5
- JavaScript / jQuery
- AJAX

**後端**

- Laravel（會員認證主系統）
- Flask（獨立驗證服務）
- PHP / Python

**資料庫**

- MySQL / phpMyAdmin
- Notion API（外部資料源）

**自動化**

- Python 爬蟲（排程任務）
- Python 檔名處理工具

**設計**

- Figma（視覺設計、概念補遺）

**素材**

- 園區 3D 模型圖（官方設定層）
- 自攝校園實景（玩家視角層）

**版本控制**

- Git / GitHub

## 專案結構

```
[專案名稱]/
├── laravel/                 # Laravel 會員系統主體
│   ├── app/
│   ├── database/
│   ├── public/
│   ├── resources/views/     # Blade 模板
│   └── routes/web.php
│
├── flask-auth/              # Flask 獨立驗證服務
│   ├── app.py
│   ├── uploads/             # 玩家上傳檔案暫存
│   └── requirements.txt
│
├── python-tools/            # Python 工具集
│   ├── notion_scraper/      # 爬蟲 + Notion 寫入
│   └── file_renamer/        # 檔名處理工具
│
├── assets/                  # 視覺素材
│   ├── map/                 # 園區地圖、實景照片
│   └── figma/               # 設計稿輸出
│
└── README.md
```

## 如何執行

### 環境需求

- PHP 8.x
- Python 3.10+
- MySQL 8.x（或 MariaDB）
- Composer
- XAMPP 或同等 LAMP/WAMP 環境

### 安裝步驟

```bash
# 1. clone 專案
git clone [repo url]
cd [專案資料夾]

# 2. Laravel 主系統
cd laravel
composer install
cp .env.example .env
php artisan key:generate
# 編輯 .env 設定 DB 連線
php artisan migrate
php artisan serve                  # port 8000

# 3. Flask 驗證服務（另開終端機）
cd ../flask-auth
pip install -r requirements.txt
python app.py                      # port 5000

# 4. Python 工具為獨立使用，視需求執行
```

瀏覽器開啟 `http://localhost:8000` 進入企業官網首頁。

## 開發進度

目前階段：**開發中**

### 已完成
- [x] 專案架構建立
- [x] 路由與頁面骨架
- [x] Python 爬蟲 + Notion API 串接（沿用既有專案）
- [x] Python 檔名工具
- [x] Figma 概念稿與思考路徑補遺



### 進行中
- [ ] Laravel 使用者認證系統（section02）
- [ ] 資料庫 Schema 設計（會員分級）
- [ ] 前端視覺設計

### 待開發
- [ ] Flask 檔案上傳驗證服務（section10）
- [ ] ARG 互動機制整合
- [ ] 園區地圖 / 實景照片整合
- [ ] 調整並改寫內容與文案

## 備註

本作品為學習用途，部分素材使用網路公開免費資源，
實際上線前會替換為原創或已取得授權之素材。

虛構人工島的地圖底圖採用真實園區 3D 模型，用於 ARG 的實體線索對應，
不具商業用途。
