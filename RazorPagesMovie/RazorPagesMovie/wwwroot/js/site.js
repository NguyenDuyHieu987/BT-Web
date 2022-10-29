// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.
$('#callAjax').click(function () {
  $.ajax({
    type: 'POST',
    url: '/Index?handler=GetAjax',
    data: { name: 'Mark' },
    contentType: 'application/x-www-form-urlencoded',
    dataType: 'json',
    headers: {
      RequestVerificationToken: $(
        'input:hidden[name="__RequestVerificationToken"]'
      ).val(),
    },
    success: function (msg) {
      alert(msg);
    },
  });
});
