<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\CatRequest;
class CatModel extends Model
{
    protected $table='cat';
    protected $primaryKey='cat_id';
    public $timestamps=false;

    public function  getItems(){
    	return DB::table('cat')->orderBy('cat_id','DESC')->get();
    }
    public function  getItem($id){
    	return DB::table('cat')->where('cat_id',$id)->first();
    }
    
    public function updateItem($id,$req){
    	$cat=CatModel::find($id,'cat_id');
        $cat->name=$req->name;
        $cat->update();
    }
    public function addItem($req){
    	$arCat=array('name'=>$req->name);
    	
    	if(DB::table('cat')->insertGetId($arCat)) {
    		$req->session()->flash('msg','Thêm thành công');
    	}
    	return DB::table('cat')->orderBy('cat_id','DESC');

    }
    public function del($id){
    	$cat=CatModel::find($id,'cat_id');
    	$cat->delete();

    }


}
