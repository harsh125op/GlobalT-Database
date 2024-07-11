<?php
include("connect.php")
//error_reporting(0);
?>
<html>
<head>
<style>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 20px;
        }

        h2 {
            color: #333;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
        }

        input[type="text"] {
            padding: 8px;
            margin-right: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result {
            background-color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .result hr {
            border: 1px solid #ddd;
        }

        .no-results {
            color: #888;
            font-style: italic;
        }
    </style>
</style>
</head>
<body>
<center>

<form action="s.php" method="GET">
ENTER THE PATTERN TO BE MATCHED BASED ON YOUR RECENT MONITORING:<input type="text" name="pattern" value""><br>
<input type="submit" value="click me"> </form>
</center>
</body>
</html>
