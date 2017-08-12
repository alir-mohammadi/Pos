$(document).ready(function () {
    $('button').click(function () {
      if($(this).text() == 'پیتزا')
        name = 'pizza';
      else if($(this).text() == 'برگر')
        name = 'burger';
        $.ajax({
            method: 'get',
            url: '/b',
            data: {
                a : name
            }
        })
        .done(function (data) {
                console.log("$$$$$$$$$$$$4data: " + data);
        })
      .fail(function (statusText) {
           console.log("^^^^^^^" + statusText);
       });
    });
});
