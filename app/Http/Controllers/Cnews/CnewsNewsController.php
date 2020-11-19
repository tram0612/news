<?php

namespace App\Http\Controllers\Cnews;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StoryModel;
use App\Model\CatModel;

class CnewsNewsController extends Controller
{
	public function __construct(StoryModel $storyModel,CatModel $catModel){
		$this->storyModel=$storyModel;
		$this->catModel=$catModel;
	}
    public function index(){
    	$items=$this->storyModel->getItems();
    	
    	return view('cnews.news.index',compact('items'));
    }
    
    public function cat($slug,$cid){
    	$nameCat=$this->catModel->getItem($cid);
    	$storiesCat=$this->storyModel->relatedCat($cid);
    	
    	return view('cnews.news.cat',compact(['nameCat','storiesCat']));
    }
    public function detail($slug,$id){
    	$item=$this->storyModel->getItem($id);
    	$relatedItems=$this->storyModel->relatedItem($id);
    	
    	return view('cnews.news.detail',compact('item','relatedItems'));
    }
    public function count(Request $req){
        //dd($req);
        $id=$req->story_id;
        //dd($id);
        $this->storyModel->count($id);

        return redirect()->route('cnews.news.detail');
        
    }
    
}
