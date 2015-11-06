<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libraries\Common;

class ProfileController extends Controller
{

    public function __construct(Request $request)
	{
	    $this->middleware('custom');
		$this->site_url = config('config.SITE_URL');
		$this->request = $request;
	}

	function getIndex() {
		echo "in getprog";
	}

	function getSearch() {
		// Pagination - https://www.drupal.org/node/905440

		$input = $this->request->all();
		$url = $this->site_url	.'test1';
		$url = Common::appendParamToUrl($url, $input);
		
		echo $url;

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.16 (KHTML, like Gecko) \ Chrome/24.0.1304.0 Safari/537.16');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
		//curl_setopt($ch, CURLOPT_POST, 1);

		$output = curl_exec($ch);
		curl_close($ch);
		$array = json_decode($output,TRUE);
		Common::pr($array);
	}

}
