<?php

class ChartsController extends BaseController {
	function __construct() {
        $this->beforeFilter('auth');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('charts.index')
        	->with('categories', Category::where('user_id', '=', Auth::user()->id)->get());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
        return View::make('charts.create')
        	->with('categories', Category::where('user_id', '=', Auth::user()->id)->get())
        	->with('charts', Chart::where('user_id', '=', Auth::user()->id)->get());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
            'name'                  => 'required|min:2|max:80|alpha_dash'	
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->passes()) {

        	$chart_id = Chart::create(array(
                    'name' => Input::get('name'),
                    'user_id' => Auth::user()->id,
                    'axis_label' => Input::get('axis_label'),
                    'unit' => Input::get('unit_label')
            		))->id;
            
        	foreach (Input::All()["category"] as $category_id) {
        		Chart_category::create(array(
	                    'category_id' => $category_id,
	                    'chart_id' => $chart_id
	                ));
        	}
            return Redirect::to('/')->with('message', 'Chart Created');
        } else {
            return Redirect::to('/charts/create')
				->withErrors($validator)
				->withInput();
        }
    
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        return View::make('charts.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        return View::make('charts.edit');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$chart = Chart::find($id);
		if(isset(Input::all()['name']))
			$chart->name = Input::all()['name'];
		if(isset(Input::all()['unit']))
			$chart->unit = Input::all()['unit'];
		if(isset(Input::all()['axis_label']))
			$chart->axis_label = Input::all()['axis_label'];
		$chart->save();
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
