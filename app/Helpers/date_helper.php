<?php

if (!function_exists('formatDateItalian')) {
    function formatDateItalian($date)
    {
        $day = strtolower(date('l', strtotime($date)));
        $month = strtolower(date('F', strtotime($date)));

        // Load the Italian language file for day and month names directly
        $dayNames = include(APPPATH . 'Language/italian/Time.php');

        $italianDay = $dayNames['days'][$day];
        $italianMonth = $dayNames['months'][date('n', strtotime($date)) - 1]; // Adjust month retrieval

        // Return the formatted date in Italian
        return ucfirst($italianDay) . date(' j ', strtotime($date)) . ucfirst($italianMonth) . date(' Y', strtotime($date));
    }
}
