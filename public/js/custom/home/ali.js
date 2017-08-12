$(document).ready(function() {
  setInterval(function() {
    $.get('/e', function(data) {
      $('.row').html('');

      data = JSON.parse(data);
      console.log(data.length);
      for(var i=0;i<data.length;i++) {
        var d = data[i];
        var name = (d.Name == 'pizza') ? "پیتزا" : "برگر";
        var tag = '<div class="col-xs-4"><div class="thumbnail"><img src="assets/' + d.Url + '" style="width:60%"><div class="caption text-center"><p>' + name + ' ' + d.No + '</p></div></div></div>';
        $('.row').append(tag);
      }
    });
  }, 1000);
});
