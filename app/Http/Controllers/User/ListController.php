<?php

namespace App\Http\Controllers\User;

use App\Participant;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\City;
class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $municipality = City::select('code', 'name')->get();
        return view('user.list', compact('municipality'));
    }

    public function ListOfParticipants(string $municipality_code = '*')
    {
        $data = Participant::select('id', 'firstname', 'middlename', 'lastname', 'suffix', 'city', 'barangay', 'age', 'contact_number')->with('cities:code,name', 'barangays:code,name');
        if (request()->ajax()) {
            $data = ($municipality_code != '*') ? $data->where('city', $municipality_code)->get()
                                            : $data->get();
        return Datatables::of($data)
        ->addColumn('fullname', function($row){
                    $fullname = $row->firstname .' '. $row->middlename .' '. $row->lastname.' '. $row->suffix;
                    return $fullname;
                })
        ->addColumn('city', function($row){
            $city = $row->cities->name;
            return $city;
        })
        ->addColumn('barangay', function($row){
            $barangay = $row->barangays->name;
            return $barangay;
        })
        ->make(true);
        }
    }

    public function print(Request $request, $id){
        $participantsName = Participant::find($id);
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('user.print',
            compact('participantsName'))
            ->setPaper('a4')
            ->setOrientation('landscape');
        return $pdf->inline();
    }

    public function printAll(Request $request, string $municipality_code = '*'){
        $participantsNameAll = Participant::select('firstname', 'middlename', 'lastname');
        $participantsNameAll = ($municipality_code != '*') ? $participantsNameAll->where('city', $municipality_code)->get(): $participantsNameAll->get();
        $count = Participant::count();
        $pdf = App::make('snappy.pdf.wrapper');
        $pdf->loadView('user.printAll',
            compact('participantsNameAll', 'count'))
            ->setPaper('a4')
            ->setOrientation('landscape');
        return $pdf->inline();
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
