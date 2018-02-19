
    //message text fields validation
    function validateForm(){
      var a = document.forms['compose_message']['sender'].value;
      var b = document.forms['compose_message']['message'].value;
      var x = document.forms['compose_message']['csv_list'].value;
      var y = document.forms['compose_message']['dbcontact'].value;
      var z = document.forms['compose_message']['pasted_num'].value;

      if (a == "") {
        alert("Fill Sender field");
        return false;
      } else if (b == ""){
        alert("Type a message to be sent, message must contain at least 10 characters");
        return false;
      } else if(x == "" && y == "" && z == ""){
        alert("Select one recipient channel before sending");
        return false;
      } else if((x && y) || (x && z) || (y && z)) {
        alert("Select only one recipient channel before sending");
        return false;
      }
    }

