<?php
namespace App\repository;
use App\repository\Expanse_Repo_I;
use App\models\Expanses;
use Illuminate\Http\Request;
class Expanse_Repo_Impl implements Expanse_Repo_I{

    public function save(Request $request){
        $expanse = new Expanses();
        $expanse = $this->setExpanseValues($request, $expanse)->save();
        return $expanse;
    }
    public function update(Request $request){
        $expanse = Expanses::find($request->id);
        $this->setExpanseValues($request, $expanse)->save();
        return $expanse;
    }
    public function delete($id){
        $expanse = Expanses::find($id);
        if($expanse !=null){
            $expanse->delete();
            $status = true;
        }
        else{
            $status = false;
        }
        return $status;
    }

    public function getAll(Request $request){
        $per_page = $request->per_page;
        $sort_by = $request->sort_by;
        $sort_on = $request->sort_on;
        $postID = $request->postID;   
        
        if($sort_by=="ASC"){
            $order = "ASC";
        }
        else{
            $order = "DESC";
        }
        return Expanses::where("post_id",$postID)->orderBy($sort_on,$order)->paginate($per_page)->all();           
    }


    public function getAllExpanseCount($postID){
        return Expanses::where("post_id",$postID)->count();           
    }

    public function getTotalExpanseDone($postID){
        return Expanses::where("post_id",$postID)->sum("amount");
    }


    private function setExpanseValues(Request $r, Expanses $expanse ){
        if($r->id!=null)
            $expanse->id=$r->id;
        if($r->post_id!=null)
            $expanse->post_id=$r->post_id;
        if($r->date!=null)
            $expanse->date=$r->date;    
        if($r->purpose!=null)
            $expanse->purpose=$r->purpose;
        if($r->notes!=null)
            $expanse->notes=$r->notes;
        if($r->privacy_notes!=null)
            $expanse->privacy_notes=$r->privacy_notes;
        if($r->updated_at!=null)
            $expanse->updated_at=$r->updated_at;
        if($r->created_at!=null)
            $expanse->created_at=$r->created_at;
        if($r->amount!=null)
            $expanse->amount=$r->amount;
        
        return $expanse;    
    }//setPostValues


}//class