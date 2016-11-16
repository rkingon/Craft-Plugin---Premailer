<?php

namespace Craft;

use \Guzzle\Http\Client;

class PremailerService extends BaseApplicationComponent
{
	
	protected $client;
	
	public function __construct()
	{
		// Get our Guzzle Client
		$this->client = new Client();
	}
	
	public function compile($body, $options = array())
	{
		/* The Premailer API needs booleans to be stringified */
		foreach($options as $key => $val) {
			if(is_bool($val))	{
				$options[$key] = $val ? 'true' : 'false';
			}
		}
		
		$options['html'] = $body;
		
		$apiRequest = $this->client->createRequest("POST", "http://premailer.dialect.ca/api/0.1/documents", null, $options);
		$apiResponse = $this->client->send($apiRequest)->json();
		
		$htmlRequest = $this->client->get($apiResponse['documents']['html']);
		$htmlResponse = $this->client->send($htmlRequest);
		
		return (string) $htmlResponse->getBody();
	}
}
