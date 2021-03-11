// hide lrn input if grade level selected is nursery
$(document).ready(function() {
    $("#mop").change(function() {
        $(".full-breakdown").css("display", "none");
        $(".semestral-breakdown").css("display", "none");
        $(".quarterly-breakdown").css("display", "none");
        $(".monthly-breakdown").css("display", "none");
        $("#mop option:selected").each(function() {
            console.log("old");
            if ($(this).val() == "full") {
                $(".full-breakdown").css("display", "block");
            } else if ($(this).val() == "semestral") {
                $(".semestral-breakdown").css("display", "block");
            } else if ($(this).val() == "quarterly") {
                $(".quarterly-breakdown").css("display", "block");
            } else if ($(this).val() == "monthly") {
                $(".monthly-breakdown").css("display", "block");
            }
        });
    });
});
