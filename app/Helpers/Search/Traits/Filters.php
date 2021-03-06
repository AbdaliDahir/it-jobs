<?php
/** 
 * it-jobSight. 
**/

namespace App\Helpers\Search\Traits;

use App\Helpers\Search\Traits\Filters\AuthorFilter;
use App\Helpers\Search\Traits\Filters\CategoryFilter;
use App\Helpers\Search\Traits\Filters\CompanyFilter;
use App\Helpers\Search\Traits\Filters\DateFilter;
use App\Helpers\Search\Traits\Filters\DynamicFieldsFilter;
use App\Helpers\Search\Traits\Filters\KeywordFilter;
use App\Helpers\Search\Traits\Filters\LocationFilter;
use App\Helpers\Search\Traits\Filters\PostTypeFilter;
use App\Helpers\Search\Traits\Filters\SalaryFilter;
use App\Helpers\Search\Traits\Filters\TagFilter;
use App\Helpers\Search\Traits\Filters\TitleFilter;

trait Filters
{
	use AuthorFilter, CategoryFilter, TitleFilter, KeywordFilter, LocationFilter, TagFilter,
		DateFilter, PostTypeFilter, SalaryFilter, DynamicFieldsFilter, CompanyFilter;
	
	protected function applyFilters()
	{
		if (!(isset($this->posts))) {
			return;
		}
		
		// Default Filters
		$this->posts->currentCountry()->verified()->unarchived();
		if (config('settings.single.posts_review_activation')) {
			$this->posts->reviewed();
		}

		// Author
		$this->applyAuthorFilter();
		
		// Category
		$this->applyCategoryFilter();
		
		// Title 
		$this->applyTitleFilter();

		// Keyword
		$this->applyKeywordFilter();
		
		// Location
		$this->applyLocationFilter();
		
		// Tag
		$this->applyTagFilter();
		
		// Date
		$this->applyDateFilter();
		
		// Post Type
		$this->applyPostTypeFilter();
		
		// Salary
		$this->applySalaryFilter();
		
		// Dynamic Fields
		$this->applyDynamicFieldsFilters();
		
		// Company
		$this->applyCompanyFilter();
	}
}
