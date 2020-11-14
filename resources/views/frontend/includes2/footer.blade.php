        <div class="container">
            <footer class="footer">
                <div class="footer-top">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="widget widget-newsletter">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <h4 class="widget-title">@lang('labels.frontend.footer.suscribe')</h4>
                                        <p>@lang('labels.frontend.footer.latest_information')</p>
                                    </div><!-- End .col-lg-6 -->

                                    <div class="col-lg-6">
                                        <form action="#">
                                            <input type="email" class="form-control" placeholder="@lang('labels.frontend.footer.email')" required>

                                            <input type="submit" class="btn" value="@lang('labels.frontend.footer.suscribe')">
                                        </form>
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget -->
                        </div><!-- End .col-md-8 -->
                    </div><!-- End .row -->
                </div><!-- End .footer-top -->

                <div class="footer-middle">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="widget">
                                <h4 class="widget-title">@lang('labels.frontend.contact.box_title')</h4>
                                <ul class="contact-info">
                                    <li>
                                        <span class="contact-info-label">@lang('labels.general.address'):</span>Margarito Gonzalez Rubio #822 L5<br>
                                        Col. El Refugio, Lagos de Moreno Jal.<br>
                                        C.P. 47470
                                    </li>
                                    <li>
                                        <span class="contact-info-label">@lang('labels.general.phone'):</span> <a href="tel:">47 42 30 00</a>
                                    </li>
                                </ul>
                            </div><!-- End .widget -->
                        </div><!-- End .col-lg-3 -->

                        <div class="col-lg-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="widget">
                                        <h4 class="widget-title">@lang('labels.general.my_account')</h4>

                                        <div class="row">
                                            <div class="col-sm-6 col-md-5">
                                                <ul class="links">
                                                    <li><a href="#">@lang('labels.general.account')</a></li>
                                                    <li><a href="{{ route('frontend.contact') }}">@lang('labels.frontend.contact.box_title')</a></li>
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                            <div class="col-sm-6 col-md-5">
                                                <ul class="links">
                                                    <li><a href="#">@lang('labels.general.order_history')</a></li>
                                                </ul>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .widget -->
                                </div><!-- End .col-md-5 -->

                            </div><!-- End .row -->
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .footer-middle -->

                <div class="footer-bottom">
                    <div class="social-icons">
                        <a href="#" class="social-icon" target="_blank"><i class="icon-facebook"></i></a>
                        <a href="#" class="social-icon" target="_blank"><i class="icon-twitter"></i></a>
                        <a href="#" class="social-icon" target="_blank"><i class="icon-linkedin"></i></a>
                    </div><!-- End .social-icons -->

                    <p class="footer-copyright">San Jose Uniformes. &copy;  {{ now()->year }}.  @lang('labels.general.all_rights_reserved')</p>

                    <img src="{{ asset('/porto/assets/images/payments.png') }}" alt="payment methods" class="footer-payments">
                </div><!-- End .footer-bottom -->
            </footer><!-- End .footer -->
        </div><!-- End .container -->
