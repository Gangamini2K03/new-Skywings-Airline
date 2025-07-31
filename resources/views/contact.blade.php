@extends('layouts.app')

@section('content')
<section id="contact" class="contact">
    <div class="container">
        <div class="section-title">
            <h2>Contact Us</h2>
            <p>We're here to help with any questions or concerns</p>
        </div>

        <!-- Map -->
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387193.3059445135!2d-74.25986613799748!3d40.69714941774136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2s!4v1689239987890!5m2!1sen!2s" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

        <!-- Contact Grid -->
        <div class="contact-container">
            <!-- Left: Info -->
            <div class="contact-info">
                <h3>Get In Touch</h3>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <h4>Headquarters</h4>
                        <p>123 Aviation Avenue, New York, NY 10001, USA</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                    <div>
                        <h4>Phone</h4>
                        <p>+1 (800) 555-1234</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                    <div>
                        <h4>Email</h4>
                        <p>info@skywings.com</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon"><i class="fas fa-clock"></i></div>
                    <div>
                        <h4>Customer Support Hours</h4>
                        <p>24/7, 365 days a year</p>
                    </div>
                </div>
            </div>

            <!-- Right: Form -->
            <div class="contact-form">
                <h3>Send Us a Message</h3>
                <form>
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" class="form-control" placeholder="your@email.com">
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea id="message" class="form-control" rows="5" placeholder="Your message..."></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
