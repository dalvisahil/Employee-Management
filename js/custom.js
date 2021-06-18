var btnMobileNumber = $("#mobileNumberbtn");
var btnwMobileNumber = $("#wmobileNumberbtn");
var btnemail = $("#emailbtn");
btnMobileNumber.on("click",addField);
btnwMobileNumber.on("click",waddField);
btnemail.on("click", eaddField);


function addField(){
    var mobileNumbersDiv = $("#mobileNumbers");
    var mobileNumberCountDiv = $("#mobileNumberCount");
    var mobileNumberCount = $("#mobileNumberCount").val();
    var element = document.createElement("div");

    mobileNumberCount = parseInt(mobileNumberCount) + 1;

    element.setAttribute("id", "mobileNumber"+mobileNumberCount)
    element.innerHTML = "<input type='radio' value='mobileNumber_"+mobileNumberCount+"' name='mobileNumbers' class='float-end'><label for='mobileNumber"+mobileNumberCount+"' class='form-label'>Mobile number "+mobileNumberCount+"</label><input type='text' class='form-control d-inline'"+" id='mobilenumber"+mobileNumberCount+"' placeholder='0000000000' name='mobileNumber" +mobileNumberCount+"'>"

    mobileNumbersDiv.append(element);
    mobileNumberCountDiv.val(mobileNumberCount);
}

function waddField(){
    var mobileNumbersDiv = $("#wmobileNumbers");
    var mobileNumberCountDiv = $("#wmobileNumberCount");
    var mobileNumberCount = $("#wmobileNumberCount").val();
    var element = document.createElement("div");

    mobileNumberCount = parseInt(mobileNumberCount) + 1;
    element.setAttribute("id", "wmobileNumber"+mobileNumberCount)

    element.innerHTML = "<input type='radio' value='wmobileNumber_"+mobileNumberCount+"' name='wmobileNumbers'<label for='wmobileNumber"+mobileNumberCount+"' class='form-label'>Whatsapp number "+mobileNumberCount+"</label><input type='text' class='form-control d-inline'"+" id='wmobilenumber"+mobileNumberCount+"' placeholder='0000000000' name='wmobileNumber" +mobileNumberCount+"'>"

    mobileNumbersDiv.append(element);
    mobileNumberCountDiv.val(mobileNumberCount);
}

function eaddField(){
    var emailDiv = $("#emails");
    var emailCountDiv = $("#emailCount");
    var emailCount = $("#emailCount").val();
    var element = document.createElement("div");

    emailCount = parseInt(emailCount) + 1;
    element.setAttribute("id", "email"+emailCount)
    element.innerHTML = "<input type='radio' value='email_"+emailCount+"' name='emails' <input type='radio' value='email"+mobileNumberCount+"<label for='email"+emailCount+"' class='form-label'>Email address "+emailCount+"</label><input type='text' class='form-control d-inline'"+" id='email"+emailCount+"' placeholder='xyz@abc.com' name='email" +emailCount+"'>"

    emailDiv.append(element);
    emailCountDiv.val(emailCount);
}
