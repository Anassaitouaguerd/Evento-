<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> PDF</title>
    <link rel="stylesheet" href="styles.css">
    <style>

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #424242e8;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }

        header h1 {
            margin: 0;
        }

        main {
            padding: 20px;
        }

        section {
            margin-bottom: 40px;
        }

        h2 {
            color: #333;
            border-bottom: 2px solid #333;
            padding-bottom: 10px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        footer {
            background-color: #424242e8;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
    </style>
    
</head>
<body>
    <header>
        <h1>Your ticket to : {{$event}}</h1>
    </header>
    <main>
        <section>
            <h2>About the event</h2>
            <p>{{$description}}</p>
        </section>
        <section>
            <h2>Your information </h2>
            <ul>
                <li>Ticket Code : {{$ticket_id}}</li>
                <li>Username : {{$username}}</li>
                <li>Email : {{$email}}</li>
            </ul>
        </section>
        <section>
            <h2>Information about the Event : {{$event}}</h2>
            <address>
                Address : {{$address}}<br>
                Start Date : {{$date_start}}<br>
            </address>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Evento.</p>
    </footer>
</body>
</html>
