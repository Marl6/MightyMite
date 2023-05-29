<?php
if (!isset($_SESSION['EMPID'])) {
    redirect(web_root."admin/index.php");
}
?>

<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Sales Report
    </div>
    <div class="card-body">
        <div class="chart-container">
            <canvas id="orderChart"></canvas>
        </div>
    </div>
</div>

<?php
$mydb->setQuery("SELECT Order_ID, Product_ID, Quantity, Total_Amount, DATE(Order_Date) AS Order_Date FROM tblorder ORDER BY Order_Date;");
$cur = $mydb->loadResultList();

// Prepare data for the chart
$dates = [];
$counts = [];

foreach ($cur as $result) {
    $orderDate = $result->Order_Date;

    // Check if the date exists in the array
    if (array_key_exists($orderDate, $dates)) {
        // Increment the count for the existing date
        $dates[$orderDate]++;
    } else {
        // Add a new date entry with count 1
        $dates[$orderDate] = 1;
    }
}

// Sort the dates in ascending order
ksort($dates);

// Extract the dates and counts into separate arrays
foreach ($dates as $date => $count) {
    $formattedDate = date("Y-m-d", strtotime($date));
    $counts[] = $count;
    $formattedDates[] = $formattedDate;
}

// Convert data arrays to JSON format for JavaScript usage
$countsJSON = json_encode($counts);
$formattedDatesJSON = json_encode($formattedDates);
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Retrieve chart data from PHP variables
        var counts = <?php echo $countsJSON; ?>;
        var formattedDates = <?php echo $formattedDatesJSON; ?>;

        var ctx = document.getElementById("orderChart").getContext("2d");
        new Chart(ctx, {
            type: "bar",
            data: {
                labels: formattedDates,
                datasets: [{
                    label: "Number of Products Sold",
                    data: counts,
                    backgroundColor: "rgba(54, 162, 235, 0.6)",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0,
                        stepSize: 1
                    }
                }
            }
        });
    });
</script>
