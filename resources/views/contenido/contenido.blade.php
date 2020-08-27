@extends('principal')
@section('contenido')
    <template v-if="menu==0">
        <h1>...................Este es el escritorio</h1>
    </template>

    <template v-if="menu==1">
        <h1>Contenido del Menu 1</h1>
    </template>

    <template v-if="menu==2">
        <matricula></matricula>
    </template>

    <template v-if="menu==3">
        <carrera></carrera>
    </template>

    <template v-if="menu==4">
        <h1>Contenido del Menu 4</h1>
    </template>

    <template v-if="menu==5">
        <h1>Contenido del Menu 5</h1>
    </template>

    <template v-if="menu==6">
        <h1>Contenido del Menu 6</h1>
    </template>

    <template v-if="menu==7">
        <h1>Contenido del Menu 7</h1>
    </template>

    <template v-if="menu==8">
        <h1>Contenido del Menu 8</h1>
    </template>
    
@endsection