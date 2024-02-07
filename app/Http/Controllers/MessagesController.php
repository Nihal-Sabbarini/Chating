<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $messagesQuery = Message::getMessagesQueryBetweenTwoUsers($request, auth()->user()->id, $request->receiver_id);
        $result = $messagesQuery->orderBy('created_at', 'DESC')
                                ->limit($request->limit ?? 5)
                                ->get();
        if($result->count())
        {
            foreach($result as $msg){
                $msg->update(['seen'=>0]);

            }
        }
        return response()->json(data: ['status' => true, 'messages' => $result]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->message_content){
            return response()->json(data : ['status' => false], status : 500);
        }
        $message = new Message();
        $message->sender_id = auth()->user()->id;
        $message->receiver_id = $request->receiver_id;
        $message->content = $request->message_content;
        $message->save();

        $updatedMessage = Message::with(['sender', 'receiver'])->find($message->id);

        return response()->json(data : ['status' => true , 'message' => $updatedMessage ] , status : 201);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
