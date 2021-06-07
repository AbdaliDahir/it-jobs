<!-- Category -->
<div id="catsList" class="list-filter mb-4 bg-light"> 
	<h5 class="h6 p-3 text-capitalize mb-0">
		<span class="font-weight-bold">
			{{ t('all_categories') }}
		</span> {!! $clearFilterBtn ?? '' !!}
	</h5> 
	<div class="block-content p-0 categories-list">
		<ul class="list-unstyled p-3">
			@if (isset($cats) && $cats->count() > 0)
				@foreach ($cats as $iCat)
					<li>
						@if (isset($cat) && !empty($cat) && $iCat->id == $cat->id)
							<strong>
								<a href="{{ \App\Helpers\UrlGen::category($iCat, null, $city ?? null) }}" title="{{ $iCat->name }}">
									<span class="title">{{ $iCat->name }}</span>
									@if (config('settings.listing.count_categories_posts'))
										<span class="count">&nbsp;{{ $countPostsByCat->get($iCat->id)->total ?? 0 }}</span>
									@endif
								</a>
							</strong>
						@else
							<a href="{{ \App\Helpers\UrlGen::category($iCat, null, $city ?? null) }}" title="{{ $iCat->name }}">
								<span class="title">{{ $iCat->name }}</span>
								@if (config('settings.listing.count_categories_posts'))
									<span class="count">&nbsp;{{ $countPostsByCat->get($iCat->id)->total ?? 0 }}</span>
								@endif
							</a>
						@endif
					</li>
				@endforeach
			@else
				@if (isset($rootCats) and $rootCats->count() > 0) 
					@foreach ($rootCats as $itemCat)
						<li>
							<strong>
								<a href="{{ \App\Helpers\UrlGen::category($itemCat, null, $city ?? null) }}" title="{{ $itemCat->name }}" class="text-cat-parent">
									<span class="title">- {{ $itemCat->name }}.</span>
									<!-- @if (config('settings.listing.count_categories_posts'))
										<span class="count">&nbsp;{{ $countPostsByCat->get($itemCat->id)->total ?? 0 }}</span>
									@endif -->
								</a>
							</strong>
						</li>
					@endforeach 
				@endif
			@endif
		</ul>
	</div>
</div>
