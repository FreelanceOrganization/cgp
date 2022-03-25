  <p class="card-description"> Personal info </p>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">First Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control @error('firstname') invalid  @enderror" name="firstname" placeholder="Juan" value="{{ old('firstname', $route && !is_null($customer) ? $customer['firstname'] : '') }}">
          @error('firstname')
            <span style="color:red; font-size:12px">*{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Last Name</label>
        <div class="col-sm-9">
          <input type="text" class="form-control @error('lastname') invalid  @enderror" name="lastname" placeholder="Dela Cruz" value="{{ old('lastname', $route && !is_null($customer) ? $customer['lastname'] : '') }}">
          @error('lastname')
            <span style="color:red; font-size:12px">*{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-9">
          <select class="form-control" name="gender">
            <option value="Male" @if (old('gender', $route && !is_null($customer) ? $customer['gender'] : '') == "Male") {{ 'selected' }} @endif >Male</option>
            <option value="Female" @if (old('gender', $route && !is_null($customer) ? $customer['gender'] : '') == "Female") {{ 'selected' }} @endif>Female</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Date of Birth</label>
        <div class="col-sm-9">
          <input max="{{ \Carbon\Carbon::now()->subDays(7)->format('Y-m-d') }}" type="date" class="form-control @error('birthdate') invalid  @enderror" placeholder="dd/mm/yyyy" name="birthdate" value="{{ old('birthdate', $route && !is_null($customer) ? $customer['birthdate'] : '') }}">
          @error('birthdate')
            <span style="color:red; font-size:12px">*{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Nationality</label>
        <div class="col-sm-9">
          <select class="form-control" name="nationality">
              <option value="Filipino" @if (old('nationality', $route && !is_null($customer) ? $customer['nationality'] : '') == "Filipino") {{ 'selected' }} @endif>Filipino</option>
            <option value="Foreign" @if (old('nationality', $route && !is_null($customer) ? $customer['nationality'] : '') == "Foreign") {{ 'selected' }} @endif>Foreign</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Contact Number</label>
        <div class="col-sm-9">
            <input type="number" class="form-control @error('contact_number') invalid  @enderror" placeholder="09*********" name="contact_number" value="{{ old('contact_number', $route && !is_null($customer) ? $customer['contact_number'] : '') }}">
            @error('contact_number')
                <span style="color:red; font-size:12px">*{{ $message }}</span>
            @enderror
          </div>
      </div>
    </div>
  </div>
  <p class="card-description"> Address </p>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Sitio</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="sitio" placeholder="Capricorn" value="{{ old('sitio', $route && !is_null($customer) ? $address->sitio : '') }}">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Barangay</label>
        <div class="col-sm-9">
          <input type="text" class="form-control @error('barangay') invalid  @enderror" name="barangay" placeholder="Talisay" value="{{ old('barangay', $route && !is_null($customer) ? $address->barangay : '') }}">
          @error('barangay')
            <span style="color:red; font-size:12px">*{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Municipality</label>
        <div class="col-sm-9">
          <input type="text" class="form-control @error('municipality') invalid  @enderror" name="municipality" placeholder="Santa Fe" value="{{ old('municipality', $route && !is_null($customer) ? $address->municipality : '') }}">
          @error('municipality')
            <span style="color:red; font-size:12px">*{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Province</label>
        <div class="col-sm-9">
          <input type="text" class="form-control @error('province') invalid  @enderror" name="province" placeholder="Cebu" value="{{ old('province', $route && !is_null($customer) ? $address->province : '') }}">
          @error('province')
            <span style="color:red; font-size:12px">*{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
  </div>
  <p class="card-description"> Account </p>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-9">
          <input type="email" class="form-control @error('email') invalid  @enderror" name="email" placeholder="juan@gmail.com" value="{{ old('email', $route && !is_null($customer) ? $customer['email'] : '') }}">
          @error('email')
            <span style="color:red; font-size:12px">*{{ $message }}</span>
          @enderror
        </div>
      </div>
    </div>
    @if(!$route)
    <div class="col-md-6">
      <div class="form-group row">
        <label class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-9">
          <input type="password" class="form-control @error('password') invalid  @enderror" name="password" placeholder="*********">
          @error('password')
           <span style="color:red; font-size:12px">*{{ $message }}</span>
         @enderror
        </div>
      </div>
    </div>
    @endif
  </div>
  @if(!$route)
  <p class="card-description"> First Deposit </p>
  <div class="col-md-6">
    <div class="form-group row">
      <label class="col-sm-3 col-form-label">Amount</label>
      <div class="col-sm-9">
        <input type="number" step=".01" class="form-control @error('amount') invalid  @enderror" name="amount" placeholder="1000" value="{{ old('amount') }}">
        @error('amount')
         <span style="color:red; font-size:12px">*{{ $message }}</span>
       @enderror
      </div>
    </div>
  </div>
  @endif

