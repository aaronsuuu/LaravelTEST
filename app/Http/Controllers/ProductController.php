<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('pages.product.index', ['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('pages.product.create', ['suppliers'=>$suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $content = $request->validate([
                'name'=>'required',
                'price'=>'required|numeric',
                'supplier'=>'required',
            ]);
            $product = new Product();
            $product->name = $content['name'];
            $product->price = $content['price'];
            $product->supplier_id = $content['supplier'];

            if($product->save()){
                $inventory = new Inventory();
                $inventory->product_id = $product->id;
                $inventory->save();
                return redirect()->route('product.index')->with('notice', '產品新增成功');
            }

            else
                return redirect()->back()->with('error', '產品新增失敗，請洽工程師');
            // return redirect()->route('product.index')->with('notice', '產品資料新增成功');

        }
        catch(ValidationException $exception){
            $validator = $exception->validator;
            $error = $validator->getMessageBag();
            $error_message = $error->getMessages();
            // return redirect()->route('supplier.index')->withErrors($error_message);
            return redirect()->back()->withErrors($validator)->withInput();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suppliers = Supplier::all();
        $product = Product::find($id);
        return view('pages.product.edit', ['product'=>$product, 'suppliers'=>$suppliers]);
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
        $content = $request->validate([
            'name'=>'required',
            'price'=>'required|numeric|min:0',
            'supplier'=>'required',
        ]);
        $product = Product::find($id);
        $product->name = $content['name'];
        $product->price = $content['price'];
        $product->supplier_id = $content['supplier'];
        $product->save();

        return redirect()->route('product.index')->with('notice', '產品資料修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product->delete()){
            $inventory = $product->inventory;
            $inventory->delete();
            return redirect()->route('product.index')->with('notice', '產品資料刪除 成功');
        }
    }
}
