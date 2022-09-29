<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">


    <title>Laravel 9 Ajax CRUD 2022</title>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2 class="my-6 text-center mt-4">Laravel 9 Ajax CRUD</h2>
                <a href="" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Add Employee</a>
                <div class="table-data">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Serial No</th>
                                <th>Name</th>
                                <th>Basic Pay</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($employees as $key=>$employee)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->basic }}</td>
                                <td>
                                    <a href="" 
                                        class="btn btn-success update_employee_form"
                                        data-bs-toggle="modal"
                                        data-bs-target="#updateModal"
                                        data-id="{{ $employee->id }}"
                                        data-name="{{ $employee->name }}"
                                        data-basic="{{ $employee->basic }}"
                                        >
                                        <i class="las la-edit"></i>
                                    </a>
                                    <a href="" 
                                    class="btn btn-danger delete_employee"
                                    data-id="{{ $employee->id }}"
                                    >
                                    <i class="las la-times"></i>
                                </a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {!! $employees->links() !!}
                </div>
            </div>
        </div>
    </div>
    @include('employees.scripts')
    @include('employees.add_employees')
    @include('employees.update_employees')
  </body>
</html>