// hide lrn input if grade level selected is nursery
$(document).ready(function() {
    $("#grade").change(function() {
        $(".lrn_input").css("display", "block");
        $("#grade option:selected").each(function() {
            console.log("old");
            if (
                $(this).val() == "1" ||
                $(this).val() == "2" ||
                $(this).val() == "3"
            ) {
                $(".lrn_input").css("display", "none");
            }
        });
    });
});
