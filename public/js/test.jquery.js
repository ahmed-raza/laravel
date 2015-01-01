$(document).ready(function(){
  $("#form").submit(function(){
    var name = $("#name").val();
      $.ajax({
        url: 'http://localhost/save',
        data: {name,name},
        success: function(data){
          console.log(data);
        }
      },"json");
    return false;
  });
});
