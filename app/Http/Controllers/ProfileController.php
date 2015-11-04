<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Libraries\Common;

class ProfileController extends Controller
{

    public function __construct(Request $request)
	{
	    $this->middleware('custom');
		$this->site_url = config('config.SITE_URL');
		$this->request = $request;
	}

	function getIndex() {
		echo "in getprog";
	}

}
