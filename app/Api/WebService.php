<?php

namespace App\Api;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

trait WebService
{
    public function cURL($url, $data, $cookie='', $method='POST') {
    	$curl = curl_init();
		curl_setopt ($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json', $cookie, $this->get_csrf_header())); // Accept JSON response
		if($method == 'POST') {
			curl_setopt($curl, CURLOPT_POST, 1); // Do a regular HTTP POST
			curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data)); // Set POST data
		}
		curl_setopt($curl, CURLOPT_HEADER, FALSE);  // Ask to not return Header
		curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.16 (KHTML, like Gecko) \ Chrome/24.0.1304.0 Safari/537.16');
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($curl,CURLOPT_COOKIE, $cookie. "domain=drupal.dev; path=/");
		curl_setopt($curl, CURLOPT_COOKIESESSION, TRUE);
		
		$output = curl_exec($curl);
		$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
		curl_close($curl);
		//echo $output;die;
		return [$http_code, $output];
    }


    function get_csrf_header() {
	  $curl_get = curl_init();
	  curl_setopt_array($curl_get, array(
	    CURLOPT_RETURNTRANSFER => 1,
	    CURLOPT_POST => 1,
	    CURLOPT_URL => $this->site_url. 'services/session/token',
	    CURLOPT_HTTPHEADER => array('Content-Type: application/json;')
	  ));
	  $token = curl_exec($curl_get);
	  curl_close($curl_get);
	  return 'X-CSRF-Token: ' . $token;
	}

}

