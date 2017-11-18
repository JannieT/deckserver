<?php

namespace App;

use GuzzleHttp\Client;

class Hosted 
{

	public static function fetch($url)
	{
		$client = new Client();
		
		try {
			$response = $client->request('GET', $url);
			$body = $response->getBody();
		} catch (\Exception $e) {
			$body = "That didn't work. Check the address and try again.";
		}

		return $body;
	}

}
