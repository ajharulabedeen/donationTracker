<?php
namespace App\repository;
use Illuminate\Http\Request;
interface Expanse_Repo_I {
    public function save(Request $request);
    public function update(Request $request);
    public function delete($id);
    public function getAll(Request $request);
    public function getAllExpanseCount($postID);
    public function getTotalExpanseDone($postID);
}