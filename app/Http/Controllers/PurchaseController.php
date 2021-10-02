<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseItem;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('pages.purchase.index', ['purchases' => $purchases]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('pages.purchase.create', ['suppliers' => $suppliers]);
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
                'date' => 'required',
                'supplier' => 'required',
                'product_id' => 'required',
                'quantity' => 'required|min:1',
                'price' => 'required|min:0'
            ]);

            $purchase = new Purchase();
            $purchase->supplier_id = $content['supplier'];
            $purchase->date = $content['date'];
            $purchase->save();

            $product_ids = $request->get('product_id');
            $quantities = $request->get('quantity');
            $prices = $request->get('price');

            for ($i=0; $i < count($product_ids); $i++) {
                $item = new PurchaseItem();
                $item->purchase_id = $purchase->id;
                $item->product_id = $product_ids[$i];
                $item->quantity = $quantities[$i];
                $item->price = $prices[$i];
                $item->save();
            }
            return redirect()->route('purchase.index')->with('notice', '進貨單資料新增成功');
        }
        catch(ValidationException $exception){
            $validator = $exception->validator;
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
        $purchase = Purchase::find($id);
        $suppliers = Supplier::all();
        return view('pages.purchase.edit', ['purchase'=> $purchase, 'suppliers'=> $suppliers]);
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
        return $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purchase = Purchase::find($id);
        if($purchase->purchaseItems)
            $purchase->purchaseItems()->delete();
        $purchase->delete();
        return redirect()->route('purchase.index')->with('notice', '進貨單刪除成功！');
    }

    public function getProducts(Request $request){
        // $products = Product::where('supplier_id', $request->supplier_id);
        $products = Product::where('supplier_id', $request->supplier_id)->get(['id', 'name', 'price', 'supplier_id']);
        return response(['products' => $products], Response::HTTP_OK);
        // return $request->supplier_id;
    }
}
