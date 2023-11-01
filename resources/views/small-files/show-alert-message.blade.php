<div id="overlay_alert" style="width:100%; height:100vh; display:block;
      background-color: rgba(36, 30, 30, 0.4); position:fixed; top: 0; left: 0; z-index: 1000;"></div>
<div class="container alert alert-light alert-dismissible fade show position-fixed top-50 start-50 translate-middle"
    style="width: 95%; max-width:400px; padding: 15px 10px; z-index: 1200; border-radius: 8px; text-align: center;">
    <button type="button" class="btn-close" style="position: absolute; right: 10px; top: 10px; padding: 10px;" data-bs-dismiss="alert" onclick="document.getElementById('overlay_alert').style.display = 'none';"></button>
    <strong style="width: 100%;">
        <span style="margin: 22px 4px;border: 6px inset #ff3300;padding: 14px 0px 22px 0px;
                border-radius: 50%;background-color: #ffff80; color: red;">
            <img src="assets/websiteImages/icon-of-alert-login.png" alt="Alert!" width="60" height="60">
        </span>
            <p style="padding: 10px 4px; margin-top: 30px; word-wrap: normal; text-align: center;">{{$errorMessage}}</p>
            @if (!empty($err))
                @foreach ($err->all() as $error)
                    <p style="padding: 10px 4px; word-wrap: normal; text-align: center;" class="text-danger">{{ $error }}</p>
                @endforeach
            @endif
    </strong>
</div>