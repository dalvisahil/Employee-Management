<?php
require_once "app/init.php";

if(!empty($_POST)){
    $name = $_POST['fullName'];
    $address_1 = $_POST['address1'];
    $address_2 = $_POST['address2'];
    $location = $_POST['location'];
    $zipCode = $_POST['zipCode'];
    $postalArea = $_POST['postalArea'];
    $taluka = $_POST['taluka'];
    $suburb = $_POST['suburb'];
    $direction = $_POST['direction'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];

    $totalMobileNumbers = $_POST['totalMobileNumbers'];
    $totalWhatsappNumbers = $_POST['wtotalMobileNumbers'];
    $totalEmails = $_POST['totalEmails'];

    $mobileNumbers[] = $totalMobileNumbers;
    $whatsAppNumbers[] = $totalWhatsappNumbers;
    $emails[] = $totalEmails;

    for($i=1; $i<=$totalMobileNumbers; $i++){
        $number = 'mobileNumber'.$i;
        $mobileNumbers[$i] = $_POST[$number];
        if($i<=$totalMobileNumbers){
            $temp = explode("_",$_POST['mobileNumbers']);
            $mobileNumbers[$i+1] = $temp['1'];
        }
    }

    for($i=1; $i<=$totalWhatsappNumbers; $i++){
        $number = 'wmobileNumber'.$i;
        $whatsAppNumbers[$i] = $_POST[$number];
        if($i<=$totalWhatsappNumbers){
            $temp = explode("_",$_POST['wmobileNumbers']);
            $whatsAppNumbers[$i+1] = $temp['1'];
        }
    }

    for($i=1; $i<=$totalEmails; $i++){
        $number = 'email'.$i;
        $emails[$i] = $_POST[$number];
        if($i<=$totalEmails){
            $temp = explode("_",$_POST['emails']);
            $emails[$i+1] = $temp['1'];
        }
    }
    
    $employeeId = $database->table('employees_name')->insert([
        'name' => $name
    ]);
    
    $database->table('employees_address')->insert([
        'employee_id' => $employeeId,
        'address_1' => $address_1,
        'address_2' => $address_2,
        'location' => $location,
        'zip_code' => $zipCode,
        'postal_area' => $postalArea,
        'taluka' => 
    ]);
    




}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>
    <div class="container-fluid">
    <form action="addEmployee.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <h5>Employee Name</h5>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="name" class="form-label">Employee Name</label>
                    <input type="text" class="form-control d-inline" id="name" placeholder="Employee Name" name="fullName">
                </div>
            </div>
        </div>

        <div class="row">
            <h5>Address Details</h5>
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address1" class="form-label">Address 1*</label>
                    <input type="text" class="form-control d-inline" id="email" placeholder="Address 1" name="address1">
                </div>

                <div class="mb-3">
                    <label for="zipCode" class="form-label">Zip/Postal Code</label>
                    <input type="text" class="form-control d-inline" id="zipCode" placeholder="00000" name="zipCode">
                </div>

                <div class="mb-3">
                    <label for="suburb" class="form-label">Suburb</label>
                    <input type="text" class="form-control d-inline" id="suburb" placeholder="Suburb" name="suburb">
                </div>

                <div class="mb-3">
                    <label for="district" class="form-label">District</label>
                    <input type="text" class="form-control d-inline" id="district" placeholder="District" name="district">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="address2" class="form-label">Address 2</label>
                    <input type="text" class="form-control d-inline" id="address2" placeholder="Address 2" name="address2">
                </div>

                <div class="mb-3">
                    <label for="postalArea" class="form-label">Postal Area</label>
                    <input type="text" class="form-control d-inline" id="postalArea" placeholder="Postal Area" name="postalArea">
                </div>

                <div class="mb-3">
                    <label for="direction" class="form-label">EastWest</label>
                    <input type="text" class="form-control d-inline" id="direction" placeholder="East/West" name="direction">
                </div>

                <div class="mb-3">
                    <label for="state" class="form-label">State</label>
                    <select class="form-select" id="state" name="state">
                        <option value="maharashtra" selected>Maharashtra</option>
                        <option value="gujrat">gujrat</option>
                        <option value="delhi">Delhi</option>
                        <option value="uttarPradesh">Uttar Pradesh</option>
                    </select>
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="location" class="form-label">Location</label>
                    <input type="text" class="form-control d-inline" id="location" placeholder="Location" name="location">
                </div>

                <div class="mb-3">
                    <label for="taluka" class="form-label">Taluka</label>
                    <input type="text" class="form-control d-inline" id="taluka" placeholder="Taluka" name="taluka">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control d-inline" id="city" placeholder="City" name="city">
                </div>

                <div class="mb-3">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select" id="country" name="country">
                        <option value = "india"selected>India</option>
                        <option value="dubai">Dubai</option>
                        <option value="china">China</option>
                        <option value="bangladesh">Bangladesh</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <h5>Contact Details</h5>
                <div class="col-md-4">
                    <div>
                        <h4 class="d-inline">Mobile Number</h4>
                        <span class="btn-primary float-end p-1" id="mobileNumberbtn">+</span>
                    </div>
                    <div class="mb-3" id="mobileNumbers">
                        
                        <input type="hidden" value="1" name="totalMobileNumbers" id="mobileNumberCount">
                        <div id="mobileNumber1">
                            <input type="radio" value="mobileNumber_1" name="mobileNumbers" class="float-end" checked>
                            <label for="mobileNumber1" class="form-label">Mobile number</label>
                            <input type="text" class="form-control d-inline" id="mobilenumber1" placeholder="0000000000" name="mobileNumber1">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div>
                        <h4 class="d-inline">WhatsApp Number</h4>
                        <span class="btn-primary float-end p-1" id="wmobileNumberbtn">+</span>
                    </div>
                    <div class="mb-3" id="wmobileNumbers">
                        
                        <input type="hidden" value="1" name="wtotalMobileNumbers" id="wmobileNumberCount">
                        <div id="wmobileNumber1">
                            <input type="radio" value="wmobileNumber_1" name="wmobileNumbers" class="float-end" checked>
                            <label for="wmobileNumber1" class="form-label">Whatsapp number</label>
                            <input type="text" class="form-control d-inline" id="wmobilenumber1" placeholder="0000000000" name="wmobileNumber1">
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div>
                        <h4 class="d-inline">Email Address</h4>
                        <span class="btn-primary float-end p-1" id="emailbtn">+</span>
                    </div>
                    <div class="mb-3" id="emails">
                        <input type="hidden" value="1" name="totalEmails" id="emailCount">
                        <div id="email1">
                            <input type="radio" value="email_1" name="emails" class="float-end" checked>
                            <label for="email1" class="form-label">Email Address</label>
                            <input type="text" class="form-control d-inline" id="email1" placeholder="xyz@abc.com" name="email1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <button type="submit">Save</button>
            </div>
        </div>
        </form>
    </div>

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/custom.js"></script>
</body>
</html>