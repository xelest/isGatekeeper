<table id="tapout_table" class="table table-striped table-bordered" style="width:100%">
              <thead>
                  <tr>     
                      <th>Log No</th>  
                      <th>ID No</th>
                      <th>Tap OUT</th>
                  </tr>
              </thead>
              <tbody>
                  <?php

            //config
            include_once('connection.php');
          
         
          $msql = "SELECT `log_no`, `id_no`, `outDate` FROM `tapout_logs`";
          //fetch
          $result1 = mysqli_query($con, $msql);

          //contents populate
          while ($row1 = mysqli_fetch_assoc($result1)) {
              echo "<tr>";
              foreach ($row1 as $field => $value) {
                  echo "<td>" . $value . "</td>";
              }
              echo "</tr>";
          }
            ?>      
              </tbody>
        </table>