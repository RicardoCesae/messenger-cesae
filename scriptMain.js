let pageUsername = document.getElementById('username').innerText;
$("#msgBox").scrollTop($("#msgBox")[0].scrollHeight);

Pusher.logToConsole = true;

    var pusher = new Pusher('6c723a6f8599163886eb', {
      cluster: 'eu'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {

      let message = JSON.stringify(data.message);
      let username = JSON.stringify(data.username);
      username = username.slice(1, username.length - 1);
      message = message.slice(1, message.length - 1);
      const msgSound = new Audio("sounds/msgSound.mp3");
      msgSound.play();
      appendMsg(message, username) ;
      $("#msgBox").scrollTop($("#msgBox")[0].scrollHeight);
    });

function appendMsg(msg, username) {
   let textMsg;
   let div = document.createElement('div');
   div.id = 'id';
   if (pageUsername == username) {
      div.className = 'bubble recipient ';
      textMsg = msg;
   }
   else {
      div.className = 'bubble sender ';
      textMsg = username + ": " + msg;
   }

   let text = document.createTextNode(textMsg);
   div.appendChild(text);
   const discussionBox = document.querySelector('#discussionBox');
   discussionBox.appendChild(div);
}
$("#sendBt").click(function () {
   event.preventDefault();
   let message = document.getElementById("msg").value;
   $.post("server.php", { message: message });
   document.getElementById("msg").value = "";
});












