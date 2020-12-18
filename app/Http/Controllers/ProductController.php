<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function read(Request $request)
    {
        if ($request->user()->tokenCan('read')) {

            return response(Product::get(['id', 'name', 'price', 'code']), 200);
        }
        return response('401:Unauthorized', 401);
    }

    public function readId(Request $request)
    {
        if ($request->user()->tokenCan('read')) {
            $p = Product::where('id', $request->id)->get(['id', 'name', 'price', 'code']);
            if ($p->isEmpty()) {
                return response("404:Not found", 404);
            }
            return response($p, 200);
        }
        return response('401:Unauthorized', 401);
    }

    public function create(Request $request)
    {
        if ($request->user()->tokenCan('create')) {

            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'code' => 'required',
            ]);
            if ($validation->fails()) {
                return response($validation->errors(), 400);
            }
            $p = new Product();
            $p->token = $request->header('Authorization');
            $p->name = $request->name;
            $p->price = $request->price;
            $p->code = $request->code;
            $p->save();
            return response('201:Created', 201)->header('Location', url("/api/products/read/" . $p->id));
        }
        return response('401:Unauthorized', 401);
    }

    public function createId(Request $request) //safe authentication code
    {
        return response("405:Method not allowed", 405);
    }


    public function update(Request $request)
    {
        return response("405:Method not allowed", 405);

    }

    public function updateId(Request $request)
    {
        if ($request->user()->tokenCan('update')) {
            $p = Product::find($request->id);
            if ($p == null) {
                return response("404:Not found", 404);
            }
            $name = $request->name;
            $price = $request->price;
            $code = $request->code;
            if ($name != null) {
                $p->name = $name;
            }
            if ($price != null) {
                $p->price = $price;
            }
            if ($code != null) {
                $p->code = $code;
            }
            $p->save();
            return response(Product::where('id', $request->id)->get(['id', 'name', 'price', 'code']), 200);
        }
        return response('401:Unauthorized', 401);
    }

    public function delete(Request $request)
    {
        return response("405:Method not allowed", 405);

    }

    public function deleteId(Request $request) //check if he made it
    {
        $p = Product::find($request->id);
        if ($p == null) {
            return response("404:Not found", 404);
        }else{
            if ($request->user()->tokenCan('delete')) {
                $p->delete();
                return response('200:Ok', 200);
            } else {
                if ($p->token==$request->header('Authorization'))
                {
                    $p->delete();
                    return response('200:Ok', 200);
                }
                else{
                    return response('401:Unauthorized', 401);
                }

            }
        }
    }
}
