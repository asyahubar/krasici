@extends('layouts.app')


@section('above-fold')
	<div id="main-img">
		<vue-compare-image 
		left-image="{{asset("storage/img_og/terasse_view_left.png")}}" 
		right-image="{{asset("storage/img_og/terasse_view_right.png")}}"
		hover
		left-image-alt="погляд з тераси вліво"
		right-image-alt="погляд з тераси вправо"
		/>
	</div>
@endsection


@section('contact')

	<section id="call_to_contact">
		<h4>{{__('homepage.call_to_contact.book_now')}}</h4>
		<br>
		<h4>info [at] krasici.me</h4>
	</section>

@endsection


@section('content')

<div class="wrapper">

	<aside id="sidenav">
		<div>
			<ul v-scroll-spy-active v-scroll-spy-link>
				@foreach(__("homepage.sidenav") as $key => $value)
				<li><a href="#{{$key}}">{{$value}}</a></li>
				@endforeach
			</ul>
		</div>
	</aside>

	<div id="content" v-scroll-spy="{offset: 90}">

		<section id="intro">
			<h2>{{ __("homepage.intro.header") }}</h2>
			<p><strong>{{ __("homepage.intro.paragraph") }}</strong></p>
		</section>

		<section id="flat">
			<div class="image-cards cards">
				<image-card 
				path="{{asset('storage/img_s/kitchen.png')}}" 
				modal-path="{{asset('storage/img_l/kitchen.png')}}"
				alt="{{__('homepage.flat.amenities.kitchen.header')}}" 
				title="{{__('homepage.flat.amenities.kitchen.header')}}"
				id="kitchen-photo"> </image-card>
				<image-card 
				path="{{asset('storage/img_s/bathroom.jpg')}}"				
				modal-path="{{asset('storage/img_l/bathroom.jpg')}}" 
				alt="{{__('homepage.flat.amenities.bathroom.header')}}" 
				title="{{__('homepage.flat.amenities.bathroom.header')}}"
				id="bathroom-photo"></image-card>
				<image-card 
				path="{{asset('storage/img_s/living_room.png')}}" 
				modal-path="{{asset('storage/img_l/living_room.png')}}"
				alt="{{__('homepage.flat.amenities.bedroom.header')}}" 
				title="{{__('homepage.flat.amenities.bedroom.header')}}"
				id="bedroom-photo"></image-card>
			</div>
			<header>
				<h2>{{ __("homepage.flat.header") }}</h2>
				<div>
					@foreach(__("homepage.flat.rooms") as $value)
					<span>{{ $value }}</span>
					@endforeach
				</div>
			</header>
			<div id="amenities" class="cards">
				@foreach(__("homepage.flat.amenities") as $value)
					<div class="card">
						<h4 class="uppercase">{{ $value['header'] }}</h4>
						<hr/>
						<div class="icon-list">
							@foreach($value['list'] as $icon => $title)
								<div>
									<i class="{{$icon}}-icon icon"></i>
									<span>{{ $title }}</span>
								</div>
							@endforeach
						</div>
					</div>
				@endforeach
			</div>
			<div id="conditions">
				<h3>{{ __("homepage.flat.residence.header") }}</h3>
				<hr>
				<ul>
					@foreach(__("homepage.flat.residence.list") as $value)
						<li>{{ $value }}</li>
					@endforeach
				</ul>
			</div>
		</section>

		<section id="village">
			<div class="image-cards cards">
				<image-card 
				path="{{asset('storage/img_s/plant.jpg')}}" 
				modal-path="{{asset('storage/img_l/plant.jpg')}}"
				alt="{{__('plant')}}" 
				title="{{__('plant')}}"
				id="kitchen-photo"> </image-card>
				<image-card 
				path="{{asset('storage/img_s/sea.png')}}"				
				modal-path="{{asset('storage/img_l/sea.png')}}" 
				alt="{{__('sea')}}" 
				title="{{__('sea')}}"
				id="bathroom-photo"></image-card>
				<image-card 
				path="{{asset('storage/img_s/stairs.jpg')}}" 
				modal-path="{{asset('storage/img_l/stairs.jpg')}}"
				alt="{{__('stairs')}}" 
				title="{{__('stairs')}}"
				id="bedroom-photo"></image-card>
			</div>
			<h2>{{ __("homepage.village.header") }}</h2>
			<p>{{ __("homepage.village.paragraph") }}</p>

			<map-component show-krasici></map-component>
		</section>

		<section id="beaches">
			<h2>{{ __("homepage.beaches.header") }}</h2>
			<div class="cards">
				@foreach(__("homepage.beaches.list") as $key => $value)
					<div class="card">
						<div class="display-image">	
							<img
							data-sizes="auto"
						    src="{{asset('storage/img_xs/'.$key.'.jpg')}}"
							srcset="
								{{ asset('storage/img_s/'.$key.'.jpg') }} 420w,
							    {{ asset('storage/img_m/'.$key.'.jpg') }} 695w,
							    {{ asset('storage/img_l/'.$key.'.jpg') }}  900w" 
						    class="lazyload blur-up"
						    title="{{$value}}" />
						</div>
						<h4>{{ $value }}</h4>
						<hr>
					</div>
				@endforeach
			</div>
		</section>

		<section id="bay">
			<h2>{{ __("homepage.bay.header") }}</h2>
			<div class="cards">
				@foreach(__("homepage.bay.list") as $key => $value)
					<div class="card">
						<div class="display-image">	
							<img
							data-sizes="auto"
						    src="{{asset('storage/img_xs/'.$key.'.jpg')}}"
							srcset="
								{{ asset('storage/img_s/'.$key.'.jpg') }} 420w,
							    {{ asset('storage/img_m/'.$key.'.jpg') }} 695w,
							    {{ asset('storage/img_l/'.$key.'.jpg') }}  900w" 
						    class="lazyload blur-up" 
						    title="{{$value}}" />
						</div>
						<h4>{{ $value }}</h4>
						<hr>
					</div>
				@endforeach
			</div>
		</section>

		<section id="calendar">
			<h2>{{ __("homepage.calendar") }}</h2>
			<vue-cal hide-view-selector :time="false" active-view="month" small locale="{{app()->getLocale()}}" class="vuecal--rounded-theme" :disable-views="['years', 'year', 'week', 'day']">
				<i v-slot:arrow-prev aria-hidden="true" class="v-icon material-icons">arrow_back</i>
				<i v-slot:arrow-next aria-hidden="true" class="v-icon material-icons">arrow_forward</i>
			</vue-cal>
		</section>

	</div>
</div>

	{{-- 
	Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
	<div>Icons made by <a href="https://www.flaticon.com/authors/surang" title="surang">surang</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div> 
	<div>Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
	Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
	Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
	Icons made by <a href="http://www.freepik.com/" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a>
	--}}

@endsection
{{-- <div style="background-image: url(storage/img/{{$key}}.jpg" class="display-image" alt="{{str_replace('_', ' ', $key)}}" title="{{$key}}"></div> --}}