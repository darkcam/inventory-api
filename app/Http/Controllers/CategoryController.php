<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // Listar categorías
    public function index()
    {
        return Category::paginate(10);
    }

    // Ver categoría
    public function show($id)
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Category not found'], 404);
        return $category;
    }

    // Crear categoría (solo admin)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string'
        ]);
        $category = Category::create($validated);
        return response()->json($category, 201);
    }

    // Actualizar categoría (solo admin)
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Category not found'], 404);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:100',
            'description' => 'nullable|string'
        ]);
        $category->update($validated);
        return response()->json($category);
    }

    // Eliminar categoría (solo admin)
    public function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) return response()->json(['message' => 'Category not found'], 404);
        $category->delete();
        return response()->json(['message' => 'Category deleted']);
    }
}
