@extends('layouts.user')

@section('title', 'Contact Us - MDRRMO Camalaniugan')

@section('content')
<div class="section">
    <h1 style="font-size: 2rem; margin-bottom: 2rem;">Contact Us</h1>
    
    @if(session('success'))
        <div style="background: #dcfce7; color: #166534; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="grid-2">
        <!-- Contact Form -->
        <div style="background: white; padding: 2rem; border-radius: 0.5rem; border: 1px solid #e5e7eb;">
            <form action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" placeholder="Your Name" required>
                    @error('name')
                        <p style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" placeholder="your@email.com" required>
                    @error('email')
                        <p style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
                <div style="margin-bottom: 1rem;">
                    <label style="display: block; margin-bottom: 0.5rem; font-weight: 500;">Message</label>
                    <textarea name="message" rows="4" style="width: 100%; padding: 0.75rem; border: 1px solid #d1d5db; border-radius: 0.5rem;" placeholder="How can we help?" required>{{ old('message') }}</textarea>
                    @error('message')
                        <p style="color: #dc2626; font-size: 0.875rem; margin-top: 0.25rem;">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary" style="width: 100%; justify-content: center;">Send Message</button>
            </form>
        </div>

        <!-- Contact Info -->
        <div>
            <h3 style="margin-top: 0;">MDRRMO Office</h3>
            <p style="color: #4b5563; margin-bottom: 2rem;">
                For non-emergency inquiries, please visit our office or send us a message.
            </p>
            
            <div style="margin-bottom: 1.5rem;">
                <strong style="display: block; color: #111827;">Address</strong>
                <span style="color: #6b7280;">Municipal Hall, Camalaniugan, Cagayan</span>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <strong style="display: block; color: #111827;">Phone</strong>
                <span style="color: #6b7280;">(078) 892-1234</span>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <strong style="display: block; color: #111827;">Email</strong>
                <span style="color: #6b7280;">mdrrmo@camalaniugan.gov.ph</span>
            </div>
            
            <div style="margin-bottom: 1.5rem;">
                <strong style="display: block; color: #111827;">Office Hours</strong>
                <span style="color: #6b7280;">Monday - Friday: 8:00 AM - 5:00 PM</span>
            </div>
            
            <div style="background: #fee2e2; padding: 1rem; border-radius: 0.5rem; border-left: 4px solid #dc2626;">
                <p style="margin: 0; color: #991b1b; font-size: 0.9rem;">
                    <strong>Emergency Hotline:</strong> 911 (24/7)
                </p>
            </div>
        </div>
    </div>
</div>
@endsection