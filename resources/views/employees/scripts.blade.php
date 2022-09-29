<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        });
    </script>
    <script>
        $(document).ready(function(){
        //Start Code For Add Employee
            $(document).on('click','.add_employee',function(event){
                event.preventDefault();
                let name = $('#name').val();
                let basic = $('#basic').val();
                // console.log(name+basic);

                $.ajax({
                    url:'{{ route('employees.store') }}',
                    method:'post',
                    data:{
                        name:name,
                        basic:basic
                    },
                    success:function(res){
                        if(res.status=='success'){
                            $('#addModal').modal('hide');
                            $('#addEmployeeForm')[0].reset();
                            $('.table').load(location.href+' .table');
                        }
                    },
                    error:function(err){
                        let error = err.responseJSON;
                        $.each(error.errors,function(index,value){
                            $('.errorMessageContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    }
                });
            });
        //End Code For Add Employee

        //Start Code For Show Employee Value in Edit Modal
            $(document).on('click','.update_employee_form',function(){
                let id = $(this).data('id');
                let name = $(this).data('name');
                let basic = $(this).data('basic');

                $('#update_id').val(id);
                $('#update_name').val(name);
                $('#update_basic').val(basic);
            });
        //End Code For Show Employee Value in Edit Modal

        //Start Code For Update Employee
        $(document).on('click','.update_employee',function(event){
                event.preventDefault();
                let update_id = $('#update_id').val();
                let update_name = $('#update_name').val();
                let update_basic = $('#update_basic').val();

                $.ajax({
                    url:'{{ route('employees.update',$employee->id)}}',
                    method:'put',
                    data:{
                        update_id:update_id,
                        update_name:update_name,
                        update_basic:update_basic
                    },
                    success:function(res){
                        if(res.status=='success'){
                            $('#updateModal').modal('hide');
                            $('#updateEmployeeForm')[0].reset();
                            $('.table').load(location.href+' .table');
                        }
                    },
                    error:function(err){
                        let error = err.responseJSON;
                        $.each(error.errors,function(index,value){
                            $('.errorMessageContainer').append('<span class="text-danger">'+value+'</span>'+'<br>');
                        });
                    }
                });
            });
        //End Code For Update Employee

        //Start Code For Delete Employee
        $(document).on('click','.delete_employee',function(event){
                event.preventDefault();
                let employee_id = $(this).data('id');
                if(confirm('Are you sure to delete data !!')){
                    $.ajax({
                    url:'{{ route('employees.destroy',$employee->id)}}',
                    method:'delete',
                    data:{
                        employee_id:employee_id
                    },
                    success:function(res){
                        if(res.status=='success'){
                            $('.table').load(location.href+' .table');
                        }
                    }
                });
                }

            });
        //End Code For Delete Employee



        });
    </script>