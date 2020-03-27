<div class="ticket__form">
    <div class="ticket__form--header">
        <h1>Novo Ticket</h1>
    </div>
    
    <?php if($error == 'exists'): ?>
        <div class="error">Este título já foi usado. Por favor, escolha outro.</div>
    <?php endif; ?>

    <form class="form" action="<?php echo BASE_URL; ?>ticket/update" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <label for="titulo">Título</label>
        <input type="text" name="titulo" value="<?php echo $ticket->getTitulo()?>" disabled>

        <label for="descricao">Descrição</label>
        <textarea name="descricao" id="" cols="30" rows="10" required><?php echo $ticket->getDescricao(); ?></textarea>

        <div class="form__group">
            <button class="button-form" type="submit">Enviar</button>
            <a class="btn-voltar" href="<?php echo BASE_URL; ?>ticket">Voltar</a>
        </div>
        
    </form>
</div>