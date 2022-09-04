<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>News Application</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <link href="/css/app.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" ></script>

        <div id="appendDivNews">
            <nav class="navbar fixed-top navbar-light bg-faded" style="background-color: #e3f2fd;">
                <a class="navbar-brand" href="#">Top News Around the World</a>
                <div>
                    @if(Route::has('login'))
                        @auth
                            
                        @else
                            <a href="{{ route('login') }}">Login</a>&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="{{ route('register') }}">Register</a>&nbsp;&nbsp;
                        @endif
                    @endif
                </div>
            </nav>
            {{ csrf_field() }}

            <section id="content" class="section-dropdown">
                
                    <select style="margin-top: 2cm;" name="news_sources" class="form-select" aria-label="Default select example" id="news_sources">
                        <option value="{{$sourceId}} : {{$sourceName}}">{{$sourceName}}</option>
                        @foreach ($newsSources as $newsSource)
                            <option value="{{$newsSource['id']}} : {{$newsSource['name'] }}">{{$newsSource['name']}}</option>
                        @endforeach
                    </select>
               
                <object id="spinner" data="spinner.svg" type="image/svg+xml" hidden></object>
            </section>

            <div id="news">

                <section class="news">
                    @foreach($news as $selectedNews)

                        <article>
                            <img src="{{$selectedNews['urlToImage']}}" alt=""/>
                            <div class="text">
                                <h1>{{$selectedNews['title']}}</h1>
                                <p style="font-size: 14px">{{$selectedNews['description']}} <a href="{{$selectedNews['url']}}"
                                                                                            target="_blank">
                                        <small>read more...</small>
                                    </a></p>
                                <div style="padding-top: 5px;font-size: 12px">
                                    Author: {{$selectedNews['author'] ? : "Unknown" }}
                                </div>
                                @if($selectedNews['publishedAt'] !== null)
                                    <div style="padding-top: 5px;">Date
                                        Published: {{ Carbon\Carbon::parse($selectedNews['publishedAt'])->format('l jS \\of F Y ') }}</div>
                                @else
                                    <div style="padding-top: 5px;">Date Published: Unknown</div>
                                @endif

                            </div>
                        </article>
                    @endforeach
                </section>


            </div>

            <section class="p-3 mb-2 bg-dark rounded-lg text-white" id="contact">
                <div class="col-l12-m12-s12">
                    <h4 style="color: red; text-decoration-line: underline; text-decoration-thickness: 3px">NewsLetter</h4>
                </div>
                <div class="col l5 m5 s12">
                    <p>
                        Subscribe to our newsletter to get the most updated Information <br>
                        and never miss out on new tips, tutorials, and more.
                    </p>
                </div>
                <div class="col-md-12">
                    @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                    @endif
                    <form method="POST" action="{{ route('store-newsletter.store') }}" class="row g-3 needs-validation" id="NewsletterForm">
                        {{ csrf_field() }}

                        <div class="mb-3 row">
                            
                            <div class="col-sm-3" style="margin-top: 0.3cm;">
                                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                            </div>
                        </div>

                        <div class="container">
                            <button class="btn btn-outline-primary me-md-2">
                                send&nbsp;message
                            </button>
                        </div>
                    </form>

                </div>
            </section>
        </div>
        
    </body>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" ></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    
    <script src="{{ '/js/site.js' }}"></script>
</html>