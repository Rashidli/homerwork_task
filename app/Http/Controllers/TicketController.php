<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::guard('web')->user()->id)->where('is_active', true)->get();
        return view('ticket', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('store_ticket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {

        $ticket = new Ticket();
        $ticket->user_id = auth()->guard('web')->user()->id;
        $ticket->name = $request->name;
        $ticket->description = $request->description;
        $ticket->importance = $request->importance;

        if ($request->file) {


            $file = $request->file;

            $filename = $file->hashname() . time() . "." . $file->extension();
            $url = "/uploads/" . $filename;
            $file->move('uploads', $url);
            $ticket->file = $url;

        }

        $ticket->save();

        return redirect()->route('tickets.index')->with('message', 'Ticket əlavə olundu');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
