<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <script src="https://code.jquery.com/jquery-4.0.0.module.min.js" integrity="sha256-d4LwM9D6pTkixVQVP66nz3BYd8ri7Uriz7C3X4qBAVE=" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Microsoft JhengHei', 'PingFang TC', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px;
            text-align: center;
            color: white;
        }

        .login-header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .login-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .login-form {
            padding: 40px 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-size: 14px;
            font-weight: 500;
        }

        .form-group label .required {
            color: #e74c3c;
            margin-left: 3px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-group input.error {
            border-color: #e74c3c;
        }

        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: none;
        }

        .error-message.show {
            display: block;
        }

        .captcha-group {
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .captcha-group input {
            flex: 1;
        }

        .captcha-display {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 12px 20px;
            border-radius: 10px;
            color: white;
            font-size: 20px;
            font-weight: bold;
            letter-spacing: 5px;
            user-select: none;
            cursor: pointer;
            transition: transform 0.2s;
            min-width: 100px;
            text-align: center;
        }

        .captcha-display:hover {
            transform: scale(1.05);
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .forgot-password {
            text-align: center;
            margin-top: 20px;
        }

        .forgot-password a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        /* .forgot-password a:hover {
            color: #764ba2;
            text-decoration: underline;
        } */

        @media (max-width: 480px) {
            .login-container {
                border-radius: 0;
            }

            .login-form {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <h1>會員登入</h1>
            <p>歡迎回來！請登入您的帳戶</p>
        </div>
        <!-- 比較:把登入成功的預設刪掉，不然只會讀到彈窗，不會進入頁面 -->
        <!-- <form class="login-form" id="loginForm" onsubmit="return validateForm(event)" action="/admin/login" method="post"> -->
        <form class="login-form" id="loginForm" action="/admin/login" method="post">
            <!-- 隱藏參數，不讓非本機從外部修改 -->
            @csrf
            <div class="form-group">
                <label for="userId">
                    帳號
                    <span class="required">*</span>
                </label>
                <div class="input-wrapper">
                    <input
                        type="text"
                        id="userId"
                        name="userId"
                        placeholder="請輸入帳號"
                        autocomplete="off">
                    <div class="error-message" id="userIdError">請輸入帳號</div>
                </div>
            </div>

            <div class="form-group">
                <label for="pwd">
                    密碼
                    <span class="required">*</span>
                </label>
                <div class="input-wrapper">
                    <input
                        type="password"
                        id="pwd"
                        name="pwd"
                        placeholder="請輸入密碼">
                    <div class="error-message" id="pwdError">請輸入密碼</div>
                </div>
            </div>

            <div class="form-group">
                <label for="code">
                    驗證碼
                    <span class="required">*</span>
                </label>
                <div class="captcha-group">
                    <div class="input-wrapper" style="flex: 1;">
                        <input
                            type="text"
                            id="code"
                            name="code"
                            placeholder="請輸入驗證碼"
                            maxlength="6"
                            required
                            value="{{old('userId')}}">
                        <div class="error-message" id="codeError">請輸入驗證碼</div>
                    </div>
                    <!-- <div class="captcha-display" id="captchaDisplay" onclick="generateCaptcha()" title="點擊更換驗證碼">
                        A1B2 -->
                </div>
                <img src="/captcha/flat" onclick="this.src='captcha/flat?' + Math.random()" style="cursor:pointer" alt="">
                <div>
                </div>
                <div class="refresh-hint">
                    @if($errors->has("msg"))
                    <font color="red">{{ $errors->first("msg")}}</font>
                    @endif
                </div>
                <div class="refresh-hint">
                    @if($errors->has("msg"))
                    <font color="red">{{ $errors->first("account")}}</font>
                    @endif
                </div>
            </div>

            <button type="submit" class="submit-btn">登入</button>

            <div class="forgot-password">
                <a href="#">忘記密碼？</a>
            </div>
        </form>
    </div>

    <script>
        let currentCaptcha = '';

        // 產生隨機驗證碼
        function generateCaptcha() {
            const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            let captcha = '';
            for (let i = 0; i < 4; i++) {
                captcha += chars.charAt(Math.floor(Math.random() * chars.length));
            }
            currentCaptcha = captcha;
            document.getElementById('captchaDisplay').textContent = captcha;
        }

        // 表單驗證
        function validateForm(event) {
            event.preventDefault();

            let isValid = true;

            // 驗證帳號
            const userId = document.getElementById('userId');
            const userIdError = document.getElementById('userIdError');
            if (userId.value.trim() === '') {
                userId.classList.add('error');
                userIdError.classList.add('show');
                isValid = false;
            } else {
                userId.classList.remove('error');
                userIdError.classList.remove('show');
            }

            // 驗證密碼
            const pwd = document.getElementById('pwd');
            const pwdError = document.getElementById('pwdError');
            if (pwd.value.trim() === '') {
                pwd.classList.add('error');
                pwdError.classList.add('show');
                isValid = false;
            } else {
                pwd.classList.remove('error');
                pwdError.classList.remove('show');
            }

            // 驗證驗證碼
            const code = document.getElementById('code');
            const codeError = document.getElementById('codeError');
            if (code.value.trim() === '') {
                code.classList.add('error');
                codeError.textContent = '請輸入驗證碼';
                codeError.classList.add('show');
                isValid = false;
            /*1. 刪除比對邏輯： 找到 validateForm 函式，把原本檢查 code.value.toUpperCase() !== currentCaptcha 的那整段 else if 刪掉。
            理由： 變數 currentCaptcha 現在是空的，強行比對永遠會失敗。*/
            // } else if (code.value.toUpperCase() !== currentCaptcha) {
            //     code.classList.add('error');
            //     codeError.textContent = '驗證碼錯誤';
            //     codeError.classList.add('show');
            //     isValid = false;
            } else {
                code.classList.remove('error');
                codeError.classList.remove('show');
            }

            if (isValid) {
                alert('登入成功！');
                // 這裡可以提交表單到後端
                // document.getElementById('loginForm').submit();
            }
            /*2. 修改放行開關： 將最後的 return false; 改成 return true;。

            理由： false 會攔截表單，true 才會把帳號密碼真正傳送給 Laravel 後端。*/
            // 移除錯誤狀態
            return ture;
        }

        
        document.querySelectorAll('input').forEach(input => {
            input.addEventListener('input', function() {
                this.classList.remove('error');
                const errorElement = document.getElementById(this.id + 'Error');
                if (errorElement) {
                    errorElement.classList.remove('show');
                }
            });
        });

        // 頁面載入時產生驗證碼
        window.onload = function() {
            generateCaptcha();
        };
    </script>
</body>

</html>