<table class="display table table-bordered table-stripped nowrap" id="myTable">
   <thead>
      <tr>
         <th class="first-col">ACTION</th>
         <th>NIPEG</th>
         <th>NAMA</th>
         <th>TANGGAL LAHIR</th>
         <th>TMTKERJA</th>
         <th>E_MAIL</th>
         <th>KODPEN</th>
         <th>STSPEG</th>
         <th>KDKRJ</th>
         <th>IDJOB</th>
         <th>NIPEG_UP</th>
         <th>PANGKAT</th>
         <th>P_NILAI</th>
         <th>K_NILAI</th>
         <th>STATUS_PK</th>
         <th>PK_UPDATE</th>
      </tr>
   </thead>
</table>
<script src="assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js" type="text/javascript"></script>
<script type="text/javascript" src="./assets/DataTables/datatables.min.js"></script>
<script type="text/javascript" src="./assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="./assets/DataTables/Buttons-1.5.1/js/dataTables.buttons.min.js"></script>
<script>
   $(document).ready(function() {
      $('#myTable').DataTable( {
         "processing": true,
         "serverSide": true,
         "ajax": "tabel/server-side.php",
         "order"     : [],
         columnDefs : [
            {
               "searchable"   : false,
               "orderable"    : false,
               "targets"      : 0,
               "render"       : function(data, type, row) {
                  var btn = "<center><button  name=\"view\" class=\"btn btn-info btn-xs view-data\" id=" + data + "><i class=\"fa fa-folder-open-o\"></i>view</button> <button name=\"edit\" class=\"btn btn-danger btn-xs edit-data\" id = "+ data +"><i class=\"fa fa-edit\"></i> edit</button></center>";
                  return btn;
               }
            },
            {
               "targets"      : [-3,-4],
               "render"       : function(data, type, row) {
                  var btn = "<center><a style=\"color:red\">"+data+ "</a></center>";
                  return btn;
               }
            },
            {
               "searchable"   : false,
               "orderable"    : false,
               "targets"      : 5,
               "render"       : function(data, type, row) {
                  var btn = "<center><a >"+data+ "</a></center>";
                  return btn;
               }
            },
            {
               "targets"      : -2,
               "render"       : function(data, type, row) {
                  var btn = "<center><p style=\"font-weight: bold;\">"+data+ "</p></center>";
                  return btn;
               }
            }
         ]

      } );
   } );
</script>
