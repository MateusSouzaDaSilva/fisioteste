// $(function () {
//     $("td").dblclick(function () {
//         var conteudoOriginal = $(this).text();

//         $(this).addClass("celulaEmEdicao");
//         $(this).html(`
//         <select name='nome-aluno' id='nome-aluno' class='form-control'/>
        
//         </select>
        
//         `);
//         $(this).children().first().focus();

//         $(this).children().first().keypress(function (e) {
//             if (e.which == 13) {
//                 var novoConteudo = $(this).val();
//                 $(this).parent().text(novoConteudo);
//                 $(this).parent().removeClass("celulaEmEdicao");
//             }
//         });

// 	$(this).children().first().blur(function(){
// 		$(this).parent().text(conteudoOriginal);
// 		$(this).parent().removeClass("celulaEmEdicao");
// 	});
//     });
// });