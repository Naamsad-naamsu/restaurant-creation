<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\RestaurantProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant =  Restaurant::getAll();
        $data = ['category' => $restaurant];
        return view('restaurant.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('restaurant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
                ]
        );

        if ($validator->fails()) {
            $data = ['error'=> trans('messages.validation_error').'<br>'.$validator->messages()->first(),'errors'=>$validator->errors()];
            return redirect()->back()->withInput()->with($data);
        }
        try{
            $data = $request->all();
            $input = [
                'name' => $data['name'],
                'product_limit' => $data['cost'],
                'description' => $data['description'],
            ];
            $category = Restaurant::create($input);
    

        }catch (Exception $ex) {
            return redirect('restaurant')->with('errors','Error in processing request.');

        }
        return redirect('restaurant')->with('success','Category saved successfully!');

    }
        

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $category = Restaurant::where('id',$id)->first();
        
        return view('restaurant.edit',['category'=>$category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required'
                ]
        );
        if ($validator->fails()) {
            $data = ['error'=> trans('messages.validation_error').'<br>'.$validator->messages()->first(),'errors'=>$validator->errors()];
           return redirect()->back()->withInput()->with($data);
        }

        $category                 =   Restaurant::find($id);
        $category->name           =   $request->name;
        $category->product_limit  =   $request->cost;
        $category->description    =   $request->description;

        $save                     =   $category->save();


        return redirect('restaurant')->with('success','Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
