<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" style="background-color: #e8e4e2;">
        <h4>Search</h4>

        <input type="text" id="search" style="background-color: #d7d3d1;" class="form-control mb-4" placeholder="Search name/designation/department">

        <div id="user-list" class="row">

            @foreach($users as $user)
            <div class="col-md-6 mb-3 user-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ $user->Name }}</h5>
                            <h6 class="card-text"> {{ $user->departmentBelongs->Name ?? 'N/A' }}</h6>
                            <h6 class="card-text">{{ $user->designationBelongs->Name ?? 'N/A' }}</h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#search').on('keyup', function() {
            var query = $(this).val();
            console.log(query);

            $.ajax({
                url: "{{ url('search') }}",
                method: 'GET',
                data: {
                    query: query
                },
                success: function(response) {
                    console.log(response);
                    $('#user-list').html('');

                    if (query.length < 2) {

                        response.users.forEach(function(user) {
                            var userCard = `
                        <div class="col-md-6 mb-3 user-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">${user.Name}</h4>
                                    <h6 class="card-text">${user.department_belongs ? user.department_belongs.Name : 'N/A'}</h6>
                                    <h6 class="card-text">${user.designation_belongs ? user.designation_belongs.Name : 'N/A'}</h6>
                                </div>
                            </div>
                        </div>
                    `;
                            $('#user-list').append(userCard);
                        });
                    } else {

                        if (response.users && response.users.length > 0) {
                            response.users.forEach(function(user) {
                                var userCard = `
                            <div class="col-md-6 mb-3 user-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">${user.Name}</h4>
                                        <h6 class="card-text">${user.department_belongs ? user.department_belongs.Name : 'N/A'}</h6>
                                        <h6 class="card-text">${user.designation_belongs ? user.designation_belongs.Name : 'N/A'}</h6>
                                    </div>
                                </div>
                            </div>
                        `;
                                $('#user-list').append(userCard);
                            });
                        } else {
                            $('#user-list').html('<p>No users found.</p>');
                        }
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error: " + error);
                    $('#user-list').html('<p>Error fetching data.</p>');
                }
            });
        });
    </script>
</body>

</html>