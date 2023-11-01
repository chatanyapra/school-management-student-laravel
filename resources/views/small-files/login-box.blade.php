<form name="form_submit" method="post"  onsubmit="event.preventDefault();">
    @csrf
    <!-- Modal Header -->
    <div class="modal-header" style="border: none;" id="loginFormAnim">
        <h1 style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Log
            in</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            onclick="refreshLoginPage();"></button>
    </div>

    <!-- Modal body -->
    <div class="selectOpt">
        <select name="loginclassOpt" id="login-class-select">
            <option value="class_7">Class-7</option>
            <option value="class_8">Class-8</option>
            <option value="class_9">Class-9</option>
            <option value="class_10">Class-10</option>
        </select>
        <input type="number" class="login-input-class-1" name="registrationNo" id="login-reg-id"
            path="note" maxlength="10" placeholder="Registration No."
            oninput="if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
            />
        <input type="password" class="login-input-class-1" name="password" id="login-pass-id"
            placeholder="Password" path="note" maxlength="25" />

        <div class="captchaInlineBlock">
            <input type="text" class="login-input-class-1" style="transform: translateX(-8px);"
                name="captchaCodeInput" id="login-captcha-id" maxlength="4" placeholder="Captcha code"
                />
            <span class="captcha-text" id="showPhpCaptchaCode">
                <!-- showing the captcha Code of php through ajax--- -->
            </span>
            <button type="button"
                style="font-weight: bold; font-size: 26px; border: none; background: none; margin: 0 5px; transform: translateX(8px);"
                onclick="reloadCaptcha();">&#10226;</button>
        </div>
    </div>
    <!-- Modal footer -->
    <div class="modal-footer"
        style="border: none; display: flex; justify-content: space-between; margin: 0 30px 10px 30px;">
        <button type="button" id="login-forgot-pass" class="nav-link-Button"
            style=" width: auto; border: none;" onclick="forgotPassword();">Forgot password!</button>
        <button type="submit" id="loginText" name="loginTextbtn" class="btn"
            style="display: block; background-color: rgb(255, 92, 92); color: white;"
            onclick="checkPasswordRecover('login');">Log in</button>
    </div>
</form>
