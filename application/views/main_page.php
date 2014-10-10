<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Test task</title>
        <script src="../resources/jquery/jquery.js"></script>
        <script src="../resources/jquery.notify/jNotify.jquery.js"></script>
        <link href="../resources/jquery.notify/jNotify.jquery.css" type="text/css" rel="stylesheet">
        <link href="../resources/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <script src="../resources/main.js">
         
        </script>

    </head>
    <body>
        <div class="container">
            <form role="form" id='emailForm' class="col-md-6 col-md-offset-3">

                <div class="form-group  col-md-12">
                    <label for="name">Name</label>
                    <input type="text" name='name' class="form-control col" id="name" placeholder="Enter name, please">
                </div>
                <div class="form-group  col-md-12">
                    <label for="email">Email address</label>
                    <input type="email" name='email' class="form-control col" id="email" placeholder="Enter email address, please">
                </div>
                <div class="form-group col-md-12">
                    <label for="">Email text</label>
                    <textarea rows="15" type="password" name='emailText' class="form-control" id="exampleInputPassword1" placeholder="Enter email text, please">
                        
                    </textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>