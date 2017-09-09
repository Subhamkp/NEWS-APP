<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>News Application with Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/clockstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script type="text/javascript">
    
    window.onload = function () {
        DisplayCurrentTime();
    };
    function DisplayCurrentTime() {
        var date = new Date();
        var hours = date.getHours() > 12 ? date.getHours() - 12 : date.getHours();
        var am_pm = date.getHours() >= 12 ? "PM" : "AM";
        hours = hours < 10 ? "0" + hours : hours;
        var minutes = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
        var seconds = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
        time = hours + ":" + minutes + ":" + seconds + " " + am_pm;
        var lblTime = document.getElementById("lblTime");
        lblTime.innerHTML = time;
    };
     setInterval(DisplayCurrentTime, 500);

</script>

</head>

<body style="background:url(paper2.jpg); background-repeat: repeat-y;"> 

<div id="load">
             <!-- for the loading image -->
</div>  

<div id="appendDivNews">
        

        <nav class="navbar fixed-top navbar-primary bg-faded" style="background-color: #42a1f4;">
        
          <a class="navbar-brand" href="https://www.facebook.com/4times.info/" center style="color:white;padding-left:60px;font-size:40px;" target="blank">4TIMES</a>

          <div id="lblTime" style="float:right;padding-right:20px;color:white;font-size:30px;"></div>
        
        </nav>
        

            {{ csrf_field() }}
        <section id="content" class="section-dropdown">
        <h4 class="select-header" style="font-weight:bold;"> Select a news source: </h4>
        <label class="select"> 
            <select name="news_sources" id="news_sources">
            <option value="{{@$source_id}} : {{@$source_name}}">{{$source_name}}</option>
            @foreach ($news_sources as $news_source)
              <option value="{{$news_source['id']}} : {{$news_source['name'] }}">{{$news_source['name']}}</option>
            @endforeach
            </select>
        </label>
        </section> 
        
            <p style="margin-left:60px;font-style: italic;font-weight:bold;"> News Source : {{$source_name}}</p>
            <section class="news">
            
            @foreach($news as $selected_news)
            <article class="grow">
                <img src="{{$selected_news['urlToImage']}}" alt="" />
                <div class="text">
                    <a href="{{$selected_news['url']}}" target="_blank"><h2>{{$selected_news['title']}}</h2></a>
                    <p style="font-size: 14px">{{$selected_news['description']}} <a href="{{$selected_news['url']}}" target="_blank"><small>read more...</small></a> </p>
                    <div style="padding-top: 5px;font-size: 12px">Author: {{$selected_news['author'] or "Unknown" }}</div>
                    @if($selected_news['publishedAt'] != null)
                     <div style="padding-top: 5px;">Date Published: {{ Carbon\Carbon::parse($selected_news['publishedAt'])->format('l jS \\of F Y ') }}</div>
                     @else
                     <div style="padding-top: 5px;">Date Published: Unknown</div>

                     @endif

                </div>
            </article>
            @endforeach
            
            </section>
</div>

<div style="margin:5px 20px;height:150px;background:black;color:white;" class="footer" >
    <ul id="menu" align=center >
        <li><a href="https://www.facebook.com/subham.kp.5" target="blank" class="fa fa-facebook"></a></li>
        <li><a href="#" class="fa fa-twitter"></a></li>
        <li><a href="#" class="fa fa-google"></a></li>
        <li><a href="https://www.linkedin.com/in/subham-kamalapuri-103496103/" target="blank" class="fa fa-linkedin"></a></li>
    </ul>
        <p align=center>© Copyright 2017 All Rights Reserved</p>
</div>   

</body>
    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{asset('js/clock.js')}}"> </script>
</html>