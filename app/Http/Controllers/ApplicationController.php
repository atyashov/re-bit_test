<?php

namespace App\Http\Controllers;

use App\Jobs\LoggingApplication;
use App\Models\Application;
use App\Models\Contact;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index(): \Illuminate\Contracts\View\View
    {
        return view('application.index');
    }

    public function send(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required',
            'text' => 'required'
        ]);

        if ($validated) {

            $contactModel = new Contact();

            $contact = $contactModel
                ->where(
                    'phone',
                    '=',
                    preg_replace("/[^0-9]/", "", $request->phone))
                ->first();

            if(!$contact) {
                $contactModel->fill($request->only($contactModel->getFillable()));

                $contactModel->save();

                $contact = $contactModel;
            }

            if ($contact->id) {
                $application = Application::create([
                    'text' => $request->text,
                    'phone' => $request->phone,
                    'ip' => $request->ip(),
                    'contact_id' => $contact->id
                ]);

                LoggingApplication::dispatch($application);
            }


        }

         session()->setFlash('success', 'Заявка отправлена');

        return redirect('/application');
    }
}
