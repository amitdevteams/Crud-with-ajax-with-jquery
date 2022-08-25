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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                Add Student Details
            </button>
            <!-- <a style="margin: 19px;" href="{{ route('index2')}}" class="btn btn-primary">Add Teacher Details</a> -->
        </div>
    </div>
</div>
<div class="container">
    <table class="table table-bordered  table-hover" id="dataTable">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Students Name</th>
                <th class="text-center">Class</th>
                <th class="text-center">Email ID</th>
                <th class="text-center">Phone No</th>
                <th class="text-center">Subject</th>
                <th class="text-center">Addresh</th>
                <th colspan = 3 class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="" id="name-id">

                    <label for="class" class="form-label">Class</label>
                    <input class="form-control" type="text" name="class" value="" id="class-id">

                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" value="" id="email-id">

                    <label for="phone" class="form-label">Phone No</label>
                    <input class="form-control" type="text" name="phone" value="" id="phone-id">

                    <label for="subject" class="form-label">Subject</label>
                    <input class="form-control" type="text" name="subject" value="" id="subject-id">

                    <label for="address" class="form-label">Address</label>
                    <input class="form-control" type="text" name="subject" value="" id="address-id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cencelButton">Close</button>
                <button type="button" class="btn btn-primary" id="submitButton">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

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
                    <input class="form-control" type="text" name="subject" value="" id="address-id">
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
                <br><input type="hide" value="hide" id="student_id">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf

                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="" id="edit_name">

                    <label for="class" class="form-label">Class</label>
                    <input class="form-control" type="text" name="class" value="" id="edit_class">

                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" value="" id="edit_email">

                    <label for="phone" class="form-label">Phone No</label>
                    <input class="form-control" type="text" name="phone" value="" id="edit_phone">

                    <label for="subject" class="form-label">Subject</label>
                    <input class="form-control" type="text" name="subject" value="" id="edit_subject">

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
                <h5 class="modal-title" id="exampleModalLabel">Show Student Details</h5>
              <br><input type="text" value="hide" id="student_id">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    
                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" type="text" name="name" value="" id="show_name">

                    <label for="class" class="form-label">Class</label>
                    <input class="form-control" type="text" name="class" value="" id="show_class">

                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" value="" id="show_email">

                    <label for="phone" class="form-label">Phone No</label>
                    <input class="form-control" type="text" name="phone" value="" id="show_phone">

                    <label for="subject" class="form-label">Subject</label>
                    <input class="form-control" type="text" name="subject" value="" id="show_subject">

                    <label for="address" class="form-label">Address</label>
                    <input class="form-control" type="text" name="address" value="" id="show_address">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cencelButton">Close</button>
                <button type="button" class="btn btn-primary" id="updateButton">Update</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Student Data</h5>
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
                url: "{{ route('student-data') }}",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('tbody').html('');
                    $.each(response.students, function (key, item) {
                        $('tbody').append('<tr><td>' + item.id + '</td><td>' + item.name +
                            '</td><td>' + item.class + '</td><td>' + item.email + '</td><td>' + item.phone +
                            '</td><td>' + item.subject +
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
        console.log("Document is ready");
        $("#submitButton").click(function (e) {
            e.preventDefault();
            //get the value from input

            let name1 = $("#name-id").val();
            let class1 = $("#class-id").val();
            let email1 = $("#email-id").val();
            let phone1 = $("#phone-id").val();
            let subject1 = $("#subject-id").val();
            let address1 = $("#address-id").val();
           

            let data = {
                'name': name1,
                'class': class1,
                'email': email1,
                'phone': phone1,
                'subject': subject1,
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
                url: "{{ route('home') }}",
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
                url: "delete-student/" + del_id,
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
                url: "edit-student/" + btn_val,
                data: "data",
                dataType: "json",
                success: function (response) {
                    $('#student_id').val(response.student.id);
                    $('#edit_name').val(response.student.name);
                    $('#edit_class').val(response.student.class);
                    $('#edit_email').val(response.student.email);
                    $('#edit_phone').val(response.student.phone);
                    $('#edit_subject').val(response.student.subject);
                    $('#edit_address').val(response.student.address);
                }
            });

        });

        $('#updateButton').click(function (e) {
            e.preventDefault();
            let stud_val = $('#student_id').val();
            console.log(stud_val);
            console.log('update button is clicked');
            console.log($('#edit_name').val());
            let data = {
                'name': $('#edit_name').val(),
                'class': $('#edit_class').val(),
                'email': $('#edit_email').val(),
                'phone': $('#edit_phone').val(),
                'subject': $('#edit_subject').val(),
                'address': $('#edit_address').val(),
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "update-student/" + stud_val,
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
                url: "show-student/" + btn_val,
                data: "data",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('#student_id').val(response.student.id);
                    $('#show_name').val(response.student.name);
                    $('#show_class').val(response.student.class);
                    $('#show_email').val(response.student.email);
                    $('#show_phone').val(response.student.phone);
                    $('#show_subject').val(response.student.subject);
                    $('#show_address').val(response.student.address);
                }
            });
        });
    });

</script>

@endsection
