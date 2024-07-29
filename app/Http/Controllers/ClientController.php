<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::paginate(30);
        return view('admin.clients.index', compact('clients'));

    }
   public function store(Request $request){

    try{
            Client::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'message' => $request->message,
                'project' => $request->project,
            ]);
            return json_encode(array('message' =>  __('contact_form.response_success')));

        }catch(Exception $ex){
            return json_encode(array('message' =>  __('contact_form.response_fail')));
        }
   }

   public function delete($id){

    try{
            Client::where('id', $id)->delete();
            return redirect()->route('all_clients')->with('success', 'added success.' );

        }catch(Exception $ex){
            return redirect()->route('all_clients')->with('danger', 'هناك خطاء.' . $ex);
        }
   }



}
