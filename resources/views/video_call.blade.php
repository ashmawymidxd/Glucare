<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Ivy Streams</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.min.css" rel="stylesheet" />
    <!-- main style -->
    <link rel="stylesheet" href="{{ URL::asset('Video/main.css') }}" />
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('Video/talkme.png') }}" type="image/x-icon">

</head>

<body class="p-3">
    <div class="" id="join-btn">
        <button class="btn btn-primary btn-rounded shadow-0 p-3 m-1">
            <strong class="h5 p-4">Join To</strong>
        </button>
        <a class="btn btn-secondary btn-rounded shadow-0 p-3 m-1" href="/confirmed_appointments">
            <strong class="h5 p-4">cancel</strong>
        </a>
    </div>

    <div id="stream-wrapper">
        <div id="video-streams" class="bg-light shadow-4 rounded-5"></div>

        <div id="stream-controls">
            &nedot;
            <button class="btn btn-primary" id="leave-btn"><i
                    class="fa-solid fa-right-from-bracket fa-flip-horizontal"></i></button>
            <button class="btn btn-primary" id="mic-btn"><i id="mic-icon"
                    class="fa-solid fa-microphone-lines"></i></button>
            <button class="btn btn-primary" id="camera-btn"><i id="camera-icon"
                    class="fa-solid fa-camera-retro"></i></button>
            <span>12:00 pm</span>
        </div>
    </div>
</body>
<!-- <script src="https://download.agora.io/sdk/release/AgoraRTC_N.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>
<!-- AgoraRTC_N  -->
<script src='{{ URL::asset('Video/AgoraRTC_N-4.20.0.js') }}'></script>
<!-- main.js -->
<script src='{{ URL::asset('Video/main.js') }}'></script>

</html>
