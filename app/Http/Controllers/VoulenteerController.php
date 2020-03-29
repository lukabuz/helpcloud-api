<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateVoulenteerRequest;
use Illuminate\Support\Facades\Mail;
use App\Voulenteer;
use App\OfferVoulenteer;
use App\Offer;
use App\Mail\VerifyEmail;
use App\Mail\DeletionEmail;

class VoulenteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Voulenteer::orderBy('id', 'DESC')->where('verification_token', null);


        if (request('country') !== null) {
            $query->where('country', request('country'));
        }

        if (request('city') !== null) {
            $query->where('city', request('country'));
        }

        if (request('general_location') !== null) {
            $query->where('general_location', 'LIKE', '%' . request('general_location') . '%');
        }

        if (request('offers') !== null) {
            $voulenteers = [];

            foreach ($query->get() as $voulenteer) {
                $ids = $voulenteer->getOfferIds();
                if (array_intersect($ids, request('offers'))) {
                    // dd($voulenteer)
                    array_push($voulenteers, $voulenteer);
                };
            }

            

            return response()->json(['status' => 'success', 'voulenteers' => $voulenteers]);
        }


        return response()->json(['status' => 'success', 'voulenteers' => $query->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateVoulenteerRequest $request)
    {
        $values = request([
            'name',
            'email',
            'profession',
            'country',
            'city',
            'description',
            'general_location'
        ]);
        
        $voulenteer = Voulenteer::create($values);

        $voulenteer->verification_token = md5(rand());
        $voulenteer->deletion_token = md5(rand());
        $voulenteer->save();

        foreach ($request->input('offers', []) as $offer) {
            $pivot = new OfferVoulenteer;
            $pivot->voulenteer_id = $voulenteer->id;
            $pivot->offer_id = $offer;
            $pivot->save();
        }

        Mail::to($voulenteer)->send(new VerifyEmail($voulenteer->verification_token));

        return response()->json(['status' => 'success', 'voulenteer' => $voulenteer->get()]);
    }

    public function verify($token)
    {
        $voulenteer = Voulenteer::where('verification_token', $token)->firstOrFail();

        $voulenteer->verification_token = null;

        $voulenteer->save();

        return response()->json(['status' => 'success', 'voulenteer' => $voulenteer]);
    }

    public function requestDeletion()
    {
        $voulenteer = Voulenteer::findOrFail(request('id'));

        Mail::to($voulenteer)->send(new DeletionEmail($voulenteer->deletion_token));

        return response()->json(['status' => 'success', 'voulenteer' => $voulenteer]);
    }

    public function delete($token)
    {
        $voulenteer = Voulenteer::where('deletion_token', $token)->firstOrFail();

        $voulenteer->deletion_token = null;

        $voulenteer->delete();

        return response()->json(['status' => 'success']);
    }

    public function offers()
    {
        return response()->json(['status'=>'success', 'offers' => Offer::all()]);
    }
}
