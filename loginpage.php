<?php
/**
 * Template Name: Login Page
**/

$sitename = get_bloginfo("name");

$login  = (isset($_GET['login']) ) ? $_GET['login'] : 0;
if ( $login === "failed" ) {
  echo '<p class="login-msg login-msg-fail"><strong>ERROR:</strong> Invalid username and/or password.</p>';
} elseif ( $login === "empty" ) {
  echo '<p class="login-msg login-msg-fail"><strong>ERROR:</strong> Login attempt failed. Please try entering the correct details.</p>';
}

elseif ( $login === "wpau_confirmation_error" ) {
  echo '<p class="login-msg login-msg-warning"><strong>User Not Approved:</strong> Unfortunately it seems as if the Site Admin has not approved your User Account yet. Until the request has been approved by the '. $sitename .' site admin, you cannot access any hidden/private content.</p>';
}

elseif ( $login === "false" ) {
  echo '<p class="login-msg"><strong>ERROR:</strong> You are logged out.</p>';
}
?>

<!-- Custom Login/Register/Password Code @ https://digwp.com/2010/12/login-register-password-code/ -->
<!-- jQuery -->

<!-- Custom Login/Register/Password Code @ https://digwp.com/2010/12/login-register-password-code/ -->


<!-- Custom Login/Register/Password Code @ https://digwp.com/2010/12/login-register-password-code/ -->
<!-- CSS -->
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
.login-msg-fail {background: #c23d2a;}
.login-msg-fail, .login-msg-warning {background: #e49400; padding: 7px 11px; color: rgba(255, 255, 255, 0.8588235294117647);}
.tab_container_login {color: #000 !important;}
/* tabbed list */
ul.tabs_login {
	padding: 0; margin: 20px 0 0 0;
	position: relative;
	list-style: none;
	font-size: 14px;
	z-index: 1000;
	float: left;
	}
ul.tabs_login li {
	border: 1px solid #E7E9F6;
	 -webkit-border-top-right-radius: 10px;
	 -khtml-border-radius-topright: 10px;	
	 -moz-border-radius-topright: 10px;
	border-top-right-radius: 10px;
	 -webkit-border-top-left-radius: 10px;
	 -khtml-border-radius-topleft: 10px;	
	 -moz-border-radius-topleft: 10px;
	border-top-left-radius: 10px;
	line-height: 28px; /* = */ height: 28px;
	padding: 0; margin: 0 5px 0 0;
	position: relative;
	background: #fff;
	overflow: hidden;
	float: left;
	}
ul.tabs_login li a {
	text-decoration: none;
	padding: 0 10px;
	display: block;
	outline: none;
	}
html ul.tabs_login li.active_login {
	border-left: 1px solid #E7E9F6;
	border-bottom: 1px solid #fff;
	 -webkit-border-top-right-radius: 10px;
	 -khtml-border-radius-topright: 10px;	
	 -moz-border-radius-topright: 10px;
	border-top-right-radius: 10px;
	 -webkit-border-top-left-radius: 10px;
	 -khtml-border-radius-topleft: 10px;	
	 -moz-border-radius-topleft: 10px;
	border-top-left-radius: 10px;
	background: #fff;
	color: #333;
	}
html body ul.tabs_login li.active_login a { font-weight: bold; }
.tab_container_login {
	background: #fff;
	position: relative;
	margin: 0 0 20px 0;
	border: 1px solid #E7E9F6;
	 -webkit-border-bottom-left-radius: 10px;
	 -khtml-border-radius-bottomleft: 10px;	
	 -moz-border-radius-bottomleft: 10px;
	border-bottom-left-radius: 10px;
	 -webkit-border-bottom-right-radius: 10px;
	 -khtml-border-radius-bottomright: 10px;	
	 -moz-border-radius-bottomright: 10px;
	border-bottom-right-radius: 10px;
	 -webkit-border-top-right-radius: 10px;
	 -khtml-border-radius-topright: 10px;	
	 -moz-border-radius-topright: 10px;
	border-top-right-radius: 10px;
	z-index: 999;
	float: left;
	width: 100%;
	top: -1px;
	}
.tab_content_login {
	padding: 7px 15px 15px 15px;
	padding-top: 10px;
	}
	.tab_content_login ul {
		padding: 0; margin: 0 0 0 15px;
		}
		.tab_content_login li { margin: 5px 0; }
/* global styles */
#login-register-password {}
	#login-register-password h3 {
		border: 0 none;
		margin: 10px 0;
		padding: 0;
		}
	#login-register-password p {
		margin: 0 0 15px 0;
		padding: 0;
		}
/* form elements */
.wp-user-form {}
	.username, .password, .login_fields {
		margin: 7px 0 0 0;
		overflow: hidden;
		width: 100%;
		}
		.username label, .password label { float: left; clear: none; width: 25%; }
		.username input, .password input { 
			font: 12px/1.5 "Lucida Grande", "Lucida Sans Unicode", Verdana, sans-serif;
			float: left; clear: none; width: 200px; padding: 2px 3px; color: #777;
			}
.rememberme { overflow: hidden; width: 100%; margin-bottom: 7px; }
#rememberme { float: left; clear: none; margin: 4px 4px -4px 0; }
.user-submit { padding: 5px 10px; margin: 5px 0; }
.userinfo { float: left; clear: none; width: 75%; margin-bottom: 10px; }
	.userinfo p { 
		margin-left: 10px; 
		}
.usericon { float: left; clear: none; width: 15%; margin: 0 0 10px 22px; }
	.usericon img {
		border: 1px solid #F4950E;
		padding: 1px;
		}
</style>


<!-- Custom Login/Register/Password Code @ https://digwp.com/2010/12/login-register-password-code/ -->
<!-- Theme Template Code -->

<div id="login-register-password">

	<?php global $user_ID, $user_identity; if (!$user_ID) { ?>

	<ul class="tabs_login">
		<li class="active_login"><a href="#tab1_login">Login</a></li>
		<li><a href="#tab2_login">Register</a></li>
		<li><a href="#tab3_login">Forgot?</a></li>
	</ul>
	<div class="tab_container_login">
		<div id="tab1_login" class="tab_content_login">

			<?php $register = $_GET['register']; $reset = $_GET['reset']; if ($register == true) { ?>

			<h3>Success!</h3>
			<p>Check your email for the password and then return to log in.</p>

			<?php } elseif ($reset == true) { ?>

			<h3>Success!</h3>
			<p>Check your email to reset your password.</p>

			<?php } else { ?>

			<h3>Have an account?</h3>
			<p>Log in or sign up! It&rsquo;s fast &amp; <em>free!</em> Or click on the 'Register' tab to request access to hidden content.</p>

			<?php } ?>

			<form method="post" action="<?php bloginfo('url') ?>/wp-login.php" class="wp-user-form">
			    
			    
			    
				<div class="username">
					<label for="user_login"><?php _e('Username'); ?>: </label>
					<input type="text" name="log" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="20" id="user_login" tabindex="11" />
				</div>
				<div class="password">
					<label for="user_pass"><?php _e('Password'); ?>: </label>
					<input type="password" name="pwd" value="" size="20" id="user_pass" tabindex="12" />
				</div>
				<div class="login_fields">
					<div class="rememberme">
						<label for="rememberme">
							<input type="checkbox" name="rememberme" value="forever" id="rememberme" tabindex="13" /> Remember me
						</label>
					</div>
					<?php do_action('login_form'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Login'); ?>" tabindex="14" class="user-submit" />
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
		<div id="tab2_login" class="tab_content_login" style="display:none;">
			<h3>Register for this site!</h3>
			<p>Sign up now for the good stuff.</p>
			
			<p><a href="<?php echo site_url('/', 'https'); ?>register">Please click here to register and/or request access to this site.</a></p>
			
		</div>
		<div id="tab3_login" class="tab_content_login" style="display:none;">
			<h3>Lose something?</h3>
			<p>Enter your username or email to reset your password.</p>
			<form method="post" action="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post') ?>" class="wp-user-form">
				<div class="username">
					<label for="user_login" class="hide"><?php _e('Username or Email'); ?>: </label>
					<input type="text" name="user_login" value="" size="20" id="user_login" tabindex="1001" />
				</div>
				<div class="login_fields">
					<?php do_action('login_form', 'resetpass'); ?>
					<input type="submit" name="user-submit" value="<?php _e('Reset my password'); ?>" class="user-submit" tabindex="1002" />
					<?php $reset = $_GET['reset']; if($reset == true) { echo '<p>A message will be sent to your email address.</p>'; } ?>
					<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>?reset=true" />
					<input type="hidden" name="user-cookie" value="1" />
				</div>
			</form>
		</div>
	</div>

	<?php } else { // is logged in ?>

	<div class="sidebox">
		<h3>Welcome, <?php echo $user_identity; ?></h3>
		<div class="usericon">
			<?php global $userdata; echo get_avatar($userdata->ID, 60); ?>

		</div>
		<div class="userinfo">
			<p>You&rsquo;re logged in as <strong><?php echo $user_identity; ?></strong></p>
			<p>
				<a href="<?php echo wp_logout_url('index.php'); ?>">Log out</a> | 
				<?php if (current_user_can('manage_options')) { 
					echo '<a href="' . admin_url() . '">' . __('Admin') . '</a>'; } else { 
					echo '<a href="' . admin_url() . 'profile.php">' . __('Profile') . '</a>'; } ?>

			</p>
		</div>
	</div>

	<?php } ?>

</div>

<!-- Custom Login/Register/Password Code @ https://digwp.com/2010/12/login-register-password-code/ -->