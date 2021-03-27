<?php

namespace App\Http\Controllers;

use App\Models\Coupen;
use Illuminate\Http\Request;

class CoupenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Coupen::all();
        return view('admin/coupen',$result);
    }


    public function manage_coupen()
    {
        return view('admin/manage_coupen');
    }

     public function manage_coupen_process(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupens',
            'value'=>'required'
        ]);
        $model=new Coupen();
        $model->title=$request->post('title');
        $model->code=$request->post('code');
        $model->value=$request->post('value');
        $model->save();
        $request->session()->flash('message','Coupen Inserted');
        return redirect('admin/coupen');
    }

    public function manage_coupen_edit($id)
    {
        $result['data']=Coupen::where(['id'=>$id])->get();
        return view('admin/update_coupen',$result);
    }

    public function manage_coupen_update(Request $request)
    {
          $request->validate([
            'title'=>'required',
            'code'=>'required|unique:coupens,code,'.$request->post('id'),
            'value'=>'required',
        ]);
        $result=Coupen::where(['id'=>$request->post('id')])->first();
        $result->title=$request->post('title');
        $result->code=$request->post('code');
        $result->value=$request->post('value');
        $result->update();
        return redirect('admin/coupen');
        // $result->update();
    }
    public function status(Request $request,$status,$id)
    {
        echo $status;
        echo $id;
       $model=Coupen::find($id);
       $model->status=$status;
       $model->save();
       $request->session()->flash('message','Coupen Status Updated');
       return redirect('admin/coupen');
    }
    public function delete(Request $request,$id)
    {
       $model=Coupen::find($id);
       $model->delete();
       $request->session()->flash('message','Coupen Deleted');
        return redirect('admin/coupen');
    }
}
