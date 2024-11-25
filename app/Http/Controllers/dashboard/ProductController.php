<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category', 'productPhotos')->get();
        $categories = Category::all();

        return view("dashboard.product", compact('products', 'categories'));
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
    public function store(StoreProductRequest $request)
    {
        $req = $request->validated();

        DB::beginTransaction();
        try {
            $product = Product::create([
                'category_id' => $req['category'],
                'name' => $req['name'],
                'sku' => $req['sku'],
                'description' => $req['description'],
                'price' => $req['price'],
                'stock' => $req['stock'],
                'weight' => $req['weight'],
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $path = $file->store('products', 'public');
                    $path = str_replace('public', 'storage', $path);

                    ProductPhoto::create([
                        'product_id' => $product->id,
                        'path' => $path,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('product.index')
                ->with([
                    'status' => [
                        'type' => 'success',
                        'msg' => 'Produk berhasil ditambah'
                    ]
                ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('product.index')
                ->with([
                    'status' => [
                        'type' => 'error',
                        'msg' => 'Produk gagal ditambah' . $th->getMessage()
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
        $product = Product::with(['category', 'productPhotos'])->findOrFail($id);

        return response()->json(['product' => new ProductResource($product)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id)
    {
        $req = $request->validated();

        if (!$request->has('photo_old') && !$request->hasFile('photos')) {
            return redirect()->back()->with([
                'status' => [
                    'type' => 'danger',
                    'msg' => 'Gagal memperbarui, setidaknya harus terdapat satu foto'
                ]
            ]);
        }

        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);

            $product->update([
                'category_id' => $req['category'],
                'name' => $req['name'],
                'sku' => $req['sku'],
                'description' => $req['description'],
                'price' => $req['price'],
                'stock' => $req['stock'],
                'weight' => $req['weight'],
            ]);

            if ($request->has('photo_old')) {
                ProductPhoto::where('product_id', $id)
                    ->whereNotIn('id', $req['photo_old'])
                    ->get()
                    ->each(function ($photo) {
                        Storage::disk('public')->delete($photo->path);
                        $photo->delete();
                    });
            } else {
                foreach ($product->productPhotos as $photo) {
                    Storage::disk('public')->delete($photo->path);
                    $photo->delete();
                }
            }

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $file) {
                    $path = $file->store('products', 'public');
                    $path = str_replace('public', 'storage', $path);

                    ProductPhoto::create([
                        'product_id' => $product->id,
                        'path' => $path,
                    ]);
                }
            }

            DB::commit();

            return redirect()->route('product.index')->with([
                'status' => [
                    'type' => 'success',
                    'msg' => 'Produk berhasil diperbarui'
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('product.index')->with([
                'status' => [
                    'type' => 'danger',
                    'msg' => 'Produk gagal diperbarui: ' . $th->getMessage()
                ]
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::beginTransaction();
        try {
            $product = Product::findOrFail($id);

            foreach ($product->productPhotos as $photo) {
                Storage::disk('public')->delete($photo->path);
                $photo->delete();
            }

            $product->delete();

            DB::commit();

            return redirect()->route('product.index')->with([
                'status' => [
                    'type' => 'success',
                    'msg' => 'Produk berhasil dihapus'
                ]
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return redirect()->route('product.index')->with([
                'status' => [
                    'type' => 'danger',
                    'msg' => 'Produk gagal dihapus: ' . $th->getMessage()
                ]
            ]);
        }
    }
}
