<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Idea;

class CategoryController extends Controller
{

    public function __construct()
    {        
        $this->middleware('auth');
    }

        public function index(){
            $categories = Category::all();

            return view('category.category') -> with(compact('categories'));
    }

        public function create(){
            return view('category.createcategory');
    }

        public function store(Request $request){    
            $category = new Category;
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            return redirect('/category')->with('success','Category created successfully');
        }

        public function edit(Category $category)
        {
            return view('category.editcategory',compact('category'));
        }  

        public function update(Request $request, Category $category)
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
    
            $category->update($request->all());
    
            return redirect('/category')->with('success','Category updated successfully');
        }   

        public function destroy(Category $category)
        {
            $category1 = DB::table('categories')
            ->where('categories.id', $category->id)
            ->join('ideas', 'ideas.category_id', '=', 'categories.id')
            ->select(array('categories.*', DB::raw('count(ideas.id) as ideas_count')))
            ->groupBy('ideas.category_id')
            ->get();
     
            if (empty($category1[0])) {
                $category->delete();
                return redirect('/category')->with('success','Category deleted successfully');
            }
            elseif ($category1[0]->ideas_count > 0) {
                return redirect('/category')->with('error','Category cannot be deleted because it has ideas');
            }

        }
} 



    

