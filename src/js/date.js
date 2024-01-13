$(function () {
    $("#monthSelect").on("change", function () {
        BindDays();
    });
    $("#yearSelect").on("change", function () {
        BindDays();
    });
    BindDays();
});

function BindDays() {
    var month = $("#monthSelect").val();
    var dayDropDown = $("#daySelect");
    dayDropDown.empty();
    if (month == 2) {
        for (var i = 1; i <= 28; i++) {
            dayDropDown.append("<option value=" + i + ">" + i + "</option>");
        }
        var year = $("#yearSelect").val();
        if (parseInt(year) % 4 == 0) {
            dayDropDown.append("<option value='29'>29</option>");
        }
    }
    else if (month == 4 || month == 6 || month == 9 || month == 11) {
        for (var i = 1; i <= 30; i++) {
            dayDropDown.append("<option value=" + i + ">" + i + "</option>");
        }
    }
    else {
        for (var i = 1; i <= 31; i++) {
            dayDropDown.append("<option value=" + i + ">" + i + "</option>");
        }
    }
}
