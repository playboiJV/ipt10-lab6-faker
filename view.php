<?php
require 'FileUtility.php';

try {
    // Read data from persons.csv
    $data = FileUtility::readFromFile('persons.csv');

    if (count($data) > 0) {
        // Get headers
        $headers = array_shift($data);

        echo "<html><head><style>
                .container {
                    display: flex;
                    flex-wrap: wrap;
                }
                .person {
                    border: 1px solid #ccc;
                    margin: 10px;
                    padding: 10px;
                    width: 250px;
                    box-shadow: 0px 0px 5px #aaa;
                }
                .person h2 {
                    font-size: 18px;
                }
                .person div {
                    margin-bottom: 5px;
                }
              </style></head><body>";

        echo "<div class='container'>";

        foreach ($data as $row) {
            echo "<div class='person'>";
            for ($i = 0; $i < count($headers); $i++) {
                echo "<div><strong>" . htmlspecialchars($headers[$i]) . ":</strong> " . htmlspecialchars($row[$i]) . "</div>";
            }
            echo "</div>";
        }

        echo "</div></body></html>";
    } else {
        echo "No data found.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
