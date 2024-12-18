@extends('front.layouts.layout') @section('content')




<div class="banner-tailors">
  <div class="container browse-tailors">
    <div class="row browse-content">
      <h1 class="text-white">Measurement</h1>
    </div>
  </div>
</div>







<div class="container-fluid page-body-wrapper vendor-dasboard">
  @include('front.user.sidebar')

  <div class="col-md-9">



    <div class="mesurment-layout">
      <div class="container">

          <div class="row mesurment-body">
          <div class="col-md-6 mesurment-body-left">
            <img src="{{ url('/public') }}/front_assets/images/working-new-dress.png">
          </div>

          <div class="col-md-6 mesurment-body-right">

            <p class="read-inner-text">October 11, 2024 . 5 min read</p>
            <h1>How to use a body measurement for tailoring, fitness progress, and wellness tracking</h1>
            <h6>Why track body changes with a measurement chart? To gain insights for tailoring, fitness, or wellness.
              Get expert tips for success.
            </h6>
          </div>



        </div>

        <div class="row mesurment-inner-layout">

          <div class="col-md-12 mesurment-left">
            <img src="{{ url('/public') }}/front_assets/images/measurement.jpg">
          </div>
<div class="col-md-12 mesurment-right">
  <form class="measurement-form">
    <h1 class="title">Tailor Measurement</h1>
    <p class="ensure-inner-text">Provide your measurements to ensure the perfect fit.</p>

    <div class="form-row">
      <div class="measur-one">
        <label for="chest">Chest (in/cm)</label>
        <input type="number" id="chest" name="chest" placeholder="Enter chest measurement" required>
      </div>
      <div class="measur-one">
        <label for="waist">Waist (in/cm)</label>
        <input type="number" id="waist" name="waist" placeholder="Enter waist measurement" required>
      </div>
    </div>

    <div class="form-row">
      <div class="measur-one">
        <label for="shoulders">Shoulder Width (in cm):</label>
        <input type="number" id="shoulders" name="shoulders" placeholder="Enter width in cm" min="30" max="70" step="0.1" required>
      </div>
      <div class="measur-one">
        <label for="upperArms">Upper Arms Measurement (cm):</label>
        <input type="number" id="upperArms" name="upperArms" min="0" max="100" step="0.1" placeholder="Enter value in cm" required>
      </div>
    </div>

    <div class="form-row">
      <div class="measur-one">
        <label for="arms">Arms Measurement (inches or cm):</label>
        <input type="number" id="arms" name="arms" placeholder="Enter arms measurement" min="0" required>
      </div>
      <div class="measur-one">
        <label for="waist">Waist (in inches):</label>
        <input type="number" id="waist" name="waist" placeholder="Enter waist size" min="0" step="0.1" required>
      </div>
    </div>

    <div class="form-row">
      <div class="measur-one">
        <label for="length">Length (in/cm)</label>
        <input type="number" id="length" name="length" placeholder="Enter length measurement" required>
      </div>
      <div class="measur-one">
        <label for="unit">Measurement Unit</label>
        <select id="unit" name="unit">
          <option value="inches">Inches</option>
          <option value="cm">Centimeters</option>
        </select>
      </div>
    </div>

    <a href="#" class="submit" type="submit">Submit</a>
  </form>
</div>


          </div>

        </div>




<div class="row measurement-sheet">
   <h1>Tailor Measurement Data</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Measurement Type</th>
                <th>Measurement (in inches)</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Chest</td>
                <td>40</td>
                <td>Fitted</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Waist</td>
                <td>34</td>
                <td>Comfortable Fit</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Hips</td>
                <td>38</td>
                <td>Slim Fit</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Neck</td>
                <td>15</td>
                <td>Regular</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Sleeve Length</td>
                <td>25</td>
                <td>Long</td>
            </tr>
            <tr>
                <td>6</td>
                <td>Shoulder</td>
                <td>18</td>
                <td>Square Fit</td>
            </tr>
        </tbody>
    </table>

</div>
     

      </div>
    </div>


  </div>

</div>










@endsection