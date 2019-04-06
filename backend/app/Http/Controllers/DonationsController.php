<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\repository\Donations_Repo_Impl;

class DonationsController extends Controller
{
    public function saveDonation(){

    }




    public function getDummyDonation()
    {
            $r->date=Util::getCurrentDate();
            $r->name="Khan";
            $r->address="Test Addr";
            $r->email="email@test.com";
            $r->phone="01912336447";
            $r->notes="He is a nice man.";
            $r->privacy_notes="0";

            return $r;
    }






}//class
