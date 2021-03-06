<?php
/** 
 * it-jobSight. 
**/

namespace App\Helpers\Search\Traits\Filters;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

trait CompanyFilter
{
	protected function applyCompanyFilter()
	{
		if (!isset($this->posts)) {
			return;
		}
		
		$companyId = null;
		if (Str::contains(Route::currentRouteAction(), 'Search\CompanyController')) {
			if (Str::contains(Route::currentRouteAction(), '@profile')) {
				$companyId = request()->segment(2);
				if (config('settings.seo.multi_countries_urls')) {
					$companyId = request()->segment(3);
				}
				$companyId = trim($companyId);
			}
		}
		
		if (empty($companyId)) {
			return;
		}
		
		if (!empty($companyId)) {
			$this->posts->where('company_id', $companyId);
		}
	}
}
