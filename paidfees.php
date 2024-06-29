<?php

    include("connection.php");
    $sql_query = "SELECT 
                DATE_FORMAT(paid_date, '%Y-%m') AS payment_month, 
                SUM(amount) AS total_paid 
              FROM 
                fees1 
              GROUP BY 
                DATE_FORMAT(paid_date, '%Y-%m') 
              ORDER BY 
                payment_month";

// Execute the query
$query_result = mysqli_query($conn, $sql_query);

// Process the results into an array
$fees_data = [];
while ($row = mysqli_fetch_assoc($query_result)) {
    $fees_data[] = [
        'month' => $row['payment_month'],
        'total_paid' => $row['total_paid']
    ];
}

// Close the database connection
$conn->close();

// Convert data to JSON format for JavaScript usage
$fees_json = json_encode($fees_data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Month-wise Fees Paid Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="feesChart" width="800" height="200"></canvas>

    <script>
        // Parse the PHP data into JavaScript
        var feesData = <?php echo $fees_json; ?>;

        // Prepare arrays for Chart.js labels and data
        var labels = feesData.map(function(item) {
            return item.month;
        });

        var data = feesData.map(function(item) {
            return item.total_paid;
        });

        // Create the line chart
        var ctx = document.getElementById('feesChart').getContext('2d');
        var feesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Month-wise Fees Paid',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'pink',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
