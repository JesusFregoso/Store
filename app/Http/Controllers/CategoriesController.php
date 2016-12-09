<?php

namespace test\Http\Controllers;

use Illuminate\Http\Request;
use test\Http\Requests;
use test\Models\Categorie;
use test\Connection\Connection;
use Illuminate\Support\Facades\Redirect;
use test\Http\Requests\CategoriesFormRequest;
use DB;

class CategoriesController extends Controller
{
    function __construct()
    {
        
    }

    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $category = new Categorie;
            $connection = new Connection;
            $connection->changeConnection('otraconexion');
            $categories = $category->where('name','LIKE','%'.$query.'%')
            ->where('condition','=','1')
            ->orderBy('id','desc')
            ->paginate(7);
            return view('store.categories.index',['categories'=>$categories,'searchText'=>$query]);
        }
    }

    public function create()
    {
    	return view('store.categories.create');
    }

    public function store(CategoriesFormRequest $request)
    {
    	$category = new Categorie;
    	$category->name = $request->get('name');
    	$category->description = $request->get('description');
    	$category->condition = '1';
    	$category->save();
    	return Redirect::to('store/categories');
    }

    public function show($id)
    {
    	return view('store.categories.show',['category'=>Categorie::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view('store.categories.edit',['category'=>Categorie::findOrFail($id)]);
    }

    public function update(CategoriesFormRequest $request,$id)
    {
    	$category = Categorie::findOrFail($id);
    	$category->name = $request->get('name');
    	$category->description = $request->get('description');
    	$category->update();
    	return Redirect::to('store/categories');
    }

    public function destroy($id)
    {
    	$category =Categorie::findOrFail($id);
    	$category->condition = '0';
    	$category->update();

    	return Redirect::to('store/categories');
    }

}
