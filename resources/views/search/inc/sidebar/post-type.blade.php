<?php
// Clear Filter Button
$clearFilterBtn = '';
if (request()->filled('type')) {
	$clearFilterUrl = \App\Helpers\UrlGen::search([], ['page', 'type']);
	$clearFilterBtn = getFilterClearBtn($clearFilterUrl);
}
?>
<?php
$inputPostType = [];
if (request()->filled('type')) {
	$types = request()->get('type');
	if (is_array($types)) {
		foreach ($types as $type) {
			$inputPostType[] = $type;
		}
	} else {
		$inputPostType[] = $types;
	}
}
?>
<!-- PostType -->
<div class="list-filter mb-4 bg-light">
	<h5 class="h6 p-3 text-capitalize mb-0">
		<span class="font-weight-bold">
			{{ t('Job Type') }}
		</span> {!! $clearFilterBtn !!}
	</h5>
	<div class="filter-content filter-employment-type p-3">
		<ul id="blocPostType" class="browse-list list-unstyled">
			@if (isset($postTypes) and $postTypes->count() > 0)
				@foreach($postTypes as $key => $postType)
					<li class="mb-1">
						<input type="checkbox"
							name="type[{{ $key }}]"
							id="employment_{{ $postType->id }}"
							value="{{ $postType->id }}"
							class="emp emp-type"{{ (in_array($postType->id,  $inputPostType)) ? ' checked="checked"' : '' }}
						>
						<label for="employment_{{ $postType->id }}">{{ $postType->name }}</label>
					</li>
				@endforeach
			@endif
			<input type="hidden" id="postTypeQueryString" value="{{ httpBuildQuery(request()->except(['page', 'type'])) }}">
		</ul>
	</div>
</div>

@section('after_scripts')
	@parent
	
	<script>
		$(document).ready(function ()
		{
			$('#blocPostType input[type=checkbox]').click(function() {
				var postTypeQueryString = $('#postTypeQueryString').val();
				
				if (postTypeQueryString != '') {
					postTypeQueryString = postTypeQueryString + '&';
				}
				var tmpQString = '';
				$('#blocPostType input[type=checkbox]:checked').each(function(){
					if (tmpQString != '') {
						tmpQString = tmpQString + '&';
					}
					tmpQString = tmpQString + 'type[]=' + $(this).val();
				});
				postTypeQueryString = postTypeQueryString + tmpQString;
				
				var searchUrl = baseUrl + '?' + postTypeQueryString;
				redirect(searchUrl);
			});
		});
	</script>
@endsection
