<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
        <style>
          #date {
            background-color: #500724;
            color: white;
            width: 220px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            cursor: pointer;
            transition: 0.5s ease-in-out;
          }
          
          @keyframes spin {
            0% {
              transform: rotate(0deg);
            }
            100% {
              transform: rotate(360deg);
            }
          }
          
          .loading {
            width: 24px;
            height: 24px;
            border-radius: 50%;
            border: 0.25rem solid rgba(255, 255, 255, 0.2);
            border-top-color: rgb(255, 255, 255);
            display: flex;
            justify-content: center;
            animation: spin 1s infinite linear;
          }
        
          .back-to-top {
            display: none;
            position: fixed;
            right: 2%;
            bottom: 5%;
            color: #fff;
            padding: 2rem;
            border-radius: 50%;
            display: inline-block;
            text-decoration: none;
            opacity: 0.7;
            z-index: 999;
          }
          .back-to-top::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: inline-block;
            width: 70px;
            height: 70px;
            background-color: #664e4e;
            border-radius: 50%;
            z-index: -1;
          }
          .tooltip{
              position: relative;
              cursor: pointer;
              display: inline-block;
          }
          .description {
              display: none;
              position: absolute;
              padding: 10px;
              font-size: 12px;
              line-height: 1.6em;
              color: #fff;
              border-radius: 5px;
              background: #000;
              width: 100px;
          }
          .description:before {
              content: "";
              position: absolute;
              top: -24px;
              right: 60%;
              border: 15px solid transparent;
              border-top: 15px solid #000;
              margin-left: -15px;
              transform: rotateZ(180deg);
          }
          .tooltip:hover .description{
              display: inline-block;
              top: 30px;
              left: 0px;
          }            
          .changeColor {
              background-color: rosybrown;
          }
          .fc .fc-timegrid-now-indicator-arrow {
              position: absolute;
              z-index: 4;
              margin-top: -10px;
              border-style: solid;
              border-left: 7px solid crimson;
              border-top: 7px solid transparent;
              border-bottom: 7px solid transparent;
          }
          .fc .fc-timegrid-now-indicator-line {
              opacity: .7;
              position: absolute;
              z-index: 4;
              left: 0;
              right: 0;
              margin-top: -2px;
              border-style: solid;
              border-color: crimson;
              border-width: 5px 0 0;
          }
          .fc-event {
              --fc-event-text-color: #58535E;
              font-weight: bold;
          }
          th.fc-day-sat .fc-col-header-cell-cushion {
            color: steelblue;
          }
          th.fc-day-sun .fc-col-header-cell-cushion{
            color: palevioletred;
          }
          
          @media (max-width: 600px) {
              .fc-toolbar {
                  display: flex;
                  flex-direction: column;
                  align-items: center;
              }
              .fc-left,
              .fc-center,
              .fc-right {
                width: 100%;
                text-align: center;
              }
          }
          
          .youtube {
            margin-left: 2.5rem;
            margin-right: 2.5rem;
          }
          
          @media (max-width: 767px) {
            .youtube {
              position: relative;
              width: 100%;
              padding-top: 56.25%;
              aspect-ratio: 16 / 9;
              margin-bottom: 2.5rem;
            }
            .youtube iframe {
              position: absolute;
              top: 0;
              left: 0;
              width: 100%;
              height: 100%;
            }
          }
        </style>
    </head>
    <body class="font-sans antialiased m-0">
        <div class="w-screen min-h-screen bg-red-50 flex flex-col">
            @include('layouts.navigation')
        
            <!-- Page Content -->
            <div class="flex-1 h-full">
                {{ $slot }}
            </div>
        </div>
        <script>
            $(function () {
              // スクロールしたら「トップに戻る」ボタンを表示する
              const toTopButton = $(".js-to-top");
              const scrollHeight = 100;
              toTopButton.hide();
              $(window).scroll(function () {
                if ($(this).scrollTop() > 100) {
                  toTopButton.fadeIn();
                } else {
                  toTopButton.fadeOut();
                }
              });
            
              // 「トップに戻る」ボタンをクリックしたらスクロールで戻る
              toTopButton.click(function () {
                $("body,html").animate({ scrollTop: 0 }, 800);
                return false;
              });
            });
        </script>
    </body>
</html>