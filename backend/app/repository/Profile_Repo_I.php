<?php
namespace App\repository;
use Illuminate\Http\Request;
interface Profile_Repo_I {
    public function save(Request $request);
    public function update(Request $request);
    public function delete($id);
    public function findOne($id);
}//class
