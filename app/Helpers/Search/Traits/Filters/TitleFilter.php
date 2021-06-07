<?php
/** 
 * it-jobSight. 
**/

namespace App\Helpers\Search\Traits\Filters;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

trait TitleFilter
{
	protected function applyTitleFilter()
	{
		if (!isset($this->posts)) {
			return;
		}
		
		$searchTerm = null;
		// if (Str::contains(Route::currentRouteAction(), 'Search\TagController')) {
		// 	$tag = request()->segment(2);
		// 	if (config('settings.seo.multi_countries_urls')) {
		// 		$tag = request()->segment(3);
		// 	}
		// } else {
			if (request()->filled('title')) {
				$searchTerm = request()->get('title');
			}
		// }
		
		// if (empty(trim($tag))) {
		// 	return;
		// }
		
		$searchTerm = rawurldecode($searchTerm);
		// $tag = mb_strtolower($tag);
		
		$this->posts->where('title', 'like', '%'.$searchTerm.'%');
	}
}
