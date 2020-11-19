<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserModel extends Model
{
    protected $table ='users';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function getItems(){
    	//return $this->all();//this chính là UserModel <=> select *from users 
    	return DB::table('users')->orderBy('id','DESC')->paginate(4);//Phân 2 items/1trang sắp xếp giảm dần theo id

    }
    public function getItem($id){
    	return DB::table('users')->where('id',$id)->first();
    	//return this->find($id);
    }
    public function updateItem($id,$req){
       
        $user=UserModel::find($id);
        if($req->password==''){
             $user->password=$user->password;
        }
        $user->username=$req->username;
        
        $user->fullname=$req->fullname;
        $user->update();
    }
    public function addItem($req){
        $arUser=array(
            'username' => $req->username,
            'password'=>$req->password,
            'fullname'=>$req->fullname
        );
        if (DB::table('users')->insertGetId($arUser)){
            $req->session()->flash('msg','Thêm thành công');
        }
        else{
            $req->session()->flash('error','Có lỗi.Thêm không thành công');
        }
        return DB::table('users')->orderBy('id','DESC')->paginate(7);
        //return this->find($id);
    }
    public function del($id){
        $user=UserModel::find($id);
        $user->delete();
    }
}
