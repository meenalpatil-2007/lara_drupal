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
	
	function showProfile(Request $request){
		
		$url = $this->site_url	.'/m2serve/my-profile?user='.$request->session()->get('uid');		
		$userDate='';	
		
		list($http_code, $output) = $this->cURL($url, $userDate, $cookie='', $method='GET');		
		$array = json_decode($output,TRUE);
		//Common::pr($array[0]);
		
		if ($http_code == 200)
		{
			if(!count($array)){			
				$view = view('profile.edit_profile', array('item'=>$array));
			}else{
				$view = view('profile.my_profile', array('item'=>$array[0]));
			}
			
			if($_SERVER['REQUEST_URI'] == "/edit-profile"){
				$view = view('profile.edit_profile', array('item'=>$array));						
			}
			
		}
		else 
		{
			$request->session()->flash('message', $array[0]);
			$view = redirect()->back();
		}	
		
		return $view;
	}
}
