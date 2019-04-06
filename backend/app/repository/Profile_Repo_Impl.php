<?php
namespace App\repository;
use App\repository\Profile_Repo_I;
use Illuminate\Http\Request;
use App\models\Profile;
use App\Utils\Util;
class Profile_Repo_Impl implements Profile_Repo_I{

    //done
    public function save(Request $request){
        $p = new Profile;
        $this->setProfileValues($request, $p)->save();
        return $p;   
    }//save

    //done
    public function findOne($id){
        return Profile::find($id);
    }//findOne

    //done
    public function delete($id){    
        $profile = Profile::find($id);
        if($profile !=null){
            $profile->delete();
            $status = true;
        }
        else{
            $status = false;
        }
        return $status;
    }//delete
    
    public function update(Request $request){
           $profile_id = $request->id;
           $profile=Profile::find($profile_id);
           $this->setProfileValues($request,$profile)->save();
           return  $profile;
    }//update

    //-------------------------
    private function setProfileValues(Request $r, Profile $p ){
        $p->user_id = Util::getCurrentUserName();
        
        if($r->name!=null)
            $p->name=$r->name;
        if($r->address!=null)
            $p->address=$r->address;
        if($r->email!=null)
            $p->email=$r->email;
        if($r->phone!=null)
            $p->phone=$r->phone;
        if($r->profession!=null)
            $p->profession=$r->profession;
        if($r->about_myself!=null)
            $p->about_myself=$r->about_myself;
        if($r->updated_at!=null)
            $p->updated_at=$r->updated_at;
        if($r->created_at!=null)
            $p->created_at=$r->created_at;

        return $p;    
    }//setProfileValues

    //done
    public function countAll(){
        return Profile::all()->count();
    }
}//impl class