<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\EmailList;
use Illuminate\Http\Request;
use App\Mail\AdminContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;

class EmailController extends Controller
{

    public function saveemail(Request $request)
    {
        $Request = $request->validate([
            'email' => 'required|email',
        ]);

        if (EmailList::create($Request)) {
            return response()->json([
                'success' => "Your Have Successfully Subscribed To The KJ's Newsletter "
            ]);
        } else {
            return response()->json([
                'failed' => "Failed Please Check Your Email And Try Again"
            ]);
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function processcontactform(ContactRequest $request)
    {
        $Request = $request->validated();
        if (Mail::to($Request['email'])->send(new ContactMail($Request)) && Mail::to('contact@kevwe-joshua.com')->send(new AdminContactMail($Request))) {
            return redirect(route('contact'))->with('success', 'Message Sent Successfully');
        };
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(EmailList $EmailList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailList $EmailList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EmailList $EmailList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailList $EmailList)
    {
        //
    }
}
