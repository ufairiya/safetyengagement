<html>
<title>Firebase Messaging Demo</title>
<style>
    div {
        margin-bottom: 15px;
    }
</style>
<body>

    <div id="token"></div>
    <div id="msg"></div>
    <div id="notis"></div>
    <div id="err"></div>
          <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>

<script src="https://www.gstatic.com/firebasejs/5.1.0/firebase.js"></script>

<script src="firebase-messaging-sw.js"></script>

    <script>
        MsgElem = document.getElementById("msg")
        TokenElem = document.getElementById("token")
        NotisElem = document.getElementById("notis")
        ErrElem = document.getElementById("err")
        // Initialize Firebase
        // TODO: Replace with your project's customized code snippet
   var config = {
    apiKey: "AIzaSyDjOk356QVvZ3zaY1dl6IIinILU-L0qzdw",
    authDomain: "sswep-c9b50.firebaseapp.com",
    databaseURL: "https://sswep-c9b50.firebaseio.com",
    projectId: "sswep-c9b50",
    storageBucket: "",
    messagingSenderId: "549556999771"
  };
  firebase.initializeApp(config);

        const messaging = firebase.messaging();
        messaging
            .requestPermission()
            .then(function () {
                MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                TokenElem.innerHTML = "token is : " + token
            })
            .catch(function (err) {
                ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
                console.log("Unable to get permission to notify.", err);
            });

        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
            NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload) 
        });
    </script>

    <body>

</html>
