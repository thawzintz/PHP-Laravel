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
    $entry = Guestbook::findOrFail($id);   
    $entry->delete();
    return redirect('/guestbook')->with('success', 'Message deleted successfully!');
    }
    
public function edit($id)
{
    $guest = Guestbook::findOrFail($id); 
    return view('guestbook-edit', compact('guest'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'message' => 'required',
    ]);

    $guest = Guestbook::findOrFail($id);
    $guest->update($request->all());

    return redirect('/guestbook')->with('success', 'Data updated successfully!');
}
}