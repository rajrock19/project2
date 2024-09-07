<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/toastr/css/toastr.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>

    </style>
</head>

<body>
 
    <div class="container my-5">

        <label for="">Username:</label>
        <input type="text" name="" id="username">
        <button onclick="fetchUserData()">Fetch</button>

        <div id="content">
 
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/toastr/js/toastr.min.js') }}" type="text/javascript"></script>

<script>
 
    function fetchUserData() {

        var username=$('#username').val();

if(username == ''){
    toastr.error('User name is required');
    return false;
}
        $.ajax({
            url: 'http://localhost/usermanagement/public/api/fetchuser',
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ username: username }), // Send username as JSON
            success: function(response) {
               console.log(response);
               
               var html = '<h2>Name: ' + response.name + '</h2>';
                html += '<p>Username: ' + response.username + '</p>';
                html += '<p>Language: ' + response.language + '</p>';
                html += '<p>Mobile: ' + response.mobile + '</p>';

                // Update the HTML with the fetched data
                $('#content').html(html);
            
            },
            error: function(xhr) {
                toastr.error(xhr.responseText);
                // Handle error if needed
            }
        });
    }



    </script>
    
</body>
</html>
