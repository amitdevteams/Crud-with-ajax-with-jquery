@extends('layout.app')

@section('content')

<!-- Button trigger modal -->


<!-- Modal -->

<!--Model End -->
<!--Edit Model Start-->
<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student Details</h5>
                <br><input type="text" value="" id="stud_id">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">

                    @csrf

                    <label for="name" class="form-label">name</label>
                    <input class="form-control" type="text" name="name" value="" id="edit_name">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="text" name="email" value="" id="edit_email">
                    <label for="phone" class="form-label">Phone No</label>
                    <input class="form-control" type="text" name="phone" value="" id="edit_phone">
                    <label for="course" class="form-label">Course Name</label>
                    <input class="form-control" type="text" name="course" value="" id="edit_course">

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
                            '</td><td>' + item.email + '</td><td>' + item.phone +
                            '</td><td>' + item.course +
                            '</td><td><button type="button" value="' + item.id +
                            '" class="show_button btn btn-info btn-sm"> Show</button></td><td><button type="button" value="' +
                            item.id +
                            '" class="edit_button btn btn-warning btn-sm">Edit</button></td><td><button type="button" value="' +
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
            let email1 = $("#email-id").val();
            let phone1 = $("#phone-id").val();
            let course1 = $("#course-id").val();

            let data = {
                'name': name1,
                'email': email1,
                'phone': phone1,
                'course': course1,
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
                    $('#stud_id').val(response.student.id);
                    $('#edit_name').val(response.student.name);
                    $('#edit_email').val(response.student.email);
                    $('#edit_phone').val(response.student.phone);
                    $('#edit_course').val(response.student.course);
                }
            });

        });

        $('#updateButton').click(function (e) {
            e.preventDefault();
            let stud_val = $('#stud_id').val();
            console.log(stud_val);
            console.log('update button is clicked');
            console.log($('#edit_name').val());
            let data = {
                'name': $('#edit_name').val(),
                'email': $('#edit_email').val(),
                'phone': $('#edit_phone').val(),
                'course': $('#edit_course').val(),
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
    });

</script>

@endsection
