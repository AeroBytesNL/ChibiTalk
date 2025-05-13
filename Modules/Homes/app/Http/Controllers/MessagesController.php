<?php

namespace Modules\Homes\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Homes\Models\Message;

class MessagesController extends Controller
{
    public function index()
    {
        return view('homes::index');
    }

    public function create()
    {
        return view('homes::create');
    }

    public function store(Request $request) {}

    public function show($id)
    {
        return view('homes::show');
    }

    public function edit($id)
    {
        return view('homes::edit');
    }

    public function update(Request $request, $id) {}

    public function destroy($id)
    {
        $message = Message::findOrFail($id);

        // TODO: When RBAC is implemented, make this compatible
        if ($message->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Not allowed to delete this message.');
        }

        $message->delete();
        return redirect()->back()->with('success', 'Message deleted.');
    }
}
