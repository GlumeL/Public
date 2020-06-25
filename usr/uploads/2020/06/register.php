<?php
include 'common.php';

if ($user->hasLogin() || !$options->allowRegister) {
    $response->redirect($options->siteUrl);
}
$rememberName = htmlspecialchars(Typecho_Cookie::get('__typecho_remember_name'));
$rememberMail = htmlspecialchars(Typecho_Cookie::get('__typecho_remember_mail'));
Typecho_Cookie::delete('__typecho_remember_name');
Typecho_Cookie::delete('__typecho_remember_mail');

$bodyClass = 'body-100';

include 'header.php';
?>
<style type="text/css">

body {
text-align: center;
     /*替换背景*/
    background-image: url(https://cdn.jsdelivr.net/gh/Catalpablog/handsome/img/XBG.webp); 
    background-position: center;
}
.btn {
color: #000;
    border-radius: 10px;
    background: linear-gradient(to right, #fbc2eb, #a6c1ee, #fbc2eb);
    background-size: 200%;
}
.btn:hover {
  animation: btnAnimate 1s infinite;
}
@keyframes btnAnimate {
  50% {
    background-position: 200%;
  }
}
</style>
<!--手机不加载canvas-->
<script>
if (screen && screen.width >768 ) {
document.write('<script   src="https://cdn.jsdelivr.net/gh/Catalpablog/handsome/js/canvas-nest.min.js" type="text/javascript"><\/script>');
}
</script>
<!--canvas结束-->
<div style="display: table;margin: 0 auto;height: 100%;">
<div  style="display: block;padding: 30px 15px;border-radius: 15px;margin-top: 20vh;box-shadow: 0 0 10px #00000040;width: 350px;">
       <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="150px" height="50px"> <image x="0px" y="-20px" width="150px" height="85px" xlink:href="data:img/png;base64,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"></image> 
       </svg>
        <form action="<?php $options->registerAction(); ?>" method="post" name="register" role="form">
            <p style="margin-top: 22px;">
                <label for="name" class="sr-only"><?php _e('用户名'); ?></label>
                <input type="text" id="name" name="name" placeholder="<?php _e('用户名'); ?>" value="<?php echo $rememberName; ?>" class="text-l w-100" autofocus />
            </p>
            <p>
                <label for="mail" class="sr-only"><?php _e('Email'); ?></label>
                <input type="email" id="mail" name="mail" placeholder="<?php _e('Email'); ?>" value="<?php echo $rememberMail; ?>" class="text-l w-100" />
            </p>
            <p class="submit">
                <button type="submit" class="btn btn-l w-100 primary"><?php _e('注册'); ?></button>
            </p>
        </form>
        
        <p class="more-link">
            <a href="<?php $options->siteUrl(); ?>"><?php _e('返回首页'); ?></a>
            &bull;
            <a href="<?php $options->adminUrl('login.php'); ?>"><?php _e('用户登录'); ?></a>
        </p>
    </div>
</div>
<?php 
include 'common-js.php';
?>
<script>
$(document).ready(function () {
    $('#name').focus();
});
</script>
<?php
include 'footer.php';
?>
