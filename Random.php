<?php
require 'vendor/autoload.php'; // Make sure you have installed FakerPHP using Composer

use Faker\Factory;

class Random {
    public static function generatePeople($count) {
        $faker = Factory::create('en_PH'); // Set locale to Filipino

        $people = [];
        for ($i = 0; $i < $count; $i++) {
            $people[] = [
                'UUID' => $faker->uuid,
                'Title' => $faker->title,
                'First Name' => $faker->firstName,
                'Last Name' => $faker->lastName,
                'Street Address' => $faker->streetAddress,
                'Barangay' => $faker->citySuffix,
                'Municipality' => $faker->city,
                'Province' => $faker->state,
                'Country' => $faker->country,
                'Phone Number' => $faker->phoneNumber,
                'Mobile Number' => $faker->phoneNumber,
                'Company Name' => $faker->company,
                'Company Website' => $faker->domainName,
                'Job Title' => $faker->jobTitle,
                'Favorite Color' => $faker->safeColorName,
                'Birthdate' => $faker->date,
                'Email Address' => $faker->email,
                'Password' => $faker->password
            ];
        }

        return $people;
    }

    public static function arrayToCSV($array, $filename) {
        $file = fopen($filename, 'w');

        // Add header
        fputcsv($file, array_keys($array[0]));

        // Add data
        foreach ($array as $row) {
            fputcsv($file, $row);
        }

        fclose($file);
    }
}
?>
