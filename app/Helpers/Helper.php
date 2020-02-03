<?php 

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

class Helper
{
	/*
	* Files helpers
	*/	
	public static function saveFileFromRequest($request, $fileInputName, $oldFile = null, $directory = 'users_images') {
	  	if($request->hasFile($fileInputName)) {
	  		if($oldFile) {
	  			self::removeFile($oldFile);
	  		}
			$file = $request->file($fileInputName);
			$fileName = time() . '_' . $file->getClientOriginalName();
			return $file->storeAs($directory, $fileName);
	  	} 
	  	return null;
	}

	public static function removeFile($path) {
		if(file_exists(storage_path('app/public/' . $path))) {
			unlink(storage_path('app/public/' . $path));
		}
	}

	/*
	* Dates helpers
	*/
	public static function parseDate($date, $format = 'Y-m-d') {
		$date = Carbon::createFromFormat(Constant::DATE_FORMAT, $date);
		return Carbon::parse($date)->format($format);
	}

	public static function formatDate($date, $format = Constant::DATE_FORMAT) {
		return Carbon::parse($date)->format($format);
	}

	public static function addMinutesToDate($date, $minutes = 0) {
	    return Carbon::parse($date)->addMinutes($minutes);
	}

	public static function today($locale) {
		$date = Carbon::now()->locale($locale);
		return $date->isoFormat('LLLL');
	}

	/*
	* routes helpers
	*/
	public static function routeIs($expression) {
		return fnmatch($expression, Route::currentRouteName());			
	}
}