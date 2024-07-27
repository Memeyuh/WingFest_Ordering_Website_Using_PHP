function getAge(){
    var day = document.getElementById("dob").value;
    var DOB = new Date(day);
    var today = new Date();
    var Age = today.getTime() - DOB.getTime();
    Age = Math.floor(Age/(1000*60*60*24*365.25));

    document.getElementById("age").value = Age;
}