    <div class="row" id="user_info_listing_row">
        <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12" id="user_info_listing_col">
            <div class="row" id="user_info_table_wrapper_row">
                <div class="col col-lg-11 col-md-11 col-sm-11 col-xs-11" id="user_info_table_wrapper_col">
                    <div id="custom_table">
                        <div class="custom_table_flex_sa custom_table_wrapper_bg">
                            <div id="custom_table_header" class="custom_table_flex_sa">
                                <div class="custom_table_child_item">Name</div>
                                <div class="custom_table_child_item">Province</div>
                                <div class="custom_table_child_item">Telephone</div>
                                <div class="custom_table_child_item">Postal Code</div>
                                <div class="custom_table_child_item">Salary</div>
                                <div class="custom_table_child_item">Action</div>
                            </div>
                        </div>
                        @foreach($users as $user)
                            <div class="custom_table_flex_sa custom_table_body_bg">
                                <div id="custom_table_body" class="custom_table_flex_sa">
                                    <div class="custom_table_child_item">{{$user->name}}</div>
                                    <div class="custom_table_child_item">{{$user->province->name}}</div>
                                    <div class="custom_table_child_item">{{$user->telephone}}</div>
                                    <div class="custom_table_child_item">{{$user->postal}}</div>
                                    <div class="custom_table_child_item">{{$user->salary}}</div>
                                    <div class="custom_table_child_item custom_table_flex_sa">
                                        <div class="custom_table_flex_sa" id="actions_child_item_wrapper">
                                            <div class="actions_child_item"><a href="#" data-id="{{$user->id}}" id="updateUser">Update</a></div>
                                            <div id="actions_child_item_seprator">|</div>
                                            <div class="actions_child_item" ><a href="#" data-id="{{$user->id}}" id="deleteUser">Delete</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row" id="pagination_row">
                <div class="col col-sm-4 col-md-4 col-lg-4 col-sm-offset-2 col-md-offset-2 col-lg-offset-2">{{$users->render('pagination::bootstrap-4')}}</div>
            </div>
        </div>
    </div>

