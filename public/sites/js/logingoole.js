$('.logingoogle').click(function() {

  
      var googleProvider = new firebase.auth.GoogleAuthProvider();
      
      var googleCallbackLink = 'login/google/callback';
    
         var socialProvider = null;
      
            socialProvider = googleProvider;
            document.getElementById('social-login-form').action = googleCallbackLink;
        
     var URL = $('meta[name="baseURL"]').attr('content');
      firebase.auth().signInWithPopup(socialProvider).then(function(result) {
           /** @type {firebase.auth.OAuthCredential} */
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                }
            });
            $.ajax({
                url: URL+"login/google/callback",
                type: "post",
                dataType:"json",
                data: user.providerData[0],
                success: function (data) {
                    if(data.status == "success"){
                        alert("Successfully logged");
                        window.location.replace(URL+"/all-class");
                    }
                    else{
                         alert("Something went wrong here");
                    }
                },
                error : function  (error) {
                     alert("Error");
                }
            })

         }).catch(function(error) {
            // do error handling
            console.log(error);
         });
      }

});