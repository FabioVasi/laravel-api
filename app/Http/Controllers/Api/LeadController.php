<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLeadEmail;
use App\Mail\NewLeadEmailMd;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:50',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        // redirect if validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }

        $lead = Lead::create($request->all());

        Mail::to('info@boolpress.com')->send(new NewLeadEmail($lead));

        Mail::to($lead->email)->send(new NewLeadEmailMd($lead));

        return response()->json(
            [
                'success' => true,
                'message' => 'Form sent successfully 👍'
            ]
        );
    }
}
