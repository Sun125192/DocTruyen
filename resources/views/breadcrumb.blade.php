 <!-- Breadcrumb Begin -->
 <div class="breadcrumb-option">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="breadcrumb__links">
                     <a href="/"><i class="fa fa-home"></i> Home</a>

                     @if (request()->is('truyen-tranh') || request()->is('truyen-tranh/*'))
                         <a href="{{ route('Catetruyen-tranh.show') }}">Truyện Tranh</a>
                     @endif

                     @if (request()->is('tieu-thuyet') || request()->is('tieu-thuyet/*'))
                         <a href="{{ route('Catetieu-thuyet.show') }}">Tiểu Thuyết</a>
                     @endif

                 </div>
             </div>
         </div>
     </div>
 </div>
 <!-- Breadcrumb End -->
