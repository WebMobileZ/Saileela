<?php 
/**
 * Template Name: Registration
 */

?>

<?php get_header(); ?>
<?php if (is_user_logged_in()) {  
   wp_redirect(home_url()) ;
} ?>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/login.css" />
<?php
	$error= '';
	$success = '';
 
    global $wpdb, $PasswordHash, $current_user, $user_ID;
    if(isset($_POST['task']) && $_POST['task'] == 'register' ) {
 
		
		$password1 = $wpdb->escape(trim($_POST['password1']));	
		$first_name = $wpdb->escape(trim($_POST['first_name']));
		$last_name = $wpdb->escape(trim($_POST['last_name']));
		$email = $wpdb->escape(trim($_POST['email']));
		$username = $wpdb->escape(trim($_POST['username']));
		
		if( $email == "" || $password1 == "" || $username == "" || $first_name == "" || $last_name == "") {
			$error= 'Please don\'t leave the required fields.';
		} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error= 'Invalid email address.';
		} else if(email_exists($email) ) {
			$error= 'Email already exist.';
		} else {
 
			$user_id = wp_insert_user( array ('first_name' => apply_filters('pre_user_first_name', $first_name), 'last_name' => apply_filters('pre_user_last_name', $last_name), 'user_pass' => apply_filters('pre_user_user_pass', $password1), 'user_login' => apply_filters('pre_user_user_login', $username), 'user_email' => apply_filters('pre_user_user_email', $email), 'role' => 'subscriber' ) );
			if( is_wp_error($user_id) ) {
				$error= 'Error on user creation.';
			} else {
				do_action('user_register', $user_id);
				
				$success = 'You\'re successfully register';
			}
			
		}
		
	}
    ?>


<div class="parallax">
            <div class="container">
                <div class="col-xs-12 col-sm-offset-1 col-sm-10">
                    <h2 class="heading">SAILEELA</h2>
                </div>
            </div>
        </div>
        <div class="form">
                <!--display error/success message-->
            
                <div id="message">
                    <?php 
                        if(! empty($err) ) :
                            echo '<div class="alert alert-danger">'.$success."</div>";
                        endif;
                    ?>
                    
                    <?php 
                        if(! empty($success) ) :
                            echo '<div class="alert alert-success">'.$success."</div>";
                        endif;
                    ?>
                </div>
                <div id="message">
                    <?php 
                       if($sucess != "") {
                            echo '<div class="alert alert-success">'.$success."</div>";
                       }
                    ?>
                    
                    <?php 
                       if($error!= "") {
                            echo '<div class="alert alert-danger">'.$error."</div>";
                       }
                    ?>
					<?php if(isset($_GET['login']) && $_GET['login'] == 'failed')
{
	?>
					<div class="alert alert-danger"><p>Login failed: You have entered an incorrect Username or password.</p></div>
		
	<?php
} ?>
					<?php if(isset($_GET['login']) && $_GET['login'] == 'empty')
{
	?>
					<div class="alert alert-danger"><p>Login failed: You have entered an Username or password empty.</p></div>
		
	<?php
} ?>
                </div>
           
            <ul class="tab-group">
                <li class="tab active signup-tab"><a class="signup">Sign Up</a></li>
                <li class="tab login-tab"><a class="login">Log In</a></li>
            </ul>
          
            <div class="tab-content">
                <div id="signup">
                    <h1>Sign Up for Free</h1>

                    <form method="post" id="signupForm1">

                        <div class="top-row">
                            <div class="field-wrap">
                                
                                <input type="text" name="last_name" id="last_name" placeholder="First Name *" required autocomplete="off" />
                            </div>

                            <div class="field-wrap">
                                
                                <input type="text"  name="first_name" id="first_name" placeholder="Last Name *" required autocomplete="off" />
                            </div>
                        </div>
                        
                        <div class="field-wrap">
                            
                            <input type="email" name="email" id="email" placeholder="Email *" required autocomplete="off" />
                        </div>
                        <div class="field-wrap">
                            
                            <input type="text" name="username" id="username"  placeholder="Username *" required autocomplete="off" />
                        </div>
                        <div class="field-wrap">
                            
                            <input type="password"  name="password1" id="password1"  placeholder="Set A Password*" required autocomplete="off" />
                        </div>
                       
                      
                        <button type="submit" name="btnregister" class="button button-block" >Get Started</button>
                        <input type="hidden" name="task" value="register" />
                    </form>
                   
                </div>

                <div id="login">
                    <h1>Welcome Back!</h1>
              
          <style>
  
.login_form input{
	padding:10px;
    margin-bottom: 20px;
	padding-left:34px;
	width:100%;
	border:1px solid #ccc;
	}
	

.login_form input[type=submit]{
	color:#fff;
	background:#1ABC9C;
	font-weight:bold;
	text-transform:uppercase;
	border:none;
	}
	
.login_form input[type=submit]:hover{
	cursor:pointer;
	opacity:0.8;
	}

.forgot_password a{
	color:#999 !important;
	text-decoration:none;
	}
	
.forgot_password a:hover{
	color:#777 !important;
	}

</style>
                  <?php
if (is_user_logged_in()) {               
  //  echo '<div class="logout"> <p>Hello!<div class="logout_user"> You are logged in and can proceed to the <a href="http://example.com/seminar">Online Seminar</a>.</div></p><br /><p><a id="wp-submit" class="logout" href="', wp_logout_url(), '" title="Logout">Logout</a></p></div>';
   echo  '<a href="'. wp_logout_url() .'">Log Out</a>';
} else { 
                  // Arguments for the wp_login_form()
                  
                  $args = array(
                      'echo'           => true,
                      'remember'       => false,
                      'redirect' => home_url(), 
                      'form_id'        => 'loginform',
                      'id_username'    => 'user_login',
                      'id_password'    => 'user_pass',
                      'id_remember'    => 'rememberme',
                      'id_submit'      => 'wp-submit',
                      'label_username' => __( '' ),
                      'label_password' => __( '' ),
                      'label_log_in'   => __( 'Log In' ),
                      'value_username' => '',
                     
                  );
                  
                  ?>
                <div class="login_form">   <?php wp_login_form($args); ?>
                <?php } ?>

                </div>
                   
                </div>

            </div><!-- tab-content -->

        </div> <!-- /form -->


       
<?php get_footer(); ?>
<script type="text/javascript">
        $(document).ready(function () {
            $(".signup").click(function () {
                $(".login-tab").removeClass('active');
                $(".signup-tab").addClass('active');

                $("#login").css({ display: 'none' });
                $("#signup").css({ display: 'inline-block' });

            });

            $(".login").click(function () {
                $(".signup-tab").removeClass('active');
                $(".login-tab").addClass('active');

                $("#signup").css({ display: 'none' });
                $("#login").css({ display: 'inline-block' });
            });
        });
    </script>
    <script type="text/javascript">

jQuery(document).ready(function(){

    jQuery('#user_login').attr('placeholder', 'Username');

    jQuery('#user_pass').attr('placeholder', 'Password');

});

</script>