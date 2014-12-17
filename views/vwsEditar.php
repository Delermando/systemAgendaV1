<div class="edit">
    <div class="editCenter">
        <div class="left">
            <div class="search ">
                <form method="POST" >
                    <label for="search">Pesquisar
                        <input name="search" type="text">
                    </label>
                </form>
            </div>
        </div>
        <div class="right">
            <div class="pagination">#1, 2, 3 ...</div>
        </div>
    </div>
    <div class="list">
        <table border="1">
            <tbody>
                <tr>
                    <td colspan="8"><h3>Informações</h3></td>
                </tr>
                <form method="POST" id="formExcluir">
                    <tr>
                        <td><strong><a href="#" id="excluir">Excluir</a></strong></td>
                        <td><strong>E. remetente</strong></td>
                        <td><strong>N. remetente</strong></td>
                        <td><strong>E. destinatario</strong></td>
                        <td><strong>N. destinatario</strong></td>
                        <td><strong>Mensagem</strong></td>
                        <td><strong>Data envio</strong></td>
                        <td><strong>Data criação</strong></td>
                    </tr>
                    <?php echo $html;?>
                </form>
            </tbody>
        </table>
    </div>
</div>