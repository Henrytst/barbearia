
function pad(valor) { // completa com zeros à esquerda, caso necessário
  return valor.toString().padStart(2, '0');
}

function formata(data) {
  return `${data.getFullYear()}-${pad(data.getMonth() + 1)}-${pad(data.getDate())}`;
}

const campo = document.querySelector('#campoData');

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


$(function () {
  jQuery.datetimepicker.setLocale('pt-BR');
  $('.timepicker').datetimepicker({
    beforeShowDay: function(date) {
      var day = date.getDay();
      return [(day != 0 && day != 6)];},
    format: 'd/m/Y H:i',
    minDate: '11-11-2020',
    allowTimes: ['10:00', '10:30', '11:00', '11:30', '12:00',
      '02:30', '3:00', '3:30', '04:00', '04:30', '05:00', '05:30', '06:00', '06:30'],
    defaultDate: "01/12/2013",
    disabledDates: [
      moment("2023/04/21"),
      new Date(2023, 04, 21),
      "2023/04/30 00:53"
    ],
  });
});