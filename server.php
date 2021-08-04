 <?php
    include("db/connectionDB.php");
    require __DIR__ . '/vendor/autoload.php';
   
    session_start();
    ob_implicit_flush(true);

      $options = array(
        'cluster' => 'eu',
        'useTLS' => true
      );
      $pusher = new Pusher\Pusher(
        '6c723a6f8599163886eb',
        '7574e30580314e97ec4e',
        '1242538',
        $options
      );
    if (!empty($_POST)) {

      $idUser = $_SESSION['idUser'];
      $message = $_POST['message'];
      $sql = "INSERT INTO Message ( idUser, content) VALUES ('$idUser', '$message')";
      $conn->query($sql);
   }
    $data['username'] = $_SESSION['username'];
    $data['message'] = $_POST['message'];
    $pusher->trigger('my-channel', 'my-event', $data);
    $conn->close();
    ?>
