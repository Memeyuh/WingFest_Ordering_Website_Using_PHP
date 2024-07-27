//COMPUTE AGE BASED ON BIRTHDAY
function getAge(){
    var day = document.getElementById("dob").value;
    var DOB = new Date(day);
    var today = new Date();
    var Age = today.getTime() - DOB.getTime();
    Age = Math.floor(Age/(1000*60*60*24*365.25));

    document.getElementById("age").value = Age;
}

function editAge(){
    var day = document.getElementById("dob2").value;
    var DOB = new Date(day);
    var today = new Date();
    var Age = today.getTime() - DOB.getTime();
    Age = Math.floor(Age/(1000*60*60*24*365.25));

    document.getElementById("age2").value = Age;
}

//GET USER ID
function getUserID(){
    var userID = document.getElementById("UID").value;
    document.getElementById("UID").value = userID;
}
