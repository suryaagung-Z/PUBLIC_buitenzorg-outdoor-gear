<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::with('products')->get();

        return view('dashboard.category', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $req = $request->validated();

        try {
            Category::create([
                'name' => $req['name']
            ]);

            return redirect()
                ->route('category.index')
                ->with([
                    'status' => [
                        'type' => 'success',
                        'msg' => 'Kategori berhasil ditambah',
                    ]
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->route('category.index')
                ->with([
                    'status' => [
                        'type' => 'danger',
                        'msg' => 'Kategori gagal ditambah' . $e->getMessage(),
                    ]
                ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ctg = Category::findOrFail($id);

        return response()->json(['category' => $ctg]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $ctg = Category::findOrFail($id);
        $req = $request->validated();

        try {
            $ctg->name = $req['name'];
            $ctg->save();

            return redirect()
                ->route('category.index')
                ->with([
                    'status' => [
                        'type' => 'success',
                        'msg' => 'Kategori berhasil diperbarui',
                    ]
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->route('category.index')
                ->with([
                    'status' => [
                        'type' => 'danger',
                        'msg' => 'Kategori gagal diperbarui' . $e->getMessage(),
                    ]
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ctg = Category::with('products')->findOrFail($id);

        if ($ctg->products->count() > 0) {
            return redirect()
                ->route('category.index')
                ->with([
                    'status' => [
                        'type' => 'danger',
                        'msg' => 'Kategori tidak dapat dihapus karena masih terdapat produk di dalamnya',
                    ]
                ]);
        }

        try {
            $ctg->delete();

            return redirect()
                ->route('category.index')
                ->with([
                    'status' => [
                        'type' => 'success',
                        'msg' => 'Kategori berhasil dihapus',
                    ]
                ]);
        } catch (\Exception $e) {
            return redirect()
                ->route('category.index')
                ->with([
                    'status' => [
                        'type' => 'danger',
                        'msg' => 'Kategori gagal dihapus: ' . $e->getMessage(),
                    ]
                ]);
        }
    }
}
