@extends('frontend.layouts.app3')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')

		<div class="section over-hide bg-white">	
			<div class="container-fluid">
				<div class="row">
					<div class="col-12 col-xl-6 px-0">
						<div class="section over-hide min-full-height full-height-xl">	
							<div id="cd-google-map" class="parallax-hero-1200">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3715.9789861847735!2d-101.94036608553087!3d21.351324082064966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842bd3cb86f94867%3A0x27a1c662fae46eec!2sMargarito%20Gonz%C3%A1lez%20Rubio%20822%2C%20El%20Refugio%2C%2047470%20Lagos%20de%20Moreno%2C%20Jal.!5e0!3m2!1sen!2smx!4v1589257899515!5m2!1sen!2smx" width="100%" height="950" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
								<div id="cd-zoom-in"></div>
								<div id="cd-zoom-out"></div>
								<address class="text-center">
									<p class="mb-0 color-dark-blue text-center-v">
										<i class="uil uil-map-marker-alt size-20 mr-2 color-primary"></i> 281 1st Avenue, New York
									</p>
								</address>
							</div>
						</div>
					</div>
					<div class="col-12 col-xl-6 align-self-center mt-xl-5 pt-xl-5">
						<div class="section py-5 py-xl-0 my-5 my-xl-0 section-background-24 z-bigger">
							<div class="row justify-content-center px-1">
								<div class="col-12 text-center mb-5 pb-3 pb-xl-0">
									<h6 class="color-primary text-uppercase mb-2">
										Ponerse en contacto
									</h6>
									<h3 class="display-8 mb-0 color-gray-dark">
										Contáctenos
									</h3>
								</div>
								<div class="clearfix w-100"></div>  
								<div class="col-md-6 col-xl-4 mt-3 px-2"> 
									<div class="form-group">
										<input type="text" name="contactname" class="form-style big form-style-with-icon section-shadow-blue" placeholder="Nombre" id="contactname" autocomplete="off">
										<i class="input-icon big uil uil-user"></i>
									</div>							
								</div> 
								<div class="col-md-6 col-xl-4 mt-3 px-2">  
									<div class="form-group">
										<input type="email" name="contactemail" class="form-style big form-style-with-icon section-shadow-blue" placeholder="Correo electrónico" id="contactemail" autocomplete="off">
										<i class="input-icon big uil uil-at"></i>
									</div>	          
								</div> 
								<div class="clearfix w-100"></div>  
								<div class="col-xl-8 mt-3 px-2">  
									<div class="form-group">
										<textarea name="contactmessage" class="form-style big form-style-with-icon form-textarea section-shadow-blue" placeholder="Mensaje" id="contactmessage" autocomplete="off" rows="5"></textarea>
										<i class="input-icon big uil uil-comment-alt-lines"></i>
									</div>	          
								</div> 
								<div class="col-12 text-center pt-4 px-2"> 
									<p id="contact-message-feedback"></p> 
									<button type="button" class="btn btn-dark-primary send-contact-message">Enviar mensaje<i class="uil uil-arrow-right size-22 ml-3"></i></button>         
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection

@push('after-scripts')
    @if(config('access.captcha.contact'))
        @captchaScripts
    @endif

    <!-- Google Map-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>
    <script src="{{ asset('/porto/assets/js/map.js') }}"></script>

@endpush