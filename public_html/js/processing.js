$("#txtName").keyup(function () {
    $("#Processing").modal("show");
});
$(document).ajaxComplete(function () {
    $("#Processing").modal("hide");
});
