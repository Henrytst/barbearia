$(function () {
  jQuery.datetimepicker.setLocale('pt-BR');
  $('.horario').datetimepicker({
    format: 'd/m/Y H:i',
    minDate:0,
    defaultTime:'10:00',
    allowTimes: ['10:00', '10:30', '11:00', '11:30', '12:00',
      '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'],
      beforeShowDay: function (date) {
        var day = date.getDay();
        return [(day != 0 && day != 1)];
      }
  });
});