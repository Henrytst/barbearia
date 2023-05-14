


/*function pad(valor) { // completa com zeros à esquerda, caso necessário
  return valor.toString().padStart(2, '0');
}

function formata(data) {
  return `${data.getFullYear()}-${pad(data.getMonth() + 1)}-${pad(data.getDate())}`;
}

const campo = document.querySelector('#horario');

window.addEventListener('DOMContentLoaded', function () {
  var data = new Date(); // data de hoje
  campo.min = formata(data);
  // 2 anos à frente
  data.setFullYear(data.getFullYear() + 2);
  campo.max = formata(data);
});

// mensagens de validação
campo.addEventListener('input', () => {
  campo.setCustomValidity('');
  campo.checkValidity();
});

// se tentar submeter o form com data fora do intervalo, mostra o erro
campo.addEventListener('invalid', () => {
  campo.setCustomValidity('A data deve estar entre hoje e 2 anos à frente');
});



*/
$(function () {
  $.datetimepicker.setLocale('pt-BR');
  $('.botaoHorario').datetimepicker({
    //mask:'00/00/0000',
    format: 'd/m/Y H:i',
<<<<<<< HEAD
    minDate: 0,
=======

    startDate:new Date(),

    minDate:0,
    defaultTime:'10:00',
>>>>>>> 45fcc65d1bac5c84efe293b8a2ebdccc24bf974f
    allowTimes: ['10:00', '10:30', '11:00', '11:30', '12:00',
      '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'],
      defaultTime:'10:00',
    beforeShowDay: function (date) {
      var day = date.getDay();
      return [(day != 0 && day != 1)];
      
    },
    /*Quando o barbeiro quiser pausar em certas datas*/
    /*disabledDates: [
      moment("2023/04/21"),
      new Date(2023, 04, 21),
      "2023/04/30 00:53"
    ],*/
  });
});
//função do menu lateral
$(function menu() {
  var menu_width = 290;
  var menu = $(".menu");
  var menu_open = $(".menu-open");
  var menu_close = $(".menu-close");
  var overlay = $(".overlay");
 
  menu_open.click(function (e) {
    e.preventDefault();
    menu.css({"left": "0px"});
    overlay.css({"opacity": "1", "width": "100%"});
  });
  
  menu_close.click(function (e) {
    e.preventDefault();
    menu.css({"left": "-" + menu_width + "px"});
    overlay.css({"opacity": "0", "width": "0"});
  });
 });

 /*$('#horario').on('change paste keyup', function () {
  var messageSpan = $('.message');
  $.get({
      url: '',
      data: {'horario': $(this).val()}
  }).done(function () {
      messageSpan.text('Descrição aceita!');
      messageSpan.css('display', 'inline');
  }).fail(function () {
      messageSpan.text('Descrição não aceita!');
      messageSpan.css('display', 'inline');
  });
});*/

//função bloquear horario
$(function consulta () {
  var barbeiro = $('#barbeiro').val();
  var horario = $('#horario').val();
  
  $.ajax({
      url: '/pages/functions/php/consulta.php',
      type: 'POST',
      data: {
          barbeiro: barbeiro,
          horario: horario
      },
      success: function(response) {
        console.log(response);
          if (response == 'ja_marcada') {
              alert('Esta data já está marcada para este barbeiro por favor selecione outra data');
             
          } else {
              // Aqui você pode enviar o formulário para o servidor para salvar a 
              
            }
        }
    });
  });
