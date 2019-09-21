<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Utils\Util;
use Illuminate\Http\Request;
use App\repository\Donation_Repo_Impl;
use App\models\Donations;

class RepoDonationsTest extends TestCase
{


    



public function test_root()
    {
        echo"\n >----------- Test Name : " . get_class($this);
        echo("\n -------------Root Tests : ---------->\n");
        // $this->assertTrue(true);
        // $this->saveDonationTest();
        // $this->findOneTest(2);
        // $this->deleteTest(2);
        //  $this->saveDonationManyTest();
        //  $this->getAllTest();
        //  $this->countAllTest(10);
        //  $this->printArryData();
        //  $this->totalAmountTest(15);
        //  $this->totalAmountTest(15);
        //  $this->updateTest();
        //  $this->searchTest();
    }


    public function searchTest(){
        $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        
        $request = new Request();
        // name search
            // $request->f_name="name";
            // $request->per_page = "3";
            // $request->post_id = "10";
            // $request->searchKey = "খাতুন";
        
        // phone search
        //     $request->f_name="phone";
        //     $request->per_page = "3";
        //     $request->post_id = "10";
        //     $request->searchKey = "01715";
        
        // date search
            $request->f_name="date";
            $request->per_page = "20";
            $request->post_id = "10";
            $request->searchKey = "Thu 14-02-19";
        
        $donations = $donationRepo->search($request);
        for ($i=0; $i < count($donations); $i++) { 
            $obj = new Donations();
            $obj = $donations[$i];
            echo $obj->__toString() . "\n\n";
        }
    }//searchTest

    public function updateTest(){
        $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        $request = new Request();
        $request->id = "1";
        $request->name = "জলিল খাতুন updated";
        $donation = $donationRepo->update($request);
        echo "\n Name after Update  : " . $donation->name . "\n";
    }//updateTest

    public function totalAmountTest($postID){
        $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        $total = $donationRepo->totalAmount($postID);
        echo("\n Total Amount : " . $total);
    }

    public function countAllTest($postID){
        $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        $total = $donationRepo->countAll($postID);
        echo("Total : " . $total);
    }
    /**
     * All transactions of a post.
     */
    public function getAllTest(){
        $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        $request = new Request();
        $request->per_page = 5;
        $request->sort_by = "ASC";
        // $request->sort_by = "DESC";
        $request->sort_on = "amount";
        $request->postID = 12;
        $allDonations = $donationRepo->getAll($request);
        
        for ($i=0; $i <count($allDonations) ; $i++) { 
            $obj = new Donations();
            $obj = $allDonations[$i];
            // print_r( $obj );
            // echo("\n\n" . $obj->__toString() . "\n\n");
            echo( "\n" . $obj->id . "  ");
            echo($obj->name . "  ");
            echo($obj->date );
            echo( "  " .  $obj->created_at );
        }
    }//getAllTest

    public function deleteTest($id){
        $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        $status = $donationRepo->delete($id);
        echo  "Delete : " . $status;
        $this->assertTrue($status);
    }

    public function findOneTest($id){
        // $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        echo($donationRepo->findOne($id));
    }

    public function saveDonationTest(){
        $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        $request = $this->getDummyDonation();
        // $donationRepo->save($request);
        $statusSave = $donationRepo->save($this->getDummyDonation());
        $this->assertTrue($statusSave != null);
    }
    public function saveDonationManyTest(){
        $donationRepo = new Donation_Repo_Impl;
        $donationRepo = $this->getDonationImpl();
        for ($i=0; $i <100 ; $i++) { 
            $request = $this->getDummyDonation();
            $statusSave = $donationRepo->save($this->getDummyDonation());
            $this->assertTrue($statusSave != null);
        }
    }//insert many

    public function getDummyDonation(){
            $r = new Request();
            $r->date=Util::getCurrentDate();
            $r->post_id=rand(10,15);
            $r->amount=rand(10,10000);
            $r->name=$this->makingName();
            $r->address=$this->getAddr();
            $r->email=$this->getMailAddr($r->name);
            $r->phone=$this->getPhone();
            $r->notes="He is a nice man.";
            $r->privacy_notes=rand(0,1);
            $r->privacy_donner=rand(0,1);
            return $r;
    }//getDummyDonation

    public function printArryData(){
        //Name
        // for ($i=0; $i <10 ; $i++) { 
        //     echo $this->makingName() . "\n\n";
        // }//for

        //phone
        for ($i=0; $i <10 ; $i++) { 
            echo $this->getPhone() . "\n";
        }
    }//printData

    public function getDonationImpl(){
        return new Donation_Repo_Impl;
    }







    // ---------------------------------------------
    public function makingName(){
            $nameA = array( "আবু",
                            "কালাম",
                            "রাশেদ ",
                            "জলিল",
                            "সাব্বির",
                            "সাদ",
                            "ফয়সাল",
                            "জুয়েল",
                            "জাভেদ",
                            "ফরহাদ",
                            "শফিক",
                            "শাহাদাত",
                            "জীবন",
                            "চৌধুরী",
                            "খান",
                            "শায়খ",
                            "সাঈদ",
                            "মুঘল",
                            "kent",
                            "jhon", 
                            "Benz",
                            "Tesla",
                            "Simon",
                            "Abrar",
                            "kelly"
                        );


            $nameB = array( "পাঠান",
                            "জব্বার",
                            "বেকুব",
                            "ইসলাম",
                            "জিসান",
                            "জনি",
                            "সালাউদ্দিন",
                            "পারভীন",
                            "কেয়া",
                            "নিতু",
                            "সালমা",
                            "খাতুন",
                            "আবরার",
                            "সালমান",
                            "আসাদুল",
                            "শরীফ",
                            "আব্দুল",
                            "আহাদ",
                            "Brown",
                            "Swift",
                            "Anglina",
                            "Jolly",
                            "Keety",
                            "Taylor",
                            "Eminem");
            
            

            $name = $nameA[rand(0,19)];                    
            $name .= " " . $nameB[rand(0,19)];                    
            return $name;                        
        }//makingName

        public function getAddr(){
            $addr = array("Khulna",
            "Dhaka",
            "Barishal",
            "Okland",
            "Angkara",
            "Delaware",
            "Mumbae",
            "Von",
            "Hesenki",
            "Moskow",
            "ঢাকা",
            "খুলনা",
            "বরিশাল",
            "চট্টগ্রাম",
            "কুমিল্লা",
            "কলকাতা",
            "হুগলি", 
            "বর্ধমান",
            "রাজশাহী",
            "ফরিদপুর");
            return $addr[rand(0,19)];
        }//getAddr

        public function getPhone(){
            $operator = array(  "01711",
                                "01712",
                                "01713",
                                "01714",
                                "01715",
                                "01811",
                                "01812",
                                "01813",
                                "01814",
                                "01815",
                                "01911",
                                "01912",
                                "01913",
                                "01914",
                                "01915"
                                );

            $otherDigits="";                    
            for ($i=0; $i <6 ; $i++) { 
                $otherDigits .=rand(0,9);
            }
            return $operator[rand(0,14)] . $otherDigits;
        }//getPhone

        public function getMailAddr($name){
            $mailDomain = array("@gmail.com",
                                "@yahoo.com",
                                "@dhakamail.com",
                                "@neom.com",
                                "@dimmail.com");
            $name = trim($name);
            return $name . $mailDomain[rand(0,4)];
        }//getMail

}//class
