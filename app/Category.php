<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
	/**
	 * @return mixed
	 */
	public static function getMainCategoryArray()
	{
		$rawCategoryData = DB::table('categories')->where('parent_id', null)->orderBy('id', 'desc')->get();
		return $rawCategoryData;
	}

	/**
	 * @return mixed
	 */
	public static function getSubCategoryArray()
	{
		$rawCategoryData = DB::table('categories')->where('parent_id', '<>', null)->orderBy('id', 'desc')->get();
		return $rawCategoryData;
	}

	/**
	 * @return array
	 */
	public static function getAllCategoryArray()
	{
		$rawMainCategory = self::getMainCategoryArray();
		$rawAllCategory = DB::table('categories')->orderBy('id', 'desc')->get();

		$sortedCategories = array();
		foreach ($rawMainCategory as $key => $value)
		{
			$sortedCategories[$value->id] = $value;
			foreach ($rawAllCategory as $subkey => $subvalue)
			{
				if ($subvalue->parent_id == $value->id)
				{
					$sortedCategories[$subvalue->id] = $subvalue;
				}
			}
		}
		return $sortedCategories;
	}
}
