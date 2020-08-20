<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Subcategory;
use App\Item;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();

        return view('backend.item.list',compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategories = Subcategory::all();
        $brands = Brand::all();

        return view('backend.item.new',compact('subcategories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'  => ['required', 'string', 'max:255', 'unique:items'],
        ]);

        if ($validator) {
            $name = $request->name;
            $unitprice = $request->unitprice;
            $discount = $request->discount;
            $description = $request->description;
            $brandid = $request->brandid;
            $subcategoryid = $request->subcategoryid;


            // FILE UPLOAD

            if ($request->hasfile('images')) 
            {
                $i=1;
                foreach($request->file('images') as $image)
                {
                    $imagename = time().$i.'.'.$image->extension();
                    $image->move(public_path('images/item'), $imagename);  
                    $data[] = 'images/item/'.$imagename;
                    $i++;
                }
            }
            // $photoString = implode(',', $data);

            $codeno = "JPM-".rand(11111,99999);

            $item= new Item();
            $item->codeno = $codeno;
            $item->name = $name;
            $item->photo = json_encode($data);
            $item->price = $unitprice;
            $item->discount = $discount;
            $item->description = $description;
            $item->subcategory_id = $subcategoryid;
            $item->brand_id = $brandid;
            $item->save();

            return redirect()->route('backside.item.index')->with("successMsg", "New Item is ADDED in your data");


        }else{
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategories = Subcategory::all();
        $brands = Brand::all();

        $item = Item::find($id);

        return view('backend.item.edit',compact('subcategories','brands','item'));
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
        $validator = $request->validate([
            'name'  => ['required', 'string', 'max:255'],
        ]);

        if ($validator) {
            $name = $request->name;
            $unitprice = $request->unitprice;
            $discount = $request->discount;
            $description = $request->description;
            $brandid = $request->brandid;
            $subcategoryid = $request->subcategoryid;
            $codeno = $request->codeno;


            // FILE UPLOAD

            if ($request->hasfile('images')) 
            {

                $i = 1;
                foreach($request->file('images') as $file)
                {
                    $name = time().$i.'.'.$file->extension();
                    $file->move(public_path('images/item'), $name);  
                    $data[] = 'images/item/'.$name;
                    $i++;
                }

                foreach (json_decode($request->oldphoto) as $oldphoto){
                    if(\File::exists(public_path($oldphoto))){
                        \File::delete(public_path($oldphoto));
                    }
                }
            }else{
                $data = json_decode($request->oldphoto);
            }
            // $photoString = implode(',', $data);

            $item= Item::find($id);
            $item->codeno = $codeno;
            $item->name = $name;
            $item->photo = json_encode($data);
            $item->price = $unitprice;
            $item->discount = $discount;
            $item->description = $description;
            $item->subcategory_id = $subcategoryid;
            $item->brand_id = $brandid;
            $item->save();

            return redirect()->route('backside.item.index')->with("successMsg", "New Item is UPDATED in your data");


        }else{
            return Redirect::back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);

        foreach (json_decode($item->photo) as $oldphoto){
            if(\File::exists(public_path($oldphoto))){
                \File::delete(public_path($oldphoto));
            }
        }

        $item->delete();

        return redirect()->route('backside.item.index')->with("successMsg", "New Item is DELETED in your data");
    }
}
