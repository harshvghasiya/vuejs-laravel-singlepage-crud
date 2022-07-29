<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $all_user=User::all();
        return view('index');
    }

    public function alluser()
    {
        $all_user=User::get();

        if($all_user == null){
            return response()->json(['message'=>'No User Found'],404);
        }
        return response()->json($all_user);
    }

    public function singleuser(Request $request)
    {
        $id=$request->id;
        $single_user=User::where('id',$id)->first();
        if($single_user == null){
            return response()->json(['message'=>'User Not Found']);
        }

        return response()->json($single_user);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        if($request->id == null){

            $res= new User;
            $msg="User Created";
        }else{
            $res=User::find($request->id);
            $msg="User Updated Successfully";
        }
        $res->name=$request->name;
        $res->email=$request->email;
        $res->password= \Hash::make($request->password);
        $res->save();

        return response()->json(['msg'=>$msg],200);
    }

    public function update(Request $request,$id)
    {
        $res=User::find($id);
        if($res != null){
            $res->email=$request->email;
            $res->password=\Hash::make($request->password);
            $res->name=$request->name;
            $res->save();

            return response()->json(['msg'=>'User Updated Successfully'],200);
        }

        return response()->json(['msg'=>'User Not Found'],404);
    }

    public function destroy(Request $request)
    {   
        $id=$request->id;
        User::where('id',$id)->delete();
        return response()->json(['msg'=>'User Deleted Successfully']);
    }
}

