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

	function __invoke() 
    {
         // your action
    }

    public function getIndex() {
    	$profiles = $this->getMatchingProfile();
		//print_r($profiles);exit;
    	return view('pages.home', array('profiles' => $profiles));
    }


    public function getMatchingProfile () {
		//var_dump($this->request->session()->get('service'));exit;
    	$service = $this->request->session()->get('service') ?  $this->request->session()->get('service') : 'm2serve/view_recommended_matches_service';
    	$matchingProfile = function($service) {
    		$this->url = $this->site_url	.  $service  .'?user='.$this->request->session()->get('uid');
    		$this->result = Common::validateCurlResponse($this->cURL($this->url, Null, $this->request->session()->get('cookie'), 'GET'));
    		if(is_object($this->result)) {
				return $this->result;exit;
			}
			else {
				return json_decode($this->result,TRUE);
			}
   			return;	
		};

    	$result = $matchingProfile($service);
		if (empty($result)) {
			$this->request->session()->put('service', 'm2serve/view_show_all_profiles_service');
			$result = $matchingProfile('m2serve/view_show_all_profiles_service');
		}
		
		if ($this->request->ajax())
		{
		   return view('profile.matching_profile', array('profiles' => $result));exit;
		}
		else {
			return $result;
		}
		
	}
	
	public function getProfilePic () {			
		$this->url = $this->site_url.'/m2serve/profile-gallery?user='.$this->request->session()->get('uid');
		$this->result = Common::validateCurlResponse($this->cURL($this->url, Null, $this->request->session()->get('cookie'), 'GET'));
		if(is_object($this->result)) {
			return $this->result;exit;
		}
		else {
			
			$output = json_decode($this->result,TRUE);
			return $output;exit;
		}
	}

	public function getEditGallery () {
		//return "xxxxxxxxxxxx"; exit;
		//return $datax = $this->request->get('action');exit;
		$this->url = $this->site_url.'/m2serve/editProfilePics/retrieve?user='.$this->request->session()->get('uid').'&fid='.$this->request->get('fid').'&action='.$this->request->get('action');
		$this->result = Common::validateCurlResponse($this->cURL($this->url, Null, $this->request->session()->get('cookie'), 'GET'));
		//print_r($this->result);exit;
		if(is_object($this->result)) {
			return $this->result;exit;
		}
		else {
			
			//$output = json_decode($this->result,TRUE);
			return true;exit;
		}
	}
	
	public function getAddToGallery () {
		return $this->request->get('filename'); exit;
		$this->url = $this->site_url.'/m2serve/editProfilePics?user='.$this->request->session()->get('uid');
		$this->result = Common::validateCurlResponse($this->cURL($this->url, Null, $this->request->session()->get('cookie'), 'GET'));
		if(is_object($this->result)) {
			return $this->result;exit;
		}
		else {
			
			$output = json_decode($this->result,TRUE);
			return $output;exit;
		}
	}
		
	public function getSendInterest () {
		//return $this->request->get('interest_to'); exit;
		$this->url = $this->site_url.'/m2serve/expressInterest';
		$userData['user'] = $this->request->session()->get('uid');
		$userData['interest_to'] = $this->request->get('interest_to');
		$userData['interest_flag'] = '';
		$this->result = Common::validateCurlResponse($this->cURL($this->url, $userData, Null, 'POST'));
		//print_r($this->result);exit;
		if(is_object($this->result)) {
			return $this->result;exit;
		}
		else {			
			$output = json_decode($this->result,TRUE);
			
			return $output;exit;
		}
	}
	
	public function getCheckInterest () {
		
		$this->url = $this->site_url.'/m2serve/expressInterest';
		$userData['user'] = $this->request->session()->get('uid');
		$userData['interest_to'] = $this->request->get('interest_to');
		$userData['interest_flag'] = 'check';
		$this->result = Common::validateCurlResponse($this->cURL($this->url, $userData, Null, 'POST'));
		//print_r($this->result);exit;
		if(is_object($this->result)) {
			return $this->result;exit;
		}
		else {			
			$output = json_decode($this->result,TRUE);
			
			return $output;exit;
		}
	}
	
}
