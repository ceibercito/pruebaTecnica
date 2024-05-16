<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employe;
use App\Http\Requests\StoreEmployeRequest;
use App\Http\Requests\UpdateEmployeRequest;
use App\Classes\ApiResponseClass as ResponseClass;
use Illuminate\Support\Facades\DB;

class EmployeController extends Controller
{
    private EmployeeRepositoryInterface $employeeRepositoryInterface;
    public function __construct(EmployeeRepositoryInterface $employeeRepositoryInterface){
        $this->employeeRepositoryInterface = $employeeRepositoryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->employeeRepositoryInterface->index();
        return ResponseClass::sendResponse(EmployeeResource::collection($data), '', 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeRequest $request)
    {
        $details =[
            'firstLastName' => $request->firstLastName,
            'secondLastName' => $request->secondLastName,
            'firstName' => $request->firstName,
            'otherName' => $request->otherName,
            'countryEmployment' => $request->countryEmployment,
            'idType' => $request->idType,
            'idNumber' => $request->idNumber,
            'email' => $request->email,
            'area' => $request->area,
            'state' => 'ACTIVO',
        ];
        DB::beginTransaction();
        try {
            $employe = $this->employeeRepositoryInterface->store($details);
            DB::commit();
            return ResponseClass::sendResponse(new EmployeeResource($employe), 'Employee created successful', 201);
        }catch (\Exception $ex){
            return ResponseClass::rollback($ex);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employe = $this->employeeRepositoryInterface->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employe $employe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeRequest $request, $id)
    {
        $details =[
            'firstLastName' => $request->firstLastName,
            'secondLastName' => $request->secondLastName,
            'firstName' => $request->firstName,
            'otherName' => $request->otherName,
            'countryEmployment' => $request->countryEmployment,
            'idType' => $request->idType,
            'idNumber' => $request->idNumber,
            'email' => $request->email,
            'area' => $request->area,
            'state' => $request->state,
        ];
        DB::beginTransaction();
        try{
            $employe = $this->employeeRepositoryInterface->update($details, $id);
            DB::Commit();
            return ResponseClass::sendResponse('Employee update succesful', '', 201);
        }catch (\Exception $ex){
            return ResponseClass::rollback($ex);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->employeeRepositoryInterface->delete($id);
        return ResponseClass::sendResponse('Product delete succesful', '', 204);
    }
}
