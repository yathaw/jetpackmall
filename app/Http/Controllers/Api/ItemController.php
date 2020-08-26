<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\ItemResource;
use App\Item;
use Validator;

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
        $result = ItemResource::collection($items);

        $message = 'Items retrieved successfully.';
        $status = 200;

        $response = [
            'status'    =>  $status,
            'success'   =>  true,
            'message'   =>  $message,
            'data'      =>  $result,
        ];

        return response()->json($response);
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
            'name'  => ['required', 'string', 'max:255', 'unique:items'],
            'unitprice' => 'required',
            'discount'  => 'required',
            'description'   =>  'required',
            'brandid'       =>  'required',
            'subcategoryid' =>  'required',
            'images' => 'required',
            'images.*' => 'required|mimes:jpeg,bmp,png'
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
            $unitprice = $request->unitprice;
            $discount = $request->discount;
            $description = $request->description;
            $brandid = $request->brandid;
            $subcategoryid = $request->subcategoryid;


            // dd($images);
            // FILE UPLOAD
            // $data=array();

            if ($request->hasfile('images')) 
            {
                dd($request->file('images'));
                $i=1;
                // $photos[] = $request->file('images');
                foreach($request->file('images') as $image)
                {
                    $imagename = time().$i.'.'.$image->extension();
                    $image->move(public_path('images/item'), $imagename);  
                    $data[] = 'images/item/'.$imagename;
                    $i++;
                }

                // File Upoload
                // $imageName = time().'.'.$images->extension();  
           
                // $images->move(public_path('images/item'), $imageName);

                // $filepath = 'images/item/'.$imageName;
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

            $status = 200;
            $result = new ItemResource($item);
            $message = 'Item created successfully.';

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
        $item = Item::find($id);

        if (is_null($item)) {
            # 404
            $status = 404;
            $message = 'Item not found.';

            $response = [
                'status'    => $status,
                'success'   => false,
                'message'   => $message
            ];

            return response()->json($response);
        }else{
            #200
            $status = 200;
            $message = 'Item retrieved successfully.';
            $result = new ItemResource($item);

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
            'name'  => ['required', 'string', 'max:255'],
            'unitprice' => 'required',
            'discount'  => 'required',
            'description'   =>  'required',
            'brandid'       =>  'required',
            'subcategoryid' =>  'required'
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

            $item = Item::find($id);


            if (is_null($item)) {

                $status = 400;
                $message = 'Item not found.';

                $response = [
                    'status'  => $status,
                    'success' => false,
                    'message' => $message,
                ];

                return response()->json($response, 404);

            }
            else{

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
                }else{
                    $data = json_decode($item->photo);
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

                $status = 200;
                $result = new ItemResource($item);
                $message = 'Item updated successfully.';

                $response = [
                    'status'  => $status,
                    'success' => true,
                    'message' => $message,
                    'data'    => $result,
                ];

                return response()->json($response, 200);
            }
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

        if (is_null($item)) {

            $status = 400;
            $message = 'Item not found.';

            $response = [
                'status'  => $status,
                'success' => false,
                'message' => $message,
            ];

            return response()->json($response, 404);
        }
        else{
            $item->delete();

            $status = 200;
            $message = 'Item deleted successfully.';

            $response = [
                'status'  => $status,
                'success' => true,
                'message' => $message,
            ];

            return response()->json($response, 200);
        }
    }
}
