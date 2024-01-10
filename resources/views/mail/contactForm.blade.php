<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
        }

        h3 {
            color: #333;
        }

        h4 {
            color: #555;
            margin-bottom: 5px; /* Adjust the margin as needed */
        }

        p {
            color: #921B1B;
            margin-top: 0; /* Reset default margin for <p> */
        }

    </style>
</head>

<body>

    <div class="container">

        <h3>New Data => Contact Form</h3>

        <h4>Sender Name:</h4>
        <p>{{ $formData['name'] }}</p>

        <h4>Sender Email:</h4>
        <p>{{ $formData['email'] }}</p>

        <h4>Sender Phone:</h4>
        <p>{{ $formData['phone'] }}</p>

        <h4>The Subject:</h4>
        <p>{{ $formData['subject'] }}</p>

        <h4>Message Content:</h4>
        <p>{{ $formData['message'] }}</p>

    </div>

</body>

</html>
