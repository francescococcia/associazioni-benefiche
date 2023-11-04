<?php

if (!function_exists('formatDateItalian')) {
  function formatDateItalian($date)
  {
      $italianDays = [
          'Sunday' => 'Domenica',
          'Monday' => 'Lunedì',
          'Tuesday' => 'Martedì',
          'Wednesday' => 'Mercoledì',
          'Thursday' => 'Giovedì',
          'Friday' => 'Venerdì',
          'Saturday' => 'Sabato'
      ];

      $day = date('l', strtotime($date));
      $italianDay = $italianDays[$day];

      $italianMonths = [
          'January' => 'Gennaio',
          'February' => 'Gebbraio',
          'March' => 'Marzo',
          'April' => 'Aprile',
          'May' => 'Maggio',
          'June' => 'Giugno',
          'July' => 'Luglio',
          'August' => 'Agosto',
          'September' => 'Settembre',
          'October' => 'Ottobre',
          'November' => 'Novembre',
          'December' => 'Dicembre'
      ];

      $month = date('F', strtotime($date));
      $italianMonth = $italianMonths[$month];

      $dayNumber = date('j', strtotime($date)); // Day of the month
      $year = date('Y', strtotime($date));

      // Return the formatted date in Italian
      return $dayNumber . ' ' . $italianMonth . ' ' . $year;
  }
}