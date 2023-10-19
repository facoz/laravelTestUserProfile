@extends('layouts.base')
@section('title', 'See Profile')

@section('content')
<section>
    <table class="table datatable table-hover">
        <tbody>
            <tr>
                <td>User Img</td>
                <td>
                    <img src="{{ $userInfo->imagen }}" value="{{ $userInfo->imagen }}" alt="Imagen de perfil" name="imagen" class="img-responsive" style="max-width: 250px; max-height: 250px;">
                    </form>
                </td>
            </tr>
            <tr>
                <td>User Name</td>
                <td>
                    {{$userInfo->nombre}}
                    {{-- <input placeholder="User Name" class="form-control" type="text" name="nombre" value="{{$userInfo->nombre}}"> --}}
                </td>
            </tr>
            <tr>
                <td>user Last Name</td>
                <td>{{$userInfo->apellidos}}</td>
            </tr>
            <tr>
                <td>User Phone</td>
                    <td>{{$userInfo->telefono}}</td>
                <td>
            </tr>
            <tr>
                <form method="POST" action="{{route('send_email')}}">
                    @csrf
                    <td>User email</td>
                        <td>
                            {{$userInfo->correo}}
                            <input type="text" hidden readonly name="correo" value="{{$userInfo->correo}}"/>
                        </td>
                        <td>
                            @if ($userInfo->correo && $userInfo->correo != "No Especificado")
                                <button type="submit">Send Email</button>
                            @endif
                        </td>
                </form>
            </tr>
        </tbody>
    </table>
</section>
@endsection