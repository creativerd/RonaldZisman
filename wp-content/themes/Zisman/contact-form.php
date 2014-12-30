<?php
class PZ_Contact_Form {
	private $form_errors = array();

	function __construct() {

	}

	/**
	* generate form html
	* 
	* @return html string
	*/
	static public function form() {
		echo '<form id="contact-form" action="' . $_SERVER['REQUEST_URI'] . '" method="post">
						<input id="contact-name" type="text" name="contact-name" placeholder="Name" value="' . $_POST["contact-name"] .'">
						<input id="contact-email" type="email" name="contact-email" placeholder="Email" value="' . $_POST["contact-email"] .'">
						<textarea id="contact-message" name="contact-message" placeholder="Message">' . $_POST["contact-message"] . '</textarea>
						<input type="submit" name="form-submitted" value="Send">
					</form>';
	}

	/**
	* validate user input
	*
	* @param (string) $name: user name
	* @param (string) $email: user mail
	* @param (string) $message: message content
	* @return null > populates error array
	*/
	public function validate_form($name, $email, $message) {
		if( empty($name) || empty($email) || empty($message)) {
			array_push($this->form_errors, 'Please ensure you entered your Full Name');
		}

		if(strlen($message) < 20 ) {
			array_push($this->form_errors, 'Your message is not long enough');
		}

		if(!is_email($email)) {
			array_push($this->form_errors,'Please enter a vallid email');
		}
	}

	/**
	* validate user input
	*
	* @param (string) $name: user name
	* @param (string) $email: user mail
	* @param (string) $message: message content
	* @return null > sends email
	*/
	public function send_email($name, $email, $message) {
		if(count($this->form_errors) < 1) {
			$name = sanitize_text_field($name);
			$email = sanitize_email($email);
			$message = esc_textarea($message);
		}

		$to = 'smallzed@gmail.com';
		$subject = 'New message sent from the RZisman.com';
		$headers = 'From: ' . $name;

		if(wp_mail($to, $subject, $headers, $headers)) {
				echo '<div style="background: #3b5998; color:#fff; padding:2px;margin:2px">';
        echo 'Thank you for contacting me. I will responde as soon as possible.';
        echo '</div>';
		}
	}

	/**
	* call and process the above functions
	*
	* @return null
	*/
	public function process_functions() {
		if(isset($_POST['form-submitted'])) {
			$this->validate_form($_POST['contact-name'], $_POST['contact-email'], $_POST['contact-message']);

			if(is_array($this->form_errors)) {
				foreach($this->form_errors as $error) {
					echo '<div class="form-errors">';
					echo '<p>' . $error . '</p>';
					echo '</div>';
				}
			} 
		}

		$this->send_email($_POST['contact-name'], $_POST['contact-email'], $_POST['contact-message']);
		
		self::form();
	}

	public function render() {
		ob_start();
    $this->process_functions();
    return ob_get_clean();
	}
}
?>
