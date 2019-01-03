<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{url('/')}}/css/main_{{LaravelLocalization::getCurrentLocale()}}.css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
            <div class="" style="width:100%">
              <ul>
                @foreach($posts as $post)
                <li>{{ unserialize($post->title)[LaravelLocalization::getCurrentLocale()] }}
                  -- {{unserialize ($post->body)[LaravelLocalization::getCurrentLocale()]}}</li>
                @endforeach
              </ul>
            </div>
            <div class="content">
                <div class="logoWeb m-b-md">
                    {{trans('main.logo')}}
                </div>


                <div class="links">
                  @foreach(LaravelLocalization::getSupportedLocales() as $key => $value)
                        <a href="{{LaravelLocalization::getLocalizedUrl($key)}}">{{$value['native']}}</a>
                  @endforeach

                </div>
            </div>

            <div class="content">
                <form class="" action="{{url('newpost')}}" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    @foreach(LaravelLocalization::getSupportedLocales() as $key => $value)
                    <input type="text" name="title[{{$key}}]" placeholder="{{$value['native']}}">
                    <textarea name="body[{{$key}}]" rows="8" cols="80" placeholder="{{$value['native']}}"></textarea>
                    @endforeach
                    <input type="submit" name="" value="add">
                </form>
            </div>
        </div>
    </body>
</html>
