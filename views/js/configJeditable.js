$(document).ready(function() {   
    $(function () {
        $(".dblclick").editable("actions/actAtualizar.php", {
            indicator: "<img src='views/img/indicator.gif'>",
            tooltip: "Clique duas vezes para editar...",
            event: "dblclick",
        });
    });
});