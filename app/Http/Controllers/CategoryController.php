<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
	public function create()
	{
		return view('cms.cms_categories', ['message' => ""]);
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function store(Request $request)
	{
		$data = Input::all();

		/*Priority Up. Swaps the priorities of the curently selected navigationtab with the one with a higher priority
		if (isset($data['priorityUp']))
		{
			$toSwapNav = DB::table('categories')->where('priority', '>', $request->priority)->orderBy('priority', 'asc')->first();
			$priority1 = $toSwapNav->priority;
			$priority2 = $request->priority;
			Category::where('id', $request->id)->update(['priority' => $priority1]);
			Category::where('id', $toSwapNav->id)->update(['priority' => $priority2]);
			return view('cms.cms_header', ['message' => " Volgorde veranderd!"]);
		}
		/*Priority Down. Swaps the priorities of the curently selected navigationtab with the one with a lower priority
		if (isset($data['priorityDown']))
		{
			$toSwapNav = DB::table('categories')->where('priority', '<', $request->priority)->orderBy('priority', 'desc')->first();
			$priority1 = $toSwapNav->priority;
			$priority2 = $request->priority;
			Category::where('id', $request->id)->update(['priority' => $priority1]);
			Category::where('id', $toSwapNav->id)->update(['priority' => $priority2]);
			return view('cms.cms_header', ['message' => " Volgorde veranderd!"]);
		}*/

		/**Saves changes made to the navigationtab sent as a request*/
		if (isset($data['store']))
		{
			if ($request->visible == 1)
			{
				$visible = 1;
			} else
			{
				$visible = 0;
			}
			Category::where('id', $request->id)->update(['name' => $request->name]);
			Category::where('id', $request->id)->update(['visible' => $visible]);
			Category::where('id', $request->id)->update(['parent_id' => $request->parent_id]);

			return view('cms.cms_categories', ['message' => "Succesvol opgeslagen!"]);
		}
	}

	public function addCategory(Request $request)
	{
		Category::Insert(['name' => 'nieuwe Category', 'visible' => 1]);
		return view('cms.cms_categories', ['message' => "Succesvol toegevoegd!"]);
	}
}
