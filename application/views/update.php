<?php include('header.php'); ?>
<?php include('connect.php'); ?>
<h1>Camp Tracker</h1>
<!-- <p>ID : <?php echo $result->id;?></p>
<p>MMU : <?php echo $result->mmu;?></p>
<p>Iniception KM : <?php echo $result->inceptionkm;?></p>
<p>Iniception count : <?php echo $result->inceptioncount;?></p>
<p>Month KM : <?php echo $result->monthkm;?></p>
<p>Month count : <?php echo $result->monthcount;?></p> -->

<style>
    /* Additional styling for responsiveness */
    body {
      background-color: #f8f9fa;
      overflow:hidden;
    }

    .container {
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      margin-top: 30px;
    }

    .btn-close {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="text-right btn-close">
    <a href="<?php echo base_url('controller/index/'); ?>" class="btn btn-danger">Close</a>
  </div>

  <form method="post" action="<?php echo base_url('controller/update/' . $result->id); ?>">

    <div class="form-group row">
      <label for="date" class="col-sm-2 col-form-label">Date</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="date" id="date" readonly>
      </div>
    </div>

    <div class="form-group row">
      <label for="mmu" class="col-sm-2 col-form-label">MMU</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="mmu" value="<?php echo $result->mmu; ?>">
      </div>
    </div>

    <div class="form-group row">
      <label for="kms" class="col-sm-2 col-form-label">Kms</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="kms">
      </div>
    </div>

    <div class="form-group row">
      <label for="count" class="col-sm-2 col-form-label">Count</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="count">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-4 offset-sm-2">
        <button type="submit" class="btn btn-success" value="save">Save</button>
      </div>
    </div>

  </form>
</div>



<script>

let currentDate = new Date();

let formattedDate = currentDate.toISOString().split('T')[0];

console.log("Current Date:", formattedDate);

document.getElementById('date').value =  formattedDate ;




</script>


<?php include('footer.php'); ?>


