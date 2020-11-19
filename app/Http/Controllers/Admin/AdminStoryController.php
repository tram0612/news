<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StoryModel;
use App\Http\Requests\StoryRequest;
use Illuminate\Routing\UrlGenerator;
class AdminStoryController extends Controller
{
	public function __construct(StoryModel $storyModel){
		$this->storyModel = $storyModel;
	}
    public function index(){
    	$items=$this->storyModel->getItems();
    	
    	//dd($items);//in ra xong dừng lại
    	return view('admin.story.index',compact('items'));//gửi biến items ra view nhờ compact
    }
    public function getEdit($page,$id){
    	$item=$this->storyModel->getItem($id);
    	
    	//dd($item);
    	//return view('admin.edit');
    	return view('admin.story.edit',compact('item'));
    }
    public function postEdit($page,$id,StoryRequest $req){

        /*$req->validate([
            'name' => 'required|unique:story,name,'.$id.',story_id',
        ]);*/
    	$this->storyModel->updateItem($id,$req);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect('admin/story?page='.$page);
        
    }
    public function getAdd(){
    	
    	return view('admin.story.add');
    }
    public function postAdd(StoryRequest $req){
    	$this->storyModel->addItem($req);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect()->route('admin.story.index');
    }
    public function del($page,$id){
        
    	$this->storyModel->del($id);
    	//dd($item);
    	//return view('admin.edit');
    	return redirect('admin/story?page='.$page);
    }
    public function search(Request $req){
        
       $items = $this->storyModel->search($req);
        //dd($items);
        //return view('admin.edit');
        return view('admin.story.search',compact('items','req'));
    }
}
