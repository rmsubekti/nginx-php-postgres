<!DOCTYPE html>
<head>
    <title>Hello World!</title>
</head>

<body>
<h1>Hello World!</h1>
<p><?php echo 'We are running PHP, version: ' . phpversion(); ?></p>
<?
$database ="testrmdb";
$user = "ecomuser";
$password = "supersecretpassword";
$host = "pgsql";

$connection = new PDO("pgsql:host={$host};port=5432;dbname={$database}", $user, $password);
$query = $connection->query("SELECT TABLE_NAME FROM information_schema.TABLES WHERE TABLE_TYPE='BASE TABLE'");
$tables = $query->fetchAll(PDO::FETCH_COLUMN);

if (empty($tables)) {
    echo "<p>There are no tables in database ". $database.".</p>";
   } else {
    echo "<p>Database ".$database." has the following tables:</p>";
    echo "<ul>";
    foreach ($tables as $table) {
        echo "<li>{$table}</li>";
    }
    echo "</ul>";
   }
?>
</body>