<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['name']) && isset($_POST['email']) &&
        isset($_POST['distt']) && isset($_POST['message'])) {
        
        $username = $_POST['name'];
        $password = $_POST['email'];
        $gender = $_POST['distt'];
        $email = $_POST['message'];
       

        $host = "localhost:80";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "majorproject";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM register WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(name, email, distt, message) values(?, ?, ?, ?)";

            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;

            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssii",$name, $email, $distt, $message);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>