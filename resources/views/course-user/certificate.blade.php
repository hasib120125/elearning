<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate</title>
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/paper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/certificate.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Abel|Alex+Brush|Open+Sans|Sunflower:500" rel="stylesheet">
    <style>
        @page {
            size: letter landscape
        }
    </style>
</head>

<body class="letter landscape">
    <section class="sheet padding-10mm certificate">
        <h1 class="title">CERTIFICATE OF COMPLETION</h1>
        <h4 class="text">This is to certify that</h4>
        <h2 class="participant-name">Tamim Arifin</h2>
        <h4 class="text">has successfully completed the training course of</h4>
        <h1 class="course-name">BASICS OF COMPUTER PROGRAMMING AND ROBOTICS</h1>
        <img class="divider" alt="divider img" src="/img/divider.png">
        <h4 class="long-text">We found him sincere, hardworking, dedicated and result oriented. He completed all the requirement for the course.</h4>
        <div class="signature-container">
            <div class="signature">
                <h4 class="name">{{ $course_extras->signer_name1 }}</h4>
                <h4 class="position">{{ $course_extras->signer_position1 }}</h4>
            </div>
            <div class="signature">
                <h4 class="name">{{ $course_extras->signer_name2 }}</h4>
                <h4 class="position">{{ $course_extras->signer_position2 }}</h4>
            </div>
        </div>
        <img class="seal" alt="Seal logo" src="/img/seal.png">
    </section>
</body>

</html>
