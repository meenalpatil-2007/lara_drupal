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

	public function getLogin(Request $request) 
	{
		if ($request->session()->get('user'))
		{
			$request->session()->flash('message', "Please logout first.");
			return redirect('/');
		}
		else {
			return view('auth.login', compact($this));
		}
		
	}

	public function postLogin(Request $request) 
	{
		$url = $this->site_url	.'/m2serve/user/login';
		$userData = ['username' => $this->request->all()['username'], 'password' => $this->request->all()['password']];
		list($http_code, $output) = $this->cURL($url, $userData);
		
		$xml = simplexml_load_string($output);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);

		if ($http_code == 200)
		{
			setcookie($array['session_name'], $array['sessid']);
			$cookie_session = "Cookie: ". $array['session_name'] . '=' . $array['sessid'];
			$request->session()->put('email', $array['user']['mail']);
			$request->session()->put('name', $array['user']['name']);
			$request->session()->put('_token', $array['token']);
			$request->session()->put('cookie', $cookie_session);
			$request->session()->put('user', $array);
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
		$url = $this->site_url	.'/m2serve/user/logout';
		$userData = '';	
		$result = $this->cURL($url, $userData, $request->session()->get('cookie'));
		
		$request->session()->forget('user');
		$request->session()->flush();
		$request->session()->flash('message', "You have successfully logged out.");
		return redirect('/');
	}

	public function getRegister() 
	{
		return view('auth.register');
	}

	public function postRegister(Request $request) 
	{
		$url = $this->site_url	.'/m2serve/user/register';
		$userData = $this->request->all();
		unset($userData['_token']);
		$userData = ['name' => $userData['username'], 
					 'mail' => $userData['email'], 
					 //'init' => $userData['email'], 
					 'status' => 1, 
					 'pass' => ['pass1' => $userData['password'], 
					 			'pass2' => $userData['password']],  
					 'roles' => [2]
					];
		$result = $this->cURL($url, $userData);
		$this->postLogin($this->request);
		return redirect('/');
	}

}
