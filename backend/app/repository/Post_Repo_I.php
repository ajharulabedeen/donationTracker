<?php
namespace App\repository;
use Illuminate\Http\Request;

interface Post_Repo_I {
    public function save(Request $request);
    public function update(Request $request);
    public function delete($id);
    public function findOne($id);
    public function getAll(Request $request);
    public function countAll();
    public function countAll_specificUser();
}//interface