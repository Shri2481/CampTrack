
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Camp Tracker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('controller/insert') ?>">
           
                <div class="modal-body">
                  

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="mmu" class="col-form-label">Date</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="date"  id="date" class="form-control" readonly >
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="mmu" class="col-form-label">MMU</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="mmu" id="mmu" class="form-control">
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="kms" class="col-form-label">Kms &nbsp;&nbsp;</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" name="kms" id="kms" class="form-control">
                        </div>
                    </div>

                    <div class="row g-3 align-items-center">
                        <div class="col-auto">
                            <label for="count" class="col-form-label">Count</label>
                        </div>
                        <div class="col-auto">
                            <input type="text" name="count" id="inputPassword6" class="form-control">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" name="id" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

let currentDate = new Date();

let formattedDate = currentDate.toISOString().split('T')[0];

console.log("Current Date:", formattedDate);

document.getElementById('date').value =  formattedDate ;


</script>