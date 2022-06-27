<style>
.wrapper-error{
    width: 500px;
    margin: 20px auto;
}
.box-error .error{
    font-size: 3em;
    color:var(--html-bg-website)
}
.box-error .text-error{
    font-size: 7em;
    font-weight: bold;
    margin-top: -30px;
    background: -webkit-linear-gradient(45deg, #9d3127, #ef5610 80%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
.text-alert .alert-one{
    font-size: 21px;
    font-weight: 700;
    margin: 0;
    text-transform: uppercase;
    color: #232323;
}
.text-alert .alert-two{
    color: #787878;
    font-weight: 300;
    font-size: 14px;
    margin-bottom: 20px;
}
.text-alert a{
    display:inline-block;
    padding:10px 20px;
    background-color:var(--html-bg-website);
    border-radius:25px;
    color:#fff;
    text-transform:uppercase;
}
.text-alert a:hover{
    opacity:0.8
}
</style>
<div class="wrapper-error w-100i mt30">
    <div class="box-error t-center">
        <div class="error mb20">
            Error !
        </div>
        <div class="text-error mt10">
            404
        </div>
        <div class="text-alert">
            <div class="alert-one">Trang của bạn không được tìm thấy!</div>
            <div class="alert-two mt5">Xin lỗi nhưng trang bạn đang tìm kiếm không tồn tại hoặc
            đã bị xóa. Tên đã thay đổi hoặc tạm thời không khả dụng.</div>
            <a href="" title="Quay lại">Về trang chủ</a>
        </div>
    </div>
</div>