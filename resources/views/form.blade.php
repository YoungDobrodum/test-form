<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div id="messageList">

</div>
<div class="container">
    <form id="data_form" action="{{route('store')}}" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter second name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" name="conf_pass" id="conf_pass" placeholder="Confirmation password">
        </div>
        <button type="submit" class="btn btn-primary">Click me</button>
    </form>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

    <script>

        $('#data_form').on('submit',function(event){
            event.preventDefault();

            let name = $('#name').val();
            let surname = $('#surname').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let conf_pass = $('#conf_pass').val();

            $.ajax({
                url: $(this).attr('action'),
                type:"POST",
                data:{
                    "_token": "{{ csrf_token() }}",
                    name:name,
                    surname:surname,
                    email:email,
                    password:password,
                    conf_pass:conf_pass
                },
                success:function(response){
                    console.log(response);
                    if(response.status === 400){
                        $('#messageList').html("");
                        $('#messageList').addClass('alert alert-danger');
                        $.each(response.errors, function(key, message){
                            $('#messageList').append('<div>'+message+'</div>')
                        })
                    }
                },
            });
        });
    </script>
</div>

</body>
</html>
