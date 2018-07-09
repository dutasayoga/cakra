<?php
      require_once("db.php");
       ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>CAKRA</title>
      <link rel="stylesheet" href="assets/DataTables/DataTables-1.10.16/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="assets/DataTables/Buttons-1.5.1/css/buttons.dataTables.min.css">

      <link rel="stylesheet" href="assets/css/bootstrap.css">
      <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/sb-admin.css">
   </head>
   <body>
      <div class="navbar navbar-inverse navbar-fixed-top">

      </div>
      <div class="col-lg-12" id="page-wrapper">
         <div class="table-responsive" >
            <?php include 'tabel/tabel-data.php'; ?>
         </div>

         <a href="export/export-excel.php">
            <button class="btn btn-default"><i class="fa fa-print"></i> Export Excel</button>
         </a>
         <a href="export/export-pdf.php">
            <button class="btn btn-info"><i class="fa fa-print"></i> Print PDF</button>
         </a>

         <div id="view-box" class="modal fade" data-backdrop="static" role="dialog">
            <div class="modal-dialog modal-lg">
               <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal">x</button>

                     <h2 align="center" class="modal-title">DETAIL PEGAWAI </h2>
                  </div>
                  <form class="form-horizontal" enctype="multipart/form-data" id="form">
                     <div class="modal-body" id="employee_detail">
                     </div>
                  </form>
                  <?php

                  ?>
               </div>
            </div>
         </div>

      <div id="edit" class="modal fade"  data-backdrop="static" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">x</button>

                  <h2 align="center" class="modal-title">INPUT VALUE P&K </h2>
               </div>
               <form class="form-horizontal" enctype="multipart/form-data" id="form">
                  <div class="modal-body">
                     <input type="hidden" name="NIPEG" id="NIPEG">
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="NAMA">NAMA</label>
                        <div class="col-sm-10">
                           <input type="text" name="NAMA" class="form-control" id="NAMA">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="KDKRJ">KODE KERJA</label>
                        <div class="col-sm-10">
                           <input type="text" name="KDKRJ" class="form-control" id="KDKRJ">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="P_NILAI">P NILAI</label>
                        <div class="col-sm-10">
                           <input type="number" name="P_NILAI" class="form-control" id="P_NILAI">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="K_NILAI">K NILAI</label>
                        <div class="col-sm-10">
                           <input type="number" name="K_NILAI" class="form-control" id="K_NILAI">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="control-label col-sm-2" for="STATUS_PK">STATUS_PK</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="STATUS_PK" id="STATUS_PK">
                              <option value="SEL">SEL</option>
                              <option value="HRD">HRD</option>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button type="submit" id="insert" class="btn btn-success" name="save" value="simpan">SAVE</button>
                  </div>
               </form>
               <?php

               ?>
            </div>
         </div>
      </div>
      <script src="assets/js/jquery-1.10.2.js"></script>
      <script type="text/javascript">
      $(document).ready(function(){
         $(document).on('click', '.view-data', function() {
            var employee_id = $(this).attr("id");
            if(employee_id != '')
            {
                $.ajax({
                      url:"models/view-data.php",
                      method:"POST",
                      data:{employee_id:employee_id},
                      success:function(data){
                          $('#employee_detail').html(data);
                          $('#view-box').modal('show');
                      }
                });
            }
         });

         $(document).on('click', '.edit-data', function(){
            var NIPEG = $(this).attr("id");
               $.ajax({
                  url:"models/edit.php",
                  method:"POST",
                  data:{NIPEG:NIPEG},
                  dataType:"json",
                  success:function(data){
                     $('#NIPEG').val(data.NIPEG);
                     $('#NAMA').val(data.NAMA);
                     $('#KDKRJ').val(data.KDKRJ);
                     $('#P_NILAI').val(data.P_NILAI);
                     $('#K_NILAI').val(data.K_NILAI);
                     $('#STATUS_PK').val(data.STATUS_PK);
                     $('#insert').val("Update");
                     $('#edit').modal('show');
                  }
               });
          });

         $(document).ready(function(e) {
            $("#edit #form").on("submit", (function(e) {
               e.preventDefault();
               $.ajax({
                  url : 'models/edit-data.php',
                  method : 'POST',
                  data : new FormData(this),
                  contentType : false,
                  cache : false,
                  processData : false,
                  success : function(msg) {
                     $('.table').html(msg);
                  }
               })
            }))
         });
      });
      </script>
      <script src="assets/DataTables/jQuery-3.3.1/jquery-3.3.1.js" type="text/javascript"></script>
      <script type="text/javascript" src="assets/DataTables/datatables.min.js"></script>
      <script type="text/javascript" src="assets/DataTables/DataTables-1.10.16/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="assets/DataTables/Buttons-1.5.1/js/dataTables.buttons.min.js"></script>
   </body>

</html>
