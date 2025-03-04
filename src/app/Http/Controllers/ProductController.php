<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)//商品一覧
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }

        $products = $query->paginate(6);

        return view('products.index', compact('products'));
    }

    public function show($productId)//商品詳細
    {
        $product = Product::findOrFail($productId);
        return view('products.show', compact('product'));
    }

    public function register()//商品登録
    {
        return view('products.register');
    }

    public function store(Request $request)//新しい商品をデータベースに保存
    {
        $product = new Product($request->all());
        $product->save();
        return redirect()->route('products.index');
    }

    public function update(Request $request, $id)//商品更新
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function search(Request $request)//商品の検索結果
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
        }

        $products = $query->paginate(6);

        return view('products.index', compact('products', 'search'));
    }

    public function destroy($id)//商品の削除
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }

}
