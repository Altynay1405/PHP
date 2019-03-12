<!DOCTYPE html>
<?php
include("config.php");



$boro = $_GET["ZIPCODE"];
echo "<p>Selected Zipcode: $boro</p>";

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Test1</title>
        <script>
            function reload(form) {
                var val = form.br.options[form.br.options.selectedIndex].value;
                self.location = 'index.php?ZIPCODE=' + val;
            }
        </script>
    </head>
    <body>
        <?php

        // Attempt first boro select query execution
        $sql = "SELECT DISTINCT ZIPCODE from restaurants_report order by ZIPCODE";

        $result = $conn->query($sql);

        echo "<form name='frm1' action='index.php' method=''>";

        if ($result->num_rows > 0) {
            echo "<label>Select a Zipcode: </label>";
            echo "<select name='br'  onchange=\"reload(this.form)\">\n<option>Select a ZIPCODE</option>\n";

            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["ZIPCODE"] . "'>" . $row["ZIPCODE"] . "</option>\n";
            }
            echo "</select>\n";
        } else {
            echo "0 results";
        }

        echo "</form>\n\n";

        ////////////////// Records by Selected Boro //////////////////

        $sql2 = "SELECT * "
                . "from restaurants_report "
                . "where ZIPCODE = '$boro' "
                . "order by zipcode";

        $result = $conn->query($sql2);

        echo "<h3>Total Records: $result->num_rows</h3>\n<table border='1'>\n"
        . "\t<tr>\n"
        . "\t\t<th>ID</th>\n"
        . "\t\t<th>DBA</th>\n"
        . "\t\t<th>Bldg</th>\n"
        . "\t\t<th>Street</th>\n"
        . "\t\t<th>BORO</th>\n"
        . "\t\t<th>Zip Code</th>\n"
        . "\t\t<th>Phone</th>\n"
        . "\t\t<th>Inspection Date</th>\n"
        . "\t\t<th>Score</th>\n"
        . "\t\t<th>Grade</th>\n"
        . "\t</tr>\n";

        if ($result->num_rows > 0) {
            while ($row1 = $result->fetch_assoc()) {
                echo "\t<tr>\n";
                echo "\t\t<td>" . $row1["CAMIS"] . "</td>\n";
                echo "\t\t<td>" . $row1["DBA"] . "</td>\n";
                echo "\t\t<td>" . $row1["BUILDING"] . "</td>\n";
                echo "\t\t<td>" . $row1["STREET"] . "</td>\n";
                echo "\t\t<td>" . $row1["BORO"] . "</td>\n";
                echo "\t\t<td>" . $row1["ZIPCODE"] . "</td>\n";
                echo "\t\t<td>" . $row1["PHONE"] . "</td>\n";
                echo "\t\t<td>" . $row1["INSPECTION_DATE"] . "</td>\n";
                echo "\t\t<td>" . $row1["SCORE"] . "</td>\n";
                echo "\t\t<td>" . $row1["GRADE"] . "</td>\n";
                echo "\t</tr>\n";
            }
        }

        echo "</table>\n<br><p>End of Report</p>";

        $conn->close();
        ?>

    </body>
</html>
