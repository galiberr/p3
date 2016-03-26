<!doctype html>
<html>
<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Foobooks' --}}
        @yield('title', 'Developer\'s Best Friend')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='/css/dbf.css' rel='stylesheet'>
    <link href='/css/bootstrap.css' rel='stylesheet'>
    <link href='/css/bootstrap.min.css' rel='stylesheet'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')

</head>
<body>
        <div class="container">
                <div class="jumbotron">
                        <h1>Developer's Best Friend</h1>
                        <p>Your very best friend for software development.</p>
                </div>
                <section>
                    {{-- Main page content will be yielded here --}}
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