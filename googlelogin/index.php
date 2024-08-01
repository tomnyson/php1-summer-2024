<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Login</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>

<body>
    <h1>Google Login Demo</h1>
    <div id="g_id_onload" data-client_id="1059530540508-6pp5ldhk1i9qoounau8s6pdvmdhhlnok.apps.googleusercontent.com" data-callback="handleCredentialResponse">
    </div>

    <div class="g_id_signin" data-type="standard"></div>

    <script>
        function handleCredentialResponse(response) {
            console.log("Encoded JWT ID token: ", response.credential);
            fetch('google-login.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        credential: response.credential
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        window.location.href = 'dashboard.php';
                    } else {
                        console.error("Login failed: ", data.message);
                    }
                });
        }
    </script>
</body>

</html>