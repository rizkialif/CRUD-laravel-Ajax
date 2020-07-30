<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataBuku;
use App\Http\Resources\DataBuku as DataBukuResource;

class ListController extends Controller
{
    //

    public function simpan(Request $request){

        $listbuku = new DataBuku();
        $listbuku->namabuku=$request->input('namabuku');
        $listbuku->harga=$request->input('harga');

        $listbuku->save();
        return response()->json($listbuku);
    }

    public function show(){
        $listbuku = DataBuku::all();
        return DataBukuResource::collection($listbuku);
    }

    public function showbyid($id){
        $listbuku = DataBuku::find($id);
        if($listbuku){
            return new DataBukuResource($listbuku);
        }else{
            return response()->json(['Error' => 'There is no data with id: '.$id.' '],404);
        }
        
    }

    public function update(Request $request, $id){

        $listbuku = DataBuku::find($id);
        if($listbuku){

            $listbuku->namabuku=$request->input('namabuku');
            $listbuku->harga=$request->input('harga');

            $listbuku->save();
            return new DataBukuResource($listbuku);

        }else{
            return response()->json(['Error' => 'There is no data with id: '.$id.' '],404);
        }
    }

    public function deletedata($id){
        $listbuku = DataBuku::find($id);
        if($listbuku){
            $listbuku->delete();
            return new DataBukuResource($listbuku);
        }else{
            return response()->json(['Error' => 'There is no data with id: '.$id.' '],404);
        }
        
    }
}
