Hello {{$name}},
Welcome to {{ URL::to('/')}}
Click here to get yourself registered.
If this mail is not intended to you please Click here.

Thanks for creating an account with the verification demo app.
            Please follow the link below to verify your email address
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>
            
            
            
            <!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Hello </h2>
        <h3>My Name:{{$name}}</h3>
        <div>
            Thanks for creating an account with the verification demo app.
            Please follow the link below to verify your email address
            {{ URL::to('register/verify/' . $confirmation_code) }}.<br/>

        </div>

    </body>
</html>
