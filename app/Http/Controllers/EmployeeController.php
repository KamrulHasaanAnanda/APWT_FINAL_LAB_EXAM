<?php
namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Http\ProductRequest;
use App\Http\Requests\ProductRequest;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        if($req->session()->has('username')){
            //$data=['id'=>'17-35091-2','name'=>'Ananda'];
            $id=$req->session()->get('uid');;
            $name=$req->session()->get('username');
            return view('employee.index', compact('id', 'name'));
        }else{
            $req->session()->flash('message','Invalid request');
            return view('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('employee.create');
    }
    public function store(ProductRequest $req)
    {   
               $product = new Product();
               $product->pname     = $req->pname;
               $product->pprice    = $req->pprice;
              // $product->pprice    = $req->name;
               $product->quantity  = $req->quantity;
               if($product->save()){
                   return redirect()->route('employee.productlist');
               }else{
                   return back();
               }
    }
     
    public function show()
    {
        //
        $product  = Product::all();
        print_r($product);
        //return view('employee.productlist')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);       
    return view('home.edit', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $product = Users::find($id); 
        $product->pname     = $req->pname;
        $product->password     = $req->pprice;
        $product->quantity         = $req->quantity; 
        $product->save();

        return redirect()->route('employee.productlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            $req->session()->flash('msg', 'Product Deleted!');
            return redirect('/product');
        } else {
            $req->session()->flash('msg', 'Product Not Found!');
            return redirect('/product');
        }
    }
}
