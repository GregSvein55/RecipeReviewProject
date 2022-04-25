function LogIn(event){

    event.preventDefault();

    var elements = event.currentTarget;
    var email = elements[0].value; //Email
    var uname = elements[1].value; //Username
    var pswd = elements[2].value; //password

    var regex_email = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;//email form
    var regex_pswd  = /^\S+$/;//no spaces

    var msg_email = document.getElementById("msg_email");
    var msg_pswd = document.getElementById("msg_pswd");

    msg_email.innerHTML  = "";
    msg_pswd.innerHTML = "";

    var textNode;
    var htmlNode;

    var valid = true;


    if (email == null || email == "") {
        textNode = document.createTextNode("Email address empty. ");
        msg_email.appendChild(textNode);
        valid = false;
      } 
      else if (regex_email.test(email) == false) {
        textNode = document.createTextNode("Email address wrong format. example: username@somewhere.sth ");
        msg_email.appendChild(textNode);
        valid = false;
      }

      if (pswd == null || pswd == "") {
        textNode = document.createTextNode("Password is empty. ");
        msg_pswd.appendChild(textNode);
        valid = false;
      }
      else if (regex_pswd.test(pswd) == false) {
          textNode = document.createTextNode("Password cannot contain spaces ");
          msg_pswd.appendChild(textNode);
          valid = false;
        }
        else if (pswd.length < 8) {
          textNode = document.createTextNode("Password must be at least 8 characters. ");
          msg_pswd.appendChild(textNode);
          valid = false;
        }






}