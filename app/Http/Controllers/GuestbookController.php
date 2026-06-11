<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guestbook;

class GuestbookController extends Controller
{
    public function index()
    {
        $entries = Guestbook::latest()->get(); 
        
        return view('guestbook', ['entries' => $entries]);
    }

    public function store(Request $request)
    {
        $entry = new Guestbook();
        $entry->name = $request->input('name');
        $entry->Message = $request->input('message');
        $entry->save();

        return redirect('/guestbook')->with('success', 'Message was successfully posted!');
    }
    public function destroy($id)
    {
    $entry = \App\Models\Guestbook::findOrFail($id);   
    $entry->delete();
    return redirect('/guestbook')->with('success', 'Message deleted successfully!');
    }
}