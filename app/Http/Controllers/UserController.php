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
	    $this->middleware('custom');
		$this->site_url = config('config.SITE_URL');
		$this->request = $request;
	}

	public function getLogin() {
		return view('users.login');
	}

	public function postLogin() {
		$input = $this->request->all();
		Common::pr($input);
		echo $url = $this->site_url;	//.'m2serve/user/login';

		$ch = curl_init();

		// curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.16 (KHTML, like Gecko) \ Chrome/24.0.1304.0 Safari/537.16');
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

		$output = curl_exec($ch);
		curl_close($ch);
		echo $output;
	}

	public function getLogout() {

	}

	public function getRegister() {

	}

}
