<?php
require 'FileUtility.php';
require 'Random.php';

try {
    // Generate 300 records
    $people = Random::generatePeople(300);

    // Convert array to CSV and save to file
    Random::arrayToCSV($people, 'persons.csv');

    echo "Data generated and saved to persons.csv.";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
