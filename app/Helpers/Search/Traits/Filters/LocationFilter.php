<?php
/** 
 * it-jobSight. 
**/

namespace App\Helpers\Search\Traits\Filters;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Larapen\LaravelDistance\Distance;

trait LocationFilter
{
	public static $defaultDistance = 50; // km.
	public static $distance = null;      // km.
	public static $maxDistance = 500;    // km.
	
	protected function applyLocationFilter()
	{
		// dd('hello 1 :', config('settings.listing.cities_extended_searches') );
		// Distance (Max & Default distance)
		self::$maxDistance = config('settings.listing.search_distance_max', 0);
		self::$defaultDistance = config('settings.listing.search_distance_default', 0);
		
		// Priority Settings
		if ( request()->filled('distance') && is_numeric(request()->get('distance')) ) {
			self::$distance = request()->get('distance');
			if (request()->get('distance') > self::$maxDistance) {
				self::$distance = self::$maxDistance;
			}
		} else {
			// Create the 'distance' parameter in the request()
			if (config('settings.listing.cities_extended_searches')) {
				// request()->request->set('distance', self::$distance);
				self::$distance = self::$defaultDistance; 
			}
		}
		
		// Exception when admin. division searched (City not found)
		// Skip arbitrary (fake) city with signed (-) ID, lon & lat 
		if (isset($this->city) && !empty($this->city)) {
			/***
			 * MOH:START:NEWCODE
			 */
			if(is_a($this->city, 'Illuminate\Database\Eloquent\Collection')) {
				// dd($this->city,is_a($this->city, 'Illuminate\Database\Eloquent\Collection'));
				foreach($this->city as $city) {
					if (isset($this->city->id) && $this->city->id <= 0) {
						return;
					}
				}
			} else {
				if (isset($this->city->id) && $this->city->id <= 0) {
					return;
				}
			}
			/**
			 * MOH:END:NEWCODE
			 */
			/**
			 * MOH:START:OLDCODE
			 */
			// if (isset($this->city->id) && $this->city->id <= 0) {
			// 	return;
			// }
			/**
			 * MOH:END:OLDCODE
			 */
		}
		
		if (Str::contains(Route::currentRouteAction(), 'Search\CityController')) {
			if (isset($this->city) && !empty($this->city)) {
				$this->applyLocationByCity($this->city);
			}
		} else {
			if (request()->has('l')) {
				if (isset($this->city) && !empty($this->city)) {
					$this->applyLocationByCity($this->city);
				}
			} else {
				if (request()->filled('r')) {
					if (isset($this->admin) && !empty($this->admin)) {
						$this->applyLocationByAdminCode($this->admin->code);
					}
				}
			}
		}
	}
	
	/**
	 * Apply administrative division filter
	 * Search including Administrative Division by adminCode
	 *
	 * @param $adminCode
	 * @return void
	 */
	private function applyLocationByAdminCode($adminCode)
	{
		// dd('hello 2');
		if (in_array(config('country.admin_type'), ['1', '2'])) {
			// Get the admin. division table info
			$adminType = config('country.admin_type');
			$adminRelation = 'subAdmin' . $adminType;
			$adminForeignKey = 'subadmin' . $adminType . '_code';
			
			$this->posts->whereHas('city', function ($query) use ($adminForeignKey, $adminCode) {
				$query->where($adminForeignKey, $adminCode);
			});
		}
	}
	
	/**
	 * Apply city filter (Using city's coordinates)
	 * Search including City by City Coordinates (lat & lon)
	 *
	 * @param $city
	 * @return void
	 */
	private function applyLocationByCity($city)
	{
		// dd('hello 3', $city);
		/***
		 * MOH:START:NEWCODE
		*/
		$cityIds = [];
		if(is_a($this->city, 'Illuminate\Database\Eloquent\Collection')) {
			// dd($this->city,is_a($this->city, 'Illuminate\Database\Eloquent\Collection'));
			foreach($this->city as $city) {
				if (!isset($city->id) || !isset($city->longitude) || !isset($city->latitude)) {
					return;
				} 
				if (empty($city->longitude) || empty($city->latitude)) {
					return;
				}
				array_push($cityIds, $city->id);
			} 
			// OrderBy Priority for Location
			$this->orderBy[] = 'posts.created_at DESC';
			
			if (config('settings.listing.cities_extended_searches')) {
				
				// Use the Cities Extended Searches
				config()->set('distance.functions.default', config('settings.listing.distance_calculation_formula'));
				config()->set('distance.countryCode', config('country.code'));
				
				$sql = Distance::select('lon', 'lat', $this->city->first()->longitude, $this->city->first()->latitude);
				
				if ($sql) {
					$this->posts->addSelect(DB::raw($sql));
					$this->having[] = Distance::having(self::$distance);
					$this->orderBy[] = Distance::orderBy('ASC');  
				} else {
					$this->applyLocationByCityId($cityIds);
				} 
			} else { 
				// Use the Cities Standard Searches
				$this->applyLocationByCityId($cityIds); 
			}
			// $this->applyLocationProcess($this->city->first());
		} else {
			if (!isset($city->id) || !isset($city->longitude) || !isset($city->latitude)) {
				return;
			} 
			if (empty($city->longitude) || empty($city->latitude)) {
				return;
			}
			array_push($cityIds, $city->id);
			
			// OrderBy Priority for Location
			$this->orderBy[] = 'posts.created_at DESC';
			
			if (config('settings.listing.cities_extended_searches')) { 
				// Use the Cities Extended Searches
				config()->set('distance.functions.default', config('settings.listing.distance_calculation_formula'));
				config()->set('distance.countryCode', config('country.code'));
				
				$sql = Distance::select('lon', 'lat', $this->city->first()->longitude, $this->city->first()->latitude);
				
				if ($sql) {
					$this->posts->addSelect(DB::raw($sql));
					$this->having[] = Distance::having(self::$distance);
					$this->orderBy[] = Distance::orderBy('ASC');  
				} else {
					$this->applyLocationByCityId($cityIds);
				} 
			} else { 
				// Use the Cities Standard Searches
				$this->applyLocationByCityId($cityIds); 
			}
		}
		/***
		 * MOH:END:NEWCODE
		*/

		// if (!isset($city->id) || !isset($city->longitude) || !isset($city->latitude)) {
		// 	return;
		// }
		
		// if (empty($city->longitude) || empty($city->latitude)) {
		// 	return;
		// }
		
		// // Set City Globally
		// $this->city = $city;
		
		// // OrderBy Priority for Location
		// $this->orderBy[] = 'posts.created_at DESC';
		
		// if (config('settings.listing.cities_extended_searches')) {
			
		// 	// Use the Cities Extended Searches
		// 	config()->set('distance.functions.default', config('settings.listing.distance_calculation_formula'));
		// 	config()->set('distance.countryCode', config('country.code'));
			
		// 	$sql = Distance::select('lon', 'lat', $city->longitude, $city->latitude);
			
		// 	if ($sql) {
		// 		$this->posts->addSelect(DB::raw($sql));
		// 		$this->having[] = Distance::having(self::$distance);
		// 		$this->orderBy[] = Distance::orderBy('ASC');
		// 		// dd($this->city->id);
		// 	} else {
		// 		$this->applyLocationByCityId($city->id);
		// 	}
			
		// } else { 
		// 	// Use the Cities Standard Searches
		// 	$this->applyLocationByCityId($city->id);
			
		// }
	}

	/***
	* MOH:START:NEWCODE
	*/
	private function applyLocationProcess($city) {
		
	}
	/***
	* MOH:END:NEWCODE
	*/

	/**
	 * Apply city filter (Using city's Id)
	 * Search including City by City Id
	 *
	 * @param $cityId
	 * @return void
	 */
	private function applyLocationByCityId($cityId)
	{ 
		if (empty($cityId)) {
			return;
		}
		
		$this->posts->whereIn('city_id', $cityId);
	}
	
	/**
	 * Remove Distance from Request
	 */
	private function removeDistanceFromRequest()
	{
		// dd('hello 5');
		$input = request()->all();
		
		// (If it's not necessary) Remove the 'distance' parameter from request()
		if (!config('settings.listing.cities_extended_searches') || empty($this->city)) {
			if (in_array('distance', array_keys($input))) {
				unset($input['distance']);
				request()->replace($input);
			}
		}
	}
}
