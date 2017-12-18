<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->paginate(config('settings.paginate.contact'));
        return view('admin.contact.index', compact('contacts'));
    }

    public function check(Contact $contact){
        if ((int)$contact->checked === config('settings.contact.uncheck'))
        {
            $contact->checked = config('settings.contact.checked');
            $contact->update();
        }

        return redirect()->back()->with('success', '確認しました');
    }
}
