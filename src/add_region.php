<?php
    require('../config/database.php');
    $query = "
    SELECT id, name FROM countries WHERE status = true
    ";
$countries = pg_query($conn_supa, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market - Add Region</title>
    <link rel="icon" href="icons/map.png" type="image/png">
</head>
<body>
    <center><h1>Add Region</h1></center>
    <form action="add_region1.php" method="post">
        <table align="center">
            <tr><td><label>Name:</label></td></tr>
            <tr><td><input type="text" name="name" placeholder="Nariño" required></td></tr>
            <tr><td><label>Abbreviation:</label></td></tr>
            <tr><td><input type="text" name="abbrev" placeholder="NAR" maxlength="5" required></td></tr>
            <tr><td><label>Code:</label></td></tr>
            <tr><td><input type="text" name="code" placeholder="52001" required></td></tr>
            <tr><td><label>Country:</label></td></tr>
            <tr><td>
                <select name="country_id" required>
                    <?php while ($row = pg_fetch_assoc($countries)): ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></option>
                    <?php endwhile; ?>
                </select>
            </td></tr>
            <tr><td><center>
                <button style="background-color: rgb(240, 121, 119); margin-top: 1ex; margin-bottom: 1ex;">
                    Create
                </button>
            </center></td></tr>

            <tr><td style="text-align: center;">
                <img src="icons/map.png" alt="Region Icon" width="24" height="24">
            </td></tr>
        </table>
    </form>
</body>
</html>