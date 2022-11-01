$(function () {



    /*SETUP BUTTON ACTIONS*/
    $("#btn_add_menu", main).click(function (e) {
        e.preventDefault();
        alert("halo");
        $("#main").hide();
        $("#add").show();

    });


}); //end of $(function(){});