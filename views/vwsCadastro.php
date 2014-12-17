<section>
    <main>
        <article>
            <div class="formCadastro">
                <form method="POST" action="?action=cadastro&amp;cadastrarCartoes=true" name="MontaCartao">
                    <div class="formBoxMensagem">  
                        <label for="txtMensagem"><p>Mensagem</p>
                            <textarea name="txtMensagem"></textarea>
                        </label>
                    </div>
                    <div class="formBox">
                        <div class="float margenInput">
                            <label for="txtNomeRemetente"><p>Nome do remetente</p>
                                <input type="text" name="txtNomeRemetente" maxlength="50" value="" >
                            </label>
                        </div>
                        <div class="float">
                            <label for="txtEmailRemetente"><p>Email do remetente</p>
                                <input type="text" name="txtEmailRemetente" maxlength="100" value="">
                            </label>
                        </div>
                    </div>
                    <div class="formBox">
                        <div class="float margenInput">
                            <label for="txtNomeDestinatario"><p>Nome do destinatário</p>
                                <input type="text" value="" name="txtNomeDestinatario" maxlength="50">
                            </label>
                        </div>
                        <div class="float">
                            <label for="txtEmailDestinatario"><p>Email do destinatário</p>
                                <input type="text" value="" name="txtEmailDestinatario" maxlength="100">
                            </label>
                        </div>
                    </div>
                    <div class="formBox">
                        <label>Enviar no dia:<br>
                            <select name="selectDia">
                                <option value="">Dia</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                            </select>
                            <select name="selectMes">
                                <option value="">Mês</option>
                                <option value="01">Janeiro</option>
                                <option value="02">Fevereiro</option>
                                <option value="03">Março</option>
                                <option value="04">Abril</option>
                                <option value="05">Maio</option>
                                <option value="06">Junho</option>
                                <option value="07">Julho</option>
                                <option value="08">Agosto</option>
                                <option value="09">Setembro</option>
                                <option value="10">Outubro</option>
                                <option value="11">Novembro</option>
                                <option value="12">Dezembro</option>
                            </select>
                            <select name="selectAno">
                                <option value="">Ano</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                            </select>
                        </label>
                    </div>
                    <div class="botaoEnviar">
                        <input type="submit" value="Enviar" name="btnEnviar">
                    </div>
                </form>
            </div>
        </article>
    </main>
</section>