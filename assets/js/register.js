$(document).ready(function() {

  //on click signup, hide login
  $('#signup').click(function() {
    $('#first').slideUp('slow', function(){
      $('#second').slideDown('slow');
    })
  });
  
  //on click login, hide signup
  $('#login').click(function() {
    $('#second').slideUp('slow', function(){
      $('#first').slideDown('slow');
    })
  });

});