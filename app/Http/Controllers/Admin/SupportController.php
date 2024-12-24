<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Vendor;
use App\Models\Size;
use App\Models\Color;
use App\Models\Speciality;
use App\Models\FebricType;
use App\Models\Category;
use App\Models\SupportDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Session;
use Validator;
use DB;
use Hash;


class SupportController extends Controller
{
    public function getTicket()
    {
        //This function is for getting all the ticket
        $supportTickets = DB::table('support_tickets as s')
                            ->leftJoinSub(
                                DB::table('support_details')
                                    ->select('support_id', 'detail_text as message', 'created_at')
                                    ->whereIn('sdetail_id', function ($query) {
                                        $query->selectRaw('MAX(sdetail_id)')
                                            ->from('support_details')
                                            ->groupBy('support_id');
                                    }),
                                'sr',
                                's.id',
                                '=',
                                'sr.support_id'
                            )
                            ->select(
                                's.*',
                                DB::raw("
                                    CASE 
                                        WHEN sr.message IS NOT NULL THEN sr.message 
                                        ELSE s.ticket_text 
                                    END AS last_message
                                "),
                                DB::raw("
                                    CASE 
                                        WHEN sr.created_at IS NOT NULL THEN sr.created_at 
                                        ELSE s.created_at 
                                    END AS last_message_time
                                "),
                                DB::raw("
                                    CASE 
                                        WHEN s.last_sender IS NULL OR TRIM(s.last_sender) = '' THEN 0
                                        WHEN TRIM(s.last_sender) = 'admin' THEN 0
                                        ELSE 1
                                    END AS is_read
                                ")
                            )
                            ->orderBy('is_read', 'DESC') // Order by is_read (unread first)
                            ->orderBy('last_message_time', 'DESC') // Order by is_read (unread first)
                            ->get();
        return view('admin.support.get_ticket',compact('supportTickets'));
    }
    public function replyTicket(Request $request,$id)
    {
        //This function is for reply on ticket
        $ticket = DB::table('support_tickets')
                    ->join('users', 'support_tickets.customer_id', '=', 'users.id')
                    ->where('support_tickets.id', $id)
                    ->select('support_tickets.*', 'users.first_name','users.profile_image')
                    ->first();

        $replylist = DB::table('support_details')
                    ->where('support_id', $id)
                    ->get();                
                
        if ($request->isMethod('post')) 
        {
            $ticket=new SupportDetail;
            $ticket->support_id=$id;
            $ticket->sender_id= 0;
            $ticket->sender_type=2;
            $ticket->detail_text=$request->reply_text;
            $ticket->created_at=date('Y-m-d H:i:s');
            $ticket->save();

            //now update the id in support ticket table
            DB::table('support_tickets')
            ->where('id', $id)
            ->update([
                    'last_sender' => 'admin'
                ]);
                
            Session::flash('message', 'Reply Sucessfully!');
            
            return redirect()->to('/admin/replyTicket/'.$id);
        }                
        return view('admin.support.reply_ticket',compact('ticket','replylist'));
    }
    public function closeTicket(Request $request)
    {
        //This function is for close the support ticket
        $ticket_id  = $request->ticket_id;

        $result=DB::table('support_tickets')
                    ->where('id', $ticket_id)
                    ->update([
                            'is_closed' => '1'
                        ]);

        if ($result){
            return response()->json(['success' => true, 'message' => 'Ticket Closed successfully']);
        } else{
            return response()->json(['error' => true, 'message' => 'Failed to Close Ticket']);
        }
    }
}