function addRating(event){

    document.getElementById("rating").stepUp();
   
}

function subRating(event){

    document.getElementById("rating").stepDown();

}

function hideButton(){

    var num = document.getElementById("rating");

    if(rating == 0){
        document.getElementById("minus").style.visibility="hidden";
    }
    else if(rating == 5){
        document.getElementById("plus").style.visibility="hidden";
    }
    else{
        document.getElementById("plus").style.visibility="visible";
        document.getElementById("minus").style.visibility="visible";
    }


}


function newRating() {
    
    var xmlhttp = new XMLHttpRequest();

    // access the onreadystatechange event for the XMLHttpRequest object
    xmlhttp.addEventListener("submit", recieveRating, false);
    
    //Do these three lines to prepare a POST
    xmlhttp.open("POST", "newRating.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        
    var rating = document.getElementById("rating");

    xmlhttp.send(rating);

} 

function recieveRating() {
    
    

} 