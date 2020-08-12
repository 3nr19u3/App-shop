<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use File;

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
        $category=Category::create($request->only('name','description'));
        if($request->hasfile('image')){
            $file = $request->file('image');
            $path = public_path().'/images/categories';
            $fileName = uniqid().'-'.$file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //update category
            if($moved){
                $category->image=$fileName;
                $category->save();//Update
            }
        }

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
        $category->update($request->only('name','description'));

        if($request->hasfile('image')){
            $file = $request->file('image');
            $path = public_path().'/images/categories';
            $fileName = uniqid().'-'.$file->getClientOriginalName();
            $moved = $file->move($path, $fileName);

            //update category
            if($moved){
                $previousPath = $path.'/'.$category->image;
                $category->image=$fileName;
                $saved = $category->save();//Update
                
                if($saved)
                File::delete($previousPath);
            }
        }

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
