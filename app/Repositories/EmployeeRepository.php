<?php

namespace App\Repositories;

use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employe;

class EmployeeRepository implements EmployeeRepositoryInterface
{
    /**
     * Create a new class instance.
     */
    public function index(){
        return Employe::all();
    }

    public function getById($id){
        return Employe::findOrFail($id);
    }

    public function store(array $data){
        return Employe::create($data);
    }

    public function update(array $data,$id){
        return Employe::whereId($id)->update($data);
    }

    public function delete($id){
        Employe::destroy($id);
    }
}
