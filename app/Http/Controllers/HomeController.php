<?php namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return View
	 */
	public function index()
	{
		return view('home');
	}

}
