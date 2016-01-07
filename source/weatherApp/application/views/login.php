<html>
<?php include('inc/header.php');?>
<body>
<div class="loginform">
    <form name="frmUser" method="post">
        <div class="message"><?php if(isset($message) && $message!="") { echo $message; } ?></div>
        <div class="mdl-textfield mdl-js-textfield">
          Username:  <input class="mdl-textfield__input" type="text" name="user_name"/>
            <label class="mdl-textfield__label">username</label>
        </div>
        <div class="clear"></div>
        <div class="mdl-textfield mdl-js-textfield">
        Password:    <input class="mdl-textfield__input" type="password" name="password"/>
            <label class="mdl-textfield__label">password</label>
        </div>
        <div class="clear"></div>
        <input type="hidden" name="action" value="login"/>
<input class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored adminbutton" type="submit" name="submit" value="Login">

    </form>
</div>
</body>
</html>