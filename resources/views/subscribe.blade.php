<x-guest-layout>
    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="py-5">
                 <!--logo-->
                 <a href='./'>
                    <img src="{{ asset('img/logo/trans/logo_trans_1.png')}}" width="90" class="img-fluid" alt="logo">
                    </a>
                <!--logo-->
                <h1 class='fw-bold mb-3'>Subscribe</h1>
                <p class=''>Subscribe To Our Weekly News, Opportunity And Events Digest</p>
            </div>  
        </div>
    </div>
    <!--body-->
    <div class="row">
        <div class="col-sm-3 col-12">
            <!--aside-->
            <!--aside-->
        </div>
        <div class="col-sm-6 col-12">
        <!--subscribe-->
        <div id="mc_embed_shell">
        <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">

        <div id="mc_embed_signup" class="px-3 py-3 border rounded mb-3 bg-white">
            <form action="https://edatsu.us18.list-manage.com/subscribe/post?u=ce5edb3afeca14d1d47a046bf&amp;id=873d67a43e&amp;f_id=007d96e6f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                <div id="mc_embed_signup_scroll"><h2>Subscribe</h2>
                    <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                    <div class=""><label for="mce-FNAME">First Name <span class="asterisk">*</span></label>
                        <input type="text" name="FNAME" class="required text form-control w-100" id="mce-FNAME" required="" value="">
                    </div>
                    
                    <div class=""><label for="mce-LNAME">Last Name <span class="asterisk">*</span></label>
                        <input type="text" name="LNAME" class="required text form-control" id="mce-LNAME" required="" value="">
                    </div>

                    <div class=""><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label>
                    <input type="email" name="EMAIL" class="required email form-control" id="mce-EMAIL" required="" value="">
                    </div>

                    <div hidden=""><input type="hidden" name="tags" value="2120500"></div>
                    <div id="mce-responses" class="clear foot">
                        <div class="response" id="mce-error-response" style="display: none;"></div>
                        <div class="response" id="mce-success-response" style="display: none;"></div>
                    </div>
                    <div aria-hidden="true" >
                  {{-- /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */ --}}
                <input type="hidden" name="b_ce5edb3afeca14d1d47a046bf_873d67a43e" tabindex="-1" value="">
                </div>
                <div class="optionalParent">
                <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="btn border-0 py-3 btn-dark w-100 d-block mx-auto" value="Subscribe">
                </div>
            </div>
        </form>
        </div>
        <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[0]='EMAIL';ftypes[0]='email';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>
        <!--subscribe-->
        </div>
        <div class="col-sm-3 col-12">
        <!--aside-->
        <!--aside-->
        </div>
    </div>
    <!--body-->
    @include('components/fixed_mobile_menu')
    </x-guest-layout>
    