<?php

namespace App\Http\Controllers\Cnews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\CatModel;
class CnewsIndexController extends Controller
{
	public function __construct(CatModel $catModel){
		$this->catModel =$catModel;
	}
	
    public function index(CatModel $catModel){
    	$cats=$this->catModel->getItems();
    	return view('cnews.index.index',compact('cats'));
    }
}
