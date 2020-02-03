<?php

namespace App\Helpers;

/**
 * Constants classes
 */
class Constant
{
	/*
	* Default count data per page
	*/
	public const COUNT_PER_PAGE = 10;

	/**
	* User Roles
	**/
	public const USER_ROLES = [
		'admin' => 'admin',
		'agent' => 'agent',
	];

	/*
	* Default date format
	*/
	public const DATE_FORMAT = 'd/m/Y';
}
