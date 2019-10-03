<?php

namespace App\Http\Controllers\Country;

use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CountryModel;
use Validator;

class CountryController extends Controller
{
    public function country(){
        return response()->json(CountryModel::get(),200);
    }
    public function countryByID($id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message"=>"This Record is Not Found"],404);
        }
        return response()->json($country,200);
    }
    public function countrySave(Request $request){
        $rules = [
            'name' => 'required',
            'iso' => 'required|min:3'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $country = CountryModel::create($request->all());
        return response()->json($country,201);
    }
    public function countryUpdate(Request $request,$id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message"=>"This Record is Not Here"],404);
        }
        $country->update($request->all());
        return response()->json($country,200);
    }
    /*public function countryDelete($id){
        $country = CountryModel::destroy($id);
        return response()->json($country,200);
    }*/
    public function countryDelete(Request $request,$id){
        $country = CountryModel::find($id);
        if(is_null($country)){
            return response()->json(["message"=>"This Record is Not Exist"],404);
        }
        $country->delete();
        return response()->json(null,204);
    }
}
