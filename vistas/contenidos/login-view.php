<body class="light_theme  fixed_header left_nav_fixed" style="background-image: url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=752&q=80');background-repeat: no-repeat;background-size: cover;">
    <div class="wrapper">

        <div class="login_page">
            <div class="login_content text-center">
                <div class="panel-heading border login_heading">INICIAR SESIÓN</div>
                <form role="form" id="FromLogin" method="POST" class="form-horizontal" parsley-validate novalidate>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" parsley-type="email" placeholder="Usuario" id="login_user" name="login_user" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="password" placeholder="****************" id="login_pass" name="login_pass" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class=" col-sm-10">
                            <a href="recoveryuser" class="pull-left">¿Olvidaste tu Contraseña?</a>
                            <a href="home">
                                <button class="btn btn-default pull-right" id="btnLogin" type="submit">Entrar</button>
                            </a>
                        </div>
                        <a href="registrase">¡Registrate!</a>
                    </div>
                </form>
            </div>
        </div>

    </div>
</body>