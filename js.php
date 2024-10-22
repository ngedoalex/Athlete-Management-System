    
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/lib/data-table/datatables-init.js"></script>

        <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/lib/chosen/chosen.jquery.min.js"></script>
<div id="refresh-medalist"></div>
<script type="text/javascript">
    medalist();

    
       function medalist(){
          $.ajax({
          url: 'refresh-medalist.php',
          dataType: 'html'
            })
            .done(function(data) {
                // Assuming the request returns HTML, replace content
                $('#refresh-medalist').html(data);
            });
        }
</script>

<div id="reload1"></div>
<script type="text/javascript">
    reload1();

    
       function reload1(){
          $.ajax({
          url: 'refresh-result.php',
          dataType: 'html'
})
.done(function(data) {
    // Assuming the request returns HTML, replace content
    $('#reload1').html(data);
});
        }
</script>
<div id="reload2"></div>
<script type="text/javascript">
    reload2();

    
       function reload2(){
          $.ajax({
          url: 'refresh_overall_result.php',
          dataType: 'html'
})
.done(function(data) {
    // Assuming the request returns HTML, replace content
    $('#reload2').html(data);
});
        }
</script>
<div id="backup"></div>
<script type="text/javascript">
    backup();

    
       function backup(){
          $.ajax({
          url: 'backup.php',
          dataType: 'html'
})
.done(function(data) {
    // Assuming the request returns HTML, replace content
    $('#backup').html(data);
});
        }
</script>


    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 3,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
                jQuery(document).ready(function() {
            jQuery(".standardSelect1").chosen({
                disable_search_threshold: 5,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#table-log').DataTable({"order": [[ 0, "asc" ]]});
            $('#table-athlete').DataTable({"order": [[ 0, "asc" ]]});
          $('#table1').DataTable();
          $('#table2').DataTable();
          $('#table3').DataTable();
          $('#table4').DataTable();
          $('#table5').DataTable();
          $('#table6').DataTable();
          $('#table7').DataTable();
          $('#table8').DataTable();
          $('#table9').DataTable();
          $('#table10').DataTable();
        } );
    </script>
     <script>
        var ctx = document.getElementById( "chart" );
    ctx.height = 180;
    var myChart = new Chart( ctx, {
        type: 'bar',
        data: {
            labels: [ <?php echo $delegates;?>],
            datasets: [
                {
                    label: "Gold",
                    data: [ <?php echo $gold;?> ],
                    borderColor: "gray",
                    borderWidth: "1",
                    backgroundColor: "gold"
                    },

                    {
                    label: "Silver",
                    data: [ <?php echo $silver;?> ],
                    borderColor: "gray",
                    borderWidth: "1",
                    backgroundColor: "silver"
                            },
                    {
                    label: "Bronze",
                    data: [ <?php echo $bronze;?> ],
                    borderColor: "gray",
                    borderWidth: "1",
                    backgroundColor: "#dc6d53"
                            }
                        ]
        },
        options: {
            responsive: true,

            tooltips: {
                mode: 'index',
                titleFontSize: 12,
                titleFontColor: '#000',
                bodyFontColor: '#000',
                backgroundColor: '#fff',
                titleFontFamily: 'Montserrat',
                bodyFontFamily: 'Montserrat',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: true,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [ {
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: ''
                    }
                        } ],
                yAxes: [ {
                    display: true,
                    gridLines: {
                        display: true,
                        drawBorder: true
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'No. of Events Won'
                    }
                        } ]
            },
            title: {
                display: true,
                text: ''
            }
        }
    } );






    </script>


