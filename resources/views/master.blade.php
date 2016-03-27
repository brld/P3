<!doctype html>
<html>
<head>
    <title>
        @yield('title','Developer Helper')
    </title>

    <meta charset='utf-8'>

    <meta name='viewport' content='width=device-width, initial-scale=1'>

    <link href='/css/main.css' rel='stylesheet'>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600' rel='stylesheet' type='text/css'>

    @yield('head')

</head>
<body>
    <header>
      <nav>
          <ul>
              <li><a href='/'>Home</a></li>
              <li><a href='/lorem-ipsum'>Generate lorem ipsum</a></li>
              <li><a href='/user-generator'>Generate random users</a></li>
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
