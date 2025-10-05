<?php include 'database.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>To-Do List</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f5f5f5;
    margin: 0;
    padding: 0;
}
.container {
    width: 400px;
    margin: 80px auto;
    background: #fff;
    padding: 20px 30px;
    border-radius: 12px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}
h1 {
    text-align: center;
    margin-bottom: 20px;
}
form {
    display: flex;
    margin-bottom: 20px;
}
input[type="text"] {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px 0 0 6px;
    outline: none;
}
button {
    padding: 10px 15px;
    border: none;
    background: #007bff;
    color: white;
    border-radius: 0 6px 6px 0;
    cursor: pointer;
}
button:hover {
    background: #0056b3;
}
ul {
    list-style: none;
    padding: 0;
}
li {
    padding: 10px;
    background: #fafafa;
    border-bottom: 1px solid #eee;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
li.done span {
    text-decoration: line-through;
    color: gray;
}
.actions button {
    border: none;
    background: none;
    cursor: pointer;
    color: #007bff;
    margin-left: 8px;
}
.actions button:hover {
    color: #d00;
}
</style>
</head>
<body>
<div class="container">
    <h1>📝 To-Do List</h1>

    <form action="add.php" method="POST">
        <input type="text" name="task" placeholder="Enter a new task..." required>
        <button type="submit">Add</button>
    </form>

    <ul>
        <?php
        $result = $conn->query("SELECT * FROM tasks ORDER BY id DESC");
        while ($row = $result->fetch_assoc()) {
            $doneClass = $row['is_done'] ? 'done' : '';
            echo "<li class='$doneClass'>
                    <span>{$row['task']}</span>
                    <div class='actions'>
                        <form style='display:inline;' action='done.php' method='POST'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit'>✔</button>
                        </form>
                        <form style='display:inline;' action='delete.php' method='POST'>
                            <input type='hidden' name='id' value='{$row['id']}'>
                            <button type='submit'>🗑</button>
                        </form>
                    </div>
                  </li>";
        }
        ?>
    </ul>
</div>
</body>
</html>
