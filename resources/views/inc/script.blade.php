<script type="text/javascript">
//initial hide the list of provinces
$("#custom_select").hide();

    //create the dropdown behaviour for the customize province dropdown
    $("#user_form_row").click(function (e) {
        var target = $(e.target);//get the element clicked
        /*if the element clicked is custom dropdown we have created than toggle(show/hide) province list*/
        if (target[0].id === "div_select" || target[0].id === "prov_text" || target[0].id === "caret") {
            $("#custom_select").toggle();
        }
        /*if user clicks anywhere else in the document just hide the list*/
        else {
            $("#custom_select").hide();
        }
        //console.log("id:"+target[0].id);
        // $("#custom_select").show()
    });

    //Show the selected province in text box.
    $('#div_select').on('click', "ul#custom_select>li", function () {
        prov_id = $(this).attr("data-id");
        $("#_province").empty().val(prov_id);
        var prov_name = $(this).html();
        $("#prov_text").empty().val(prov_name);
    });
</script>