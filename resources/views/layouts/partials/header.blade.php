        <header class="main-header">

            <!-- Logo -->
            <a href="/" class="logo"><img src="{{ asset("AdminLTE/dist/img/BNI.png") }}" width="100px"></a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->

                        @if(Auth::user()->role_id === 1 )
                        
                        @endif

                        @include('layouts.partials.user_account_menu')
                    </ul>
                </div>
            </nav>
        </header>