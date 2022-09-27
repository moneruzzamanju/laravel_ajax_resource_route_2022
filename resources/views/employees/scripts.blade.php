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
        });
    </script>