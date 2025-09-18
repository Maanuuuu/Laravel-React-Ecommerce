<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return[
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Products::all()->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
        ]);
        return 'ok (use create method for product creation)';
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return response()->json([
            'message' => 'Product retrieved successfully',
            'data' => $product
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Products $product)
    {
        Gate::authorize('modify', $product);
        $fields = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'price' => 'sometimes|required|decimal:0,2',
            'description' => 'sometimes|nullable|string',
            'stock' => 'sometimes|required|integer',
        ]);
        $product->update($fields);
        return response()->json([
            'message' => 'Product updated successfully',
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        Gate::authorize('modify', $product);
        $product->delete();
        return response()->json([   
            'message' => 'Product deleted successfully'
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable|string',
            'stock' => 'required|integer',
        ]);

        $product = $request->user()->products()->create($request->all());

        return response()->json([
            'message' => 'Product created successfully',
            'data' => $product
        ], 201);
    }
}
