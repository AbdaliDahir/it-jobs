<?php
// Clear Filter Button
$clearFilterBtn = '';
if (
	request()->filled('l')
	|| request()->filled('location')
	|| \Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Route::currentRouteAction(), 'Search\CityController')
) {
	$clearFilterUrl = \App\Helpers\UrlGen::search([], ['page', 'l', 'location', 'distance']);
	$clearFilterBtn = getFilterClearBtn($clearFilterUrl);
}
?>
<?php
/*
 * Check if the City Model exists in the Cities eloquent collection
 * If it doesn't exists in the collection,
 * Then, add it into the Cities eloquent collection
 */
if (
	isset($cities, $city)
	&& $cities instanceof \Illuminate\Database\Eloquent\Collection
	&& $city instanceof \App\Models\City
	&& !$cities->contains($city)
) {
	$cities->push($city);
}
?>
<!-- City -->
<div class="list-filter mb-4 bg-light">
	<h5 class="h6 p-3 text-capitalize mb-0">
		<span class="font-weight-bold">
			{{ t('locations') }}
		</span> {!! $clearFilterBtn !!}
	</h5> 
	<div class="block-content p-0 locations-list">
		<ul class="browse-list list-unstyled long-list pt-3 px-3">
			@if (isset($cities) && $cities->count() > 0)
			@foreach ($cities as $iCity)
			<li>
				@if ((isset($city[$iCity->id]) && !empty($city) && $city[$iCity->id]->id == $iCity->id) ||
				(request()->input('l')==$iCity->id))
				<strong>
					<a href="{!! \App\Helpers\UrlGen::city($iCity, null, $cat ?? null) !!}" title="{{ $iCity->name }}">
						{{ $iCity->name }}
						@if (config('settings.listing.count_cities_posts'))
						<span class="count">{{ $iCity->posts_count ?? 0 }}</span>
						@endif
					</a>
				</strong>
				@else
				<a href="{!! \App\Helpers\UrlGen::city($iCity, null, $cat ?? null) !!}" title="{{ $iCity->name }}">
					{{ $iCity->name }}
					@if (config('settings.listing.count_cities_posts'))
					<span class="count">{{ $iCity->posts_count ?? 0 }}</span>
					@endif
				</a>
				@endif
			</li>
			@endforeach
			@endif
		</ul>
	</div>
</div>
