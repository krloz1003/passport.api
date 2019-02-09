<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
	public function all () {
		try {
			return response()->json(Product::all());
		} catch (\Exception $exception) {
			return response()->json($exception->getMessage());
		}
	}
}
