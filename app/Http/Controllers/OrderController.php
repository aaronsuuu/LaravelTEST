<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('ordered_date')->get();
        return view('pages.order.index', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('pages.order.create',
            [
                "customers" => $customers,
                "products" => $products,
                "suppliers" => $suppliers
            ]);
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
                'ordered_date' => 'required',
                'customer' => 'required',
                'product_id' => 'required',
                'product_quantity' => 'required|min:1',
                'product_price' => 'required|min:0'
            ]);

            $order = new Order();
            $order->ordered_date = $content['ordered_date'];
            $order->customer_id = $content['customer'];
            $order->save();

            // echo 'Order is saved, id: ' . $order->id;

            $products = $request->get('product_id');
            $quantities = $request->get('product_quantity');
            $prices = $request->get('product_price');

            // $json = array();
            for ($i = 0; $i < count($products); $i++) {
                // array_push($json, array("id"=> $i+1,"product_id"=> $products[$i], "quantity"=> $quantities[$i], "price"=> $prices[$i]));
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $products[$i];
                $orderItem->price = $prices[$i];
                $orderItem->quantity = $quantities[$i];
                $orderItem->save();
            }
            // echo json_encode($json);
            return redirect()->route('order.index')->with('notice', '訂單資料新增成功');

        }catch(ValidationException $exception){
            $validator = $exception->validator;
            $error = $validator->getMessageBag();
            $error_message = $error->getMessages();
            // return redirect()->route('order.index')->withErrors($error_message);
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $detail = Order::find($order->id);
        $total = 0;
        foreach ($detail->items as $item) {
            $total += $item->quantity * $item->price;
        }
        return view('pages.order.show', ['order' => $detail, 'total' => $total]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('pages.order.edit', [
            'order' => $order,
            'customers' => $customers,
            'products' => $products
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        try{
            $content = $request->validate([
                'ordered_date' => 'required',
                'customer' => 'required',
                'product_id' => 'required',
                'product_quantity' => 'required|min:1',
                'product_price' => 'required|min:0'
            ]);

            // echo json_encode($request->get('product_id'));

            $update = Order::find($order->id);
            $update->ordered_date = $content['ordered_date'];
            $update->customer_id = $content['customer'];
            $update->save();

            $delete_items = OrderItem::where('order_id', $order->id);
            $delete_items->delete();

            // // echo 'Order is saved, id: ' . $order->id;

            $products = $request->get('product_id');
            $quantities = $request->get('product_quantity');
            $prices = $request->get('product_price');

            // // $json = array();
            for ($i = 0; $i < count($products); $i++) {
                // array_push($json, array("id"=> $i+1,"product_id"=> $products[$i], "quantity"=> $quantities[$i], "price"=> $prices[$i]));
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $products[$i];
                $orderItem->price = $prices[$i];
                $orderItem->quantity = $quantities[$i];
                $orderItem->save();
            }
            // // echo json_encode($json);
            return redirect()->route('order.index')->with('notice', '訂單資料編輯成功');

        }catch(ValidationException $exception){
            $validator = $exception->validator;
            $error = $validator->getMessageBag();
            $error_message = $error->getMessages();
            // return redirect()->route('order.index')->withErrors($error_message);
            echo $error_message;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        $orderItems = OrderItem::where('order_id', $id);
        $orderItems->delete();
        return redirect()->route('order.index')->with('notice', '產品資料刪除 成功');
    }
}
