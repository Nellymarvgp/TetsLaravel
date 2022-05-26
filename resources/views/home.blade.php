@extends('layouts.app')

@section('content')
<div class="content-full-page container">
   <div class="container-persons">
      <div class="row">
         <div class="block-menu">
            <a href="" class="text-blue-3 active"><i class="fa-solid fa-house-chimney"></i> Inicio</a>
            <a href="" class="text-gray-1"><i class="fa-solid fa-gear text-gray-2"></i>Configurar</a>
            <a href="" class="text-gray-1"><i class="fa-solid fa-cubes-stacked text-gray-2"></i>Plan</a>
         </div>
         <div class="block-left">
            <div class="box-buttons">
               <a href="#" class="active">Citas</a>
               <a href="#">Consultas</a>
            </div>
            <div class="box-dates">
               <div class="block-left text-gray-1">
                  <a href="" class="text-blue-3">Día</a> | <a href="" class="text-gray-2">Mes</a>
               </div>
               <div class="block-right">
                  <i class="fa-solid fa-chevron-left text-blue-3"></i>
                  <span class="text-gray-2">08.Abr.2020</span>
                  <i class="fa-solid fa-chevron-right text-blue-3"></i>
               </div>
            </div>
            <div class="items-citas">
               <div class="image-profile">
                  <img src="{{asset('img/avatar-profile-1.png')}}">
               </div>
               <div class="data-profile">
                  <b>Pedro Palacios</b>
                  <p>Consulta Online 10:00 / 11:00</p>
               </div>
               <div class="button-plus text-gray-1">
                  <i class="fa-solid fa-plus"></i>
               </div>
            </div>
            <div class="items-citas">
               <div class="image-profile">
                  <img src="{{asset('img/avatar-profile-2.png')}}">
               </div>
               <div class="data-profile">
                  <b>Pedro Palacios</b>
                  <p>Consulta Online 10:00 / 11:00</p>
               </div>
               <div class="button-plus text-gray-1">
                  <i class="fa-solid fa-plus"></i>
               </div>
            </div>
            <div class="items-citas">
               <div class="image-profile">
                  <img src="{{asset('img/avatar-profile-3.png')}}">
               </div>
               <div class="data-profile">
                  <b>Pedro Palacios</b>
                  <p>Consulta Online 10:00 / 11:00</p>
               </div>
               <div class="button-plus text-gray-1">
                  <i class="fa-solid fa-plus"></i>
               </div>
            </div>
            <div class="items-citas">
               <div class="image-profile">
                  <img src="{{asset('img/avatar-profile-4.png')}}">
               </div>
               <div class="data-profile">
                  <b>Pedro Palacios</b>
                  <p>Consulta Online 10:00 / 11:00</p>
               </div>
               <div class="button-plus text-gray-1">
                  <i class="fa-solid fa-plus"></i>
               </div>
            </div>
            <div class="items-citas">
               <div class="image-profile">
                  <img src="{{asset('img/avatar-profile-5.png')}}">
               </div>
               <div class="data-profile">
                  <b>Pedro Palacios</b>
                  <p>Consulta Online 10:00 / 11:00</p>
               </div>
               <div class="button-plus text-gray-1">
                  <i class="fa-solid fa-plus"></i>
               </div>
            </div>
            <div class="items-citas">
               <div class="image-profile">
                  <img src="{{asset('img/avatar-profile-6.png')}}">
               </div>
               <div class="data-profile">
                  <b>Pedro Palacios</b>
                  <p>Consulta Online 10:00 / 11:00</p>
               </div>
               <div class="button-plus text-gray-1">
                  <i class="fa-solid fa-plus"></i>
               </div>
            </div>
            <div class="items-citas">
               <div class="image-profile">
                  <img src="{{asset('img/avatar-profile-7.png')}}">
               </div>
               <div class="data-profile">
                  <b>Pedro Palacios</b>
                  <p>Consulta Online 10:00 / 11:00</p>
               </div>
               <div class="button-plus text-gray-1">
                  <i class="fa-solid fa-plus"></i>
               </div>
            </div>
         </div>
         <div class="block-right">
            <div class="user-logged">
               <span class="text-gray-1">Dr. Juan Sramiento</span>
               <i class="fa-solid fa-gear"></i>
               <img src="{{asset('img/avatar-profile-8.png')}}">
            </div>
            <div class="tab-historial">
               <div id="app">
                  <example-component></example-component>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection