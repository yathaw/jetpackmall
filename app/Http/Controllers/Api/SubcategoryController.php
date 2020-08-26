<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\SubcategoryResource;
use App\Subcategory;


class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        $result = SubcategoryResource::collection($subcategories);
        $message = 'Subcategories retrieved successfully.';
        $status = 200;

        $response = [
            'status'  => $status,
            'success' => true,
            'message' => $message,
            'data'    => $result,
        ];

        return response()->json($response, 200);
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
            'name' => ['required', 'string', 'max:255', 'unique:subcategories'],
            'categoryid' => 'required|numeric|min:0|not_in:0'

        ]);

        if ($validator->fails()) {
            $message = 'Validation Error.';
            $status = 400;

            $response = [
                'status'  => $status,
                'success' => false,
                'message' => $message,
                'data'    => $validator->errors(),
            ];

            return response()->json($response, 400);
        }

        else{
            $name = $request->name;
            $categoryid = $request->categoryid;

            // Data insert
            $subcategory = new Subcategory();
            $subcategory->name = $name;
            $subcategory->category_id = $categoryid;
            $subcategory->save();

            $status = 200;
            $result = new SubcategoryResource($subcategory);
            $message = 'Subcategory created successfully.';

            $response = [
                'status'  => $status,
                'success' => true,
                'message' => $message,
                'data'    => $result,
            ];

            return response()->json($response, 200);
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
        $subcategory = Subcategory::find($id);

        if (is_null($subcategory)) {
            # 404
            $status = 404;
            $message = 'Subcategory not found.';

            $response = [
                'status'    => $status,
                'success'   => false,
                'message'   => $message
            ];

            return response()->json($response);
        }else{
            #200
            $status = 200;
            $message = 'Subcategory retrieved successfully.';
            $result = new SubcategoryResource($subcategory);

            $response = [
                'status'    =>  $status,
                'success'   =>  true,
                'message'   =>  $message,
                'data'      =>  $result
            ];

            return response()->json($response);
        }
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
            'name' => ['required', 'string', 'max:255'],
            'categoryid' => 'required|numeric|min:0|not_in:0'
        ]);

        if ($validator->fails()) {
            $message = 'Validation Error.';
            $status = 400;

            $response = [
                'status'  => $status,
                'success' => false,
                'message' => $message,
                'data'    => $validator->errors(),
            ];

            return response()->json($response, 400);
        }
        else{
            $name = $request->name;
            $categoryid = $request->categoryid;

            // Data insert
            $subcategory = Subcategory::find($id);
            $subcategory->name = $name;
            $subcategory->category_id = $categoryid;
            $subcategory->save();

            return redirect()->route('backside.subcategory.index')->with('successMsg','New Subcategory is ADDED in your data');
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
        $subcategory = Subcategory::find($id);

        if (is_null($subcategory)) {

            $status = 400;
            $message = 'Subcategory not found.';

            $response = [
                'status'  => $status,
                'success' => false,
                'message' => $message,
            ];

            return response()->json($response, 404);
        }
        else{
            $subcategory->delete();

            $status = 200;
            $message = 'Subcategory deleted successfully.';

            $response = [
                'status'  => $status,
                'success' => true,
                'message' => $message,
            ];


            return response()->json($response, 200);
        }
    }
}
