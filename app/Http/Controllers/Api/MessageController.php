<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(StoreMessageRequest $request) {
        // dd($request->all());
        $data = $request->validated();
        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();
        return response()->json([
            'success' => true
        ]);
    }
}
