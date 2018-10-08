<?php #Script for HTML form - IMS 422 Project 1

        // Get inputs
        $first = $_POST['first'];
        $last = $_POST['last'];
        $major = $_POST['major'];
        $hometown = $_POST['hometown'];
        $favorite = $_POST['favorite'];
        $namedFile = $_POST['userName'];
        


        //checks for form submission
        if(isset($_POST['submit'])) {  
            
            
            //Data trap for user inputs
            if($first == '' || $last == '' || $major == '' || $hometown == '' || $favorite == '') {

                $validate = 'Please complete the entire form';

            } // end input data trap if

            // No errors, then move on to formatting data
            else {
                
                // Create titles of csv columns
                $data = "First Name, Last Name, Major, Hometown, Favorite Movie\n"; 
                
                // Add data to CSV on new line
                $data .= "$first, $last, $major, $hometown, $favorite\n"; 


                // Name form data file
                $csv = $namedFile . '.csv'; 

                
                /*source for headers: https://gist.github.com/alexsegura/2995697*/
                
                header("Content-Type: application/csv");
                header('Content-Disposition: attachment; filename="' . $csv . '"');
                header("Pragma: no-cache");
                header("Expires: 0");

                echo $data;

                exit();

            } // end else 

        } // end post isset
                
        // if form is incomplete this will display
        if(isset($validate)) {

            echo "<p>$validate<br><a href = 'index.html'><button>Go back to form</button></a></p>"; 
        }


    ?>