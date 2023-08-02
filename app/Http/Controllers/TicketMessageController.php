<?php

namespace App\Http\Controllers;

use App\Enums\TicketStatus;
use App\Http\Requests\NewMessageRequest;
use App\Models\MessageFile;
use App\Models\Ticket;
use App\Models\TicketMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class TicketMessageController extends Controller
{
    public function index($ticketId)
    {
        $ticket = Ticket::with(['messages.files', 'messages.admin'])->where('user_id', auth()->user()->id)->where('id', $ticketId)->orderBy('id', 'desc')->firstOrFail();
        return view('ticket_details', compact('ticket'));

    }

    public function ticketMessagesAdmin($ticketId)
    {
        $ticket = Ticket::with(['messages.files', 'messages.admin'])->where('user_id', auth()->user()->id)->where('id', $ticketId)->orderBy('id','desc')->firstOrFail();
        return view('admin.ticket_details_admin', compact('ticket'));
    }

    public function newMessage(Ticket $ticket, NewMessageRequest $request)
    {
        $this->sendMessage($ticket, $request, false);
        return redirect()->back();
    }

    public function newMessageFromAdmin(Ticket $ticket, NewMessageRequest $request)
    {
        $this->sendMessage($ticket, $request, true);
        return redirect()->back();
    }

    private function sendMessage(Ticket $ticket, NewMessageRequest $request, bool $isAdmin = false)
    {
        try {
            if (!$isAdmin) {
                if ($ticket->user_id != auth()->user()->id) {
                    abort(403);
                }
            }
            $data = [
                'ticket_id' => $ticket->id,
                'message' => $request->message,

            ];
            if ($isAdmin) {
                $data['admin_id'] = auth()->user()->id;
            }
            $ticketMessage = TicketMessage::create($data);
            $messageFiles = [];
            if ($request->hasFile('attachments')) {
                foreach ($request->attachments as $file) {
                    $filename = $file->hashname() . time() . "." . $file->extension();
                    $url = "/uploads/" . $filename;
                    $file->move('uploads', $url);
                    $messageFiles[] = [
                        'message_id' => $ticketMessage->id,
                        'file' => $url
                    ];
                }
            }
            MessageFile::insert($messageFiles);
            $ticket->update(['status' => $isAdmin ? TicketStatus::RESPONDED->value : TicketStatus::PENDING->value]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw ValidationException::withMessages(['incorrect_data' => $e->getMessage()]);
        }
    }
}
