<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!-- Trigger the modal with a button -->


<!-- Show Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">View Role</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body" id="addDetails">


                <p id="testt">Some text in the modal.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


<!---Show Modal----->

<!-- Modal form to edit a form -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="id">ID:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id_edit" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="title">Role:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title_role" autofocus>
                            <p class="errorRole text-center alert alert-danger hidden"></p>
                        </div>
                    </div>
                    <!--                    <div class="form-group">
                                            <label class="control-label col-sm-2" for="content">Content:</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" id="content_edit" cols="40" rows="5"></textarea>
                                                <p class="errorContent text-center alert alert-danger hidden"></p>
                                            </div>
                                        </div>-->
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                        <span class='glyphicon glyphicon-check'></span> Edit
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class='glyphicon glyphicon-remove'></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!------------End------------->

<script type="text/javascript">
    $(document).on("click", ".openShowModel", function () {
        var myId = $(this).data('id');
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax(
                {
                    url: "role/ajaxShow/" + myId,
                    data: {
                        "id": myId,
                        "_token": token
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#addDetails').html(response.data);
                        } else {
                            alert(response.error);
                        }
                    }
                });
    });

    // Edit a post
    $(document).on('click', '.edit-modal', function () {
        $('.modal-title').text('Edit');
//        $('#id_edit').val($(this).data('id'));
//        $('#title_role').val($(this).data('role'));
//        var id = $('#id_edit').val();
        $('#editModal').modal('show');
    });


</script>