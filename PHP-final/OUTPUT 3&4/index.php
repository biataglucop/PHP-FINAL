<?php include './layout/head.php'; ?>
<?php include 'db_connect.php'; ?>

<h2 class="text-center">Patient Registration Form</h2>

<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<div class='alert alert-success'>Record added successfully!</div>";
}
?>

<form action="redirect.php" method="POST">
    <div class="mb-3">
        <label for="first_name" class="form-label">First Name:</label>
        <input type="text" class="form-control" name="first_name" required>
    </div>
    <div class="mb-3">
        <label for="middle_name" class="form-label">Middle Name:</label>
        <input type="text" class="form-control" name="middle_name">
    </div>
    <div class="mb-3">
        <label for="last_name" class="form-label">Last Name:</label>
        <input type="text" class="form-control" name="last_name" required>
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age:</label>
        <input type="number" class="form-control" name="age" required>
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Gender:</label>
        <select class="form-control" name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Address:</label>
        <input type="text" class="form-control" name="address" required>
    </div>
    <div class="mb-3">
        <label for="contact" class="form-label">Contact Number:</label>
        <input type="text" class="form-control" name="contact" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>

<hr>

<h2 class="text-center">List of Registered Patients</h2>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact Number</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT * FROM patients ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['first_name']}</td>
                <td>{$row['middle_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['age']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['email']}</td>
                <td>{$row['address']}</td>
                <td>{$row['contact']}</td>
            </tr>";
        }
        ?>
    </tbody>
</table>

<?php include './layout/foot.php'; ?>