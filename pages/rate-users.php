<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rate Users</title>
   
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
        }
        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #004d00;
            padding-top: 20px;
        }
        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }
        .sidebar a:hover {
            background-color: #003300;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
            width: calc(100% - 260px);
        }
        .card {
            background-color: white;
            border: 1px solid #004d00;
            border-radius: 8px;
            margin: 10px 0;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card h2 {
            color: #004d00;
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            color: #004d00;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #004d00;
            border-radius: 4px;
        }
        .form-group button {
            background-color: #004d00;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #003300;
        }
    
        .form-container {
            width: 60%; /* Set the width of the form container */
            margin: 0 auto; /* Center the form container */
        }
    
    
        </style>
</head>
<body>
    <div class="sidebar">
        <a href="index.php">Home</a>
        <a href="post-opportunity.php">Post Opportunity</a>
        <a href="view-applications.php">View Applications</a>
        <a href="rate-users.php">Rate Users</a>
        <a href="message-users.php">Message Users</a>
    </div>
    <div class="content">
        <div class="card">
            <h2>Rate Users</h2>
            <div class="form-group">
                <label for="user">Select User:</label>
                <select id="user">
                    <option value="">-- Select User --</option>
                    <option value="1">John Doe</option>
                    <!-- Add more users here as needed -->
                </select>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <input type="number" id="rating" min="1" max="5">
            </div>
            <div class="form-group">
                <button type="button">Submit Rating</button>
            </div>
        </div>
    </div>
</body>
</html>
