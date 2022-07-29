<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserApiController extends Controller
{
    public function index()
    {
        $all_user=User::all();
        return response()->json(['all_user'=>$all_user],200);
    }

    public function store(Request $request)
    {
        $res= new User;
        $res->name=$request->name;
        $res->email=$request->email;
        $res->password= \Hash::make($request->password);
        $res->save();

        return response()->json(['msg'=>'User Stored Successfully'],200);
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

    public function destroy($id)
    {
        User::where('id',$id)->delete();
        return response()->json(['msg'=>'User Deleted Successfully']);
    }
}

