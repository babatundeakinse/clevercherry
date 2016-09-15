/*$("#login-form").submit(function(e) {

  var url = "login.php"; // the script where you handle the form input.

  $.ajax({
     type: "POST",
     url: url,
     data: $("#login-form").serialize(), // serializes the form's elements.
     success: function(data)
     {
         alert(data.status); // show response from the php script.
         if(data.status==0){
           window.location.href = "user.php";
         }else{
           sweetAlert("Oops...", data.message , "error");
         }
     }
   });

  e.preventDefault(); // avoid to execute the actual submit of the form.
});*/
