<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('pages.supplier.index', ['suppliers' => $suppliers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.supplier.create');
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
                'name' => 'required',
                'phone' => 'required|regex:/[0-9]{10}/',
                'address' => 'required'
            ]);
            $supplier = new Supplier();
            $supplier->name = $content['name'];
            $supplier->phone = $content['phone'];
            $supplier->address = $content['address'];
            if($supplier->save())
                return redirect()->route('supplier.index')->with('notice', '供應商資料新增成功!');
            else
                return redirect()->back()->with('error', '資料新增失敗，請洽工程師');
        }
        catch(ValidationException $exception){
            $validator = $exception->validator;
            $error = $validator->getMessageBag();
            $error_message = $error->getMessages();
            // return redirect()->route('supplier.index')->withErrors($error_message);
            return redirect()->back()->withErrors($validator)->withInput();
            // echo json_encode($error_message);
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
        $supplier = Supplier::find($id);
        return view('pages.supplier.show', ['supplier' => $supplier]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('pages.supplier.edit', ['supplier' => $supplier]);
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
        try{
            $content = $request->validate([
                'name' => 'required',
                'phone' => 'required|regex:/[0-9]{10}/',
                'address' => 'required'
            ]);
            $supplier = Supplier::find($id);
            $supplier->name = $content['name'];
            $supplier->phone = $content['phone'];
            $supplier->address = $content['address'];
            if($supplier->save())
                return redirect()->route('supplier.index')->with('notice', '供應商資料修改成功!');
            else
                return redirect()->back()->with('error', '資料修改失敗，請洽工程師');
        }
        catch(ValidationException $exception){
            $validator = $exception->validator;
            $error = $validator->getMessageBag();
            $error_message = $error->getMessages();
            // return redirect()->route('supplier.index')->withErrors($error_message);
            return redirect()->back()->withErrors($validator)->withInput();
            // echo json_encode($error_message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 這邊之後要加入刪除警告
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect()->route('supplier.index')->with('notice', '資料刪除成功');
    }
}
