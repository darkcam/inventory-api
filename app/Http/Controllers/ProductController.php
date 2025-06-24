<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
     // Listar productos
     public function index()
     {
         return Product::with('category')->paginate(10);
     }
 
     // Ver detalle producto
     public function show($id)
     {
         $product = Product::with('category')->find($id);
         if (!$product) return response()->json(['message' => 'Producto no encontrado'], 404);
         return $product;
     }
 
     // Crear producto (solo admin)
     public function store(Request $request)
     {
         $validated = $request->validate([
             'category_id' => 'required|exists:categories,id',
             'name' => 'required|string|max:100',
             'description' => 'nullable|string',
             'price' => 'required|numeric|min:0',
             'stock' => 'required|integer|min:0'
         ]);
         $product = Product::create($validated);
         return response()->json($product, 201);
     }
 
     // Actualizar producto (solo admin)
     public function update(Request $request, $id)
     {
         $product = Product::find($id);
         if (!$product) return response()->json(['message' => 'Producto no encontrado'], 404);
 
         $validated = $request->validate([
             'category_id' => 'sometimes|exists:categories,id',
             'name' => 'sometimes|string|max:100',
             'description' => 'nullable|string',
             'price' => 'sometimes|numeric|min:0',
             'stock' => 'sometimes|integer|min:0'
         ]);
         $product->update($validated);
         return response()->json($product);
     }
 
     // Eliminar producto (solo admin)
     public function destroy($id)
     {
         $product = Product::find($id);
         if (!$product) return response()->json(['message' => 'Producto no encontrado'], 404);
         $product->delete();
         return response()->json(['message' => 'Producto eliminado correctamente']);
     }
}
