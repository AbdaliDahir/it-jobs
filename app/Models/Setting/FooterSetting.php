<?php
/** 
 * it-jobSight. 
**/

namespace App\Models\Setting;

class FooterSetting
{
	public static function getValues($value, $disk)
	{
		if (empty($value)) {
			
			$value['hide_payment_plugins_logos'] = '1';
			
		} else {
			
			if (!isset($value['hide_payment_plugins_logos'])) {
				$value['hide_payment_plugins_logos'] = '1';
			}
			
		}
		
		return $value;
	}
	
	public static function setValues($value, $setting)
	{
		return $value;
	}
	
	public static function getFields($diskName)
	{
		$fields = [
			[
				'name'  => 'hide_links',
				'label' => trans('admin.Hide Links'),
				'type'  => 'checkbox',
			],
			[
				'name'  => 'hide_payment_plugins_logos',
				'label' => trans('admin.Hide Payment Plugins Logos'),
				'type'  => 'checkbox',
			],
			[
				'name'  => 'hide_powered_by',
				'label' => trans('admin.Hide Powered by Info'),
				'type'  => 'checkbox',
			],
			[
				'name'  => 'powered_by_info',
				'label' => trans('admin.Powered by'),
				'type'  => 'text',
			],
			[
				'name'       => 'tracking_code',
				'label'      => trans('admin.Tracking Code'),
				'type'       => 'textarea',
				'attributes' => [
					'rows' => '15',
				],
				'hint'       => trans('admin.tracking_code_hint'),
			],
		];
		
		return $fields;
	}
}
