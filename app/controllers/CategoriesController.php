<?php

class CategoriesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$success = 'true';
		
		
		$values = array();
		// echo '<pre>';
		foreach (Category::all() as $category) {
			// var_dump(, $category->name);
			$values[] = ['id' => $category->id, 'name' => $category->name];
		}
		// echo '</pre>';

		return Response::json(array('success' => $success, 'result' => $values));
        // return View::make('categories.index')
        // 	->with('categories',Category::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('categories.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'label' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
        	Category::create(array(
                    'name' => Input::get()['label'],
                    'label' => Input::get()['label'],
                    'user_id' => Auth::user()->id
                    
            		));
            
            return Redirect::to('/categories/create')->with('message', 'Data Created');
		}
        return Redirect::to('/categories/create')
        	->withInput()
        	->withErrors($validator);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('categories.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('categories.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	// public function dataByCategoryId($categoryId){
	// 	$success = 'true';
	// 	$data = Datum::where('category_id', '=', $categoryId)->get();
		
	// 	$values = array();
		
	// 	foreach ($data as $key => $value) {
	// 		$values[] = ['timestamp' => $value->timestamp, 'data' => $value->data];
	// 	}

	// 	return Response::json(array('success' => $success, 'result' => $values));
	// }

}
