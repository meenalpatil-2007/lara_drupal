<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Libraries\Common;
use App\Api\WebService;

class HomeController extends Controller
{
	use WebService;

	public function __construct(Request $request)
	{
		$this->middleware('custom');
		$this->site_url = config('config.SITE_URL');
		$this->request = $request;
	}

    public function getIndex() {
    	$profiles = $this->getMatchingProfile();
    	return view('pages.home', array('profiles' => $profiles));
    }


    public function getMatchingProfile () {
    	
    	$url = $this->site_url	.'/m2serve/view_recommended_matches_service?user='.$this->request->session()->get('uid');		
		
		$result = $this->cURL($url, Null, $this->request->session()->get('cookie'), 'GET');	
		$output = Common::validateCurlResponse($result);
		
		if(is_object($output)) {
			return $output;
		} 
		else {
			$array = json_decode($output,TRUE);
		}

		if ($this->request->ajax())
		{
		   return view('profile.matching_profile', array('profiles' => $array));exit;
		}
		else {
			return $array;
		}
		
	}

}
