<?php

class AccountController extends BaseController {
	/**
	 * View the login page
	 *
	 * @return Response
	 */
	public function login()
	{
    	return View::make('account.login');
	}



}
