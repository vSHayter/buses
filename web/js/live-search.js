var searchTimeout;

$(document).ready(function() {

    $('[id^="placeName"]').on('keyup', function(){
        var name = $(this).val();
        var id = $(this).attr("id");
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }

        searchTimeout = setTimeout(function() {
            if (name === "") {
                $("#display").html("");
            } else {
                 $.ajax({
                     type: "POST",
                     url: location.origin + "/place/search",
                     data: {
                         search: name,
                         id: id,
                         _csrf: csrfToken,
                     },
                     error: function (e) {
                         console.log(e);
                     },
                     success: function (response) {
                         if(id === 'placeName2') {
                             $("#display").addClass("right").html(response).show();
                         } else {
                             $("#display").html(response).show();
                         }
                     }
                 });
            }
        },500)
    });
});

$(document).on('click', function (e) {
    if ($(e.target).closest("#display").length === 0) {
        $("#display").hide();
    }
});

function fillPlaceName(Value, id) {
    $('#' + id).val(Value);
    $('#display').hide();
}

function fillPlaceId(Value, id) {
    if(id === 'placeName2') {
        $('#to').val(Value);
    } else {
        $('#from').val(Value);
    }
    $('#display').hide();
}

