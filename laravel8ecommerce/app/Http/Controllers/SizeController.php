<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index()
    {
        $result['data']=Size::all();
        return view('admin/size',$result);
    }


    public function manage_size()
    {
        return view('admin/manage_size');
    }

     public function manage_size_process(Request $request)
    {
        $request->validate([
            'size'=>'required|unique:sizes,size'
        ]);
        $model=new Size();
        $model->size=$request->post('size');
        $model->status=1;
        $model->save();
        $request->session()->flash('message','Size Inserted');
        return redirect('admin/size');
    }

    public function manage_size_edit($id)
    {
        $result['data']=Size::where(['id'=>$id])->get();
        return view('admin/update_size',$result);
    }

    public function manage_size_update(Request $request)
    {
          $request->validate([
            'size'=>'required|unique:sizes,size,'.$request->post('id'),
        ]);
        $result=Size::where(['id'=>$request->post('id')])->first();
        $result->size=$request->post('size');
        $result->update();
        return redirect('admin/size');
        // $result->update();
    }
      public function status(Request $request,$status,$id)
    {
        echo $status;
        echo $id;
       $model=Size::find($id);
       $model->status=$status;
       $model->save();
       $request->session()->flash('message','Size Status Updated');
       return redirect('admin/size');
    }
    public function delete(Request $request,$id)
    {
       $model=Size::find($id);
       $model->delete();
       $request->session()->flash('message','Size Deleted');
        return redirect('admin/size');
    }
}
