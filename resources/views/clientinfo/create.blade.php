@extends('layouts.app')

@section('contents')
    {{--<div id="test" style="width: 100%; height:500px;"></div>--}}
  <div class="row">
      {{--<div class="col-lg-1 col-md-1 col-sm-1">

      </div>--}}
      <div id="form_container" class="border-top-0 border-danger rounded-0">
          <div id="form_wrapper" >
              {!! Form::open(['url' => '/users']) !!}
              {{ csrf_field() }}
              <div class="form-group">
                  {!! Form::labelWithHtml('clients_name','Name<span class="required">*</span>','item_up') !!}
                  {{Form::text('client_name','',['class'=>'form-control'])}}
              </div>
              @if($errors->has('client_name'))
                  <div class="alert alert-danger">
                      @foreach($errors->get('client_name') as $error)
                          {{$error}}<br/>
                      @endforeach
                  </div>
              @endif

              <div class="form-group" id="position_select">
                  {!!Form::labelWithHtml('province','Province<span class="required">*</span>','item_up') !!}
                  <div id="div_select">
                      {{Form::text('province','',['class'=>'form-control','id'=>'prov_text','disabled'])}}
                      <div class="fa fa-caret-down" id="caret"></div>
                      <ul id="custom_select">
                          @foreach($provinces as $province)
                              <li data-id="{{$province->id}}">{{$province->name}}</li>
                          @endforeach

                      </ul>
                      {{--{{Form::select('province', $select, '', ['class' => 'form-control','id'=>'custom_select'])}}--}}
                  </div>



              </div>
              @if($errors->has('province'))
                  <div class="alert alert-danger">
                      @foreach($errors->get('province') as $error)
                          {{$error}}
                      @endforeach
                  </div>
              @endif
              <div class="form-row">
                  <div class="col">
                      {!!Form::labelWithHtml('tel','Telephone<span class="required">*</span>','item_up') !!}
                      {{Form::text('tel','',['class'=>'form-control'])}}
                  </div>
                  @if($errors->has('tel'))
                      <div class="alert alert-danger">
                          @foreach($errors->get('tel') as $error)
                              {{$error}}
                          @endforeach
                      </div>
                  @endif
                  <div class="col">
                      {!!Form::labelWithHtml('postal_code','Postal Code<span class="required">*</span>','item_up') !!}
                      {{Form::text('postal_code','',['class'=>'form-control'])}}
                  </div>
                  @if($errors->has('postal_code'))
                      <div class="alert alert-danger">
                          @foreach($errors->get('postal_code') as $error)
                              {{$error}}
                          @endforeach
                      </div>
                  @endif
              </div>
              <div class="form-group">
                  {!!Form::labelWithHtml('salary','Salary<span class="required">*</span>','item_up') !!}
                  {{Form::text('salary','',['class'=>'form-control'])}}
              </div>
              @if($errors->has('salary'))
                  <div class="alert alert-danger">
                      @foreach($errors->get('salary') as $error)
                          {{$error}}
                      @endforeach
                  </div>
              @endif
              {{Form::submit('Save',['class'=>'btn btn-primary'])}}

              {!! Form::close() !!}
          </div>{{--End of Form Wrapper--}}
      </div>
      {{--<div class="col-lg-1 col-md-1 col-sm-1">

      </div>--}}
 </div>
@endsection