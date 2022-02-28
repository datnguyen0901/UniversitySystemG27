<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
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
    
        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\category  $category
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Category $category)
        {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);
    
            $category->update($request->all());
    
            return redirect('/category')->with('success','Category updated successfully');
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\category  $category
         * @return \Illuminate\Http\Response
         */
        public function destroy(Category $category)
        {
            $category->delete();
    
            return redirect('/category')->with('success','Category deleted successfully');
        }
} 



    

