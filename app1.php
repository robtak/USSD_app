<?php
require('config.php');

function get_results ($a){
  $connection = mysqli_connect('localhost','root','');
  if (!$connection){
    die('Database Connection Failed');
  }

  $db_select = mysqli_select_db($connection, 'nca_std_db');
  if (!$db_select){
    die('Database Selection Failed.');
  }
 
  $query = "SELECT * FROM `nca_ta_db` WHERE devmodelno='$a'";
  $query_exec = mysqli_query($connection, $query);
    if(!$query_exec){
      die("Error connection to table");
    }
                  
  $query_data = mysqli_fetch_assoc($query_exec);
    if (!$query_data){
       die("Could not query database");
    }
                  
  $response = "CON Device has been approved by the NCA. Below are the device information\n\nBrand: ".$query_data['devbrand']."\nType: ".$query_data['devtype']."\nModel No: ".$query_data['devmodelno']."\nManuffacturer: ".$query_data['devmanufacturer']."\nType Approval No: ".$query_data['devtan']."\nApproval Year: ".$query_data['devapprovalyear'];
}
 
        
        $text=$_GET['USSD_STRING'];
        $phonenumber=$_GET['MSISDN'];
        $serviceCode=$_GET['serviceCode'];
        $level = explode("*", $text);

        

        switch ($text) {
          case "":
            $response="CON Welcome to the NATIONAL COMMUNICATIONS AUTHORITY verification portal.\nPlease select one service option\n\n1. Equipment Type Approval \n2. Dealership";
            break;                  
          case 1:
            $response="CON Welcome to Equipment Type Approval verification.Please select device type\n\n1. Mobile Phone\n2. Tablet\n3. Network Device";
         
            if(isset($level[1]) && $level[1]!="" && $level[1] == 1 && !isset($level[2])){
              $response="CON Please enter mobile phone model number or trade name";              
            }
            else if(isset($level[1]) && $level[1]!="" && $level[1] == 2 && !isset($level[2])){
              $response="CON Please enter tablet model number or trade name";
              
            }
            else if(isset($level[1]) && $level[1]!="" && $level[1] == 3 && !isset($level[2])){
              $response="CON Please enter model number or trade name the network device";
              
            }
            else if(isset($level[2]) && $level[2]!="" && !isset($level[3])){

              $query = "SELECT * FROM `nca_ta_db` WHERE devmodelno='$level[2]'";
              $query_exec = mysqli_query($connection, $query);
                if(!$query_exec){
                  die("Error connection to table");
                }
                              
              $query_data = mysqli_fetch_assoc($query_exec);
                if (!$query_data){
                   die("Could not query database");
                }
                              
              $response = "CON Device has been approved by the NCA. Below are the device information\n\nBrand: ".$query_data['devbrand']."\nType: ".$query_data['devtype']."\nModel No: ".$query_data['devmodelno']."\nManuffacturer: ".$query_data['devmanufacturer']."\nType Approval No: ".$query_data['devtan']."\nApproval Year: ".$query_data['devapprovalyear'];
                          
              
            }
            
                // $response="CON Please enter mobile phone model number or trade name";
               
                // $response="CON Please enter tablet model number or trade name";
                
                // $response="CON Please enter model number or trade name the network device";
               
            
            // if(isset($level[1]) && $level[1]!="" && !isset($level[2])){          
            //   //Database Query
          

              
              
            // }
            break;
          case 2:
            $response="CON Welcome to the Dealership verification.\nPlease entered registered name of dealer.";
            if(isset($level[1]) && $level[1]!="" && !isset($level[2])){              
              // Database search and response

              $query = "SELECT * FROM `nca_dea_db` WHERE deacompname='$level[1]'";
              $query_exec = mysqli_query($connection, $query);
              if(!$query_exec){
                die("Error connection to table");
              }
              
              $query_data = mysqli_fetch_assoc($query_exec);
              if (!$query_data){
                die("Could not query database");
              }
              
              $response = "CON Dealer is approved by the NCA. Below is dealer information\n\nCompany Name: ".$query_data['deacompname']."\nLicence Class: ".$query_data['dealinclass']."\nProducts: ".$query_data['deaproduct']."\nDealer Registration Date: ".$query_data['dearegdate']."\nDealer Location: ".$query_data['dealocation'];

            }
            break;

          }
      

        header('Content-type: text/plain');
        echo $response;
?>
