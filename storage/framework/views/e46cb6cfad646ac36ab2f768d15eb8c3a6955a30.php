    <!--Firebase files -->
    <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.8.0/firebase-firestore.js"></script>

    <script>
        var config = {
            // This is the variable you got from Firebase's Firebase SDK snippet. It includes values for apiKey, authDomain, projectId, etc.
            apiKey: "AIzaSyAj6Q8W24W9vU47wxsEo55rcR9WgJWGpo8",
            authDomain: "laravel-auth-1ca1b.firebaseapp.com",
            projectId: "laravel-auth-1ca1b",
            storageBucket: "laravel-auth-1ca1b.appspot.com",
            messagingSenderId: "215127696953",
            appId: "1:215127696953:web:8af592248993b369068fe8"
        };
        firebase.initializeApp(config);


        function loginGoogle() {


            var googleProvider = new firebase.auth.GoogleAuthProvider();

            var googleCallbackLink = 'login/google/callback';



            var socialProvider = null;

            socialProvider = googleProvider;
            document.getElementById('social-login-form').action = googleCallbackLink;

            firebase.auth().signInWithPopup(socialProvider).then(function(result) {
                /** @type  {firebase.auth.OAuthCredential} */
                var credential = result.credential;
                // This gives you a Google Access Token. You can use it to access the Google API.
                var token = credential.accessToken;
                // The signed-in user info.
                var user = result.user;

                console.log(user);

                document.getElementById('uid').value = result.user.uid;
                document.getElementById('displayName').value = result.user.displayName;
                document.getElementById('_email').value = result.user.email;
                document.getElementById('photo').value = result.user.photoURL;
                result.user.getIdToken().then(function(result) {

                    document.getElementById('tokenId').value = result;

                    document.getElementById('social-login-form').submit();
                });
            }).catch(function(error) {
                // do error handling
                console.log(error);
            });
        }

        function loginFacebook() {
            var facebookProvider = new firebase.auth.FacebookAuthProvider();

            var facebookCallbackLink = 'login/facebook/callback';
            socialProvider = facebookProvider;
            //document.getElementById('social-login-form').action = facebookCallbackLink;

            firebase.auth().signInWithPopup(socialProvider).then(function(result) {
                /** @type  {firebase.auth.OAuthCredential} */
                var credential = result.credential;
                // This gives you a Google Access Token. You can use it to access the Google API.
                var token = credential.accessToken;
                // The signed-in user info.
                var user = result.user;

                console.log(user);

                document.getElementById('uid').value = result.user.uid;
                document.getElementById('displayName').value = result.user.displayName;
                document.getElementById('_email').value = result.user.email;
                document.getElementById('photo').value = result.user.photoURL;
                result.user.getIdToken().then(function(result) {

                    document.getElementById('tokenId').value = result;

                    //document.getElementById('social-login-form').submit();
                });
            }).catch(function(error) {
                // do error handling
                console.log(error);
            });
        }
    </script>
<?php /**PATH D:\wamp64\www\traderclass\app\Modules/Sites/Views/inc/loginGoogle.blade.php ENDPATH**/ ?>