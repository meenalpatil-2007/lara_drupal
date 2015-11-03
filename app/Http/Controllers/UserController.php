<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libraries\Common;

/*use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;*/

class UserController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(Request $request)
	{
	    # $this->middleware('auth');
		$this->site_url = config('config.SITE_URL');
		$this->request = $request;

	}

	public function getLogin() {
		return view('users.login');
	}

	public function postLogin() {
		echo "in postlogin";
		$input = $this->request->all();
		Common::pr($input);
		echo $this->site_url;

		// $ch = curl_init("http://www.google.co.in");
		$ch = curl_init();
		$url = $this->site_url.'m2serve/user/login';
		// $fp = fopen("example_homepage.txt", "w");

		// curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);

		$output = curl_exec($ch);
		curl_close($ch);
		// /echo $output;
	}

	public function getLogout() {

	}

	public function getRegister() {

	}

}
