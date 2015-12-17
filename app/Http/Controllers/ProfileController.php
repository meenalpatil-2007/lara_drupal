<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libraries\Common;
use App\Api\WebService;
use Illuminate\Support\Facades\Redirect;
use Validator;
use DateTime;

class ProfileController extends Controller
{
	use WebService;

    public function __construct(Request $request)
	{
	    $this->middleware('custom');		//add in new controller for pages which requires user to be authenticated
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
 		
		$url = $this->site_url	.'/m2serve/my-profile?user='.$this->request->session()->get('uid');		
		$userDate='';
 		$result = $this->cURL($url, $userDate, $this->request->session()->get('cookie'), 'GET');	
 		$output = Common::validateCurlResponse($result);
 		
 		if(is_object($output)) {
 			return $output;
 		} else {
			
			$array = json_decode($output,TRUE);	
			//print_r($array);exit;
			if(empty($array) && ($action == "edit" || $action == "view")){			
				$view = view('profile.edit_profile', array('item'=>[]));
 			}

			elseif($action == "edit" && !empty($array)){
				$view = view('profile.edit_profile', array('item'=>$array[0]));						
 			}
			else{
				$view = view('profile.my_profile', array('item'=>$array[0]));
			}			
		}			
		return $view;
	}
	
	function postEditProfile(Request $request){

		$data = $this->request->all();
		//print_r($data);exit;

		if($data['action'] == 'Delete'){
			//$userData['uid'] = 5;
			$userData = "";
			$url = 'http://drupal-7.41.dev/m2serve/editProfile/retrieve?uid='.$this->request->session()->get('uid');
			$cookie = "";
			$result = $this->cURL($url, $userData, $cookie, 'GET');	
			$output = Common::validateCurlResponse($result);
			//print_r($result);exit;
			$array = json_decode($output, TRUE);
			$arr = json_decode($array[0]);
			//view('profile.my_profile', array('msg'=>$arr->msg));

			//print_r($arr);exit;
			//$request->session()->flash('message', $arr->msg);
			$url = $this->site_url	.'/m2serve/user/logout';
			$userData = '';	
			$result = $this->cURL($url, $userData, $request->session()->get('cookie'));
			
			$request->session()->forget('user');
			$request->session()->flush();
			return redirect('/');
			/////////////////////////////////////////// clear session //////////////////////////////////////////
		}
		else
		{
			
			$age = $this->getAgeValue($data['birth_date'], '%y');
			$userData = ['uid' => $this->request->session()->get('uid'), 'field_age' => $age];
			//$userData['action'] = 'Update';
				
			$url = $this->site_url	.'/m2serve/editProfile';			
			foreach ($data as $key => $value) {			
				$userData['field_'.$key] = $value;			
			}
			//print_r($userData);exit;
			$cookie = "";
			$result = $this->cURL($url, $userData, $cookie);	
			$output = Common::validateCurlResponse($result);
			//var_dump($result);exit;
			$array = json_decode($output, TRUE);	
			$arr = json_decode($array[0]);
			//view('profile.my_profile', array('msg'=>$arr->msg));

			//print_r($arr);exit;
			//$request->session()->flash('message', $arr->msg);
			return Redirect::action('ProfileController@getMyProfile', 'view');
			//return Redirect::back()->withErrors(['msg', $arr->msg]);
		}
	
 	}

	function postEditProfileImg(Request $request){
		return true;
	}
	
	function getAgeValue($date1, $differenceFormat){
		$today = date("Y-m-d");
		$date1 = date('Y-m-d', strtotime($date1));
	
		$d_start    = new DateTime($today); 
		$d_end      = new DateTime($date1); 
		$diff = $d_start->diff($d_end); 
   
        return $this->year = $diff->format('%y'); 
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
