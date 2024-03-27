<link href="/Engine/API/Security/Password/Show/Style.css" rel="stylesheet" />
<div id="game-security-password-show" class="stylo">
    <h1 class="wrap-title">
        Enter the password
    </h1>
    <hr/>
    <input type="password" name="pass" />
    <a href="javascript:void(0)" class="butn" onclick="Rune.Security.Password.check();">Check</a>
    <div class="error" style="display: none;">Access denied!</div>
    <script>
        $("#game-security-password-show input[name=pass]").on('keyup', function (e) {
            if (e.key === 'Enter' || e.keyCode === 13) {
                Rune.Security.Password.check();
            }
        });
    </script>
</div>