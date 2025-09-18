<?php
// --- Database connection ---
$servername = "localhost";
$username   = "root";
$password   = "1234";
$dbname     = "pro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Fetch users in ascending order by id
$sql = "SELECT id, fullname, email FROM users ORDER BY id ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Spa & Wellness — Clients</title>
  <style>
    body{
      font-family: "Segoe UI", Arial, sans-serif;
      background: url('spa-bg.jpg') no-repeat center center/cover;
      margin:0; padding:0;
      color:#333;
    }
    .overlay{
      position:fixed;
      top:0; left:0; width:100%; height:100%;
      background:rgba(255,255,255,0.9);
    }
    .container{
      position:relative;
      z-index:1;
      max-width:700px;
      margin:60px auto;
      background:#fff;
      border-radius:20px;
      padding:30px 40px;
      box-shadow:0 8px 24px rgba(0,0,0,0.15);
    }
    h2{
      text-align:center;
      color:#2c3e50;
      margin-bottom:20px;
    }
    ol{
      padding-left:20px;
      font-size:15px;
    }
    li{
      padding:10px;
      border-bottom:1px solid #eee;
    }
    li:last-child{border:none;}
    .footer{
      text-align:center;
      margin-top:20px;
      font-size:12px;
      color:#999;
    }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="container">
    <h2>Registered Spa Clients</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<ol>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row['fullname']) . 
                 " (" . htmlspecialchars($row['email']) . ")</li>";
        }
        echo "</ol>";
    } else {
        echo "<p>No clients found.</p>";
    }
    ?>
    <div class="footer">&copy; <span id="year"></span> Spa & Wellness Center</div>
  </div>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
<?php
$conn->close();
?>
