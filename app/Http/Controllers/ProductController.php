<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Redirect;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['productos'] = Product::orderBy('idProducts','asc')->paginate(4);
        return view('producto.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombreProducto' => 'required',
            'codigoProducto' => 'required',
            'descripcionProducto' => 'required',
        ]);

        Product::create($request->all());

        return Redirect::to('producto')
        ->with('success','Producto creado satisfactoriamente.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $idProducts
     * @return \Illuminate\Http\Response
     */
    public function show($idProducts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $idProducts
     * @return \Illuminate\Http\Response
     */
    public function edit($idProducts)
    {
        $where = array('idProducts' => $idProducts);
        $data['product_info'] = Product::where($where)->first();
     
        return view('producto.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $idProducts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idProducts)
    {
        $request->validate([
            'nombreProducto' => 'required',
            'codigoProducto' => 'required',
            'descripcionProducto' => 'required',
        ]);
         
        $update = ['nombreProducto' => $request->nombreProducto, 'descripcionProducto' => $request->descripcionProducto];
        Product::where('idProducts',$idProducts)->update($update);
   
        return Redirect::to('producto')
       ->with('success','Produto actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $idProducts
     * @return \Illuminate\Http\Response
     */
    public function destroy($idProducts)
    {
        //
    }
}
