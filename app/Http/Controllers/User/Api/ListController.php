<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Participant;

class ListController extends Controller
{
    public function ParticipantsInfo(Request $request, $id){
        $participantsInfo = Participant::select('id', 'firstname', 'middlename', 'lastname', 'suffix', 'city', 'barangay', 'age', 'contact_number')->with('cities:code,name', 'barangays:code,name')->find($id);
        return view('user\listDetails', compact('participantsInfo'));
    }
}
