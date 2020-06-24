@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
<div class="col-lg-8 contact_col mt-3">
	<div class="contact_form">
		<div class="contact_title">{{ __('Send Mail to Admin') }}</div>
		<div class="contact_form_container">
			<form action="{{ route('send-email') }}" id="contact_form" class="contact_form">
				<input type="text" name="name" id="contact_input" class="contact_input" placeholder="Your Name" required="required">
				<input type="email" name="email" id="contact_email" class="contact_input" placeholder="Your E-mail" required="required">
				<input type="text" name="subject" id="contact_subject" class="contact_input" placeholder="Subject" required="required">
				<textarea class="contact_input contact_textarea" name="message" id="contact_textarea" placeholder="Message" required="required"></textarea>
				<button class="contact_button font-weight-bold" id="contact_button">{{ __('Send') }}</button>
			</form>
		</div>
	</div>
</div>
</div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/contact.js') }}"></script>
@endpush
@push('styles')
    <link href="{{ asset('styles/contact.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/contact_responsive.css') }}" rel="stylesheet">
@endpush
