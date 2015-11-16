<!-- Header -->
    <header>
        <div class="container cover">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-text">
                        <span class="name">SCW</span>
                        <span class="skills">College Essay Revision Service</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="order">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Get Your Essay Revised</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <form action="<?php echo base_url() ?>order" method="post" id="payment-form" enctype="multipart/form-data">

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                        <label>Name</label>
                        <input type="text" class="form-control" name="order-name" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                        <label>Email</label>
                        <input type="text" name="order-email" class="form-control" placeholder="Email" id="email" required data-validation-required-message="Please enter your email.">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                        <label>Your Essay (please include the prompt)</label>
                        <input type="file" name="uploaded_file">
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                        <label>Card Number</label>
                        <input type="text" size="20" class="form-control" data-stripe="number" placeholder="4242424242424242"/>
                        <a href="<?php echo base_url()?>assets/img/creditcard.jpg" style="font-size:8px" target="_blank">What's this?</a>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                        <label>CVC</label>
                        <input type="text" size="4" data-stripe="cvc" placeholder="193"/>
                        <br>
                        <a href="<?php echo base_url()?>assets/img/backofcard.jpg" style="font-size:8px"  target="_blank">What's this?</a>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                        <label>Expiration (MM/YYYY)</label>
                        <input type="text" size="2" data-stripe="exp-month" placeholder="MM"/>
                          <span> / </span>
                          <input type="text" size="4" data-stripe="exp-year" placeholder="YYYY"/><br>
                          <a href="<?php echo base_url()?>assets/img/cardexpdate.jpg" style="font-size:8px"  target="_blank">What's this?</a>

                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                    <label>Essay Prompt Word Limit
                        <select class="form-control" name="order-price">
                          <option value="1000">0-100 Words - $10</option>
                          <option value="2500">100-250 Words - $25</option>
                          <option value="3500">250-400 Words - $35</option>
                          <option value="4500">400-650 Words - $45</option>
                          <option value="5500">650-1000 Words - $55</option>
                          <option value="7000">1000-2000 Words - $70</option>
                        </select>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                        <div align="center">You must validate your card information before submitting</div>
                        <button class="btn btn-default" id="validateCard">Validate!</button>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-6 col-xs-offset-3 floating-label-form-group controls">
                        <button class="btn btn-default" type="submit" id="submitButton">Submit Payment</button>
                    </div>
                </div>

              </form>
            </div>
        </div>
    </section>