<?php

class ActionTelemeetingInvitationSMS {

	protected $client;

	public function __construct()
	{
		$this->client = new \Evercall\TelemeetingInvitationSMS(
			new \Evercall\SimpleJsonHttp('evercall Ninja Forms API', 'https://rest-api.evertest.dk/granada/v1')
		);
	}

	public function addInvitationSMS($countryCode, $phoneNumber, $sender, $meetingPin, $meetingTime, $executionTime) {
		$this->client->addInvitationSMS($countryCode, $phoneNumber, $sender, $meetingPin, $meetingTime, $executionTime);
	}

	public function send() {
		$this->client->send();
	}

	public function success() {
		$this->client->success();
	}

}