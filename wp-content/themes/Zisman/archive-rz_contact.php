<?php

  //response generation function

	$response = '';

  function validate_and_respond($output) {
  	global $response;

  	if($output !== 'success') {
  		$response = $output;
  	} else {
  		$response = 'Thank you for contacting me. I will respond as soon as possible.';
  	}
  	
  }

  $errors = array();

  $name = (isset($_POST['contact-name'])) ? esc_attr($_POST['contact-name']) : '';
	$email = (isset($_POST['contact-email'])) ? esc_attr($_POST['contact-email']) : '';
	$message = (isset($_POST['contact-message'])) ? esc_attr($_POST['contact-message']) : '';

  if((isset($name) && !empty($name)) || (isset($email) && !empty($email)) || (isset($message) && !empty($message))) {
  	
  	if(empty($name)) {
			$errors['username-error'] = 'Please enter your name';
			validate_and_respond($errors);
		} else {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL) || empty($email)) {
				$errors['email-error'] = 'Please enter your email address';
				validate_and_respond($errors);
			} else {
				if(empty($message) || $message == 'Please enter your message') {
  				$errors['message-error'] = 'Please enter your message';
  				validate_and_respond($errors);
  			} else {
  				$to = 'smallzed@gmail.com';
				  $subject = "New message from ".get_bloginfo('name');
				  $headers = 'From: '. $email ;
				  $email_body = '<strong>' . $name . '</strong> sent you the following message:\r\n';
				  $email_body .= strip_tags($message);

				  $send_email = wp_mail($to, $subject, $email_body, $headers);

					if($send_email) {
					 	validate_and_respond('success');
					}
  			}
			}
		}
	} elseif($_SERVER['REQUEST_METHOD'] == "POST") {
		$errors['username-error'] = 'Please enter your name';
		$errors['email-error'] = 'Please enter your email address';
		$errors['message-error'] = 'Please enter your message';
		validate_and_respond($errors); 
	}	
?>




<?php get_header(); ?>

<?php include(locate_template('archive-banner.php')); ?>

<section id="content-wrapper" class="contact-wrapper">
	<div class="row">
		<div class="find-us large-4 medium-4 small-12 columns">
			<h2 class="contact-title">Find Us</h2>
			<p>
				17th Floor, 808 Nelson Street,<br>
				Box 12148, Vancouver, BC,<br>
				Canada, V6Z 2H2
			</p>
			<p>
				Tel: (604) 689.84.72 <br>
				Fax: (604) 683.34.41
			</p>
			<a target="_blank" href="https://ca.maps.yahoo.com/place/?lat=49.28004047746954&lon=-123.12491655349731&q=808%20Nelson%20St%2C%20Fl%2017th%2C%20Vancouver%2C%20BC%20V6Z%202H2&bb=49.28377085%2C-123.1313163%2C49.27631682%2C-123.11852753&addr=808%20Nelson%20St%2C%20Fl%2017th%2C%20Vancouver%2C%20BC%20V6Z%202H2">Click Here For Directions</a>
		</div>

		<div class="contact-us large-8 medium-8 small-12 columns">
			<h2 class="contact-title">Contact</h2>

			<?php  
			
			if(is_array($response)){		

				if(isset($response['username-error'])) {
					$user = $response['username-error'];
					$user_error = true;
				} else {
					$user = esc_attr($_POST['contact-name']);
				}

				if(isset($response['email-error'])) {
					$email = $response['email-error'];
					$email_error = true;
				} else {
					$email = esc_attr($_POST['contact-email']);
				}

				if(isset($response['message-error'])) {
					$message = $response['message-error'];
					$message_error = true;
				} else {
					$message = esc_attr($_POST['contact-message']);
				}
			} else {
				$user = (isset($_POST['contact-name'])) ? esc_attr($_POST['contact-name']) : '';
				$email = (isset($_POST['contact-email'])) ? esc_attr($_POST['contact-email']) : '';
				$message = (isset($_POST['contact-message'])) ? esc_attr($_POST['contact-message']) : '';

				$success_message = $response;
			}

			?>

			<?php if(isset($success_message) && !empty($success_message)) {
				echo '<div class="email-sent">' . $success_message . '</div>';
			}?>

			<form id="contact-form" action="" method="post">
				<input id="contact-name" class="<?php echo ($user_error)? 'form-error' : ''; ?>" type="text" name="contact-name" placeholder="Name" value="<?php echo $user; ?>">
				<input id="contact-email" class="<?php echo ($email_error)? 'form-error' : ''; ?>" type="email" name="contact-email" placeholder="Email" value="<?php echo $email; ?>">
				<textarea id="contact-message" class="<?php echo ($message_error)? 'form-error' : ''; ?>" name="contact-message" placeholder="Message"><?php echo $message; ?></textarea>
				<input type="submit" name="form-submitted" value="Send">
			</form>
		<div>
	</div>	
</section>

<?php get_footer(); ?>