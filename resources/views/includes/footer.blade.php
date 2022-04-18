<footer>
    <div class=" row-1" style="width: 100%">
        <div class="col-4">
            <span class="row-1">
                <a href="" class="col-6"><p>@lang('home')</p></a>
                <a href="" class="col-6"><p>@lang('catalog')</p></a>
                <a href="" class="col-6"><p>@lang('contact')</p></a>
                <a href="" class="col-6"><p>@lang('about')</p></a>
                <a href="" class="col-6"><p>@lang('Register')</p></a>
            </span>
        </div>
        <div class="col-4">
            <span><h4>@lang('Receive offers, invites, and update')</h4><br>
                <p class="msg"></p>
                <div class="contact-form">
                      <form  id="contactform" style="display: flex">
                       @csrf
                          <input type="email" id="emailfooter" placeholder="@lang('Email Address')" name="email" required>
                          <input type="submit" value="@lang('send')" name="submit">
                      </form>
                </div>
            </span>
        </div>
        <div class="col-4">
            <span><h4>@lang('Follow Us On')</h4><br>
                    <span class="row-1 forlowUs">
                        <a href="" class=""><p><i class="bi bi-facebook"></i></p></a>
                        <a href="" class=""><p><i class="bi bi-whatsapp"></i></p></a>
                        <a href="" class=""><p><i class="bi bi-instagram"></i></p></a>
                        <a href="" class=""><p><i class="bi bi-twitter"></i></p></a>
                        <a href="" class=""><p><i class="bi bi-youtube"></i></p></a>

                    </span>
            </span>
        </div>
    </div>
    <div class="copy-right">
        <p  style="color: white">&copy; 2021 @lang('PRIVACY POLICY'), @lang('ALL RIGHT RESERVED')</p>
    </div>

</footer>
