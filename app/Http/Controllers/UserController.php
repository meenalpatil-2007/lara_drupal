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
		$this->site_url = config('config.SITE_URL');
		$this->request = $request;
	}

	public function getLogin(Request $request) {
		//Common::pr($request->session());die;
		//echo "dfdfdf";die;
		return view('auth.login');
	}

	public function postLogin(Request $request) {
		$input = json_encode($this->request->all());
		//Common::pr($input);
		$url = $this->site_url	.'/m2serve/user/login';

		$ch = curl_init();

		// curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.16 (KHTML, like Gecko) \ Chrome/24.0.1304.0 Safari/537.16');
		//curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $input);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:  application/json"));
		curl_setopt($ch, CURLOPT_POST, 1);
		
		

		$output = curl_exec($ch);
		curl_close($ch);
		$xml = simplexml_load_string($output);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);
		if (is_array($array) && !empty($array['user']) && !empty($array['token']))
		{
			//Common::pr($array['user']);die;
			$request->session()->put('email', $array['user']['mail']);
			$request->session()->put('name', $array['user']['name']);
			$request->session()->push('user', $array);
			return redirect('/');
		}
		else 
		{
			$request->session()->flash('message', $array[0]);
			return redirect()->back();
		}
		
		
	}

	public function getLogout(Request $request) 
	{
		$request->session()->forget('key');
		$request->session()->flush();
	}

	public function getRegister() {
		return view('auth.register');
	}

}
