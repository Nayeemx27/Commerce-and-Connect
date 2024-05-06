<?php
include '../session/sessionfile.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Community chat</title>
   <link rel="stylesheet" href="../css/chat.css">
   <link rel="icon" type="image/x-icon" href="../img/c.png">
   <link rel="stylesheet" href="../css/bootstrap.min.css"/>
   <style>
      .chat-container {
         height: 500px;
         width: 700px;
         overflow-x: scroll;
         overflow-y: scroll;
      }
   </style>
</head>
<body class="b-g">
   <div class="container py-3">
      <h2 class="G m-bottom text-white">Community chat</h2>   
      <div class="row">
         <div class="col-md-6 mx-auto">
            <div class="chat-container b-C rounded rounded-2 px-2" id="chat-container">
            </div>
            <form id="chat-form" class="mt-4">
               <div class="input-group">
                  <input type="text" id="message-input" required name="message" class="form-control ms-5" placeholder="Type your message...">
                  <button type="submit" class="btn  btn-primary">Send</button>
               </div>
            </form>
         </div>
      </div>
   </div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script>
     
      function loadChatMessages() {
         $.ajax({
            url: 'get_messages.php',
            method: 'GET',
            success: function(response) {
               $('#chat-container').html(response);
               scrollToBottom(); 
            },
            error: function(xhr, status, error) {
               console.log(xhr.responseText);
            }
         });
      }

      function scrollToBottom() {
         var container = $('#chat-container');
         container.scrollTop(container.prop("scrollHeight"));
      }

      //  send message
      function sendMessage(message) {
         $.ajax({
            url: 'send_message.php',
            method: 'POST',
            data: {
               message: message
            },
            success: function() {
               $('#message-input').val(''); 
               loadChatMessages(); // Reload chat messages
            },
            error: function(xhr, status, error) {
               console.log(xhr.responseText);
            }
         });
      }

      // Load chat
      $(document).ready(function() {
         loadChatMessages();

     
         $('#chat-form').submit(function(event) {
            event.preventDefault();
            var message = $('#message-input').val();
            sendMessage(message);
         });

         //Load 2 seconds
         setInterval(function() {
            loadChatMessages();
         }, 500);
      });
   </script>
</body>
</html>
