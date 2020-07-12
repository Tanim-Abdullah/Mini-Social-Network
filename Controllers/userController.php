<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class userController extends Controller
{   
     public function index(){
		return view('dashboard.home');
	}
    public function profile(Request $request){
        $uploader_id=$request->session()->get('uname');
        $userid = DB::table('users')->where('name',$uploader_id)
            ->first();
        $request->session()->put('userid', $userid->id);
        return view('dashboard.profile')->with('user',$userid);
    }

    public function userpost(Request $request){
        $userid=$request->session()->get('userid');
        $username=$request->session()->get('uname');
        DB::table('userspost')->insert(
            ['post_name' => $request->postname,
                'post_content' => $request->post,
                'post_user_name' =>$username,
                'post_user_id' => $userid,
                'created_at' => date('d-M-Y'),
                'updated_at' => date('d-M-Y'),
            ]
        );
        return redirect()->route('show-profile');
    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('userspost')
         ->where('post_name', 'like', '%'.$query.'%')
         ->orWhere('post_content', 'like', '%'.$query.'%')
         ->orWhere('post_user_name', 'like', '%'.$query.'%')
         ->orWhere('created_at', 'like', '%'.$query.'%')
         ->orderBy('id', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('userspost')
         ->orderBy('id', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
           <table>
             <tr><th>Post Title</th><td>'.$row->post_name.'</td></tr>
             <tr><th>Post content</th><td>'.$row->post_content.'</td></tr>
             <tr><th>posted by</th><td>'.$row->post_user_name.'</td></tr>
             <tr><th>posting time:-</th><td>'.$row->created_at.'</td></tr></table>
             <br><br>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'alldata'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }

    public function message(){
        $users = DB::table('users')
            ->get();
        $messages = DB::table('messages')
            ->get();
        return view('dashboard.message')
        ->with('users', $users)
        ->with('messages', $messages);
    }
    public function messagepost(Request $request){
        $userid=$request->session()->get('userid');
        $username=$request->session()->get('uname');
        DB::table('messages')->insert(
            ['message_sender_id' => $userid,
                'message_receiver_id' => $request->users,
                'message_sender_name' =>$username,
                'message_content' => $request->message,
                'created_at' => date('d-M-Y'),
                'updated_at' => date('d-M-Y'),
            ]
        );
        return redirect()->route('show-message');
    }

    public function friendlist(){
        return view('dashboard.friendlist');
    }

}
