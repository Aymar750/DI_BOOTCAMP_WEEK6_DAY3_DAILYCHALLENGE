<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Challenge</title>
</head>

<?php
$total_bill = $result = '';
if (isset($_POST['submit'])) {
    $units = $_POST['unit'];
    if (!empty($units)) {
        $result = calculate_bill($units);
        $total_bill = 'Total amount of ' . $units . ' : ' . $result;
    }
}

function calculate_bill($units)
{
    $unit_cost_first = 3.50;
    $unit_cost_second = 4.00;
    $unit_cost_third = 5.20;
    $unit_cost_fourth = 6.50;

    if ($units <= 50) {
        $bill = $units * $unit_cost_first;
    } else if ($units > 50 && $units <= 100) {
        $temp = 50 * $unit_cost_first;
        $remaining_units = $units - 50;
        $bill = $temp + ($remaining_units * $unit_cost_second);
    } else if ($units > 100 && $units <= 200) {
        $temp = (50 * 3.5) + (100 * $unit_cost_second);
        $remaining_units = $units - 150;
        $bill = $temp + ($remaining_units * $unit_cost_third);
    } else {
        $temp = (50 * 3.5) + (100 * $unit_cost_second) + (100 * $unit_cost_third);
        $remaining_units = $units - 250;
        $bill = $temp + ($remaining_units * $unit_cost_fourth);
    }
    return number_format((float)$bill, 2, '.', '');
}

?>

<body>
    <div>
        <h1>Calculate Electricity Bill</h1>

        <form action="" method="post">
            <input type="number" name="unit" placeholder="Please enter no. of Units" />
            <input type="submit" name="submit" value="Submit" />
        </form>

        <div>
            <?php echo '<br />' . $total_bill; ?>
        </div>
    </div>

</body>

</html>