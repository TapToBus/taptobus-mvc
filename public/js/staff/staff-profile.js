$(document).ready(function() {
    $("#edit-button").click(function() {
      $("#edit-form").toggle();
    });
    
    $("#save-button").click(function() {
      $("#name").text($("#profile-name").val());
      $("#email").text($("#profile-email").val());
      $("#edit-form").toggle();
    });
  });