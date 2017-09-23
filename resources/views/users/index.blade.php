<html>
<?php  require PUBLIC_DIR."/head.php";?>
    <body>
        <div>
            <text>登录</text>
            <div>
                <p>
                <label>
                    <text>用户名</text>
                    <input type="text" name="username" />
                    <span></span>
                </label>
                </p>
                <p>
                <label>
                    <text>密码</text>
                    <input type="password" name="password" />
                    <span></span>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                </label>
                </p>
                <p>
                <label>
                    <text></text>
                    <input type="submit" name="登录" />
                </label>
                </p>
            </div>
        </div>
        <div>
            <text>?忘记密码</text>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <text class="login_register" hrefu ="users/register"><a>注册</a></text>
        </div>
    </body>
    <script type="text/javascript" src="{{PUBLIC_LING}}/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="{{PUBLIC_LING}}/js/login.js"></script>
</html>