<?php //dd($profiles[0]['show_all_profiles']); ?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">

        <div class="navbar-header page-scroll">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">                      
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            <a class="navbar-brand" href="{{ URL::to('/') }}"><i class="fa fa-fa fa-cubes"></i> Matrimonial!</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Session::has('email'))
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li><a href="{{ URL::to('/profile/search') }}">Search</a></li>
                    
                    <li class="dropdown default">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    @if(!empty($profiles[0]['show_all_profiles']) && $profiles[0]['show_all_profiles'] == 'true')
                        <div class="c100 p0 small ">
                            <span>0%</span>

                            <div class="slice">
                                <div class="bar"></div>
                                <div class="fill"></div>
                            </div>
                        </div>
                    @endif    
                        <span>Profile</span>
                        <span class="caret"></span>
                    </a>
                        
                        <ul class="dropdown-menu " role="menu">
                            <li class="menu-open">{!! Html::linkAction('ProfileController@getMyProfile','Edit Profile', 'edit') !!}</li>
							<li class="menu-open">{!! Html::linkAction('ProfileController@getMyProfile','My Profile', 'view') !!}</li>
                            <!--li><a href="profile/">Edit Profile</a></li-->
                        </ul>
                   </li>

                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Session::get('email') }} <span class="caret"></span></a>
                        <ul class="dropdown-menu " role="menu">
                           <!-- <li class="menu-open"><a href="logout">Logout</a></li> -->
                            <li class="menu-open">{!! Html::linkAction('UserController@getLogout','Logout') !!}</li>
                            <!--li><a href="profile/">Edit Profile</a></li-->
                        </ul>
                    </li>
                @else
                    <li class="{{ $login or '' }}"><a href="login" >Sign In</a></li>
                    <li class="{{ $register or '' }}"><a href="register">Sign up</a></li>
                    <!--li><a href="why-matrimony">Why Matrimonial.com</a></li-->
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>