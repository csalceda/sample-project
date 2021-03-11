// for add_tuition
$(document).ready(function () {
    $(".form-group").on("input", ".tuition", function () {
        var totalSum = 0;
        $(".form-group .tuition").each(function () {
            var inputVal = $(this).val();
            if ($.isNumeric(inputVal)) {
                totalSum += parseFloat(inputVal);
            }
        });
        $("#total_fee").val(totalSum);
    });
});
