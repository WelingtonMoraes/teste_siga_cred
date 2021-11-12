@include('layout.header')

    <body>
        <section class="login">
            <div class="login__content col-12">
                <div class="col-12 alignVertical">
                    <form class="col-10" method="post" action=" {{route(('login'))}} ">
                        @csrf
                        <input type="text" id="login" name="login" class="login__content--text" placeholder="Login">
                        <input type="password" id="password" name="password" class="login__content--text" placeholder="Senha">
                        <input type="submit" value="Enviar" class="login__content--submit">
                    </form>
                </div>
            </div>
        </section>
    </body>

@include('layout.footer')