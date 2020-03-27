<section class="login">
    <div class="login__card">
        <div class="login__card-content">
            <div class="login__card-body">
                <h5 class="m-1">
                    <i class="fa fa-user m1"></i>Novo Usuário
                    <hr>
                </h5>
                <p>Primeira vez na plataforma Palhatro? <br>
                    Faça seu cadastro e aprenda mais sobre mágicas</p>
                <a class="botao" href="<?php echo BASE_URL; ?>auth/signin">Criar minha conta</a>
            </div>
            <div class="login__card-body ">
                <h5 class="m-1">
                    <i class="fa fa-user m1" aria-hidden="true"></i>Login
                    <hr>
                </h5>
                <?php if($error == 'exists'): ?>
                    <div class="error">Email ou senha errados.</div>
                <?php endif; ?>

                <form class="form" method="POST" action="<?php echo BASE_URL; ?>auth/checklogin">
                    <div class="form-group">
                        <label for="email">
                            <i class="fa fa-2x fa-envelope-o"></i>
                        </label>
                        <input id="email" type="email "class="input" name="email" required autocomplete="email" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="senha">
                            <i class="fa fa-2x fa-unlock-alt" aria-hidden="true"></i>
                        </label>
                            <input id="password" type="password" class="input" name="senha" required>
                    </div>
                    <div class="form-group final">
                        <button type="submit" class="button-submit">
                            Fazer Login
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>