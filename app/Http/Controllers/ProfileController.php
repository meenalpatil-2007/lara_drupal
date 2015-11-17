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
		
		echo $url;
		$result = $this->cURL($url, $userData, $this->request->session()->get('cookie'), 'GET');
		Common::pr($result);
	}

}
