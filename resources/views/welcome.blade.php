<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        
        <div class="container">
            <div class="row">
                <div class="p-4 col-12">
                    <h1 class="h3">Broadcast a new NewMessage event and see results on real time</h1>
                </div>
            </div>
            <div class="row">
                <div class="p-4 col-12">
                    <ul id="events-list" class="list-group">
                        <li class="list-group-item">
                            New messages will be added on this list on real time.
                            <div class="mt-1">
                                Visit <strong> /send-message </strong> url from different browser to send a new message.
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

        Echo.channel('home')
            .listen('NewMessage', (e) => {
                if(e.message != null)
                {
                     $('#events-list').prepend(`
                        <li class="list-group-item">${e.message}
                        <span class="float-right p-2 badge-primary badge">
                        by ${e.username}
                        </span>
                         <span class="float-right p-2 badge-warning badge">
                        ${new Date().toLocaleString()}
                        </span> </li>`);
                }
               
            });

    </script>
    </body>
</html>
