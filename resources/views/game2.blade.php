<html>

    <head>
        <title>Game of Towns</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <script
                src="http://code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
    </head>

    <body>

        <div id="loader" style="padding: 2em;">

                <img style="height: 5em" src="{{asset('img/logo.png')}}" alt=""> <br>
                <h5 style="color: white;"><span id="load_msg"></span> <span class="loader__dot">.</span><span class="loader__dot">.</span><span class="loader__dot">.</span></h5>

        </div>

        <div id="game">
            <iframe id="client_frame" frameborder="0" scrolling="yes"  src="{{url('/town')}}" style="overflow-y: auto; border: 0; width: 100%; height: 100%; background-color: black;">Je hebt een moderne browser nodig hiervoor</iframe>
        </div>
        <iframe style="width: 0em; height: 0em;" src="https://www.youtube.com/embed/DEeAN471boQ?autoplay=1" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </body>

    <script>

        let rand = Math.floor((Math.random() * 4) + 1);

        let load_msg = $("#load_msg");
        switch(rand)
        {
            case 1:
                load_msg.html("Een poortwachter brengt je naar je Stad");
                break;
            case 2:
                load_msg.html("Je ziet de muren van je Stad al in de verte");
                break;
            case 3:
                load_msg.html("Je hoort je Burgers juigen vanwege je aankomst");
                break;
            case 4:
                load_msg.html("De touwbrug wordt neergebracht en de poorten slaan open");
                break;
        }

        $("#game").hide();

        $('#client_frame').ready(function(){
            $("#loader").delay(3000).fadeOut(500);
            $("#game").delay(3000).delay(500).fadeIn(250);
        });


        window.setInterval(function(){
            let url = document.getElementById("client_frame").contentWindow.location.href;
            if(url.endsWith("/login"))
            {
                location.href = "{{url('/login')}}";
            }
        }, 500);
    </script>

    <style>
        body{margin: 0px; background-color: black; font-family: 'Roboto', sans-serif;}
        @keyframes blink {50% { color: transparent }}
        .loader__dot { animation: 1s blink infinite }
        .loader__dot:nth-child(2) { animation-delay: 250ms }
        .loader__dot:nth-child(3) { animation-delay: 500ms }
    </style>

    <div id="resources"></div>

</html>