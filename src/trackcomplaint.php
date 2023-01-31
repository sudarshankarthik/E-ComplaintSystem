<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./styles/tracking.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <?php include './includes/header.php';?>
    </nav>
    <header>
        <h1>Want to know your complaint status</h1>
        <p>
            Check how far your complaint has reached... <br>
            You can now view your complaint details and current position of your complaint. Was your complaint rejected dont worry you can check why and reopen complaint.
        </p>
        <h2>Your complaint id</h2>
        <label class="complaintLable">
            <span id="complaintSpan">#</span>
            <input type="text" name="complaintInput" id="complaintId">
        </label>
    </header>
    <main>
        <div class="complaint dtls">

        </div>
        <div class="complaint pos">

        </div>
        <div class="complaint actions"></div>
    </main>
    <footer>

    </footer>
</body>
</html>