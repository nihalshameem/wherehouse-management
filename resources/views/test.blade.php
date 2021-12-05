<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css"
        integrity="sha512-FEQLazq9ecqLN5T6wWq26hCZf7kPqUbFC9vsHNbXMJtSZZWAcbJspT+/NEAQkBfFReZ8r9QlA9JHaAuo28MTJA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <div id="app">
            <div class="overlay"></div>

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
                <ul class="nav sidebar-nav">
                    <div class="sidebar-header">
                        <div class="sidebar-brand">
                            <a href="#">Brand</a>
                        </div>
                    </div>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#events">Events</a></li>
                    <li><a href="#team">Team</a></li>
                    <li class="dropdown">
                        <a href="#works" class="dropdown-toggle" data-toggle="dropdown">Works <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu animated fadeInLeft" role="menu">
                            <div class="dropdown-header">Dropdown heading</div>
                            <li><a href="#pictures">Pictures</a></li>
                            <li><a href="#videos">Videeos</a></li>
                            <li><a href="#books">Books</a></li>
                            <li><a href="#art">Art</a></li>
                            <li><a href="#awards">Awards</a></li>
                        </ul>
                    </li>
                    <li><a href="#services">Services</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#followme">Follow me</a></li>
                </ul>
            </nav>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
                    <span class="hamb-top"></span>
                    <span class="hamb-middle"></span>
                    <span class="hamb-bottom"></span>
                </button>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <h1>Fancy Toggle Sidebar Navigation</h1>
                            <p>
                                Bacon ipsum dolor sit amet tri-tip shoulder tenderloin shankle.
                                Bresaola tail pancetta ball tip doner meatloaf corned beef. Kevin
                                pastrami tri-tip prosciutto ham hock pork belly bacon pork loin
                                salami pork chop shank corned beef tenderloin meatball cow. Pork
                                bresaola meatloaf tongue, landjaeger tail andouille strip steak
                                tenderloin sausage chicken tri-tip. Pastrami tri-tip kielbasa
                                sausage porchetta pig sirloin boudin rump meatball andouille chuck
                                tenderloin biltong shank
                            </p>
                            <p>
                                Pig meatloaf bresaola, spare ribs venison short loin rump pork loin
                                drumstick jowl meatball brisket. Landjaeger chicken fatback pork
                                loin doner sirloin cow short ribs hamburger shoulder salami
                                pastrami. Pork swine beef ribs t-bone flank filet mignon, ground
                                round tongue. Tri-tip cow turducken shank beef shoulder bresaola
                                tongue flank leberkas ball tip.
                            </p>
                            <p>
                                Filet mignon brisket pancetta fatback short ribs short loin
                                prosciutto jowl turducken biltong kevin pork chop pork beef ribs
                                bresaola. Tongue beef ribs pastrami boudin. Chicken bresaola
                                kielbasa strip steak biltong. Corned beef pork loin cow pig short
                                ribs boudin bacon pork belly chicken andouille. Filet mignon flank
                                turkey tongue. Turkey ball tip kielbasa pastrami flank tri-tip
                                t-bone kevin landjaeger capicola tail fatback pork loin beef jerky.
                            </p>
                            <p>
                                Chicken ham hock shankle, strip steak ground round meatball pork
                                belly jowl pancetta sausage spare ribs. Pork loin cow salami pork
                                belly. Tri-tip pork loin sausage jerky prosciutto t-bone bresaola
                                frankfurter sirloin pork chop ribeye corned beef chuck. Short loin
                                hamburger tenderloin, landjaeger venison porchetta strip steak
                                turducken pancetta beef cow leberkas sausage beef ribs. Shoulder ham
                                jerky kielbasa. Pig doner short loin pork chop. Short ribs
                                frankfurter rump meatloaf.
                            </p>
                            <p>
                                Filet mignon biltong chuck pork belly, corned beef ground round
                                ribeye short loin rump swine. Hamburger drumstick turkey, shank rump
                                biltong pork loin jowl sausage chicken. Rump pork belly fatback ball
                                tip swine doner pig. Salami jerky cow, boudin pork chop sausage
                                tongue andouille turkey.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->
        </div>
    </div>
    <!-- /#wrapper -->


    {{-- scripts --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('datatables')
</body>

</html>
