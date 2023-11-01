
    <div class="MyadvisorMain">
        <header>
            <img src="websiteImages\icons8-lock-64.png" style="margin: 2px 20px; padding: 2px 0;" class="hideBox" alt="image" width="40" height="40">
            <h5>Change Your Password</h5>
        </header>
        <form name="formSub" onsubmit="event.preventDefault();">
            <div class="passwordBox1">
                <span style="display: flex; flex-direction: column;">
                    <label for="registerNo" style="padding: 3px;">Registration Number</label>
                    <input type="text" id="registerNo" name="registerNo" placeholder="2135000015" style="text-align: center; width: 96%; padding: 4px 0;" disabled>
                </span>
                <span style="display: flex; flex-direction: column;">
                    <label for="oldPass" style="padding: 3px;">Old Password</label>
                    <input type="text" id="oldPass" class="form-control nullValue" name="oldPass" placeholder="Enter old password" maxlength="18" style="text-align: center; width: 96%;">
                </span>
            </div>
            <div class="passwordBox1">
                <span style="display: flex; flex-direction: column;">
                    <label for="newPass" style="padding: 3px;">New Password</label>
                    <input type="text" id="newPass" class="form-control nullValue" name="newPass" placeholder="Enter new password" maxlength="18" style="text-align: center;  width: 96%;">
                </span>
                <span style="display: flex; flex-direction: column; height: 100px;">
                    <label for="confPass" style="padding: 3px;">Confirm Password</label>
                    <input type="text" id="confPass" class="form-control nullValue" name="confPass" placeholder="Enter confirm password" maxlength="18" style="text-align: center;  width: 96%;">
                    <span id="paraAlert" style="text-align: center; font-size: 14px; color: red;"></span>
                </span>
            </div>
            <div class="passwordSubmit">
                <button type="submit" onclick="submitPassword();">Submit</button>
                <button type="button" onclick="resetBtnFunc();">Reset</button>
            </div>
        </form>
    </div>

    <script src="{{URL::asset('js-container/passwordChange.js')}}" type="text/javascript"></script>