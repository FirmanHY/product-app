<div class="checkout-form">
    <h2>Make Your Checkout Here</h2>
    <p>Please register in order to checkout more quickly</p>
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <x-frontend.general.form-field label="First Name" name="first_name"
                required="true" />
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <x-frontend.general.form-field label="Last Name" name="last_name"
                required="true" />
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <x-frontend.general.form-field label="Email Address" name="email"
                type="email" required="true" />
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <x-frontend.general.form-field label="Phone Number" name="phone"
                type="number" required="true" />
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <div class="form-group">
                <label>Country<span>*</span></label>
                <select name="country" id="country">
                    <option value="US">United States</option>
                    <option value="ID">Indonesia</option>

                </select>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <x-frontend.general.form-field label="Address Line 1"
                name="address1" required="true" />
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <x-frontend.general.form-field label="Address Line 2"
                name="address2" required="false" />
        </div>
        <div class="col-lg-6 col-md-6 col-12">
            <x-frontend.general.form-field label="Postal Code" name="post_code"
                required="false" />
        </div>
    </div>
</div>
