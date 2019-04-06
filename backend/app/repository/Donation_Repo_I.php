<?php
namespace App\repository;
use Illuminate\Http\Request;
interface Donation_Repo_I{
    public function save(Request $request);
    public function update(Request $request);
    public function delete($id);
    public function findOne($id);
    public function getAll(Request $request);
    public function countAll($postID);
    public function totalAmount($postID);
    public function search(Request $request);
}