<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Crud laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    </head>
    <body>  
        <div class="container" style="padding-top: 15px;">
            <div class="row">
                <div class="col-sm-8 mx-auto">
                    <div class="card mb-3 border-0 shadow">
                        <div class="card-body">
                            @if ($errors->any())  
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        - {{ $error }} <br>
                                    @endforeach
                                </div>                              
                            @endif
                            <form action="{{ route('users.store') }}" method="POST">
                                <div class="form-row" style="display: flex; padding: 15px;">
                                    <div class="col-sm-3 mx-auto">
                                        <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name')}}">
                                    </div>
                                    <div class="col-sm-4 mx-auto">
                                        <input type="text" name="email" class="form-control" placeholder="Email" value="{{ old('name')}}">
                                    </div>
                                    <div class="col-sm-3 mx-auto">
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña">
                                    </div>
                                    <div class="col-auto mx-auto">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>&nbsp;</th>
                            </tr> 
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <input 
                                            type="submit" 
                                            value="Eliminar" 
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('¿Desea eliminar...?')"
                                        >
                                    </form>
                                </td>
                            </tr>
                            @endforeach        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
