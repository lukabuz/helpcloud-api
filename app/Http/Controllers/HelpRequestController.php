<?php

namespace App\Http\Controllers;

use App\HelpRequest;
use App\Voulenteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelpRequestMail;
use App\Http\Requests\CreateHelpRequestRequest;

class HelpRequestController extends Controller
{
    public function create(CreateHelpRequestRequest $reqeust)
    {
        $voulenteer = Voulenteer::findOrFail(request('voulenteer_id'));
        
        $data = request([
            'name',
            'status',
            'message',
            'phone_number',
            'voulenteer_id'
        ]);

        $helpRequest = HelpRequest::create($data);

        Mail::to($voulenteer)->send(new HelpRequestMail($helpRequest));


        return response()->json(['status' => 'success', 'helpRequest' => $helpRequest->get()]);
    }
}
