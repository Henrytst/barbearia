$(function () {
  $.datetimepicker.setLocale('pt');
  $('.horario').datetimepicker({
    mask:'00/00/0000 00:00',
    format: 'd/m/Y H:i',
    startDate:new Date(),
    minDate:0,
    defaultTime:'10:00',
    allowTimes: ['10:00', '10:30', '11:00', '11:30', '12:00',
      '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00', '17:30'],
    beforeShowDay: function (date) {
      var day = date.getDay();
      return [(day != 0 && day != 1)];
    }
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
//função bloquear horario
//teste de comit