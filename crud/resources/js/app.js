require('./bootstrap');
import swal from 'sweetalert';
import ApexCharts from 'apexcharts';
import { fromJSON } from 'postcss';

window.deleteConfirm = function (e) {
    e.preventDefault();
    var form = e.target.form;
    swal({
        title: "Seguro que quiere eliminar el usuario?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
            form.submit();
        }
      });
}



