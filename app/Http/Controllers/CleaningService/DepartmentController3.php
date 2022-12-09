<?php

namespace App\Http\Controllers\CleaningService;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Department;

use App\Http\Requests\CleaningService\DepartmentRequest33;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no     = 1;
        $items  = Department::orderBy('dept_code', 'asc')->get();
        return view('pages.cleaningservice.department.list', [
            'no'        => $no,
            'items'     => $items 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cleaningservice.department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentRequest3 $request)
    {
        $data = $request->all();
        
        if(Department::create($data)) {
            $request->session()->flash('alert-success-add', 'Departemen berhasil ditambahkan');
        }
        return redirect()->route('department.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Department::findOrFail($id);

        return view('pages.cleaningservice.department.edit', [
            'item'  => $item 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentRequest3 $request, $id)
    {
        $data = $request->all();
        $item = Department::findOrFail($id);

        if($item->update($data)) {
            $request->session()->flash('alert-success-update', 'Departemen berhasil diupdate');
        }
        
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
