<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoryRequest;
class StoryModel extends Model
{
    protected $table ='story';
    protected $primaryKey = 'story_id';
    public $timestamps = false;

    public function getItems(){
    	//return $this->all();//this chính là UserModel <=> select *from users 
    	return DB::table('story as s')
    		->join('cat as c','s.cat_id','=','c.cat_id')
            ->select('s.*', 'c.cat_id as cid', 'c.name as cname')
    		->orderBy('s.story_id','desc')
    		->paginate(6);
            
    }
    public function getItem($id){
        //$story=StoryModel::where('story_id', '=', $id)->first();
        //$story->counter+=1;
       // $story->update();
        //return $this->all();//this chính là UserModel <=> select *from users 
        return DB::table('story as s')
            ->join('cat as c','s.cat_id','=','c.cat_id')
            ->where('story_id',$id)
            ->select('s.*', 'c.cat_id as cid', 'c.name as cname')
            ->first();
            
    }
    public function getStory($id){
        
        //return $this->all();//this chính là UserModel <=> select *from users 
        return DB::table('story as s')
            ->join('cat as c','s.cat_id','=','c.cat_id')
            ->where('story_id',$id)
            ->select('s.*', 'c.cat_id as cid', 'c.name as cname')
            ->first();
            
    }
    public function getIdCat($id){
        $item= StoryModel::getStory($id);
        $cid= $item->cid;
        return $cid;
    }
    public function getNameCat($id){
        $item= StoryModel::getStory($id);
        $cname= $item->cname;
        return $cname;
    }
    
    public function updateItem($id,$req){
        
        $story=StoryModel::where('story_id', '=', $id)->first();
        $story->name=$req->name;
        if($req->picture==''){
            $story->picture=$story->picture;
        }
        else{
            $file='/storage/app/files'.$story->picture;
            if (file_exists( $file )){
                unlink( $file);
            }
    
            $tmp=$req->file('picture')->store('files');
            $tmp=explode('/',$tmp);
            $picture=end($tmp);
             $story->picture=$picture;
        
        }
        if($req->cat==''){
            $story->cat_id=$story->cat_id;
        }
        else{
            $story->cat_id=$req->cat; 
        }
        if($req->preview==''){
            $story->preview_text=$story->preview_text;
        }
        else{
            $story->preview_text=$req->preview; 
        }
        if($req->detail==''){
            $story->detail_text=$story->detail_text;
        }
        else{
            $story->detail_text=$req->detail; 
        }
        if($req->created_at==''){
            $story->created_at=$story->created_at;
        }
        else{
            $story->created_at=$req->created_at; 
        }
       
       

        $story->update();
    }
    
    public function addItem($req){
        $tmp=$req->file('picture')->store('files');
        $tmp=explode('/',$tmp);
        $picture=end($tmp);
        
        $arStory=array(
            'name' => $req->name,
            'picture'=>$picture,

            'cat_id'=>$req->cat,        
            'preview_text'=>$req->preview,
            'detail_text'=>$req->detail,
            'counter'=>$req->counter,
            'created_at'=>$req->created_at,

            
        );

        if (DB::table('story')->insertGetId($arStory)){
            $req->session()->flash('msg','Thêm thành công');
        }
        else{
            $req->session()->flash('error','Có lỗi.Thêm không thành công');
        }
        return DB::table('story')->orderBy('id','DESC');
        //return this->find($id);
    }
    public function del($id){

       $story=StoryModel::where('story_id', '=', $id)->first();
       $file='/storage/app/files'.$story->picture;
            if (file_exists( $file )){
                unlink( $file);
            }
       $story->delete();
    }


    public function relatedItem($id){
        $cid= StoryModel::getIdCat($id);
        return DB::table('story as s') 
            ->join('cat as c','s.cat_id','=','c.cat_id')
            ->where([
                ['s.cat_id', '=', $cid],
                ['story_id', '!=', $id],
            ])->select('s.*', 'c.cat_id as cid', 'c.name as cname')->limit(3)->get();
            
    }
    public function relatedCat($cid){
         
        return DB::table('story as s') 
            ->join('cat as c','s.cat_id','=','c.cat_id')
            ->where(
                's.cat_id', '=', $cid
                
            )
            ->select('s.*', 'c.cat_id as cid', 'c.name as cname')
            ->paginate(5);
    }
    public function search($req){
        //dd($req);
        if($req->story_id!==null){
            return DB::table('story as s') 
            ->join('cat as c','s.cat_id','=','c.cat_id')
            ->where('story_id', '=', $req->story_id,)
            ->select('s.*', 'c.cat_id as cid', 'c.name as cname')
            ->paginate(5);
        }
        else{
            if ($req->cat==null){

               return DB::table('story as s') 
                ->join('cat as c','s.cat_id','=','c.cat_id')
                ->where('s.name', 'LIKE', '%' . $req->name . '%',)
                ->select('s.*', 'c.cat_id as cid', 'c.name as cname')
                ->paginate(5);
               

            }
            elseif($req->name==null){
               return DB::table('story as s') 
                ->join('cat as c','s.cat_id','=','c.cat_id')
                ->where('s.cat_id', '=', $req->cat)
                ->select('s.*', 'c.cat_id as cid', 'c.name as cname')
                ->paginate(5);
                //dd($i);
            }
            else
            {  
                //dd($req);
                return DB::table('story as s') 
                ->join('cat as c','s.cat_id','=','c.cat_id')
                ->where([
                    ['s.name', 'LIKE', '%' . $req->name . '%'],
                    ['s.cat_id', '=', $req->cat]
                ])
                ->select('s.*', 'c.cat_id as cid', 'c.name as cname')
                ->paginate(5);
            }
        }
    }
    public function count($id){
         
        $story=StoryModel::where('story_id', '=', $id)->first();
        $story->counter+=1;
        $story->update();
         
    }
}
