<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libraries\Common;
use App\Api\WebService;

class ProfileController extends Controller
{
	use WebService;

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
		$userData = $this->request->all();
		$url = $this->site_url	.'m2serve/view_test3_service';
		$url = Common::appendParamToUrl($url, $userData);
		
		$result = $this->cURL($url, $userData, $this->request->session()->get('cookie'), 'GET');
		$res = Common::validateCurlResponse($result);


		if(is_object($res)) {
			return $res;
		} else {
			//combine=aks&field_gender_value=female&field_religion_value=All&field_living_location_value%5B%5D=mumbai
			$response = json_decode($res);
			return view('pages.search', array('userData' => $userData, 'response' => $response));
		}
	}
}
