<?php include('header.php'); ?>
 <?php include('connect.php'); ?>

 <script>
    function toggleEditable(inputId) {
        var inputElement = document.getElementById(inputId);
        inputElement.contentEditable = inputElement.contentEditable === 'true' ? 'false' : 'true';

       
    }
</script>



 <h1>Camp Tracker</h1>
  <div style="display:flex; justify-content:space-evenly; width;100%;">
    <div style="margin-right:20px;">
     <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float:right">Add Record</button>
    </div>

    <div style="float:right">
      <a href="<?php echo site_url('controller/logout/'); ?>"><button type="button" class="btn btn-danger">Logout</button></a>
    </div>
    
    <!-- <div style="margin-right:20px;">
     <a href="<?php echo site_url('controller/export/'); ?>"><button type="button" class="btn btn-dark">Export To Excel</button></a>
    </div> -->

  </div>
 <table class="table my-5 table-success table-striped" >
        <thead class="head" >
          <tr>
            <!-- <th scope="col">ID</th> -->
            <th style="text-align:center" scope="col">Date</th>
            <th style="text-align:center"  scope="col">MMU</th>
            <th style="text-align:center"  scope="col">Inception</th>
            <th style="text-align:center"  scope="col">Month</th>
            <th style="text-align:center"  scope="col">Current</th>
            <th style="text-align:center"  scope="col">Action</th>
          </tr>
          <tr>
            <!-- <th scope="col">#</th> -->
            <th style="text-align:center" scope="col">YY / MM / DD</th>
            <th style="text-align:center" scope="col">States</th>
            <th  scope="col">
             <div style="display:flex; justify-content:space-evenly;">
               <div>
                <span >Kms</span>
              </div>
              <div>
                <span>Count</span></th>
              </div>

            </div>
            <th scope="col">
            <div style="display:flex; justify-content:space-evenly;">
               <div>
                <span >Kms</span>
              </div>
              <div>
                <span>Count</span></th>
              </div>

            </div>
            </th>
            <th scope="col">
            <div style="display:flex; justify-content:space-evenly;">
               <div>
                <span >Kms</span>
              </div>
              <div>
                <span>Count</span></th>
              </div>

            </div>
            </th>
          </tr>
         
        </thead>
        <tbody >
        <?php foreach ($result as $row): ?>
          <form <?php base_url();?> >
            <tr>
                <td scope="row"><?php echo $row->id; ?></td>
                <td  style="text-align:center" scope="row"><input value="<?php echo $row->date; ?>"></td>
                <td  style="text-align:center"><input value="<?php echo $row->mmu; ?>"></td>
                <td>
                  <div style="display:flex; justify-content:space-evenly;">
                      <div>
                        <span class="px-2" id="kms">
                         <input value=" <?php echo $row->inceptionkm; ?>">
                        </span>
                      </div>
                    <div>
                        <span style="">
                         <input value=" <?php echo $row->inceptioncount; ?>">
                       </span>
                    </div>
                 <div>
              </td>
              
                <td>
                  <div style="display:flex; justify-content:space-evenly;">
                      <div>
                        <span class="px-2">
                         <input value=" <?php echo $row->monthkm; ?>">
                        </span>
                      </div>
                      <div>
                      <span>
                       <input value=" <?php echo $row->monthcount; ?>">
                      </span>
                      </div>
                  </div>
                </td>
               
                <td>
                  <div style="display:flex; justify-content:space-evenly;">
                      <div>
                        <span class="px-2">
                          <input value="<?php echo $row->currentkm; ?>">
                        </span>
                      </div>
                      <div>
                        <span>
                         <input value=" <?php echo $row->currentcount; ?>">
                        </span>
                    </div>
                  </div>
                </td>
                <td>
              
                  <div style="display:flex; justify-content:space-evenly;">
                <a href="<?php echo base_url('controller/get/' . $row->id); ?>">
                  <button style="border-radius:50%;" onclick="toggleEditable('<?php echo $row->id; ?>')">
                    <img src="https://cdn-icons-png.flaticon.com/128/13707/13707429.png" alt="update" width="30" height="30">
                  </button>
                </a>
              
                <a href="<?php echo site_url('controller/delete/' . $row->id); ?>">
                  <button style="border-radius:50%;">
                    <img src="https://cdn-icons-png.flaticon.com/128/6711/6711573.png" alt="update" width="30" height="30">
                  </button>
              </a>
            </form>
        </div>
                </td
            </tr>
            <?php endforeach; ?>
          
           
        </tbody>
      </table>

      <?php include('addModal.php'); ?>
      












 

   

<?php include('footer.php'); ?>
