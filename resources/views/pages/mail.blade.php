<html>
    <head>
        <style>
            body{
                color:black;
                background-color: ivory;
                font-weight: bold;
                padding: 5px;
                justify-content: space-between;
                display: flex;
                flex-direction: row;
                align-items: center;
                margin-top: 1rem;
            }
            em{
                color:red;
                
            }
            .title {
                text-align: center;
                }
        </style>
    </head>
<body>
    <div class="">
        <img src="/img/logo.png" >
    </div>
    <h1 class="title">Payment was Successful!</h1>
    <br><br>
    <p class="title">Your can download your purchased book from this <a href="{{$myUrl}}"> download link .</a><br>
    <em>the link will expire in 48 hours.</em> </p>
    <h5>Thanks!</h5>
</body>
</html>
