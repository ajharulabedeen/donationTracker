<?php
namespace App\repository;
use App\repository\D_I;
use Illuminate\Http\Request;
use App\models\Donations;
class Donation_Repo_Impl implements Donation_Repo_I{
    
    public function save(Request $request){
        $donation = new Donations;
        $donation = $this->setPostValues($request, $donation)->save();
        return $donation;   
    }
    public function update(Request $request){
        $donation_id = $request->id;
        $donation=Donations::find($donation_id);
        $this->setPostValues($request,$donation)->save();
        return  $donation;
    }
    public function delete($sid){
        $donation = Donations::find($id);
        if($donation !=null){
            $donation->delete();
            $status = true;
        }
        else{
            $status = false;
        }
        return $status;
    }
    public function findOne($id){
        return Donations::find($id);
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
        return Donations::where("post_id",$postID)
        ->orderBy($sort_on,$order)->paginate($per_page)->all();   
    }
    public function countAll($postID){
        return Donations::where("post_id",$postID)->count();
    }
    
    public function totalAmount($postID){
        return Donations::where("post_id",$postID)->sum("amount");
    }

    public function search(Request $request){
        $f_name = $request->f_name;
        $searchKey ="%";
        $searchKey .= $request->searchKey;
        $searchKey .="%";
        $per_page = $request->per_page;
        $post_id = $request->post_id;

        echo "\n\n" . $searchKey . "\n\n";

        return Donations::where("post_id",$post_id)
        ->where($f_name,"LIKE",$searchKey)->paginate($per_page);
    }//search

    private function setPostValues(Request $r, Donations $donation ){
        
        if($r->id!=null)
            $donation->id=$r->id;
        if($r->date!=null)
            $donation->date=$r->date;
        if($r->post_id!=null)
            $donation->post_id=$r->post_id;
        if($r->amount!=null)
            $donation->amount=$r->amount;

        if($r->name!=null)
            $donation->name=$r->name;
        if($r->address!=null)
            $donation->address=$r->address;
        if($r->email!=null)
            $donation->email=$r->email;
        if($r->phone!=null)
            $donation->phone=$r->phone;
        if($r->privacy_donner!=null)
            $donation->privacy_donner=$r->privacy_donner;

        if($r->notes!=null)
            $donation->notes=$r->notes;
        if($r->privacy_notes!=null)
            $donation->privacy_notes=$r->privacy_notes;
        if($r->updated_at!=null)
            $donation->updated_at=$r->updated_at;
        if($r->created_at!=null)
            $donation->created_at=$r->created_at;

        return $donation;    
    }//setPostValues

}//class


