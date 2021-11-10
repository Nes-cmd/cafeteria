<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MyModel\Agent;
use Alert;
use DB;

class AgentController extends Controller
{
	public function __construct(){
        $this->middleware('auth')->except('index','register');
    }
	public function index()
	{ 
		return view('admin.agent');
	}
	public function register(Request $request)
	{
		$validatedData = $request->validate([
            'name' => ['required','string', 'max:40'],
            'email' => ['required','string', 'max:40', 'unique:agents'],
            'telephone' => ['required','numeric', 'unique:agents'],
            'bank_account' => ['required','numeric'],
            'bank_name' => ['required', 'string', 'max:50'],
            'address' => ['required','string','max:255'],
            'qualification' => ['required','string','max:255'],
         ]);
		Agent::create($validatedData);
		Alert::toast('success','You registered succesfully');
		return redirect()->route('welcomee');

	}
	public function list()
	{
		$data = DB::table('agents')
					->leftjoin('agent_user', 'agents.id', '=', 'agent_user.agent_id')
					->select('agents.*', 'agent_user.*')
					->get();
		
		return view('Agent.index')->with('agents', $data);
	}
	public function toggle(Request $request)
	{
		$data = DB::table('agent_user')
				->where('user_id', $request->user_id)
				->where('agent_id', $request->agent_id)
				->first();
		if ($data->status == 0) {
			$x = DB::table('agent_user')
					->where('user_id', $request->user_id)
					->where('agent_id', $request->agent_id)
					->update(['status' => 1]);
		}
		
	}
}
