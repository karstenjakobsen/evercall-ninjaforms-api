<?php

class Actions {

	public function __construct()
	{
		// Add hooks. These hooks should be used in ninjaforms custom forms.
		add_action( 'evercall_telemeeting_send_invitation_sms', array( $this, 'actionTelemeetingSendInvitationSMS' ) );
	}

	public function actionTelemeetingSendInvitationSMS($form_data) {

		if( is_admin() === true ):

			$form_fields = $form_data[ 'fields' ];

			foreach( $form_fields as $form ):

				$settings = $form['settings'];

				$field_id    = $settings[ 'id' ];
				$field_key   = explode('_',$settings['key']);
				$field_value = $settings[ 'value' ];

				// Example Field Key comparison
				if( 'countrycode' == $field_key[0] ):
					// This is the field that you are looking for.
					echo "Doing what it takes";
				endif;

			endforeach;

			die;

			$form_settings = $form_data[ 'settings' ];
			$form_title    = $form_data[ 'settings' ][ 'title' ];

		endif;
	}

}