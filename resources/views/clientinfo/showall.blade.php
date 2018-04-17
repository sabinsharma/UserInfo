@extends('layouts.app')

@section('contents')

   <div class="container">
      <div class="row">
         <div class="col">
            <table class="table table-responsive">
               <thead class="thead-dark">
               <tr>
                  <th scope="col">Name</th>
                  <th scope="col">Province</th>
                  <th scope="col">Telephone</th>
                  <th scope="col">Postal Code</th>
                  <th scope="col">Salary</th>
                  <th scope="col">Action</th>
               </tr>
               </thead>
               <tbody>

               @foreach($users as $user)
                  <tr>
                     <td>{{$user->name}}</td>
                     <td>{{$user->province->name}}</td>
                     <td>{{$user->telephone}}</td>
                     <td>{{$user->postal}}</td>
                     <td>{{$user->salary}}</td>
                     <td colspan="2"><a href="#">Update</a>|<a href="#">Delete</a> </td>
                  </tr>
               @endforeach

               </tbody>
            </table>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-4"></div>
         <div class="col-lg-4">{{$users->render('pagination::bootstrap-4')}}</div>
         <div class="col-lg-4"></div>

      </div>
   </div>

@endsection
