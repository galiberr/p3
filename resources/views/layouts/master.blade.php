<!doctype html>
<html>
<head>
    <title>
        @yield('title', 'Developer\'s Best Friend')
    </title>

    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='/css/dbf.css' rel='stylesheet'>
    <link href='/css/bootstrap.css' rel='stylesheet'>
    <link href='/css/bootstrap.min.css' rel='stylesheet'>

    @yield('head')

</head>
<body>
        <div class="container">
                {{-- Banner --}}
                <div class="jumbotron">
                        <h1>Developer's Best Friend</h1>
                        <h2>@yield('tool_name')</h2>
                        <p>@yield('tool_description')</p>
                </div>
                
                {{-- Nav bar --}}
                <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                        <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                </button>
                                
                                {{-- @yield for home page link (either # or /) --}}
                                <a class="navbar-brand" href="@yield('homeLink')">DBF Home</a>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
                                
                                {{-- @yield statements for tool links (either appropriate route or # if we're currently on that tool --}}
                                <ul class="nav navbar-nav">
                                        @yield('loremLink')Lorem Ipsum Generator</a></li>
                                        @yield('rugLink')Random User Generator</a></li>
                                        @yield('xkcdLink')XKCD Password Generator</a></li>
                                </ul>
                        </div>
                </div>
                </nav>
                
                <section>
                    {{-- Main page content --}}
                    @yield('content')
                </section>

                <footer>
                    &copy; {{ date('Y') }} &nbsp;&nbsp;
                    <a href='https://github.com/galiberr/p3' target='_blank'> View on Github</a> &nbsp;&nbsp;
                    <a href='http://p3.pyxisweb.me/' target='_blank'> View Live</a>
                </footer>
      </div>  
    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')
</body>
</html>