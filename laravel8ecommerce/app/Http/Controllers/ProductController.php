<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        $result['data']=Product::all();
        return view('admin/product',$result);
    }


    public function manage_product()
    {
        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        return view('admin/manage_product',$result);
    }

     public function manage_product_process(Request $request)
    {
        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'slug'=>'required|unique:products,slug,'.$request->post('id'),
        ]);
        $model=new Product();
        $model->category_id=$request->post('category_id');
        $model->name=$request->post('name');
        $model->slug=$request->post('slug');
        // $model->image=$request->post('image');
        $model->brand=$request->post('brand');
        $model->model=$request->post('model');
        $model->short_desc=$request->post('short_desc');
        $model->desc=$request->post('desc');
        $model->keywords=$request->post('keywords');
        $model->technical_specification=$request->post('technical_specification');
        $model->uses=$request->post('uses');
        $model->warranty=$request->post('warranty');
        $model->status=1;
         if($request->hasfile('image'))
        {
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;
        }
        $model->save();
        $request->session()->flash('message','Product Inserted');
        return redirect('admin/product');


    }

    public function manage_product_edit($id)
    {
        $result['category']=DB::table('categories')->where(['status'=>1])->get();
        $result['data']=Product::where(['id'=>$id])->get();
        return view('admin/update_product',$result);
    }

    public function manage_product_update(Request $request)
    {
          $request->validate([
            'name'=>'required',
            'slug'=>'required|unique:products,slug,'.$request->post('id'),
        ]);
        $result=Product::where(['id'=>$request->post('id')])->first();
        $result->category_id=$request->post('category_id');
        $result->name=$request->post('name');
        $result->slug=$request->post('slug');
        $result->brand=$request->post('brand');
        $result->model=$request->post('model');
        $result->short_desc=$request->post('short_desc');
        $result->desc=$request->post('desc');
        $result->keywords=$request->post('keywords');
        $result->technical_specification=$request->post('technical_specification');
         $result->uses=$request->post('uses');
          $result->warranty=$request->post('warranty');
        $result->update();
        $request->session()->flash('message','Product Updated');
        return redirect('admin/product');
        // $result->update();
    }
      public function status(Request $request,$status,$id)
    {
        echo $status;
        echo $id;
       $model=Product::find($id);
       $model->status=$status;
       $model->save();
       $request->session()->flash('message','Product Status Updated');
       return redirect('admin/product');
    }
    public function delete(Request $request,$id)
    {
       $model=Product::find($id);
       $model->delete();
       $request->session()->flash('message','ProductController Deleted');
        return redirect('admin/product');
    }
}
