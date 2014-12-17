$(document).ready(function () {
    function editOnPage() {
        $("td").dblclick(function () {
            var conteudoOriginal = $(this).text();
            $(this).addClass("celulaEmEdicao");
            $(this).html("<input type='text' value='" + conteudoOriginal + "' />");
            $(this).children().first().focus();
            $(this).children().first().keypress(function (e) {
                if (e.which == 13) {
                    var novoConteudo = $(this).val();
                    $(this).parent().text(novoConteudo);
                    $(this).parent().removeClass("celulaEmEdicao");
                }
            });
            $(this).children().first().blur(function () {
                $(this).parent().text(conteudoOriginal);
                $(this).parent().removeClass("celulaEmEdicao");
            });
        });
    }
    //fileeditOnPage();
});


