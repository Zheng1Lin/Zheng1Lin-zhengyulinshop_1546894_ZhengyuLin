<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $phoneNumber = $_POST["phoneNumber"];
    $password = $_POST["password"];

    $servername = "localhost";
    $dbUsername = "root";
    $dbPassword = "root";
    $dbName = "zhengyulinshop_1546894_zhengyulin";

    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT * FROM members WHERE phone_number = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $phoneNumber, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $member = $result->fetch_assoc();
        $memberId = $member["member_id"];

        $paymentSql = "SELECT * FROM payments WHERE member_id = $memberId";
        $paymentResult = $conn->query($paymentSql);

        echo "<h2>Payments</h2>";

        if ($paymentResult->num_rows > 0) {
            echo "<ul>";
            while ($payment = $paymentResult->fetch_assoc()) {
                echo "<li>Date: " . $payment["date"] . ", Amount: " . $payment["amount"] . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No payments found.</p>";
        }
    } else {
        echo "<p id='error-message'>Invalid phone number or password.</p>";
        echo "<button onclick='goBack()'>Go Back</button>";

        echo "<script>
                function goBack() {
                    window.history.back();
                }
              </script>";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid access.";
}
?>
