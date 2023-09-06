<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>CreatePatient</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script
        src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
</head>
<body>
    <div class="container w-50">
        <h3>Добавление пациента в ИЭМК</h3>
        <form action="{{route('patients.create')}}" class="row g-3 needs-validation" method="POST">
            @csrf
            <div class="col-md-4">
                <label for="validationCustom01" class="form-label">Имя</label>
                <input type="text" class="form-control" name="givenName"  id="givenName">
            </div>
            <div class="col-md-4">
                <label for="validationCustom02" class="form-label">Фамилия</label>
                <input type="text" class="form-control" name="familyName" id="familyName">
            </div>
            <div class="col-md-4">
                <label for="validationCustomUsername" class="form-label">Дата рождения</label>
                <div class="input-group has-validation">
                    <input type="text" class="form-control" name="birthDate" id="birthDate">
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">ID пациента в МИС Медтайм</label>
                <input type="text" class="form-control" name="IdPatientMIS" id="IdPatientMIS">
            </div>
            <div class="col-md-3">
                <label for="validationCustom04" class="form-label">Найти пациента по ID</label>
                <button class="btn btn-primary searchById" type="button" id="validationCustom04">Найти пациента</button>
            </div>
            <div class="col-md-3">
                <label for="validationCustom05" class="form-label">Пол</label>
                <select class="form-select" name="sex" id="sex">
                    <option selected value="1">Мужской</option>
                    <option value="2">Женский</option>
                </select>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" type="submit">Добавить пациента</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.searchById').click(function(){
                var IdPatientMIS = $('#IdPatientMIS').val()

                $.ajax({
                   url: '{{route("get")}}',
                    method: 'POST',
                    data: {IdPatientMIS},
                    success: function(responce){
                        $('#givenName').attr("value",responce[0]['givenName'])
                        $('#familyName').attr("value",responce[0]['familyName'])
                        $('#birthDate').attr("value",responce[0]['birthDate'])
                        $('#IdPatientMIS').attr("value",responce[0]['IdPatientMIS'])
                        $('#validationCustom05').prop("value",responce[0]['sex'])
                    },
                    error: function(error){
                       console.log(error)
                    }
                });


            })
        })
    </script>
</body>
</html>
