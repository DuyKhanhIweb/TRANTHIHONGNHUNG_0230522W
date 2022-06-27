<style>
    .box-signin-mx {
        min-width: 350px;
        margin: 0 auto;
        padding: 15px;
        background-color: #eab741;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        border-radius:8px
    }
    input[data-login] {
        border: 0;
        background-color: #000;
        font-size: 14px;
        text-transform: uppercase;
        font-weight: normal;
        height: 35px;
        color: #fff;
        border-radius: 4px;
        margin-top: 10px;
    }
    .input-group {
        position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        -ms-flex-align: stretch;
        align-items: stretch;
        width: 100%;
    }
    .input-group>.form-control{
        position: relative;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        width: 1%;
        margin-bottom: 0;
    }
    .input-group>.form-control::placeholder{
        font-size: 14px;
    }
    .form-control {
        display: block;
        width: 100%;
        height: 37px;
        padding: 0px 10px;
        font-size: 14px!important;
        font-weight: 400;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 0;
        border-radius: 0;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .input-group .login-input-group-append .input-group-text {
        border: 1px solid #fff!important;
        border-right: 0px!important;
    }
    .input-group-text {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding: 0px 15px;
        margin-bottom: 0;
        font-size: 1rem;
        font-weight: 400;
        height: 35px;
        line-height: 1.5;
        color: #495057;
        text-align: center;
        white-space: nowrap;
        background-color: #e9ecef;
        border: 1px solid #fff;
        border-radius: .25rem;
    }
    .input-group .input-group-text {
        color: #999;
        background-color: #fff;
        margin-right: 2px;
        transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .input-group>.input-group-append:last-child>.btn:not(:last-child):not(.dropdown-toggle), .input-group>.input-group-append:last-child>.input-group-text:not(:last-child), .input-group>.input-group-append:not(:last-child)>.btn, .input-group>.input-group-append:not(:last-child)>.input-group-text, .input-group>.input-group-prepend>.btn, .input-group>.input-group-prepend>.input-group-text {
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }
    .show-password {
        border-radius: 0;
        border: 0;
        height: 37px;
        margin-left: 2px;
    }
    .header {
        text-transform: uppercase;
        font-size: 20px;
        color: #fff;
        text-align: center;
        font-weight:700;
        padding: 8px;
        border-radius: 0px;

    }
    .form-button{
        text-align: center;
    }
    .form-group-signin{
        margin-bottom: 15px;
    }
    input[data-login]:hover {
        background-color: #2990bb;
        color: #fff;
    }
    .cs-pointer{
        cursor: pointer;
    }
    .justify-content-around {
        -ms-flex-pack: distribute !important;
        justify-content: space-around !important;
    }
    .d-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        display: flex !important;
    }
    .text-white{
        color: #fff;
    }
    .text-black{
        color: #000;
    }
    .text-decoration{
        text-decode
    }
    .jq-toast-single{
        width: auto!important;
    }
</style>
<main>
    <section class="section-signin clearfix">
        <div class="box-signin-mx">
            <div class="header">
                <span>Đăng nhập hệ thống</span>
            </div>
            <div class="box-input-signin">
                <div class="form-group-signin mt10">
                    <div class="input-group">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-user"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Tên đăng nhập">
                    </div>
                </div>
                <div class="form-group-signin">
                    <div class="input-group">
                        <div class="input-group-append login-input-group-append">
                            <div class="input-group-text">
                                <span class="fa fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text cs-pointer show-password">
                                <span class="fa fa-eye-slash"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-signin form-button">
                    <input class="btn-login" onclick="login('username','password')" data-login="" type="button" value="Đăng nhập"/>
                </div>
                <div class="d-flex justify-content-around">
                    <div>
                        <a href="http://<?=$config_url?>" target="_blank" class="text-white"><i class="far fa-share"></i>&nbsp;Vào website</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>