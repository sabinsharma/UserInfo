<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitClientInfo;
use Illuminate\Http\Request;
use App\Client;
use App\Province;
use Illuminate\Support\Facades\Session;


class ClientInfoController extends Controller
{

	public function create(){

		$provinces=Province::where('deleted_at',NULL)->orderBy('name')->get();
		$select=[];
		foreach ($provinces as $province){
			$select[$province->id]=$province->name;
		}
		return view('clientinfo.create',compact('select'));
	}

	public function submit(SubmitClientInfo $request){
		/*$request->validate([
			'client_name'=>'min:2|required',
			'province'=>'required',
			'tel'=>['required','regex:/^\(?\d{3}[\-|\)][[:space:]]?\d{3}\-\d{4}$/'],
			'postal_code'=>'required|regex:/^[A-Z]{1}\d{1}[A-Z]{1}[[:space:]]?\d{1}[A-Z]{1}\d{1}$/',
		]); *///end of validation

		//conditional Validation for salary
		/*switch ($request->input('province')){
			case 'A':
				$prov=$request->input('province');
				Input::replace(['salary' => $prov]);
				$this->quebecSalaryValidation($request);
				break;
			case 'B':
				$prov=$request->input('province');
				Input::replace(['salary' => $prov]);
				$this->allProvSalaryValidation($request);
				break;
		}*/

		//Create New user
		$user=new Client();
		$user->name=$request->input('client_name');
		$user->prov_id=$request->input('province');
		$user->telephone=$request->input('tel');
		$user->postal=$request->input('postal_code');
		$user->salary=$request->input('salary');

		//save new user
		if($user->save()){
			return redirect('show')->with('info',array('id'=>$user->id,'msg'=>'Your data is saved.Go to listing page to see'));

		}

		//redirect to show the information



	}


	public function show(){

		if(session('info')){
			$user=Client::find(Session::get('info')['id']);
			$msg=Session::get('info')['msg'];
			Session::flush();
			return view('clientinfo.show',compact('user','msg'));
		}
	}

	public function showAll(){
		$users=Client::paginate(10);
		return view('clientinfo.showall',compact('users'));
	}

	public function update(Request $request,Client $client){

		//receive data
		$userUpdata=Client::where('id',$client->id)
		                  ->update([
							'name'=>$request->input('client_name'),
							'prov_id'=>$request->input('province'),
							'telephone'=>$request->input('province'),
							'postal'=>$request->input('postal_code'),
							'salary'=>$request->input('salary')
			              ]);

		if($userUpdata){
			return redirect()->route('clientinfo.showall',['user_id'=>$client->id])
			                 ->with('success','User Information updated successfully');
		}
		else{
			//redirect back
			return back()->withInput();
		}

	}
	/*private function quebecSalaryValidation($request){
		$request->validate([
			'salary'=>['required','regex:/^\d{1,3}(?(?=[[:space:]])([[:space:]]\d{3})*|)(?(?=\,)\,\d{2}|)$|(^(\d{1,3}(?(?=\,)(\,\d{3})*|\d*)(?(?=\.)\.\d{2}|))$)/']
		]);
	}

	private function allProvSalaryValidation($request){
		$request->validate([
			'salary'=>['required','regex:/^(\d{1,3}(?(?=\,)(\,\d{3})*|\d*)(?(?=\.)\.\d{2}|))$/']
		]);
	}*/
}
