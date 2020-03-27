<section class="ticket__table">
    <h2>Meus Tickets</h2>
    <a class="btn-novo" href="<?php echo BASE_URL; ?>ticket/create"><i class="fa fa-plus" aria-hidden="true"></i> Novo Ticket</a>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>id</th>
                    <th>título</th>
                    <th>descrição</th>
                    <th>data de criação</th>
                    <th>status</th>
                    <th>ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tickets as $ticket): ?>
                <tr>
                    <td><?php echo $ticket['id']; ?></td>
                    <td><?php echo $ticket['titulo']; ?></td>
                    <td><?php echo $ticket['descricao']; ?></td>
                    <td><?php echo $ticket['data_criacao']; ?></td>
                    <td><?php echo $ticket['status']; ?></td>
                    <td class="r-t">
                        <a class="edit" href="<?php echo BASE_URL; ?>ticket/edit/<?php echo $ticket['id']; ?>">
                            <i class="fa fa-pencil fa-1x" aria-hidden="true"></i></a>
                        <a class="delete " href="<?php echo BASE_URL; ?>ticket/delete/<?php echo $ticket['id']; ?>">
                            <i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</section>