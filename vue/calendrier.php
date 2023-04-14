<!DOCTYPE html>
<html>
<head>
    <title>Rendez-vous</title>
    <link rel="stylesheet" type="text/css" href="asset/css/mark-your-calendar.css">
    <link rel="stylesheet" href="asset/css/materialize.min.css">
</head>
<body>

    <div id="picker"></div>
    <div>
        <p>Date du Rendez-vous : <span id="selected-date"></span>
        <span id="selected-time"></span></p>
        <button onClick="validerRdv()"> Valider le rendez-vous </button>
    </div>
    <script src="asset/js/materialize.min.js"></script>
    <script src="asset/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="asset/js/mark-your-calendar.js"></script>
    <!-- Script permettant de récupérer la valeur de la date et heure sélectionnée -->
    <script type="text/javascript">
    function validerRdv() {
                var dateSelection = $('#selected-date').text();
                var heureSelection = $('#selected-time').text();
                var url = '?action=new_rdv&date=' + dateSelection + " " + heureSelection ;
                window.location.href = url;
    }
    </script>
    <script type="text/javascript">
        (function($) {
          $('#picker').markyourcalendar({
            availability: [ //A l'init de la page
              [],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              []
            ],
            startDate: new Date("2020-10-25"),
            onClick: function(ev, data) {
              // data is a list of datetimes
              var d = data[0].split(' ')[0];
              var t = data[0].split(' ')[1];
              $('#selected-date').html(d);
              $('#selected-time').html(t);
            },
            onClickNavigator: function(ev, instance) {

              // /// Quand on clique sur next, génération aléatoire d'un array pris entre 1 et 7
              // var arr = [
              //   [ //Premier clique sur next
              //     ['04:00', '05:00', '06:00', '07:00', '08:00'],
              //     ['01:00', '05:00'],
              //     ['02:00', '05:00'],
              //     ['03:30'],
              //     ['02:00', '05:00'],
              //     ['02:00', '05:00'],
              //     ['02:00', '05:00']
              //   ],
              //   [
              //     ['2:00', '5:00'],
              //     ['4:00', '5:00', '6:00', '7:00', '8:00'],
              //     ['4:00', '5:00'],
              //     ['2:00', '5:00'],
              //     ['2:00', '5:00'],
              //     ['2:00', '5:00'],
              //     ['2:00', '5:00']
              //   ],
              //   [ 
              //     ['4:00', '5:00'],
              //     ['4:00', '5:00'],
              //     ['4:00', '5:00', '6:00', '7:00', '8:00'],
              //     ['3:00', '6:00'],
              //     ['3:00', '6:00'],
              //     ['3:00', '6:00'],
              //     ['3:00', '6:00']
              //   ],
              //   [
              //     ['4:00', '5:00'],
              //     ['4:00', '5:00'],
              //     ['4:00', '5:00'],
              //     ['4:00', '5:00', '6:00', '7:00', '8:00'],
              //     ['4:00', '5:00'],
              //     ['4:00', '5:00'],
              //     ['4:00', '5:00']
              //   ],
              //   [
              //     ['4:00', '6:00'],
              //     ['4:00', '6:00'],
              //     ['4:00', '6:00'],
              //     ['4:00', '6:00'],
              //     ['4:00', '5:00', '6:00', '7:00', '8:00'],
              //     ['4:00', '6:00'],
              //     ['4:00', '6:00']
              //   ],
              //   [
              //     ['3:00', '6:00'],
              //     ['3:00', '6:00'],
              //     ['3:00', '6:00'],
              //     ['3:00', '6:00'],
              //     ['3:00', '6:00'],
              //     ['4:00', '5:00', '6:00', '7:00', '8:00'],
              //     ['3:00', '6:00']
              //   ],
              //   [
              //     ['3:00', '4:00'],
              //     ['3:00', '4:00'],
              //     ['3:00', '4:00'],
              //     ['3:00', '4:00'],
              //     ['3:00', '4:00'],
              //     ['3:00', '4:00'],
              //     ['4:00', '5:00', '6:00', '7:00', '8:00']
              //   ]
              // ]
              // var rn = Math.floor(Math.random() * 10) % 7;
              // instance.setAvailability(arr[rn]);

              // Récupérer les valeurs de la BD et n'afficher que les créneaux libres
              var arr = [[],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              ['08:00', '08:30', '09:00', '09:30','10:00', '10:30','11:00', '11:30','12:00', '12:30','14:00', '14:30','15:00', '15:30','16:00', '16:30','17:00', '17:30','18:00', '18:30',],
              []]
              instance.setAvailability(arr);
            }
          });
        })(jQuery);
    </script>


</body>
</html>