<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));//inyecta datos a la vista
    }
    
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));
    }

    public function store(Request $request)
    {
        //Messages
        $messages =[
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'Es necesario ingresar una descripcion para el producto.',
            'description.max' => 'El la descripcion del producto debe tener como maximo 200 caracteres.',
            'price.required' => 'Es necesario ingresar el precio del producto.',
            'price.numeric' => 'El precio del producto debe ser numerico.',
            'price.min' => 'Precio dle producto invalido.'

        ];

        //Validar
        $rules =[
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];

        $this->validate($request,$rules,$messages);
        //dd($request->all());
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();//INSERT

        return redirect('/admin/products');
    }


    public function edit($id)
    {
        //return "Mostrar aqui el form para el producto con id $id";
        $categories = Category::orderBy('name')->get();
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product', 'categories'));//form de edicion
    }

    public function update(Request $request, $id)
    {
        //Messages
        $messages =[
            'name.required' => 'Es necesario ingresar un nombre para el producto.',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'description.required' => 'Es necesario ingresar una descripcion para el producto.',
            'description.max' => 'El la descripcion del producto debe tener como maximo 200 caracteres.',
            'price.required' => 'Es necesario ingresar el precio del producto.',
            'price.numeric' => 'El precio del producto debe ser numerico.',
            'price.min' => 'Precio dle producto invalido.'

        ];

        //Validar
        $rules =[
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price' => 'required|numeric|min:0'
        ];

        $this->validate($request,$rules,$messages);
        //dd($request->all());
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save();//UPDATE

        return redirect('/admin/products');
    }

    public function destroy($id)
    {
        //dd($request->all());
        $product = Product::find($id);
        $product->delete();//Elimina

        return back();
    }


}
