

@section('title', 'E-Commerce Project')
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield("title")</title>
    <link href="{{asset('assets')}}/user/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/user/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{asset('assets')}}/user/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{asset('assets')}}/user/css/price-range.css" rel="stylesheet">
    <link href="{{asset('assets')}}/user/css/animate.css" rel="stylesheet">
    <link href="{{asset('assets')}}/user/css/main.css" rel="stylesheet">
    <link href="{{asset('assets')}}/user/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="{{asset('assets')}}/user/js/html5shiv.js"></script>
    <script src="{{asset('assets')}}/user/js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{asset('assets')}}/user/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets')}}/user/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets')}}/user/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets')}}/user/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets')}}/user/images/ico/apple-touch-icon-57-precomposed.png">
    @yield("head")
</head><!--/head-->

@include("home.header")
@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <section id="form"><!--form-->
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4 col-sm-offset-1">
                                    <div class="login-form"><!--login form-->
                                        <h2>Login to your account</h2>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                        @if( Session::has( 'loggedout' ))
                                            <div class="alert alert-success alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                                {{ Session::get( 'loggedout' ) }}
                                            </div>
                                        @endif
                                        <form action="{{route('login_user_check')}}" method="post">
                                            @csrf
                                            <input type="email" placeholder="Email Address" name="email"/>
                                            <input type="password" placeholder="Password" name="password"/>
                                            <span>
								<input type="checkbox" class="checkbox">
								Keep me signed in
							</span>
                                            <button type="submit" class="btn btn-default">Login</button>
                                        </form>
                                    </div><!--/login form-->
                                </div>
                                <div class="col-sm-1">
                                    <h2 class="or">OR</h2>
                                </div>
                                <div class="col-sm-4">
                                    <div class="signup-form"><!--sign up form-->
                                        <h2>New User Signup!</h2>
                                        <form action="#">
                                            <input type="text" placeholder="Name"/>
                                            <input type="email" placeholder="Email Address"/>
                                            <input type="password" placeholder="Password"/>
                                            <button type="submit" class="btn btn-default">Signup</button>
                                        </form>
                                    </div><!--/sign up form-->
                                </div>
                            </div>
                        </div>
                    </section><!--/form-->




                </div>
            </div>

        </div>
        </div>
    </section>
    @include("home.footer")
    @yield('foot')
    </body>
</html>

