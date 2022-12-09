<?php

namespace App\Http\Controllers\CleaningService;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Computer;

use App\Http\Requests\CleaningService\ComputerRequest33;

use DataTables;

class ComputerController extends Controller
{
    public function json() {
        $data       = Computer::all();

        return DataTables::of($data)
        ->addColumn('action', function($data){
               $btn = '<a 
                href="computer/'.$data->id.'/edit" 
                class="btn btn-primary btn-sm mb-2" id="">
                <i class="fas fa-edit"></i>&nbsp;&nbsp;Edit
                </a>';

                return $btn;
        })
        ->make(true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.cleaningservice.computer.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.cleaningservice.computer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ComputerRequest3 $request)
    {
        $data = $request->all();
        
        if(Computer::create($data)) {
            $request->session()->flash('alert-success-add', 'Komputer berhasil ditambahkan');
        }
        return redirect()->route('computer.index');
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
        $item = Computer::findOrFail($id);

        return view('pages.cleaningservice.computer.edit', [
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
    public function update(ComputerRequest3 $request, $id)
    {
        $data = $request->all();
        $item = Computer::findOrFail($id);

        if($item->update($data)) {
            $request->session()->flash('alert-success-update', 'Komputer berhasil diupdate');
        }
        return redirect()->route('computer.index');
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
