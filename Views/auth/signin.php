<section class="login">
    <div class="login__card">
        <div class="login__card-content div-center">
            <div class="login__card-body width100">
                <h5 class="m-1">
                    <i class="fa fa-user m1"></i>Novo Usuário
                    <hr>
                </h5>
                <p>Primeira vez na plataforma? <br>
                    Faça seu cadastro</p>

                <?php if($error == 'exists'): ?>
                        <div class="error">Email já utilizado</div>
                <?php endif; ?>
                <form class="form" method="POST" action="<?php echo BASE_URL; ?>auth/register">
                    <div class="form-group">
                        <label for="nome" class=""><i class="fa fa-2x fa-user" aria-hidden="true"></i> </label>
                        <input type="text" class="" name="nome" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="email">
                            <i class="fa fa-2x fa-envelope-o"></i>
                        </label>
                        <input  type="email" class="input" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="senha" class="">
                            <i class="fa fa-2x fa-key" aria-hidden="true"></i>
                        </label>
                        <input  type="password"  class="input" name="senha" required>

                    </div>
                    <div class="form-group-cl centro">
                        <button type="submit" class="button-form">
                            Criar Conta
                        </button>
                        <a class="btn-voltar" href="<?php echo BASE_URL; ?>">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>