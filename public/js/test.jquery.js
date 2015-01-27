$(document).ready(function(){
  $("#form").submit(function(){
    var name = $("#name").val();
      $.post('save', {name: name}, function(data){
        alert(data);
      });
    return false;
  });
  $('#video').prop("volume", '0.2');
});
