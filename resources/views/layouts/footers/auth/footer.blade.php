<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha512-n6dYFOG599s4/mGlA6E+YLgtg9uPTOMDUb0IprSMDYVLr0ctiRryPEQ8gpM4DCMlx7M2G3CK+ZcaoOoJolzdCg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.js" integrity="sha512-aSJE4zr7oVisa+3kGjYy7r9a4IAP2fXnEmcnWG5qBDHE7RE2vRJUT8bppphPXxL35EnI8SmXzw7v6cnDkJeT6A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js" integrity="sha512-0QbL0ph8Tc8g5bLhfVzSqxe9GERORsKhIn1IrpxDAgUsbBGz/V7iSav2zzW325XGd1OMLdL4UiqRJj702IeqnQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="//cdn.datatables.net/2.0.7/js/dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    Dropzone.autoDiscover = false;
</script>
<script src="/assets/js/script.min.js"></script>
<script>
    $('#myTable').DataTable({
        "aLengthMenu": [
            [5, 10, 25, -1],
            [5, 10, 25, "All"]
        ],
        "iDisplayLength": 10,

        "language": {
            "sProcessing": " جارٍ التحميل... ",
            "sLengthMenu": " أظهر _MENU_ مدخلات ",
            "sZeroRecords": " لم يعثر على أية سجلات ",
            "sInfo": " إظهار _START_ إلى _END_ من أصل _TOTAL_ مدخل ",
            "sInfoEmpty": " يعرض 0 إلى 0 من أصل 0 سجل ",
            "sInfoFiltered": " (منتقاة من مجموع _MAX_ مُدخل) ",
            "sInfoPostFix": "  ",
            "sSearch": " ابحث: ",
            "sUrl": "",
            "oPaginate": {
                "sFirst": " الأول ",
                "sPrevious": " السابق ",
                "sNext": " التالي ",
                "sLast": " الأخير "
            }
        }
    });
    $('.dt-layout-cell.dt-start').removeClass('dt-start').addClass('dt-end').addClass('dtopensook');
    $('.dt-layout-cell.dt-end').removeClass('dt-end').addClass('dt-start');
    $('.dtopensook').removeClass('dt-start').addClass('dt-end');

</script>
