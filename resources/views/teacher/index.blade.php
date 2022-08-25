@extends('layout.app')

@section('content')

<!-- Button trigger modal -->
<div class="container text-center mt-3 bg-dark py-4 border">
    <div class="row">
        <div class="col-sm-6">
            <p class="text-secondary" id="successMessage"></p>
            <p class="text-success" id="updateMessage"></p>
            <p class="text-danger" id="deleteMessage"></p>
        </div>
        <div class="col-sm-6">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTeacherModal">
                Add Teacher Details
            </button>
        </div>
    </div>
</div>
<div class="container">
    <table class="table table-bordered  table-hover" id="dataTable">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">First Name</th>
                <th class="text-center">Last Name</th>
                <th class="text-center">Email ID</th>
                <th class="text-center">Phone No</th>
                <th class="text-center">Addresh</th>
                <th colspan = 3 class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->

<div class="modal fade" id="addTeacherModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Teacher</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <label for="first_name" class="form-label">First_Name</label>
                    <input class="form-control" type="text" name="first_name" value="" id="first_name-id">

                    <label for="last_name" class="form-label">Last_name</label>
                    <input class="form-control" type="text" name="last_name" value="" id="last_name-id">

                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" value="" id="email-id">

                    <label for="phone" class="form-label">Phone No</label>
                    <input class="form-control" type="text" name="phone" value="" id="phone-id">

                    <label for="address" class="form-label">Address</label>
                    <input class="form-control" type="text" name="address" value="" id="address-id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cencelButton">Close</button>
                <button type="button" class="btn btn-primary" id="submitButton">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Model End -->
<!--Edit Model Start-->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                 <br><input type="text" value="" id="stud_id">
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    <label for="first_name" class="form-label">First Name</label>
                    <input class="form-control" type="text" name="first_name" value="" id="edit_first_name">

                    <label for="last_name" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="last_name" value="" id="edit_last_name">

                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" value="" id="edit_email">

                    <label for="phone" class="form-label">Phone No</label>
                    <input class="form-control" type="text" name="phone" value="" id="edit_phone">

                    <label for="address" class="form-label">Address</label>
                    <input class="form-control" type="text" name="address" value="" id="edit_address">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cencelButton">Close</button>
                <button type="button" class="btn btn-primary" id="updateButton">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- ------------------showdata-------- -->

<div class="modal fade" id="showdata-new" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Show Teacher Details</h5>
                <!-- <br><input type="text" value="" id="stud_id"> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <label for="first_name" class="form-label">First Name</label>
                    <input class="form-control" type="text" name="first_name" value="" id="show_first_name">

                    <label for="last_name" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="last_name" value="" id="show_last_name">

                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" value="" id="show_email">

                    <label for="phone" class="form-label">Phone No</label>
                    <input class="form-control" type="text" name="phone" value="" id="show_phone">

                    <label for="address" class="form-label">Address</label>
                    <input class="form-control" type="text" name="address" value="" id="show_address">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cencelButton">Close</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Edit Model End-->
<!--Delete Model Section start-->

<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Teacher    Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <br><input type="text" value="" id="delete_id">
                <h4 class="text-danger">Are you Sure?</h4>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cencelButton">Close</button>
                <button type="button" class="btn btn-primary" id="deleteButton">Yes,Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!--Delete Model Section end-->
<script>
    $(document).ready(function () {
        studentData();
        //Fetching Data from Data base Through AJAX
        function studentData() {
            // console.log("manish is here");
            $.ajax({
                type: "GET",
                url: "{{ route('teacher-data') }}",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('tbody').html('');
                    $.each(response.students, function (key, item) {
                        $('tbody').append('<tr><td>' + item.id + '</td><td>' + item.first_name +
                            '</td><td>' + item.last_name + '</td><td>' + item.email + '</td><td>' + item.phone +
                            '</td><td>' + item.address +
                            '</td><td><button type="button" value="' + item.id + '" class="show_button btn btn-info btn-sm text-center">Show</button></td><td><button type="button" value="' +
                            item.id +
                            '" class="edit_button btn btn-warning btn-sm text-center">Edit</button></td><td><button type="button" value="' +
                            item.id +
                            '" class="delete_button btn btn-danger btn-sm">Delete</button></td></tr>'
                            );
                    });
                }
            });
 // ---------------------------Insert new data--------------------
        // teacher data
        console.log("Document is ready");
        $("#submitButton").click(function (e) {
            e.preventDefault();
            //get the value from input


            let first_name1 = $("#first_name-id").val();
            let last_name1 = $("#last_name-id").val();
            let email1 = $("#email-id").val();
            let phone1 = $("#phone-id").val();
            let address1 = $("#address-id").val();
           

            let data = {
                'first_name': first_name1,
                'last_name': last_name1,
                'email': email1,
                'phone': phone1,
                'address': address1,
            }
            //     // console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "post",
                url: "{{ route('home2') }}",
                data: data,
                dataType: "json",
                success: function (response) {
                    if (response.status == 200) {

                        console.log(response)

                        $('#successMessage').text(response.message);
                        $('#successMessage').addClass('alert alert-success');
                        $('#addStudentModal').modal('hide');
                        $('#addStudentModal').find('input').val('');
                        studentData();
                    }
                }
            });
        })
        }


        
        //Delete Data Function
        $('tbody').on('click', '.delete_button', function (e) {
            e.preventDefault();
            let del_val = $(this).val();
            $('#delete_id').val(del_val);
            $('#deleteStudentModal').modal('show');

        })
        //Delete button function

        $('#deleteButton').click(function (e) {
            e.preventDefault();
            let del_id = $('#delete_id').val();
            console.log(del_id);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "DELETE",
                dataType: "json",
                url: "delete-teacher/" + del_id,
                success: function (response) {
                    $('#deleteMessage').text(response.delete);
                    $('#deleteStudentModal').modal('hide');
                    studentData();

                }
            });
        })

        //Now this is the Function for Editing Data.

        $('tbody').on('click', '.edit_button', function (e) {
            e.preventDefault();
            let btn_val = $(this).val();
            $('#editStudentModal').modal('show');

            //AJAX CALL
            $.ajax({
                type: "GET",
                url: "edit-teacher/" + btn_val,
                data: "data",
                dataType: "json",
                success: function (response) {
                    $('#stud_id').val(response.student.id);
                    $('#edit_first_name').val(response.student.first_name);
                    $('#edit_last_name').val(response.student.last_name);
                    $('#edit_email').val(response.student.email);
                    $('#edit_phone').val(response.student.phone);
                    $('#edit_address').val(response.student.address);
                }
            });

        });

        $('#updateButton').click(function (e) {
            e.preventDefault();
            let stud_val = $('#stud_id').val();
            console.log(stud_val);
            console.log(stud_val);
            console.log(stud_val);
            console.log(stud_val);
            console.log('update button is clicked');
            console.log($('#edit_first_name').val());
            let data = {
                'first_name': $('#edit_first_name').val(),
                'last_name': $('#edit_last_name').val(),
                'email': $('#edit_email').val(),
                'phone': $('#edit_phone').val(),
                'address': $('#edit_address').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "update-teacher/" + stud_val,
                data: data,
                dataType: "json",
                success: function (response) {
                    $('#updateMessage').text(response.message);
                    $('#editStudentModal').modal('hide');
                    studentData();
                }
            });
        }) 


        $('tbody').on('click', '.show_button', function (e) {
            e.preventDefault();
            let btn_val = $(this).val();
            $('#showdata-new').modal('show');

            //AJAX CALL
            $.ajax({
                type: "GET",
                url: "show-teacher/" + btn_val,
                data: "data",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('#stud_id').val(response.student.id);
                    $('#show_first_name').val(response.student.first_name);
                    $('#show_last_name').val(response.student.last_name);
                    $('#show_email').val(response.student.email);
                    $('#show_phone').val(response.student.phone);
                    $('#show_address').val(response.student.address);
                }
            });
        });
    });

</script>

@endsection
