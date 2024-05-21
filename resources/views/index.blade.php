@extends('layout.app')

@section('content')
    {{-- Index page content  --}}

    <!--- Home Section Start ---->
       <section class="home" id="home">

           <div class="swiper home-slider">
               <div class="swiper-wrapper wrapper">
                   <div class="swiper-slide slide">
                       <div class="content">
                           <span>Makanan Enak</span>
                           <h3>Nasi Kuning</h3>
                           <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. In optio voluptatem impedit hic iste explicabo, omnis labore error sint consequuntur tempora suscipit minima quis, libero quia sed laudantium. Fuga, nostrum!</p>
                           <a href="#" class="btn">order now</a>
                       </div>
                       <div class="image">
                           <img src="{{asset('images/backgrounds/CouscoBack.png')}}" alt="">
                       </div>
                   </div>

                   <div class="swiper-slide slide">
                        <div class="content">
                            <span>Makanan Enak</span>
                            <h3>Kue cookies</h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque cumque dolor repellendus ipsam excepturi modi consectetur fugit! Nostrum obcaecati tenetur aliquam, sapiente, repellat voluptatibus earum modi ad neque eos nihil!.</p>
                            <a href="#" class="btn">order now</a>
                        </div>
                        <div class="image">
                            <img src="{{asset('images/backgrounds/bstillabacknew.png')}}" alt="">
                        </div>
                    </div>

                    <div class="swiper-slide slide">
                        <div class="content">
                            <span>Makanan Enak</span>
                            <h3>Salad Bawang</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloremque reprehenderit, tenetur, et maxime molestias placeat iste voluptatum rem deserunt earum aspernatur sit cumque quaerat quo consequatur illo amet vel impedit.
                                 .</p>
                            <a href="#" class="btn">order now</a>
                        </div>
                        <div class="image">
                            <img src="{{asset('images/backgrounds/fishback.png')}}" alt="">
                        </div>
                    </div>
               </div>

               <div class="swiper-pagination"></div>

           </div>
       </section>


    <!--- Home Section End --->

    @if ($propmenus !== 0)
         <!-- Dish section Strat  --->
      <section class="dishes" id="dishes">
          <h3 class="sub-heading">Hidangan Kami</h3>
          <h1 class="heading">Hidangan Terlaris</h1>
          <div class="box-container">
              @foreach ($propmenus as $propmenu)
              <div class="box">
                  <form action="{{route('Jador.store')}}" method="POST">
                      @csrf
                      @if (auth()->user())
                          <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                          <input type="hidden" name="menu_id" value="{{$propmenu->id}}">
                      @endif
                    <button type="submit"> <i class="fas fa-heart"></i></button>
                    {{--<a href="#" class="fas fa-eye"></a>--}}
                  </form>
                  <img src="{{asset('images/menu/'.$propmenu->image)}}" alt="">
                  <h3>{{$propmenu->title}}</h3>

                  <span>{{$propmenu->pric}} MAD</span>
                  <form action="{{route('cart.add',$propmenu->id)}}" method="POST">

                    <input type="hidden" name="quantity"  value="1">
                    @csrf
                    <button
                     type="submit"
                     class="btn">add to cart</button>
                </form>

              </div>
              @endforeach
          </div>
      </section>
    <!-- Dish section End  --->
     @endif


    <!-- About Section Start -->
      <section class="about" id="about">
        <h3 class="sub-heading">about us</h3>
        <h1 class="heading">Mengapa harus ke kantin FMIPA?</h1>
        <div class="row">
            <div class="image">
                <img src="{{asset('images/backgrounds/aboutbackk.png')}}" alt="">
            </div>
            <div class="content">
                <h3>Kantin Terbaik di USK</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex cum, sequi quidem ipsum quam suscipit, distinctio sunt nemo eaque, in amet unde recusandae provident tempora magnam itaque aliquid saepe illum!</p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium debitis ad aliquam ut autem quisquam incidunt vitae. Provident consequatur pariatur ea sequi, inventore, facere maiores hic perferendis cum, maxime vero.
                      to like you and visit our restaurants with your friends and family and enjoy the dishes.
                </p>
                <div class="icons-container">
                    <div class="icons">
                        <i class="fas fa-shipping-fast"></i>
                        <span>free delivery</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-dollar-sign"></i>
                        <span>easy payments</span>
                    </div>
                    <div class="icons">
                        <i class="fas fa-headset"></i>
                        <span>CS</span>
                    </div>
                </div>
            </div>
        </div>
      </section>

    <!-- About Section End -->



    <!-- menu Section start-->

     <section class="menu" id="menu">
        <h3 class="sub-heading">Menu</h3>
        <h1 class="heading">Makanan Spesial Hari ini</h1>
        <div class="box-container">
            @foreach ($menus as $menu)
                 <div class="box">
                    <div class="image">
                        <img src="{{asset('images/menu/'.$menu->image)}}" alt="">
                        <form action="{{route('Jador.store')}}" method="POST">
                            @csrf
                            @if (auth()->user())
                                <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
                                <input type="hidden" name="menu_id" value="{{$menu->id}}">
                            @endif
                            <button type="submit"> <i class="fas fa-heart"></i></button>
                        </form>
                    </div>
                    <div class="content">

                        <h3>{{$menu->title}}</h3>
                        <p>
                            {{$menu->description}}
                        </p>
                        <span class="price">{{$menu->pric}} MAD</span>
                        <form action="{{route('cart.add',$menu->id)}}" method="POST">
                            {{--  nsift qte =1 f index  cart --}}
                            <input type="hidden" name="quantity"  value="1">
                            @csrf
                            <button
                            type="submit"
                            class="btn">add to cart</button>
                        </form>

                    </div>
                </div>
            @endforeach


        </div>
     </section>

    <!-- menu section end -->

    <!-- review section start -->
    @if ($reviews->count())
    <section class="review" id="review">
        <h3 class="sub-heading">customer's review</h3>
        <h1 class="heading">what they say</h1>
            <div class="swiper-container review-slider ">
                    <div class="swiper-wrapper">

            @foreach ($reviews as $review)
                     @if ($review->status)
                          <div class="swiper-slide slide">
                                <i class="fas fa-quote-right"></i>
                                <div class="userrev">
                                    @if ($review->user->image === 'image')
                                    <img src="{{asset('images/profile/userImage.png')}}" alt="user-image">
                                    @else
                                    <img src="{{asset('images/profile/'.$review->user->image)}}" alt="user-image">
                                    @endif

                                    <div class="user-info">
                                        <h3>{{$review->user->name}}</h3>
                                    </div>

                                </div>
                                    <p>
                                    {{$review->comment}}
                                    </p>

                            </div>

                     @endif


            @endforeach




           </div>
        </div>
    </section>
     @endif
    <!-- review section end -->

     <!-- Ordre Section start -->
      <div class="review2" id="review2">
        <h3 class="sub-heading">review</h3>
        <h1 class="heading">Review kamu tentang servis kami</h1>
        <form action="{{route('reviews.store')}}" method="POST">
            @csrf
            <div class="inputBox">
                <div class="input">
                    <span>review kamu</span>
                    <textarea name="comment" placeholder="entre your review" id="" cols="30" rows="10"></textarea>
                </div>
            </div>

            <input type="submit" value="add your review" class="btn">
        </form>
      </div>

     <!-- Ordre Section end --->
@endsection
