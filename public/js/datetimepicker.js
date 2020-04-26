
$(function () {
    $('#datetimepicker12').datetimepicker({
        format: "YYYY/MM/DD",
        locale: 'ja',
        inline: true,
        sideBySide: true
    });
    $("#datetimepicker12").on("change.datetimepicker", function (e) {
        $("#input-date").val(e.date.format('YYYY/MM/DD'));
    });
});
