<?php

class DataController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        return View::make('data.index')
        	->with('data',Datum::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::where('user_id', '=', Auth::user()->id)->get();
		$categorySelect = array();
		foreach($categories as $category)
			$categorySelect[$category->id] = $category->name;

		return View::make('data.create')
        	->with('categorySelect', $categorySelect);

        // return View::make('data.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{	
		$rules = array(
            'value' => 'required|numeric',
            'category' => 'required|numeric',
        	'date' => 'date',	
        );
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->passes()) {
        	if(empty(Input::all()['date'])){
        		$date = date('Y-m-d H:i:s');
        	} else {
        		$date = date('Y-m-d H:i:s', strtotime(Input::all()['date']));
        	}
        	Datum::create(array(
                    'data' => Input::get()['value'],
                    'category_id' => Input::get()['category'],
                    'timestamp' => $date
            		));
            
            return Redirect::to('/data/create')->with('message', 'Data Created');
		}
        return Redirect::to('/data/create')
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
        return View::make('data.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('data.edit');
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

}
