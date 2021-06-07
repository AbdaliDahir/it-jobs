<?php
// Clear Filter Button
$clearFilterBtn = '';
if (
	request()->filled('c')
	|| request()->filled('sc')
	|| \Illuminate\Support\Str::contains(\Illuminate\Support\Facades\Route::currentRouteAction(), 'Search\CategoryController')
) {
	$clearFilterUrl = \App\Helpers\UrlGen::search([], ['page', 'c', 'sc']);
	$clearFilterBtn = getFilterClearBtn($clearFilterUrl);
}
?>
@if (isset($cat) && !empty($cat))
<?php
	$catParentUrl = \App\Helpers\UrlGen::getCatParentUrl($cat->parent ?? null);
	?>
	
	<!-- SubCategory -->
	<div id="subCatsList" class="list-filter mb-4 bg-light">
		@if (isset($cat->children) && $cat->children->count() > 0)
			<h5 class="h6 p-3 text-capitalize mb-0">
				<span class="font-weight-bold">
					@if (isset($cat->parent) && !empty($cat->parent))
						<a href="{{ \App\Helpers\UrlGen::category($cat->parent, null, $city ?? null) }}">
							<i class="fas fa-reply pr-2"></i> {{ $cat->parent->name }}
						</a>
					@else
						<a href="{{ $catParentUrl }}">
							<i class="fas fa-reply pr-2"></i> {{ t('all_categories') }}
						</a>
					@endif
				</span> {!! $clearFilterBtn !!}
			</h5> 
			<div class="block-content p-0 categories-list">
				<ul class="list-unstyled p-0">
					<li>
						<a href="{{ \App\Helpers\UrlGen::category($cat, null, $city ?? null) }}" title="{{ $cat->name }}" class="px-3 py-2">
							<span class="title font-weight-bold">{{ $cat->name }}</span>
							@if (config('settings.listing.count_categories_posts'))
								<span class="count">&nbsp;({{ $countPostsByCat->get($cat->id)->total ?? 0 }})</span>
							@endif
						</a>
						<ul class="list-unstyled long-list px-3">
							@foreach ($cat->children as $iSubCat)
								<li>
									<a href="{{ \App\Helpers\UrlGen::category($iSubCat, null, $city ?? null) }}" title="{{ $iSubCat->name }}">
										{{ \Illuminate\Support\Str::limit($iSubCat->name, 100) }}
										@if (config('settings.listing.count_categories_posts'))
											<span class="count">({{ $countPostsByCat->get($iSubCat->id)->total ?? 0 }})</span>
										@endif
									</a>
								</li>
							@endforeach
						</ul>
					</li>
				</ul>
			</div>
		
		@else
			
			@if (isset($cat->parent, $cat->parent->children) && $cat->parent->children->count() > 0) 
				<h5 class="h6 p-3 text-capitalize mb-0">
					<span class="font-weight-bold">
						@if (isset($cat->parent->parent) && !empty($cat->parent->parent))
							<a href="{{ \App\Helpers\UrlGen::category($cat->parent->parent, null, $city ?? null) }}">
								<i class="fas fa-reply pr-2"></i> {{ $cat->parent->parent->name }}
							</a>
						@else
							<a href="{{ $catParentUrl }}">
								<i class="fas fa-reply pr-2"></i> {{ t('all_categories') }}
							</a>
						@endif
					</span> {!! $clearFilterBtn !!}
				</h5> 
				<div class="block-content p-0 categories-list">
					<ul class="list-unstyled p-3">
						@foreach ($cat->parent->children as $iSubCat)
							<li>
								@if ($iSubCat->id == $cat->id)
									<strong>
										<a href="{{ \App\Helpers\UrlGen::category($iSubCat, null, $city ?? null) }}" title="{{ $iSubCat->name }}">
											{{ \Illuminate\Support\Str::limit($iSubCat->name, 100) }}
											@if (config('settings.listing.count_categories_posts'))
												<span class="count">({{ $countPostsByCat->get($iSubCat->id)->total ?? 0 }})</span>
											@endif
										</a>
									</strong>
								@else
									<a href="{{ \App\Helpers\UrlGen::category($iSubCat, null, $city ?? null) }}" title="{{ $iSubCat->name }}">
										{{ \Illuminate\Support\Str::limit($iSubCat->name, 100) }}
										@if (config('settings.listing.count_categories_posts'))
											<span class="count">({{ $countPostsByCat->get($iSubCat->id)->total ?? 0 }})</span>
										@endif
									</a>
								@endif
							</li>
						@endforeach
					</ul>
				</div>
			@else
				
				@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.sidebar.categories.root', 'search.inc.sidebar.categories.root'])
				
			@endif
		
		@endif
	</div>

@else

	@includeFirst([config('larapen.core.customizedViewPath') . 'search.inc.sidebar.categories.root', 'search.inc.sidebar.categories.root'])

@endif
<div style="clear:both"></div>
