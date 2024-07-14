<?php

// Str Pad Left Function
if (!function_exists('getStrPad')) {
  function getStrPad($value)
  {
    return str_pad($value, 2, '0', STR_PAD_LEFT);
  }
}
// Str Pad Left Function


// Department wise Subject Count Function
if (!function_exists('getDepartmentCount')) {
  function getDepartmentCount($id)
  {
    $subject = App\Models\Subject::where('department_id', $id)->count();
    return $subject;
  }
}
// Department wise Subject Count Function


// Percentage Calculation Function
if (!function_exists('getPercentage')) {
  function getPercentage($percentage, $total)
  {
    $percentages = ($percentage * 100) / $total;
    return $percentages;
  }
}
// Percentage Calculation Function
