<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\tproducts as Products;


class ProductController extends Controller
{
    public function storeProduct(ProductRequest $request) {
        $data = $request->validated();
        // TODO: Store the product in the database.
        $results = Products::create($data);

        return $results; 
    }


    public function viewProducts () {
        return Products::orderBy('id', 'desc')->get();
    }

    public function imageUploader(Request $request){
        $path = $request->file("attachimage-product")->store("public/products");
        $replace = str_replace("public", "storage", $path);
        return $replace;
    }
}
