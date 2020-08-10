<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);
        return view('admin.categories.index')->with(compact('categories'));//listado
    }
    
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, Category::$rules, Category::$messages);
        //($request->all());   Registra todos los campos que trae el Request
        //Registra categoria en BD
        Category::create($request->all());

        return redirect('/admin/categories');
    }


    public function edit(Category $category)
    {
        //return "Mostrar aqui el form para el producto con id $id";
        return view('admin.categories.edit')->with(compact('category'));//form de edicion
    }

    public function update(Request $request, Category $category)
    {

        $this->validate($request,Category::$rules,Category::$messages);
        //dd($request->all());
        $category->update($request->all());

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        //dd($request->all());
        //$product = Product::find($id);
        $category->delete();//Elimina

        return back();
    }
}
