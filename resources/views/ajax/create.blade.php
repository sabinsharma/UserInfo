<div class="row" id=user_form_row>
   <div id="form_container" class="col col-lg-12 col-md-12 col-sm-12 col-xs-12">
       <div id='exception_message'></div>
        <div id="form_wrapper" >
            {{--Form starts here--}}
            {!! Form::open(['url' => 'user/save','id'=>'frmSaveUser','novalidate']) !!}
                {{--User name/Client name textbox--}}
                <div class="form-group" id="clientError">
                    {!! Form::labelWithHtml('name','Name<span class="required">*</span>','item_up') !!}
                    {{Form::text('name','',['class'=>'form-control','tabindex'=>'1'])}}
                </div>
                {{--End of Client name textbox--}}

                {{--Start of Dropdown--}}
                <div class="form-group" id="provinceError">
                    {!!Form::labelWithHtml('province_text','Province<span class="required">*</span>','item_up') !!}
                    <div id="div_select" tabindex="2">
                        {{Form::text('province_text','',['class'=>'form-control','id'=>'prov_text','disabled'])}}{{--Display the selected province--}}

                        <div class="fa fa-caret-down" id="caret"></div>
                        <ul id="custom_select">{{--List of provinces--}}
                            @foreach($provinces as $province)
                                <li data-id="{{$province->id}}">{{$province->name}}</li>
                            @endforeach
                        </ul>
                        {{form::hidden('prov_id','',['class'=>'form-control','id'=>'_province'])}} {{--holds the id of selected province--}}
                    </div>
                </div>
                {{--End of Dropdown--}}

                {{--Start for postal code and telephone input--}}
                <div class="form-row">
                    <div class="col" id="telError">{{--text box for telephone--}}
                        {!!Form::labelWithHtml('telephone','Telephone<span class="required">*</span>','item_up') !!}
                        {{Form::text('telephone','',['class'=>'form-control','tabindex'=>'3'])}}
                    </div>

                    <div class="col" id="postalError">{{--text box for postal code--}}
                        {!!Form::labelWithHtml('postal','Postal Code<span class="required">*</span>','item_up') !!}
                        {{Form::text('postal','',['class'=>'form-control'])}}
                    </div>

                </div>
                {{--End of postal code and telephone input--}}

                {{--Start of salary textbox--}}
                <div class="form-group" id="salaryError">
                    {!!Form::labelWithHtml('salary','Salary<span class="required">*</span>','item_up') !!}
                    {{Form::text('salary','',['class'=>'form-control'])}}
                </div>
                {{--End of salary textbox--}}

                <div id=button_wrapper>
                 {{Form::submit('Save',['class'=>'btn btn-primary','id'=>'save'])}}
                </div>
                {!! Form::close() !!}
        </div>{{--End of Form Wrapper--}}
    </div>
</div>
<script type="text/javascript" src="{{url('js/add_info.js')}}"></script>
@include('inc.script')
