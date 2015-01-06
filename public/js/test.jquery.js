$(document).ready(function(){
  $("#form").submit(function(){
    var name = $("#name").val();
      $.ajax({
        type: 'POST',
        url: 'http://laravel/save',
        data: {name:name},
        success: function(data){
          console.log(data);
        }
      });
    return false;
  });
});
