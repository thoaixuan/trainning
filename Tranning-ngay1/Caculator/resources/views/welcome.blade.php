<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caculator</title>
    <link rel="stylesheet" href="{{url('/css/app.css')}}">
    <link href="{{url('/bootstrap-5.3.0-alpha2-dist/css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
    <div class="container text-center">
        <div class="row" style="margin-top: 100px;">
            <div class="col"></div>
            <div class="col-5">
                <table class="caculator table table-bordered border-primary">
                    <tr>
                        <td colspan="3" style="padding-left: 10px;"><input id="result" class="display-box" disabled></td>
                        <td><input class="button" type="button" value="c" onclick="display('')"></td>
                    </tr>
                    <tr>
                        <td><input onclick="display('1')" class="button" type="button" value="1"></td>
                        <td><input onclick="display('2')" class="button" type="button" value="2"></td>
                        <td><input onclick="display('3')" class="button" type="button" value="3"></td>
                        <td><input onclick="display('+')" class="button" type="button" value="+"></td>
                    </tr>
                    <tr>
                        <td><input onclick="display('4')" class="button" type="button" value="4"></td>
                        <td><input onclick="display('5')" class="button" type="button" value="5"></td>
                        <td><input onclick="display('6')" class="button" type="button" value="6"></td>
                        <td><input onclick="display('-')" class="button" type="button" value="-"></td>
                    </tr> 
                    <tr>
                        <td><input onclick="display('7')" class="button" type="button" value="7"></td>
                        <td><input onclick="display('8')" class="button" type="button" value="8"></td>
                        <td><input onclick="display('9')" class="button" type="button" value="9"></td>
                        <td><input onclick="display('*')" class="button" type="button" value="*"></td>
                    </tr>
                    <tr>
                        <td><input onclick="display('.')" class="button" type="button" value="."></td>
                        <td><input onclick="display('0')" class="button" type="button" value="0"></td>
                        <td><input onclick="caculate()" class="button" type="button" value="="></td>
                        <td><input onclick="display('/')" class="button" type="button" value="/"></td>
                    </tr>
                </table>
            </div>
            <div class="col"></div>
        </div>
    </div>
</body>
    <script type="text/javascript" src="{{url('/js/app.js')}}"></script>
    <script src="{{url('/bootstrap-5.3.0-alpha2-dist/js/bootstrap.bundle.min.js')}}"></script>
</html>