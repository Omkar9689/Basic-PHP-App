<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Portal</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background: #f4f7f6; display: flex; flex-direction: column; align-items: center; padding: 40px; }
        .card { background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); width: 100%; max-width: 500px; margin-bottom: 30px; }
        h2 { color: #333; margin-top: 0; }
        input { width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 6px; box-sizing: border-box; }
        button { background: #007bff; color: white; border: none; padding: 12px 20px; border-radius: 6px; cursor: pointer; width: 100%; font-size: 16px; }
        button:hover { background: #0056b3; }
        table { width: 100%; max-width: 800px; border-collapse: collapse; background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05); }
        th, td { text-align: left; padding: 15px; border-bottom: 1px solid #eee; }
        th { background: #007bff; color: white; }
    </style>
</head>
<body>

<div class="card">
    <h2>Employee Registration</h2>
    <form method="POST" action="index.php">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="text" name="position" placeholder="Job Position" required>
        <button type="submit" name="submit">Register Employee</button>
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Position</th>
            <th>Date Joined</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($employees as $emp): ?>
        <tr>
            <td><?= htmlspecialchars($emp['name']) ?></td>
            <td><?= htmlspecialchars($emp['email']) ?></td>
            <td><?= htmlspecialchars($emp['position']) ?></td>
            <td><?= $emp['created_at'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>