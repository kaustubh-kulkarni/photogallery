$(document).ready(function() {
    var user_href;
    var user_href_splitted;
    var user_id;
    var image_src;
    var image_href_splitted;
    var image_name;
    //Disable value in modal button
    $(".modal_thumbnails").click(function() {
        $("#set_user_image").prop('disabled', false);
        user_href = $("#user-id").prop('href');
        user_href_splitted = user_href.split("=");
        user_id = user_href_splitted[user_href_splitted.length - 1];
        // Using sudo variable
        image_src = $(this).prop("src");
        image_href_splitted = image_src.split("/");
        image_name = image_href_splitted[image_href_splitted.length - 1];

    });

    $("#set_user_image").click(function() {
        // Setting up AJAX
        $.ajax({
            url: "include/ajax_code.php",
            data: { image_name: image_name, user_id: user_id },
            type: "POST",
            success: function(data) {
                if (!data.error) {
                    alert(image_name);
                }
            }
        });
    });




    //Text editor
    tinymce.init({
        selector: 'textarea'
    });

});