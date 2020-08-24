<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use App\Http\Resources\BrandResource;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $result = BrandResource::collection($brands);
        $message = 'Brands retrieved successfully.';
        $status = 200;

        $response = [
            'status'  => $status,
            'success' => true,
            'data'    => $result,
            'message' => $message,
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
            'name' => 'required|string|max:255|unique:brands',
            'logo' => 'required|mimes:jpeg,bmp,png,jpg'
        ]);

        dd($validator);

        if ($validator) {

            $name = $request->name;
            $photo = $request->logo;

            // File Upoload
            $imageName = time().'.'.$photo->extension();  
       
            $photo->move(public_path('images/brand'), $imageName);

            $filepath = 'images/brand/'.$imageName;

            // Data insert
            $brand = new Brand;
            $brand->name = $name;
            $brand->logo = $filepath;

            $brand->save();
            

            $status = 200;
            $result = new BrandResource($brand);
            $message = 'Brand created successfully.';

            $response = [
                'status'  => $status,
                'success' => true,
                'data'    => $result,
                'message' => $message,
            ];

            return response()->json($response, 200);
        }
        else{
            $message = 'Validation Error.';
            $status = 400;

            $response = [
                'status'  => $status,
                'success' => false,
                'data'    => $validator->errors(),
                'message' => $message,
            ];

            return response()->json($response, 400);
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
        $brand = Brand::find($id);

        if (is_null($brand)) {

            $status = 400;
            $message = 'Brand not found.';

            $response = [
                'status'  => $status,
                'success' => false,
                'message' => $message,
            ];

            return response()->json($response, 404);

        }
        else{
            $status = 200;
            $result = new BrandResource($brand);
            $message = 'Brand retrieved successfully.';

            $response = [
                'status'  => $status,
                'success' => true,
                'data'    => $result,
                'message' => $message,
            ];


            return response()->json($response, 200);

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
        //
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
