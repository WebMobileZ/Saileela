<footer class="main-footer">
            <!--Footer Upper-->
            <div class="footer-upper">
                <div class="auto-container">
                    <div class="row clearfix">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget services-widget">
                                <h3>SAILEELA</h3>
                                <ul class="links">
                                    <li><a href="<?php echo home_url('share-experience'); ?>">Share Your Experience</a></li>
                                    <li><a href="<?php echo home_url('ask-for-help'); ?>">Ask For Help</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget contact-widget">
                                <h3>Contact Us</h3>
                                <ul class="info">
                                    <li><strong>Email: </strong> <a href="mailto:info@sai-leela.org">info@sai-leela.org</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget support-widget">
                                <h3>Useful Links</h3>
                                <ul class="links">
                                    <li><a href="<?php echo home_url('about'); ?>">About</a></li>
                                    <li><a href="<?php echo home_url('ask-for-help'); ?>">Ask For Help</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="footer-widget newsletter-widget">
                                <h3>Follow Us</h3>
                                <div class="social-links">
                                    <a href="http://sai-leela.org/About#"><span class="fa fa-facebook-f"></span></a>
                                    <a href="http://sai-leela.org/About#"><span class="fa fa-twitter"></span></a>
                                    <a href="http://sai-leela.org/About#"><span class="fa fa-google"></span></a>
                                    <a href="http://sai-leela.org/About#"><span class="fa fa-linkedin"></span></a>
                                    <a href="http://sai-leela.org/About#"><span class="fa fa-youtube"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="row clearfix">
                        <br>
                        <div class="col-md-4 col-sm-12 col-xs-12 footer-logo">Copryright 2017. All Rights Reserved</div>
                        <div class="col-md-4 col-sm-12 col-xs-12 footer-logo">Designed by <a herf="http://webmobilez.com/">webmobilez.com</a></div>
                        <div class="col-md-4 col-sm-12 col-xs-12 footer-logo">
                            <div class="social-links">
                                <a href="http://sai-leela.org/About#"><span class="fa fa-facebook-f"></span></a>
                                <a href="http://sai-leela.org/About#"><span class="fa fa-twitter"></span></a>
                                <a href="http://sai-leela.org/About#"><span class="fa fa-google"></span></a>
                                <a href="http://sai-leela.org/About#"><span class="fa fa-linkedin"></span></a>
                                <a href="http://sai-leela.org/About#"><span class="fa fa-youtube"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/login.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>


<script>

var wpcf7Elm = document.querySelector( '.wpcf7' );
 if(wpcf7Elm){
 wpcf7Elm.addEventListener( 'wpcf7submit', function( event ) {
  
     console.log(event)
     console.log(event.detail.apiResponse.message);
     if(event.detail.apiResponse.status=="mail_sent")
     {
        message='<div class="alert alert-success">'+event.detail.apiResponse.message+'</div>';
             $(".message").html(message);
         //gtag_report_conversion();
         }
     if(event.detail.apiResponse.status!="mail_sent"){
      
             message='<div class="alert alert-danger alertcontact" >'+event.detail.apiResponse.message+'</div>';
             $(".message").html(message);
         }
    $(".wpcf7-response-output").html("");
 }, false );
}
</script>
<script type="text/javascript">
		

		$( document ).ready( function () {
		

			$( "#registerform" ).validate( {
				rules: {
					first_name: "required",
					last_name: "required",
					username: {
						required: true,
						minlength: 4
					},
					password1: {
						required: true,
						minlength: 5
					},
					
					email: {
						required: true,
						email: true
					},
				
				},
				messages: {
					first_name: "Please enter your firstname",
					last_name: "Please enter your lastname",
					username: {
						required: "Please enter a username",
						minlength: "Your username must consist of at least 4 characters"
					},
					password1: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					
					email: "Please enter a valid email address",
					
				},
				errorElement: "span",
				
				
				
			} );
		} );
	</script>
<?php wp_footer(); ?>
</body>
</html>