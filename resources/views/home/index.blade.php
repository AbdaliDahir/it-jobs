{{--
 * it-jobSight.
--}}
@extends('layouts.master')

@section('search')
@parent
@endsection

@section('content')
<div class="main-container" id="homepage">

	@if (Session::has('message'))
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<?php $paddingTopExists = true; ?>
	<div class="container">
		<div class="row">
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				{{ session('message') }}
			</div>
		</div>
	</div>
	@endif

	@if (Session::has('flash_notification'))
	@includeFirst([config('larapen.core.customizedViewPath') . 'common.spacer', 'common.spacer'])
	<?php $paddingTopExists = true; ?>
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				@include('flash::message')
			</div>
		</div>
	</div>
	@endif

	@if (isset($sections) and $sections->count() > 0)
	@foreach($sections as $section)
	@if (view()->exists($section->view))
	@includeFirst([config('larapen.core.customizedViewPath') . $section->view, $section->view], ['firstSection' =>
	$loop->first])
	@endif
	@endforeach
	@endif

</div>
@endsection

@section('after_scripts')
@endsection
