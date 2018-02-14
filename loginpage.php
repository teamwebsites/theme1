<?php
/**
 * Template Name: Login Page
**/

echo '<div class="new-loginform" id="showloginform">';

$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
if ( $login === "failed" ) {
  echo '<p class="login-msg login-msg-fail"><strong>ERROR:</strong> Invalid username and/or password.</p>';
} elseif ( $login === "empty" ) {
  echo '<p class="login-msg login-msg-fail"><strong>ERROR:</strong> Login attempt failed. Please try entering the correct details.</p>';
} elseif ( $login === "false" ) {
  echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
}
?>

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i');
.new-loginform h2 {text-align: center;}
input:-webkit-autofill {
   background:rgba(255,255,255,0) !important;
}
.login-submit > body {display: none !important;}
.login-submit input {box-shadow: none !important; -webkit-appearance: none;
   -moz-appearance:    none;
   appearance:         none;}
  
.loginfld {padding: 0 20px 0 50px !important; border: 1px solid #ccc !important; margin-bottom: 20px;} 
 
.not-logged-in a {text-transform: none !important;}
 
.login-submit #wp-submit, .login-form a {text-transform: uppercase; transition: opacity .5s ease-out; -moz-transition: opacity .5s ease-out; -webkit-transition: opacity .5s ease-out; -o-transition: opacity .5s ease-out;}   
.login-submit #wp-submit:hover, .login-submit #wp-submit:focus, .login-form a:hover, .login-form a:focus {opacity: 0.7;}
   
.new-loginform .loginformfield, .login-submit #wp-submit {width: 100%;
    height: 42px !important;
    box-sizing: border-box;
    border-radius: 5px;
    
    font-size: 14px;
    outline: none;}
    
    
    @-webkit-keyframes autofill {
    to {
        color: #666;
        background: transparent;
    }
}

input:-webkit-autofill {
    -webkit-animation-name: autofill;
    -webkit-animation-fill-mode: both;
}
.new-loginform a {color: #198fc6 !important;}
.login-submit #wp-submit {background: #198fc6 !important;}
.new-loginform input { position: relative; width: 100%; margin: 0px !important;border: none; outline: none; height: 100%; }  
.new-loginform .username-icon{background-image: url(http://i.imgur.com/u0XmBmv.png);}
.new-loginform .password-icon{background-image: url(http://i.imgur.com/Qf83FTt.png);}
.login-field-icon {left: 20px; width: 16px !important; bottom: 0px !important; position: absolute; height: 100%; background-size: 16px 80px;}
.loginformfield {position: relative;}
.new-loginform .passwordfield:focus + div {background: url(http://i.imgur.com/Qf83FTt.png);}
.new-loginform .usernamefield:focus + div {background: url(http://i.imgur.com/u0XmBmv.png);}
.new-loginform .loginfld:focus + div {background-position: center bottom; background-repeat: no-repeat; margin-top: -7px !important; top: 5px; background-size: 16px 80px !important;}
.new-loginform .loginfld{position: relative;}
#nav {font-size: 13px;}
@media screen and (min-width: 951px) { #nav .left {text-align: left; float: left; width: 50%;} #nav .right {text-align: right; float: right; width: 50%;} } 
.new-loginform label {display: none !important;}
.new-loginform {margin: 12px 0px;}
.new-loginform, .new-loginform p, .new-loginform form, .new-loginform input, .new-loginform label, .new-loginform span{font-family: 'Montserrat', sans-serif !important;}
.login-msg-fail {background: #c23d2a; padding: 7px 11px; color: rgba(255, 255, 255, 0.8588235294117647);}</style>

<div class="login-branding">
  <h2><a href="#" class="login-logo">Login</a></h2>
  <p class="login-desc">
    Login to your club website and keep members up-to-date with the latest news, fixtures and results, and information about your club.
  </p>
</div>
<script>
 $("#usernamefield").attr("tabindex",-1).focus();
</script>
<div class="login-form">

<?php if ( is_user_logged_in() ) : ?>    

<div class="not-logged-in">

<h3>You are logged in.</h3>

<p><a href="<?php echo admin_url(); ?>">Click here</a> to go to the admin panel, or be redirected to the <a href="<?php echo site_url(); ?>">home page</a>.</p>    

<p>Alternatively, <a href="<?php echo wp_logout_url( get_permalink() ); ?>">log out</a>.</p>
    
</div>

<?php else: ?>

<form name="loginform" autocomplete="off" id="loginform" action="<?php echo site_url('/', 'https'); ?>wp-login.php" method="post">
			
			<p class="login-username">
				<label for="user">Username or Email Address</label>
				
				    <div class="loginformfield"><input class="loginformfield usernamefield loginfld" autocomplete="off" type="text" placeholder="Username / Email Address" name="log" id="user" class="input" value="" size="20"></input> <div class="username-icon login-field-icon"></div></div>
				    
			</p>
			<p class="login-password">
				<label for="pass">Password</label>
				<div class="loginformfield"><input class="loginformfield passwordfield input loginfld" autocomplete="off" type="password" placeholder="Password" name="pwd" id="pass" value="" size="20"></input> <div class="password-icon login-field-icon"></div></div>
			</p>
			
			<p class="login-remember"><label><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>
			<p class="login-submit">
				<input type="submit" name="wp-submit" id="wp-submit" class="button button-primary" value="Log In">
				<input type="hidden" name="redirect_to" value="<?php echo site_url(); ?>">
			</p>
			
			<p id="nav">
			<span class="left"><a href="<?php echo wp_lostpassword_url(); ?>"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> &nbsp; Forgot my password</a></span>
			<span class="right"><a href="<?php echo site_url('/wp-login.php?action=register&redirect_to=' . get_permalink()); ?>">Register &nbsp; <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></span>
			</p>
			
		</form>
		
<?php endif; ?>
		
</div>
</div>