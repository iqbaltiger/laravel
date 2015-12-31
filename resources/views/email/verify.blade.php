<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hello {{$name}},</h2>
       
        <div>
            <p>Welcome to {{ URL::to('/')}}</p>
            <p>Click here to get yourself registered.</p>
            <p>Thanks for creating an account with the verification demo app.</p>
            <p>Please follow the link below to verify your email address</p>
            <p>{{ URL::to('register/verify/' . $confirmation_code) }}.<br/></p>

        </div>

    </body>
</html>
