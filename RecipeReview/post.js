// function checkPost(event){
 
//     //event.preventDefault();
  
//     var valid = true;
      
//     var elements = event.currentTarget;
//     var title = elements[0].value; //title
//     var ing = elements[1].value; //ingredients
//     var ins = elements[2].value;//instructions

//     var msg_title = document.getElementById("msg_title");
//     var msg_ing = document.getElementById("msg_ing");
//     var msg_ins = document.getElementById("msg_ins");

//     msg_title.innerHTML = "";
//     msg_ing.innerHTML = "";
//     msg_ins.innerHTML = "";

//     var textNode;
//     var htmlNode;

//     if (title == null || title == "") {
        
//         textNode = document.createTextNode("Title is empty. ");
//         msg_title.appendChild(textNode);
//         valid = false;
//     } 
//     else if (title.length > 50) {
    
//         textNode = document.createTextNode("Title is too long. Maximum is 50 characters. ");
//         msg_title.appendChild(textNode);
//         valid = false;
//     }

//     if (ing == null || ing == "") {
        
//         textNode = document.createTextNode("Ingredients are empty. ");
//         msg_ing.appendChild(textNode);
//         valid = false;
//     } 

//     if (ins == null || ins == "") {
       
//         textNode = document.createTextNode("Instructions are empty. ");
//         msg_ins.appendChild(textNode);
//         valid = false;
//     } 



// }

function charcount1(str) {
	var lng = str.length;
	document.getElementById("charcount1").innerHTML = lng + ' out of 400 characters';
}

function charcount2(str) {
	var lng = str.length;
	document.getElementById("charcount2").innerHTML = lng + ' out of 400 characters';
}

function charcount3(str) {
	var lng = str.length;
	document.getElementById("charcount3").innerHTML = lng + ' out of 400 characters';
}