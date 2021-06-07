<?php

// Default Map's values
$map = [
    'show' 				=> false,
    'backgroundColor' 	=> 'transparent',
    'border' 			=> '#7324bc',
    'hoverBorder' 		=> '#7324bc',
    'borderWidth' 		=> 4,
    'color' 			=> '#e3d7ef',
    'hover' 			=> '#7324bc',
    'width' 			=> '300px',
    'height' 			=> '300px',
];

// Blue Theme values
if (config('app.skin') == 'skin-blue') {
    $map = [
        'show' 				=> false,
        'backgroundColor' 	=> 'transparent',
        'border' 			=> '#4682B4',
        'hoverBorder' 		=> '#4682B4',
        'borderWidth' 		=> 4,
        'color' 			=> '#d5e3ef',
        'hover' 			=> '#4682B4',
        'width' 			=> '300px',
        'height' 			=> '300px',
    ];
}

// Green Theme values
if (config('app.skin') == 'skin-green') {
    $map = [
        'show' 				=> false,
        'backgroundColor' 	=> 'transparent',
        'border' 			=> '#028E7B',
        'hoverBorder' 		=> '#028E7B',
        'borderWidth' 		=> 4,
        'color' 			=> '#9fdbd3',
        'hover' 			=> '#028E7B',
        'width' 			=> '300px',
        'height' 			=> '300px',
    ];
}

// Red Theme values
if (config('app.skin') == 'skin-red') {
    $map = [
        'show' 				=> false,
        'backgroundColor' 	=> 'transparent',
        'border' 			=> '#fa2320',
        'hoverBorder' 		=> '#fa2320',
        'borderWidth' 		=> 4,
        'color' 			=> '#f0d9d8',
        'hover' 			=> '#fa2320',
        'width' 			=> '300px',
        'height' 			=> '300px',
    ];
}

// Yellow Theme values
if (config('app.skin') == 'skin-yellow') {
    $map = [
        'show' 				=> false,
        'backgroundColor' 	=> 'transparent',
        'border' 			=> '#ffd005',
        'hoverBorder' 		=> '#ffd005',
        'borderWidth' 		=> 4,
        'color' 			=> '#fcf8e3',
        'hover' 			=> '#2ecc71',
        'width' 			=> '300px',
        'height' 			=> '300px',
    ];
}

// Get Admin Map's values
if (isset($citiesOptions)) {
    if (file_exists(config('larapen.core.maps.path') . config('country.icode') . '.svg')) {
        if (isset($citiesOptions['show_map']) and $citiesOptions['show_map'] == '1') {
            $map['show'] = true;
        }
    }
    if (isset($citiesOptions['map_background_color']) and !empty($citiesOptions['map_background_color'])) {
        $map['backgroundColor'] = $citiesOptions['map_background_color'];
    }
    if (isset($citiesOptions['map_border']) and !empty($citiesOptions['map_border'])) {
        $map['border'] = $citiesOptions['map_border'];
    }
    if (isset($citiesOptions['map_hover_border']) and !empty($citiesOptions['map_hover_border'])) {
        $map['hoverBorder'] = $citiesOptions['map_hover_border'];
    }
    if (isset($citiesOptions['map_border_width']) and !empty($citiesOptions['map_border_width'])) {
        $map['borderWidth'] = strToDigit($citiesOptions['map_border_width']);
    }
    if (isset($citiesOptions['map_color']) and !empty($citiesOptions['map_color'])) {
        $map['color'] = $citiesOptions['map_color'];
    }
    if (isset($citiesOptions['map_hover']) and !empty($citiesOptions['map_hover'])) {
        $map['hover'] = $citiesOptions['map_hover'];
    }
    if (isset($citiesOptions['map_width']) and !empty($citiesOptions['map_width'])) {
        $map['width'] = strToDigit($citiesOptions['map_width']) . 'px';
    }
    if (isset($citiesOptions['map_height']) and !empty($citiesOptions['map_height'])) {
        $map['height'] = strToDigit($citiesOptions['map_height']) . 'px';
    }
}

// Default Map's values
$loc = [
	'show'       		=> false,
	'itemsCols'  		=> 3,
	'showButton' 		=> false,
	'countCitiesPosts' 	=> false,
];

//Iint
$sForm = [
	'title'                       => t('Find a job near you'),
	'subTitle'                    => t('Simple, fast and efficient'),
];

// Get Admin Map's values
if (isset($citiesOptions)) {
	if (isset($citiesOptions['show_cities']) and $citiesOptions['show_cities'] == '1') {
		$loc['show'] = true;
	}
	if (isset($citiesOptions['items_cols']) and !empty($citiesOptions['items_cols'])) {
		$loc['itemsCols'] = (int)$citiesOptions['items_cols'];
	}
	if (isset($citiesOptions['show_post_btn']) and $citiesOptions['show_post_btn'] == '1') {
		$loc['showButton'] = true;
	}
	
    if (file_exists(config('larapen.core.maps.path') . config('country.icode') . '.svg')) {
        if (isset($citiesOptions['show_map']) and $citiesOptions['show_map'] == '1') {
            $map['show'] = true;
        }
    }
	
	if (config('settings.listing.count_cities_posts')) {
		$loc['countCitiesPosts'] = true;
	}
}

if (isset($searchFormOptions['title_' . config('app.locale')]) and !empty($searchFormOptions['title_' . config('app.locale')])) {
		$sForm['title'] = $searchFormOptions['title_' . config('app.locale')];
		$sForm['title'] = str_replace(['{app_name}', '{country}'], [config('app.name'), config('country.name')], $sForm['title']);
		if (\Illuminate\Support\Str::contains($sForm['title'], '{count_jobs}')) {
			try {
				$countPosts = \App\Models\Post::currentCountry()->unarchived()->count();
			} catch (\Exception $e) {
				$countPosts = 0;
			}
			$sForm['title'] = str_replace('{count_jobs}', $countPosts, $sForm['title']);
		}
		if (\Illuminate\Support\Str::contains($sForm['title'], '{count_users}')) {
			try {
				$countUsers = \App\Models\User::count();
			} catch (\Exception $e) {
				$countUsers = 0;
			}
			$sForm['title'] = str_replace('{count_users}', $countUsers, $sForm['title']);
		}
	}

$hideOnMobile = '';
if (isset($citiesOptions, $citiesOptions['hide_on_mobile']) and $citiesOptions['hide_on_mobile'] == '1') {
	$hideOnMobile = ' hidden-sm';
}
?>
@if ($loc['show'] || $map['show'])
<!-- @includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.spacer', 'home.inc.spacer'], ['hideOnMobile' =>
$hideOnMobile])  -->
<div>
	<div class="col-xl-12 page-content p-0">
		<div class="inner-box py-5">
			<!-- <div class="container"> -->
			<div class="row align-items-center justify-content-center">
				<!-- @if (!$map['show'])
				<div class="row">
					<div class="col-xl-12 col-sm-12">
						<h2 class="title-3 pt-1 pr-3 pb-3 pl-3" style="white-space: nowrap;">
							<!--Start MOE-JOBSIGHT
							<i class="icon-location-2"></i>&nbsp;{{ t('Choose a city') }} 
							END MOE-JOBSIGHT->
							<i class="icon-location-2"></i>&nbsp;{{ $sForm['title'] }}
						</h2>
					</div>
				</div>
				@endif -->
				<?php
				$leftClassCol = '';
				$rightClassCol = '';
				$ulCol = 'col-md-3 col-sm-12'; // Cities Columns
				
				if ($loc['show'] && $map['show']) {
					// Display the Cities & the Map
					$leftClassCol = 'col-lg-9 col-md-12';
					$rightClassCol = 'col-lg-3 col-md-12 mt-3 mt-xl-0 mt-lg-0';
					$ulCol = 'col-md-4 col-sm-6 col-xs-12';
					
					if ($loc['itemsCols'] == 2) {
						$leftClassCol = 'col-md-7 col-sm-12';
						$rightClassCol = 'col-md-5 col-sm-12';
						$ulCol = 'col-md-6 col-sm-12';
					}
					if ($loc['itemsCols'] == 1) {
						$leftClassCol = 'col-md-4 col-sm-12';
						$rightClassCol = 'col-md-8 col-sm-12';
						$ulCol = 'col-xl-12';
					}
				} else {
					if ($loc['show'] && !$map['show']) {
						// Display the Cities & Hide the Map
						$leftClassCol = 'col-xl-12';
					}
					if (!$loc['show'] && $map['show']) {
						// Display the Map & Hide the Cities
						$rightClassCol = 'col-xl-12';
					}
				}
				?>
				@if ($loc['show'])
				<div class="col-10 page-content m-0 p-0">
					@if (isset($cities))
					<div class="relative location-content">

						@if ($loc['show'] && $map['show'])
						<h2 class="title-3 pt-1 pr-3 pb-3 pl-3" style="white-space: nowrap;">
							<i class="icon-location-2"></i>&nbsp;
							<!--START MOE-JOBSIGHT{{ t('Choose a city or region') }} END MOE-JOBSIGHT-->
							{{ $sForm['title'] }}
						</h2>
						@endif

						<div class="row align-items-center justify-content-center">
							<div class="{{ $leftClassCol }} tab-inner">
								<div class="row">
									<!--Start MOE-JOBSIGHT
										@foreach ($cities as $key => $items)
											<ul class="cat-list {{ $ulCol }} mb-0 mb-xl-2 mb-lg-2 mb-md-2 {{ ($cities->count() == $key+1) ? 'cat-list-border' : '' }}">
												@foreach ($items as $k => $city)
													<li>
														@if ($city->id == 0)
															<a href="#browseAdminCities" data-toggle="modal">{!! $city->name !!}</a>
														@else
															<a href="{{ \App\Helpers\UrlGen::city($city) }}">
																{{ $city->name }}
															</a>
															@if ($loc['countCitiesPosts'])
																&nbsp;({{ $city->posts_count ?? 0 }})
															@endif
														@endif
													</li>
												@endforeach
											</ul>
										@endforeach
									END MOE-JOBSIGHT-->
									@foreach ($cats as $key => $col)
										@foreach ($col as $iCat) 
											@if (isset($subCats) and $subCats->has($iCat->id))
											<div class="col-md-3 col-sm-3 {{ (count($cats) == $key+1) ? 'last-column' : '' }}">
												<?php $randomId = '-' . substr(uniqid(rand(), true), 5, 5); ?>

												<div class="cat-list">
													<h3 class="cat-title rounded">
														<a href="{{ \App\Helpers\UrlGen::category($iCat) }}">
															<i class="{{ $iCat->icon_class ?? 'icon-ok' }}"></i>
															{{ $iCat->name }} <span class="count"></span>
														</a>
														@if (isset($subCats) and $subCats->has($iCat->id))
														<span class="btn-cat-collapsed collapsed" data-toggle="collapse"
															data-target=".cat-id-{{ $iCat->id . $randomId }}" aria-expanded="false">
															<span class="icon-down-open-big"></span>
														</span>
														@endif
													</h3>
													<ul id="catList"
														class="cat-collapse collapse show cat-id-{{ $iCat->id . $randomId }} long-list">
														@if (isset($subCats) and $subCats->has($iCat->id))
															@foreach ($subCats->get($iCat->id) as $iSubCat) 
															<li>
																<a id="{{$iSubCat->id. $randomId }}" class="list-group-item">
																	{{ $iSubCat->name }}
																</a>
															</li>
															@endforeach
														@endif
													</ul>
												</div>
											</div>
											@endif
										@endforeach
									@endforeach
								</div>
							</div>

							<div class="{{ $rightClassCol }}">
								@includeFirst([config('larapen.core.customizedViewPath') . 'home.inc.locations.svgmap',
							'home.inc.locations.svgmap'])
							</div>
						</div>

						<?php $tagsError = (isset($errors) and $errors->has('tags')) ? ' is-invalid' : ''; ?>
						<div class="search-row animated fadeInUp rounded middle">
							<form id="search" name="search" action="{{ \App\Helpers\UrlGen::search() }}" method="GET">

								<div class="row m-0 d-none">
									<div class="col-md-4 col-sm-12 mb-1 mb-xl-0 mb-lg-0 mb-md-0 search-col relative d-none" id="searchTagsInput">
										<i class="icon-docs icon-append"></i>
										<input id="tags" type="text" name="q"
											class="form-control keyword has-icon input-md{{ $tagsError }}"
											placeholder="{{ t('What') }}" value="{{ old('tags') }}">
										<small id=""
											class="form-text text-muted">{{ t('Enter the tags separated by commas') }}</small>
										<!--
											<div class="listing-filter hidden-xs">
											<div id='searchAddCriteria' class="breadcrumb-list text-center-xs">
											</div>
										</div>
									-->
									</div>
									<!-- tags 

									<div class="form-group row">
										<label class="col-md-3 col-form-label" for="tags">{{ t('Tags') }}</label>
										<div class="col-md-8">
											<input id="tags" name="tags" placeholder="{{ t('Tags') }}"
												class="form-control input-md{{ $tagsError }}" type="text"
												value="{{ old('tags') }}">
											<small id=""
												class="form-text text-muted">{{ t('Enter the tags separated by commas') }}</small>
										</div>
									</div>
								-->

									<div class="col-md-4 col-sm-12 search-col relative locationicon d-none" id="searchLocationInput">
										<i class="icon-location-2 icon-append"></i>
										<input type="hidden" id="lSearch" name="l" value="">
										@if ($map['show'])
										<input type="text" id="locationSearch" name="location"
											class="form-control locinput input-rel searchtag-input has-icon tooltipHere"
											placeholder="{{ t('Where') }}" value="" title="" data-placement="bottom"
											data-toggle="tooltip"
											data-original-title="{{ t('Enter a city name OR a state name with the prefix', ['prefix' => t('area')]) . t('State Name') }}" />
										@else
										<input type="text" id="locSearch" name="location"
											class="form-control locinput input-rel searchtag-input has-icon"
											placeholder="{{ t('Where') }}" value="">
										@endif
										<!--
											<div class="listing-filter hidden-xs">
												<div id='searchAddRegCriteria' class="breadcrumb-list text-center-xs">
												</div>
											</div>
										-->
									</div>
								</div>
								<!-- ./END:: Row -->

								<div class="row align-items-center justify-content-center">

									<div class="{{ $leftClassCol }} px-lg-5 text-center">
										<div class="input-group mr-sm-2 custem-search p-1 bg-white">
											<div class="input-group-prepend pl-1 pr-0">
												<div class="input-group-text"><i class="icon-search h5 p-0 m-0"></i></div>
											</div>
											<input type="text" id="titleSearch" name="title" class="form-control mr-md-3" placeholder="{{ t('Search by keyword') }}" value="" />
											<button class="btn btn-primary btn-search">
												<strong>{{ t('Find') }}</strong>
											</button>
										</div> 
									</div>

									<div class="{{ $rightClassCol }} search-col text-center">
										@if ($loc['showButton'])
											@if (!auth()->check())
												<a class="btn btn-lg btn-add-listing"
													href="{{ \App\Helpers\UrlGen::register() . '?type=2' }}"
													style="text-transform: none;">
													{{ t('Add your Resume') }} <i class="icon-attach"></i>
												</a>
											@else
												@if (in_array(auth()->user()->user_type_id, [1]))
												<a class="btn btn-lg btn-add-listing pl-4 pr-4"
													href="{{ \App\Helpers\UrlGen::addPost() }}" style="text-transform: none;">
													<i class="fa fa-plus-circle"></i> {{ t('Post a Job') }}
												</a>
												@endif
											@endif
										@endif
									</div> 
								</div>

							</form>
						</div>

					</div>
					@endif
				</div>
				@endif
			</div>
			<!-- </div> -->
		</div>
	</div>
</div>
@endif

@section('modal_location')
@parent
@if ($loc['show'] || $map['show'])
@includeFirst([config('larapen.core.customizedViewPath') . 'layouts.inc.modal.location', 'layouts.inc.modal.location'])
@endif
@endsection

@section('after_scripts')
@parent
<script src="{{ url('assets/plugins/twism/jquery.twism.js') }}"></script>
<script>
	/*
		var divJobs  = document.getElementById('searchAddCriteria');	
		var divRegions = document.getElementById('searchAddRegCriteria');
	*/	
	var setOfRegions = new Set();
	// var subCats = <?php echo json_encode($subCats); ?>

	$(document).ready(function () {
		$('#tags').tagit({
			fieldName: 'tags',
			placeholderText: ''+'{{ t('What') }}',
			caseSensitive: true,
			allowDuplicates: false,
			allowSpaces: false,
			tagLimit: {{ (int)config('settings.single.tags_limit', 15) }},
			singleFieldDelimiter: ',',

			afterTagRemoved: function(evt, ui) {
				var aTag = document.getElementById($(ui.tag).attr('id').substring(3));
				aTag.classList.toggle("active"); 
				checkfortags("#searchTagsInput");
			},
		});

		$('#locationSearch').tagit({
			fieldName: 'locationSearch',
			placeholderText: ''+'{{ t('Where') }}',
			caseSensitive: true,
			allowDuplicates: false,
			allowSpaces: false,
			tagLimit: {{ (int)config('settings.single.tags_limit', 15) }},
			singleFieldDelimiter: ',', 
			afterTagRemoved: (evt, ui) => { 
				setOfRegions.delete($(ui.tag).attr('id').substring(3)) ;
				var aTag = document.getElementById($(ui.tag).attr('id').substring(3));
				aTag.style.fill = '{{ $map['color'] }}';
				checkfortags("#searchLocationInput");
			},
		});
	});

	function removeCriteria(e) {
    var aTag = document.getElementById(e.target.id.substring(1));
		//aTag.classList.toggle("active");
		//divJobs.removeChild(e.target);
		$("#tags").tagit("removeTagByLabel", aTag.text.trim());
  };

	function removeRegCriteria(e) {
    var aTag = document.getElementById(e.target.id.substring(1));
		aTag.style.fill = '{{ $map['color'] }}'; 
		//divRegions.removeChild(e.target);
		setOfRegions.delete(e.target.id.substring(1)) ;
		$("#locationSearch").tagit("removeTagByLabel", aTag.text.trim());
		
    };
	
	$('#countryMap').click(function(e) {
		checkfortags("#searchLocationInput");
		// console.log(this)	; 

		// var isTagged = e.target.classList.toggle("active") ;
		// if(isTagged)
		// {
		// 	var tagSvgReg = document.getElementById(e.target.id);
		// 	tagSvgReg.style.fill = '{{ $map['hover'] }}';
			
		// 	var a = document.createElement('a');
		// 	var linkText = document.createTextNode(e.target.id);
		// 	a.appendChild(linkText);
    //   		a.title = e.target.text;
	  // 		a.rel="nofollow"
		// 	a.id="a"+e.target.id;
		// 	a.onclick = removeRegCriteria;
	  // 		a.classList.add("jobs-s-tag")
		// 	divRegions.appendChild(a);
		// }
		// else
		// {
		// 	var item = document.getElementById("a"+e.target.id);
		// 	divRegions.removeChild(item);
		// }	
    });


	$('#catList li a').click(function(e) {
		var isTagged = e.target.classList.toggle("active") ;
		if(isTagged)
		{
			/*var a = document.createElement('a');
			var linkText = document.createTextNode(e.target.text);
			a.appendChild(linkText);
      a.title = e.target.text;
	  	a.rel="nofollow"
			a.id="a"+e.target.id;
			a.onclick = removeCriteria;
	  	a.classList.add("jobs-s-tag")
			divJobs.appendChild(a);
			*/
			$("#tags").tagit("createTagWithId",'tag'+e.target.id, e.target.text.trim(),null,true); 
		}
		else
		{
			/*var item = document.getElementById("a"+e.target.id);
			divJobs.removeChild(item);
			*/
			e.target.classList.toggle("active");
			$("#tags").tagit("removeTagByLabel", e.target.text.trim()); 
		}		
		checkfortags("#searchTagsInput");
  });
	function checkfortags(elm) {
		// #searchTagsInput
		/***
		* MOD::START::NEWCODE :: track number child for list to show&&hide placeholder.
		*/
		let numberChilds = $(`${elm} ul.tagit >li`).length;
		console.log(numberChilds);
		if(numberChilds > 1) {
			$(`${elm} ul.tagit .tagit-new`).hide();
			$(`${elm} ul.tagit .icon-docs`).hide();
		} else { 
			$(`${elm} ul.tagit .tagit-new`).show();
			$(`${elm} ul.tagit .icon-docs`).show();
		}
		/***
		* MOD::END::NEWCODE
		*/
	}
</script>
@endsection
