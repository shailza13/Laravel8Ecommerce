<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Category::all();
        return view('admin/category',$result);
    }


    public function manage_category()
    {
        return view('admin/manage_category');
    }

     public function manage_category_process(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories'
        ]);
        $model=new Category();
        $model->category_name=$request->post('category_name');
        $model->category_slug=$request->post('category_slug');
        $model->status=1;
        $model->save();
        $request->session()->flash('message','Category Inserted');
        return redirect('admin/category');
    }

    public function manage_category_edit($id)
    {
        $result['data']=Category::where(['id'=>$id])->get();
        return view('admin/update_category',$result);
    }

    public function manage_category_update(Request $request)
    {
          $request->validate([
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
        ]);
        $result=Category::where(['id'=>$request->post('id')])->first();
        $result->category_name=$request->post('category_name');
        $result->category_slug=$request->post('category_slug');
        $result->update();
        return redirect('admin/category');
        // $result->update();
    }
      public function status(Request $request,$status,$id)
    {
        echo $status;
        echo $id;
       $model=Category::find($id);
       $model->status=$status;
       $model->save();
       $request->session()->flash('message','Category Status Updated');
       return redirect('admin/category');
    }
    public function delete(Request $request,$id)
    {
       $model=Category::find($id);
       $model->delete();
       $request->session()->flash('message','Category Deleted');
        return redirect('admin/category');
    }
}
