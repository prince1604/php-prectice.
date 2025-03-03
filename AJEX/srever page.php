<?php
    
    $mysqli = new mysqli("servername", "username", "password", "dbname");

        if ($mysqli->connect_error) {
        exit('Could not connect');
    }

    
    $sql = "SELECT customerid, companyname, contactname, address, city, postalcode, country
            FROM customers WHERE customerid = ?";

    $stmt = $mysqli->prepare($sql);
    if (!$stmt) {
        exit('Prepare failed: ' . $mysqli->error);
    }

    $stmt->bind_param("s", $customerId);

    if (!$stmt->execute()) {
        exit('Execute failed: ' . $stmt->error);
    }

    $stmt->store_result();
    $stmt->bind_result($customerid, $companyname, $contactname, $address, $city, $postalcode, $country);

        if ($stmt->fetch()) {
        echo "<table>";
        echo "<tr><th>Customer ID</th><td>" . htmlspecialchars($customerid) . "</td></tr>";
        echo "<tr><th>Company Name</th><td>" . htmlspecialchars($companyname) . "</td></tr>";
        echo "<tr><th>Contact Name</th><td>" . htmlspecialchars($contactname) . "</td></tr>";
        echo "<tr><th>Address</th><td>" . htmlspecialchars($address) . "</td></tr>";
        echo "<tr><th>City</th><td>" . htmlspecialchars($city) . "</td></tr>";
        echo "<tr><th>Postal Code</th><td>" . htmlspecialchars($postalcode) . "</td></tr>";
        echo "<tr><th>Country</th><td>" . htmlspecialchars($country) . "</td></tr>";
        echo "</table>";
    } else {
        echo "No customer found with ID: " . htmlspecialchars($customerId);
    }

    $stmt->close();
    $mysqli->close();
?>
