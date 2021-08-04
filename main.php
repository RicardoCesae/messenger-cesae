<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: index.php");
        exit();
    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensageiro do cesae</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="">
    

    <nav class="navbar container-fluid fixed-top topBottom">
        <label id="username" class=""><?= $_SESSION['username'] ?></label>
        <form class="d-flex" method="post">
            <div class="input-group">
                <button formaction="logout.php" class="btn btn-primary ">Log out</button>
            </div>
        </form>
    </nav>

    <div id="msgBox" class="container-fluid">
        <div style="height: 10vh;"></div>
        <section class="discussion " id="discussionBox">
            <?php
            include("db/connectionDB.php");
            $sql = "SELECT Users.username, Message.content FROM Message INNER JOIN Users ON Message.idUser=Users.idUser ORDER BY idMsg ASC;";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row["username"] == $_SESSION['username']) {
                        echo "<div class='bubble recipient'>";
                        echo $row["content"] . "<br>";
                        echo "</div>";
                    } else {
                        echo "<div class='bubble sender'>";
                        echo $row["username"].": ". $row["content"] . "<br>";
                        echo "</div>";
                    }
                }
            }
            ?>
        </section>
    </div>


    <div class="container-fluid fixed-bottom topBottom ">
        <form style="max-width: 700px;" class="input-group container fixed-bottom mb-3">
            <input id="msg" class="form-control " type="text" autocomplete="false">
            <button id="sendBt" class="btn btn-primary ">Enviar</button>
        </form>
    </div>




    <script src="scriptMain.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>