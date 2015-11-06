<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libraries\Common;
use App\Api\WebService;

/*use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;*/

class UserController extends Controller
{
    //use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
	use WebService;

    public function __construct(Request $request)
	{
		$this->site_url = config('config.SITE_URL');
		$this->request = $request;
	}

	public function getLogin(Request $request) {
		if ($request->session()->get('user'))
		{
			$request->session()->flash('message', "Please logout first.");
			return redirect('/');
		}
		else {
			return view('auth.login');
		}
		
	}

	public function postLogin(Request $request) {
		$url = $this->site_url	.'/m2serve/user/login';
		$userData = ['username' => $this->request->all()['username'], 'password' => $this->request->all()['password']];
		list($http_code, $output) = $this->cURL($url, $userData);
		Common::pr($output);
		if ($http_code == 200)
		{
			$cookie_session = $output->session_name . '=' . $output->sessid;
			$request->session()->put('email', $output->user->mail);
			$request->session()->put('name', $output->user->name);
			$request->session()->put('_token', $output->token);
			$request->session()->put('cookie', $cookie_session);
			$request->session()->put('user', $output);
			return redirect('/');
		}
		else 
		{
			$request->session()->flash('message', $output[0]);
			return redirect()->back();
		}
		
		
	}

	public function getLogout(Request $request) 
	{
		$url = $this->site_url	.'/m2serve/user/logout';
		$userData = '';	
		//Common::pr($data);die;
		$result = $this->cURL($url, $userData);
		
		//Common::pr($result);die;
		$request->session()->forget('user');
		$request->session()->flush();
		$request->session()->flash('message', "You have successfully logged out.");
		return redirect('/');
	}

	public function getRegister() {
		return view('auth.register');
	}

	public function postRegister(Request $request) {
		$url = $this->site_url	.'/m2serve/user/register';
		$userData = $this->request->all();
		unset($userData['_token']);
		//Common::pr($userData);die;
		$userData = ['name' => $userData['username'], 'mail' => $userData['email'], 'init' => $userData['email'], 'status' => 1, 'sessid' => 'SESSb1cbc91a32a83d8f1412714baa80c0b1', 'session_name' => '9SVGC_JZmbzOWi7cTg6gkznKPRn0uf2b-sWCOd4WFpc', 'pass' => ['pass1' => $userData['password'], 'pass2' => $userData['password']],  'roles' => [2]];
		$result = $this->cURL($url, $userData);
		Common::pr($result);die;
	}

}
