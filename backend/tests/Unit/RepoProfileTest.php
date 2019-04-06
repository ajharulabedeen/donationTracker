<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\repository\Profile_Repo_Impl;

use Illuminate\Http\Request;

class RepoProfile extends TestCase
{
    /**
     * Mother test
     * This method will w$ork as mother test method.
     * all other test method will be called from here. 
     * So test skip can be easily achived.
     * 
     */
     public function test_mother(){
         echo"-----------Mother Tester :--------- \n";
        //  $this->deleteProfile(4);
         $this->countAll();
        //  $this->findOne(5);
        //  $this->updateProfile();
     }

     
     public function findOne($id){
        // $profile_repo = $this->getRepoImpl(); 
        $profile_repo = new Profile_Repo_Impl;
        $profile = $profile_repo->findOne($id);
        echo($profile);
     }

    public function updateProfile(){
        $profile_repo = $this->getRepoImpl(); 
        // $profile_repo = new Profile_Repo_Impl;
        $request = $this->getDummyProfileRequest();
        $request->id=5;
        $request->name="Test Name Updated..!";
        $profile =  $profile_repo->update($request);
        echo($profile);
    }

    //  public function test_delete(){
     public function deleteProfile($id){
        echo("\n deleteProfile : ");
        $profile_repo = $this->getRepoImpl(); 
        // $profile_repo = new Profile_Repo_Impl;//in suggestion show method name and prams.
        $status = $profile_repo->delete($id);
        echo "\n".$status;
        $this->assertTrue($status);
     }

     public function countAll(){
        $profile_repo = $this->getRepoImpl(); 
        // $profile_repo = new Profile_Repo_Impl;//in suggestion show method name and prams.
        echo( "Total profile : " . $profile_repo->countAll());
     }

    /**
     * A basic test example.
     *
     * @return void
     */
    // public function test_profile_save()
    public function profile_save(){
        $profile_repo = $this->getRepoImpl();
        $statusSave = $profile_repo->save($this->getDummyProfileRequest());
        $this->assertTrue($statusSave!=null);
    }//test_profile_save
    
    // public function test_many_insert()
    public function many_insert(){
        $profile_repo = $this->getRepoImpl(); 
        for($x=0; $x<10; $x++)
        {
            $statusSave = $profile_repo->save($this->getDummyProfileRequest());
            $this->assertTrue($statusSave!=null);
        }//for
    }//many insert

    public function getDummyProfileRequest(){
        $request = new Request ;
        $request->name = "Tets Name";
        $request->age  = "12";
        $request->phone  = "01713815267";
        $request->about_myself  = "I Tell Lie.";
        $request->address  = "test Address";
        $request->profession  = "Eat, drink, sleep";
        return $request;
    }//getDummyProfileRequest

    public function getRepoImpl(){
        return new Profile_Repo_Impl;
    }


}//class
// ?>
