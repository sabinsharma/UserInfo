$(document).ready(function () {

    function loadCreate() {
        $.ajax({
            method:'GET',
            url:'./create',
            success:function (data) {
                $('#child_container_col').empty().append(data.view);
                $('#list_users').removeClass('active'); //remove the active class
                $('#add_info').addClass('active'); //add the active class
            },
            error:function (jqXHR,textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log('Ajax error:'+textStatus+' : '+ errorThrown);
            }
        });//end of ajax method
    }

    //when the page is rendered, load the create view.
    loadCreate();

    //adds and remove class from anchor tag.
    $('#add_info').click(function () {
        loadCreate();

    });//end of add information anchor tag click function

    //when listing page link is clicked load the index view.
    $('#list_users').click(function () {
        //alert($(this).html());
        $.ajax({
            method:'GET',
            url:'./users',
            success:function (data) {
               /* alert('List Users');*/
                $('#child_container_col').empty().html(data.view);
                $('#add_info').removeClass('active'); //remove the active class
                $('#list_users').addClass('active'); //add the active class
            },
            error:function (jqXHR,textStatus, errorThrown) {
                console.log(JSON.stringify(jqXHR));
                console.log('Ajax error:'+textStatus+' : '+ errorThrown);
            }
        });//end of ajax method
       // return false;
    });//end of add information anchor tag click function

    //When update button is clicked
    $('#child_container_col').on('click','#updateUser',function () {
        id=$(this).attr('data-id');
        
        $.ajax({
            method:'GET',
            url:'./editUser',
            data:{id:id}
       })
            .done(function (response) {
                /*alert("done");
                userInfo=JSON.stringify(response)
                console.log(userInfo);*/
                $('#child_container_col').empty().append(response.view);
                $('#list_users').removeClass('active'); //remove the active class
                $('#add_info').addClass('active'); //add the active class
            })
            .fail(function(response){
                console.log(response);
            });

    });//end of update user link clicked function


    //function to load current page data

    function loadCurrentPageUserInfo(pageNum){
        if(pageNum===''){
            pageUrl='./users'
        }
        else{
            pageUrl='./users?page='+pageNum;
        }
        $.ajax({
            url:pageUrl
        }).done(function (data) {
            $('#child_container_col').empty().append(data.view);
        })
    }

    $('#child_container_col').on('click','.pagination a', function(e){
        e.preventDefault();

        pageNum=$(this).attr('href').split('page=')[1];
        loadCurrentPageUserInfo(pageNum);

    });

    //when user clicks on delete button get the id, current pagenum then deletes data and then load the current page.
    $('#child_container_col').on('click','#deleteUser',function (e) {
        e.preventDefault();

        confirmDelete=confirm("Are you sure you want to delete?");

        if(confirmDelete===true){
            cntRows=$('.container-fluid').find('.custom_table_body_bg').length-1;
            pageNum=$('.active').find('span').first().text();
            id=$(this).attr('data-id');

            /*when user deletes data from last page decrease the page number if 0 rows*/
            if(cntRows===0){
                pageNum=pageNum-1;
            }
            $.ajax({
                method:'GET',
                url:'./user/delete',
                data:{id:id}
            }).done(function (data) {
                loadCurrentPageUserInfo(pageNum);
            }).fail(function (res) {
                console.log(JSON.stringify(res));
            });
        }
    });//end of delete button pressed function.

});//end of document.ready
