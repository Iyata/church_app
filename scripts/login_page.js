
     function validateForm() {

       var x = document.forms["login"]["username"].value;
       var y = document.forms["login"]["password"].value;
       if (x == "") {
           alert("Username must be filled out");
           return false;
       } else if (y == "") {
           alert("Password must be filled out");
           return false;
       }
   }