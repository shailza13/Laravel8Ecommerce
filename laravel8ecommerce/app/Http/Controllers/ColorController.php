<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data']=Color::all();
        return view('admin/color',$result);
    }


    public function manage_color()
    {
        return view('admin/manage_color');
    }

     public function manage_color_process(Request $request)
    {
        $request->validate([
            'color'=>'required|unique:colors,color',
        ]);
        $model=new Color();
        $model->color=$request->post('color');
        // $model->size=$request->post('size');
        $model->status=1;
        $model->save();
        $request->session()->flash('message','Color Inserted');
        return redirect('admin/color');
    }

    public function manage_color_edit($id)
    {
        $result['data']=Color::where(['id'=>$id])->get();
        return view('admin/update_color',$result);
    }

    public function manage_color_update(Request $request)
    {
          $request->validate([
            'color'=>'required',
            $request->post('id'),
        ]);
        $result=Color::where(['id'=>$request->post('id')])->first();
        $result->color=$request->post('color');
        $result->update();
        $request->session()->flash('message','Color Updated');
        return redirect('admin/color');
        // $result->update();
    }
      public function status(Request $request,$status,$id)
    {
        echo $status;
        echo $id;
       $model=Color::find($id);
       $model->status=$status;
       $model->save();
       $request->session()->flash('message','Color Status Updated');
       return redirect('admin/color');
    }
    public function delete(Request $request,$id)
    {
       $model=Color::find($id);
       $model->delete();
       $request->session()->flash('message','Color Deleted');
        return redirect('admin/color');
    }
}
