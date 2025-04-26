<?php
# Machine Problem 1 
function parts_sums($ls) {
    $result = [];
    $sum = array_sum($ls); // Total sum at start
    $result[] = $sum;

    foreach ($ls as $num) {
        $sum -= $num;
        $result[] = $sum;
    }

    return $result;
}

echo "<pre>";
$ls = [1, 2, 3, 4, 5, 6];
print_r(parts_sums($ls));

# Machine Problem 2 
function bottle_collector($daily_expense, $expeditions) {
    $total_earnings = 0;
    $days = count($expeditions);

    foreach ($expeditions as $day) {
        // Split the string into parts
        list($hours, $path, $price) = explode(" ", $day);
        $hours = (int)$hours;
        $price = (float)$price;

        $path_length = strlen($path);
        $full_loops = intdiv($hours, $path_length);
        $remaining_hours = $hours % $path_length;

        // Count bottles (B) in full path
        $bottles_in_full_path = substr_count($path, 'B');

        // Count bottles (B) in partial path
        $partial_path = substr($path, 0, $remaining_hours);
        $bottles_in_partial_path = substr_count($partial_path, 'B');

        // Total bottles found
        $total_bottles = ($bottles_in_full_path * $full_loops) + $bottles_in_partial_path;

        // Earnings for the day
        $day_earning = $total_bottles * $price;

        $total_earnings += $day_earning;
    }

    // Calculate average earnings
    $average_earning = $total_earnings / $days;
    $average_earning = round($average_earning, 2);

    $total_daily_expenses = $daily_expense * $days;
    $total_daily_expenses = round($total_daily_expenses, 2);

    if ($average_earning > $daily_expense) {
        $extra = round($average_earning - $daily_expense, 2);
        return "Good earnings. Extra money per day: {$extra}";
    } else {
        $needed = round($total_daily_expenses - $total_earnings, 2);
        return "Hard times. Money needed: {$needed}";
    }
}


$daily_expense = 50;
$expeditions = [
    "8 ABMRB 24.50",
    "10 ABBRB 30.00",
    "6 BMB 20.00"
];

echo bottle_collector($daily_expense, $expeditions);
?>
