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
    
    <!--menu-->
    @include('components/custom_nav')
    <!--menu-->
    
    <!--body-->
    <div class="row">
        <div class="col-sm-3 col-12">
        </div>
    
        <div class="col-sm-6 col-12">
            <!--main content-->
            <div id="mc_embed_shell">
                <link href="//cdn-images.mailchimp.com/embedcode/classic-061523.css" rel="stylesheet" type="text/css">
            <style type="text/css">
                  #mc_embed_signup{background:#fff; false;clear:left; font:14px Helvetica,Arial,sans-serif; width: 600px;}
                  /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
                     We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
          </style>
          <div id="mc_embed_signup">
              <form action="https://edatsu.us18.list-manage.com/subscribe/post?u=ce5edb3afeca14d1d47a046bf&amp;id=873d67a43e&amp;f_id=007d96e6f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                  <div id="mc_embed_signup_scroll"><h2>Subscribe</h2>
                      <div class="indicates-required"><span class="asterisk">*</span> indicates required</div>
                      <div class="mc-field-group"><label for="mce-EMAIL">Email Address <span class="asterisk">*</span></label><input type="email" name="EMAIL" class="required email" id="mce-EMAIL" required="" value=""><span id="mce-EMAIL-HELPERTEXT" class="helper_text"></span></div>
          <div hidden=""><input type="hidden" name="tags" value="2120500"></div>
                  <div id="mce-responses" class="clear foot">
                      <div class="response" id="mce-error-response" style="display: none;"></div>
                      <div class="response" id="mce-success-response" style="display: none;"></div>
                  </div>
              <div aria-hidden="true" style="position: absolute; left: -5000px;">
                  /* real people should not fill this in and expect good things - do not remove this or risk form bot signups */
                  <input type="text" name="b_ce5edb3afeca14d1d47a046bf_873d67a43e" tabindex="-1" value="">
              </div>
                  <div class="optionalParent">
                      <div class="clear foot">
                          <input type="submit" name="subscribe" id="mc-embedded-subscribe" class="button" value="Subscribe">
                          <p style="margin: 0px auto;"><a href="http://eepurl.com/iwQRLg" title="Mailchimp - email marketing made easy and fun"><span style="display: inline-block; background-color: black; border-radius: 4px;"><img class="refferal_badge" src="https://cdn-images.mailchimp.com/monkey_rewards/intuit-mc-rewards-no-bg-1.svg" alt="Intuit Mailchimp" style="width: 220px; height: 40px; display: flex; padding: 2px 0px; justify-content: center; align-items: center;"></span></a></p>
                      </div>
                  </div>
              </div>
          </form>
          </div>
          <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>
          
            <!--main content-->
        </div>

        <div class="col-sm-3 col-12">
            <!--aside-->
            <div class='px-3 py-3 rounded border mb-3 bg-white'>
     
                <h5 class='fw-bold m-0 mb-3'>Submit Events</h5>
                <p class="fs-9 text-secondary">
                Submit a tech event. It's free.
                </p>
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfxDBVx1cxmooAkjjTaErpGuuaPPP1eoFUhgfQtHjtyz3IbaA/viewform?usp=sf_link" 
                target="_blank"
                class='btn btn-dark w-100 fs-9 py-3 my-3'>Submit</a>
            </div>
            <!--aside-->
        </div>
    </div>
    <!--body-->
    @include('components/fixed_mobile_menu')
    </x-guest-layout>
    