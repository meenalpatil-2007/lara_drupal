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
			$response = json_decode($res);
			$page = isset($userData['page'])?$userData['page']:0;
			$pagination = Common::getPagination($page, $response);
			$pagination['url'] = Common::curPageURL();
			$paginationUI = Common::getPaginationUI($pagination);
			return view('pages.search', array('userData' => $userData, 'response' => $response, 'paginationUI' => $paginationUI));
		}
	}
	
	function getMyProfile($action=null){
		$url = $this->site_url	.'/m2serve/my-profile?user='.$this->request->session()->get('uid');		
		$userDate='';	
		
		$result = $this->cURL($url, $userDate, $this->request->session()->get('cookie'), 'GET');	
		$output = Common::validateCurlResponse($result);
		
		if(is_object($output)) {
			return $output;
		} else {
			$array = json_decode($output,TRUE);
			if(empty($array)){
				$view = view('profile.edit_profile', array('item'=>$array));
			}else{
				$view = view('profile.my_profile', array('item'=>$array[0]));
			}
			
			if($action == "edit"){
				$view = view('profile.edit_profile', array('item'=>$array));						
			}
		}
		return $view;
	}

	function getView($uid) {
		$url = $this->site_url	.'/m2serve/my-profile?user='.$uid;		
		$userDate='';	
		
		$result = $this->cURL($url, $userDate, $this->request->session()->get('cookie'), 'GET');	
		$output = Common::validateCurlResponse($result);
		
		if(is_object($output)) {
			return $output;
		} else {
			$array = json_decode($output,TRUE);
			if(isset($array[0]))
				return view('profile.my_profile', array('item'=>$array[0]));
			else 
				return view('errors.SWW');
		}
	}

	function getTest() {
		$appendParams = array('page' => 20, 'exists' => 'yes','hello' =>'itsworking');
		$url = 'http://laravel5.dev/profile/search?combine=name&field_living_location_value=pune&field_gender_value=All&field_religion_value=All&page=2';
		
		$res = Common::appendParamToUrlNew($appendParams, $url);
		print_r($res);
	}
}
