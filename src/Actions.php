<?php
error_reporting(E_ALL);

class Actions {

	public function __construct()
	{
		// Add hooks. These hooks should be used in ninjaforms custom forms.
		add_action( 'evercall_telemeeting_send_invitation_sms', array( $this, 'actionTelemeetingSendInvitationSMS' ) );
	}

	private function parseNinjaForm($form_data, array $payload) {

		$form_settings 	= $form_data[ 'settings' ];
		$form_title    	= $form_data[ 'settings' ][ 'title' ];
		$form_fields 	= $form_data[ 'fields' ];

		foreach( $form_fields as $form ):

			$settings 		= $form['settings'];
			$field_key   	= explode('_',$settings['key']);
			$field_value 	= $settings[ 'value' ];

			// Example Field Key comparison
			if( array_key_exists($field_key[0], $payload) ):
				$payload[$field_key[0]] = $field_value;
			endif;

		endforeach;

		return $payload;
	}

	public function actionTelemeetingSendInvitationSMS($form_data) {

		// Ninja forms form felds.
		$payload = array(
			'countrycode' => null
		);

		if( is_admin() === true ):

			$result = $this->parseNinjaForm($form_data, $payload);

			// This is the field that you are looking for.
			$action = new ActionTelemeetingInvitationSMS();
			$action->addInvitationSMS($payload['countrycode'],$payload['countrycode'],$payload['countrycode'],$payload['countrycode'],$payload['countrycode'],$payload['countrycode']);
			$action->send();
			var_dump($action);

		endif;

		die;
	}

}