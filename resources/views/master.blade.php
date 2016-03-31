<!doctype html>
<html>
    <title>
        @yield('title','Developer Helper')
    </title>

    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='/css/main.css' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600%7CRaleway:400,700' rel='stylesheet' type='text/css'>

    @yield('head')

</head>
<body>
    <header>
      <nav>
          <ul>
              <li><a href='/'>Home</a></li>
              <li><a href='/lorem-ipsum'>Generate Lorem Ipsum</a></li>
              <li><a href='/user-generator'>Generate Random Users</a></li>
              <li><a href='/xkcd'>Generate xkcd Passwords</a></li>
          </ul>
      </nav>
    </header>

    <section>
        @yield('content')
    </section>

    <footer>
        &copy; {{ date('Y') }} Brandon Darby
    </footer>

    @yield('body')

</body>
</html>
