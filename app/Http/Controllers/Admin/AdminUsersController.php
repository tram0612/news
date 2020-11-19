<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Model\UserModel;

class AdminUsersController extends Controller
{
	public function __construct(UserModel $userModel){
		$this->userModel = $userModel;
	}
    public function index(){
    	$items=$this->userModel->getItems();
    	//dd($items);//in ra xong dừng lại
    	return view('admin.users.index',compact('items'));//gửi biến items ra view nhờ compact
    }
    public function getEdit($page,$id){
    	$item=$this->userModel->getItem($id);
    	//dd($item);
    	//return view('admin.edit');
    	return view('admin.users.edit',compact('item'));
    }
    public function postEdit($page,$id,UserRequest $req){
    	$this->userModel->updateItem($id,$req);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect('/admin/users?page='.$page);
    }
    public function getAdd(){
    	return view('admin.users.add');
    }
    public function postAdd(UserRequest $req){
    	$this->userModel->addItem($req);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect()->route('admin.users.index');
    }
    public function del($page,$id){
    	$this->userModel->del($id);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect('/admin/users?page='.$page);
    }
}
