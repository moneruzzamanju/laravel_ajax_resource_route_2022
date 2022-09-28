<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
       $employees = Employee::latest()->paginate(6);
       return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required|unique:employees',
                'basic'=>'required',
            ],
            [
                'name.required'=>'Name is required',
                'name.unique'=>'Name has already taken.',
                'basic.required'=>'Basic is required'
            ]
        );

        Employee::create([
            'name'=>$request->name,
            'basic'=>$request->basic,
        ]);

        return response()->json([
            'status'=>'success'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate(
            [
                'update_name'=>'required|unique:employees,name,'.$request->update_id,
                'update_basic'=>'required',
            ],
            [
                'update_name.required'=>'Name is required',
                'update_name.unique'=>'Name has already taken.',
                'update_basic.required'=>'Basic is required'
            ]
        );

        Employee::where('id',$request->update_id)->update([
            'name'=>$request->update_name,
            'basic'=>$request->update_basic,
        ]);

        return response()->json([
            'status'=>'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
