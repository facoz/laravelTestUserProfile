@extends('layouts.base')
@section('title', 'Register Profile')

@section('content')
<form method="POST" action="{{route('save')}}" enctype="multipart/form-data">
    @csrf
    <section>
        <table class="table datatable table-hover">
            <tbody>
                <tr>
                    <td>User Img</td>
                    <td>
                        {{-- <img src="{{ $userInfo->imagen }}" value="{{ $userInfo->imagen }}" alt="Imagen de perfil" name="imagen" class="img-responsive" style="max-width: 250px; max-height: 250px;"> --}}
                            <input accept=".peg,.png,.jpg,.gif" type="file" name="imagen">
                        </form>
                    </td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input placeholder="Nombre" class="form-control" type="text" name="nombre" value=""></td>
                </tr>
                <tr>
                    <td>user Last Name</td>
                    <td><input placeholder="Apellidos" class="form-control" type="text" name="apellidos"  value=""></td>
                </tr>
                <tr>
                    <td>User Phone</td>
                        <td><input placeholder="Telefono" class="form-control" type="text" name="telefono"  value=""></td>
                    <td>
                </tr>
                <tr>
                    <td>User email</td>
                        <td><input placeholder="Correo" class="form-control" type="text" name="correo"  value=""></td>
                    <td>
                </tr>
            </tbody>
        </table>
        <button type="submit">Register</button>
        @if(session('url'))
            <a href="{{session('url')}}">Ir al perfil</a>
        @endif
    </section>
</form>
@endsection