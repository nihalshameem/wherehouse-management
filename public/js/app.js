// require('./bootstrap');
$(".dropdown-toggle").dropdown();
$(document).ready(function () {
    var trigger = $(".hamburger"),
        overlay = $(".overlay"),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    overlay.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {
        if (isClosed == true) {
            overlay.fadeOut();
            trigger.removeClass("is-open");
            trigger.addClass("is-closed");
            isClosed = false;
        } else {
            overlay.fadeIn();
            trigger.removeClass("is-closed");
            trigger.addClass("is-open");
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $("#wrapper").toggleClass("toggled");
    });
});

var base = window.location.origin;
$("#wh_name").on("change", function () {
    let id = $("#wh_name").val();
    $("#lot_number option").remove();
    $.ajax({
        type: "GET",
        url: base + "/get-lot-numbers/" + id,
        dataType: "json",
        success: function (data) {
            $.each(data, function (key, value) {
                $("#lot_number").append(
                    $("<option></option>")
                        .attr("value", value.id)
                        .text(value.name)
                );
            });
        },
    });
});
$("#location_id").on("change", function () {
    let id = $("#location_id").val();
    $("#wh_name option").remove();
    $.ajax({
        type: "GET",
        url: base + "/get-wh-names/" + id,
        dataType: "json",
        success: function (data) {
            $("#wh_name").append(
                $("<option></option>").attr("value", "").text("--Select--")
            );
            $.each(data, function (key, value) {
                $("#wh_name").append(
                    $("<option></option>")
                        .attr("value", value.id)
                        .text(value.name)
                );
            });
        },
    });
});
