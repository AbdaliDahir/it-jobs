<?php
// Clear Filter Button
$clearFilterBtn = '';
if (request()->filled('postedDate')) {
	$clearFilterUrl = \App\Helpers\UrlGen::search([], ['page', 'postedDate']);
	$clearFilterBtn = getFilterClearBtn($clearFilterUrl);
}
?>
<!-- Date -->
<div class="list-filter mb-4 bg-light">
	<h5 class="h6 p-3 text-capitalize mb-0">
		<span class="font-weight-bold">
			{{ t('Date Posted') }}
		</span> {!! $clearFilterBtn !!}
	</h5> 
	<div class="block-content p-3">
		<div class="filter-date filter-content">
			<ul>
				@if (isset($dates) and !empty($dates))
					@foreach($dates as $key => $value)
						<li class="mb-1">
							<input type="radio"
									name="postedDate"
									value="{{ $key }}"
									id="postedDate_{{ $key }}" {{ (request()->get('postedDate')==$key) ? 'checked="checked"' : '' }}
							>
							<label for="postedDate_{{ $key }}">{{ $value }}</label>
						</li>
					@endforeach
				@endif
				<input type="hidden" id="postedQueryString" value="{{ httpBuildQuery(request()->except(['page', 'postedDate'])) }}">
			</ul>
		</div>
	</div>
</div>

@section('after_scripts')
	@parent
	
	<script>
		$(document).ready(function ()
		{
			$('input[type=radio][name=postedDate]').click(function() {
				var postedQueryString = $('#postedQueryString').val();
				
				if (postedQueryString != '') {
					postedQueryString = postedQueryString + '&';
				}
				postedQueryString = postedQueryString + 'postedDate=' + $(this).val();
				
				var searchUrl = baseUrl + '?' + postedQueryString;
				redirect(searchUrl);
			});
		});
	</script>
@endsection
