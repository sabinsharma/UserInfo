<div class="row" id="user_info_row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="user_info_col">
            <div class="row" id="user_info_content_wrapper_row">
                <div class="col col-lg-6 col-md-6 col-sm-6 col-sx-6" id="user_info_content_wrapper_col">
                    <div class="alert alert-primary" id="message">
                        {{$msg}}<br/>
                    </div>
                    <div id="table_wrapper">
                        <table class="table">
                            <tbody>
                                <tr><td scope="col">Name</td><td>:</td><td>{{$user->name}}</td></tr>
                                <tr><td scope="col">Province</td><td>:</td><td>{{$user->province->name}}</td></tr>
                                <tr><td scope="col">Telephone</td><td>:</td><td>{{$user->telephone}}</td></tr>
                                <tr><td scope="col">Postal</td><td>:</td><td>{{$user->postal}}</td></tr>
                                <tr><td scope="col">Salary</td><td>:</td><td>{{$user->salary}}</td></tr>
                            </tbody>  
                        </table>
                    </div>      
                </div>    
            </div>    
        </div>
</div>

<!-- <div class="info_wrapper">
                Name:{{$user->name}}<br/>
                Province :{{$user->province->name}}<br/>
                Telephone :{{$user->telephone}}<br/>
                Postal:{{$user->postal}}<br/>
                Salary:{{$user->salary}}
            </div> -->



