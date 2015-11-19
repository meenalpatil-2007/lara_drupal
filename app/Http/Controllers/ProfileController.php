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
			$response = json_decode($res);

			/* PAGINATION CODE */
			$page = isset($userData['page'])?$userData['page']:0;
			$pagination = Common::getPagination($page, $response);
			$pagination['url'] = $url;
			//Common::pr($pagination); exit;
			
			//combine=aks&field_gender_value=female&field_religion_value=All&field_living_location_value%5B%5D=mumbai
			return view('pages.search', array('userData' => $userData, 'response' => $response, 'paginationData' => $pagination));
		}
	}
	
	function getMyProfile($action=null){
		//echo "<pre>"; print_r($this->request->session()->all());
		//print_r($this->request->session()->get('uid'));
		//exit;
		$url = $this->site_url	.'/m2serve/my-profile?user='.$this->request->session()->get('uid');		
		$userDate='';	
		
		$result = $this->cURL($url, $userDate, $this->request->session()->get('cookie'), 'GET');	
		$output = Common::validateCurlResponse($result);
		
		if(is_object($output)) {
			return $output;
		} else {
		$array = json_decode($output,TRUE);
		//Common::pr($array); exit;	
		
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
}
