<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CatModel;
use App\Http\Requests\CatRequest;
class AdminCatController extends Controller
{
	public function __construct(CatModel $catModel){
		$this->catModel = $catModel;
	}
    public function index(){
    	$items=$this->catModel->getItems();
    	return view('admin.cat.index',compact('items'));
    }
    public function getEdit($id){
    	$item=$this->catModel->getItem($id);
    	return view('admin.cat.edit',compact('item'));
    }
    public function postEdit($id,CatRequest $req){
    	$this->catModel->updateItem($id,$req);
    	return redirect()->route('admin.cat.index');
    }
    public function getAdd(){

    	return view('admin.cat.add');
    }
    public function postAdd(CatRequest $req){
    	$this->catModel->addItem($req);
    	return redirect()->route('admin.cat.index');
    }
     public function del($id){
    	$this->catModel->del($id);
    	return redirect()->route('admin.cat.index');
    }
}
