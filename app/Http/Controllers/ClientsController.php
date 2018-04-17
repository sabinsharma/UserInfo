<?php

namespace App\Http\Controllers;

use App\Client;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Province;
use App\Http\Requests\SubmitClientInfo;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ClientsController extends Controller
{

	#region Ajax
	public function ajaxCreate(){
		$provinces=Province::orderBy('name')->get();
		$returnView=view('ajax.create',compact('provinces'))->render();
		return response()->json(array('view'=>$returnView));
	}

	public function ajaxIndex(){
		$users=Client::paginate(10);
		$returnView=view('ajax.index')->with('users',$users)->render();
		return response()->json(array('view'=>$returnView));
	}

	public function ajaxStore(SubmitClientInfo $request){
		 try{
		 	if($request->ajax()){
				$user=new Client;
				$user->name=$request->input('name');
				$user->prov_id=$request->input('prov_id');
				$user->telephone=$request->input('telephone');
				$user->postal=$request->input('postal');
				$user->salary=$request->input('salary');
	
				if($user->save()){
					$msg='Your data is saved. Go to listing page to see';
					$returnView=view('ajax.show',compact('msg'))->with('user',$user)->render();
					return response()->json(array('view'=>$returnView));
				}
		 	}
		 }catch(Exception $ex){
			//return ['error' => $e->getMessage()];
			//throw new CustomException();
			//dd('inside catch block');	
			return response()->json(array('message'=>$ex->getMessage));
		}
		
	}

	public function ajaxEdit(){
		$userID=Input::get('id');
		$user=Client::find($userID);
		$provinces=Province::orderBy('name')->get();
		$returnView=view('ajax.edit',compact('provinces'))->with('user',$user)->render();
		return response()->json(array('view'=>$returnView));
	}

	public function ajaxUpdate(SubmitClientInfo $request){
		if($request->ajax()){
			$user=Client::find($request->input('user_id'));

			$user->name=$request->input('name');
			$user->prov_id=$request->input('prov_id');
			$user->telephone=$request->input('telephone');
			$user->postal=$request->input('postal');
			$user->salary=$request->input('salary');

			if($user->save()){
				$msg='Your data is saved. Go to listing page to see';
				$returnView=view('ajax.show',compact('msg'))->with('user',$user)->render();
				return response()->json(array('view'=>$returnView));
			}
		}
	}

	
	public function ajaxDelete(){
		$userID=Input::get('id');

		$user=Client::find($userID);
		$user->delete();
	}

	#endregion

	#region resource Controller
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $users=Client::paginate(10);
	    return view('clientinfo.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $provinces=Province::orderBy('name')->get();
	    /*$provinceList=[];
	    foreach ($provinces as $province){
		    $provinceList[$province->id]=$province->name;
	    }*/
//	    return view('clientinfo.create',compact('provinceList'));
	    return view('clientinfo.create',compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubmitClientInfo $request)
    {
	    //Create New user
	    $user=new Client();
	    $user->name=$request->input('client_name');
	    $user->prov_id=$request->input('client_name');
	    $user->telephone=$request->input('tel');
	    $user->postal=$request->input('postal_code');
	    $user->salary=$request->input('salary');

	    //save new user
	    if($user->save()){
		    return redirect('show')->with('info',array('id'=>$user->id,'msg'=>'Your data is saved.Go to listing page to see'));

	    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
	    if(session('info')){
		    $user=Client::find(Session::get('info')['id']);
		    $msg=Session::get('info')['msg'];
		    Session::flush();
		    return view('clientinfo.show',compact('user','msg'));
	    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }

    #endregion
}
